<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EvaEvaluacione;
use App\Models\ModelHasRole;
use App\Models\PleStudioClass;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            if (is_numeric($request->email) && ctype_digit($request->email)) :
                // buscar usuario class
                $buscar_estudiante_class = $this->buscar_estudiante_class($request);

                if ($buscar_estudiante_class) :

                    $estudiante = $buscar_estudiante_class;

                    // name es equivalente a cif
                    $usuario = User::where('cif', $estudiante->CIF)
                        ->get();

                    if ($usuario->count() > 0) :
                        $this->class_estudiante_loginUsingId($usuario->first());

                        return redirect()
                            ->route('home');
                    else :
                        // Crear usuario
                        $usuario = User::create([
                            'name'            => $estudiante->CIF,
                            'email'           => $estudiante->CORREO,
                            'facultad_id'     => preg_replace('/[^\p{L}\p{N}]+/u', '', $estudiante->FACULTAD_ID),
                            'facultad_nombre' => preg_replace('/[^\p{L}\p{N}]+/u', '', $estudiante->FACULTAD),
                            'carrera_nombre'  => preg_replace('/[^\p{L}\p{N}]+/u', '', $estudiante->CARRERA_ID),
                            'carrera_id'      => preg_replace('/[^\p{L}\p{N}]+/u', '', $estudiante->CARRERA),
                            'modalidad'       => $estudiante->MODALIDAD ? $estudiante->MODALIDAD : 0,
                            'cif'             => $estudiante->CIF,
                            'estado'          => 1,
                        ]);

                        if ($usuario) :

                            $rol_estudiante = Role::where('name', 'estudiante')
                                ->get();

                            if ($rol_estudiante->count() > 0) :
                                $rol = $rol_estudiante->first();

                                ModelHasRole::create([
                                    'role_id'    => $rol->id,
                                    'model_type' => 'App\Models\User',
                                    'model_id'   => $usuario->id,
                                ]);
                            endif;

                            $this->class_estudiante_loginUsingId($usuario);

                            return redirect()
                                ->route('home');
                        else :
                            return redirect()
                                ->route('login');
                        endif;
                    endif;

                else :
                    return redirect()->route('login');
                endif;

            else :
                // buscar usuario class
                $buscar_usuario_class = $this->buscar_usuario_empleado($request);

                if ($buscar_usuario_class) :

                    $usuario = User::where('name', $request->email)
                        ->get();

                    if ($usuario->count() > 0) :

                        $this->class_loginUsingId($usuario->first());

                        return redirect()
                            ->route('home');
                    else :

                        // Crear usuario
                        $usuario = User::create([
                            'name'            => $buscar_usuario_class->name,
                            'email'           => $buscar_usuario_class->email,
                            'departamento'    => $buscar_usuario_class->departamento,
                            'departamento_nombre' => $buscar_usuario_class->departamento_nombre,
                            'dui'             => $buscar_usuario_class->dui ? $buscar_usuario_class->dui : '000000000',
                            'usuario_class'   => $buscar_usuario_class->name,
                            'estado'          => 1,
                            'password' => null,
                        ]);

                        $this->class_loginUsingId($usuario);

                        return redirect()
                            ->route('home');
                    endif;
                else :
                    return redirect()
                        ->route('login');
                endif;
            endif;
        } catch (\Throwable $th) {
            // return redirect()->route('login');
            return $th;
        }
    }

    /**
     * Buscar informacion de usuario class del empleado
     *
     * @param Request $request
     * @return object $usuario_class
     */
    public function buscar_usuario_empleado($request)
    {
        $usuario = [
            $request->email,
            $request->password
        ];

        $usuario_class = DB::connection('sqlsrv_class')
            ->select(
                "SELECT
                    USRUID as usuario_id,
                    USRUID as name,
                    USREML as email,
                    USRDPT as departamento,
                    USRCIF AS dui
                FROM
                    USUARIOS
                WHERE
                    USRUID = ? COLLATE SQL_Latin1_General_CP1_CI_AS
                AND
                    DBO.fnLeeClave(USRPWD) = ? COLLATE SQL_Latin1_General_CP1_CI_AS",
                $usuario
            );

        if ($usuario_class[0]) :
            $usuario_class[0];

            if ($usuario_class[0]->dui) :

                $buscar_departamento = DB::connection('sqlsrv_suees')
                    ->select("SRH_CONSULTA_EMPLEADO_JEFE '{$usuario_class[0]->dui}' ");

                if ($buscar_departamento[0]) :
                    $usuario_class[0]->departamento = $buscar_departamento[0]->IDUNIDAD;
                    $usuario_class[0]->departamento_nombre = $buscar_departamento[0]->UNIDAD;
                endif;
            endif;
        endif;

        return isset($usuario_class[0]) ? $usuario_class[0] : "";
    }

    /**
     * Crear session de usuario
     *
     * @param object $usuario
     * @return boolean
     */
    public function class_loginUsingId($usuario)
    {
        return auth()
            ->loginUsingId($usuario->id);
    }

    /**
     * Crear session de usuario estudiante
     *
     * @param object $usuario
     * @return boolean
     */
    public function class_estudiante_loginUsingId($usuario)
    {
        return auth()
            ->loginUsingId($usuario->id);
    }

    /**
     * Buscar el plan de estudio del estudiante
     *
     * @param mix $usuario
     * @return mixed $estudiante
     */
    public function buscar_estudiante_class($usuario)
    {
        $buscar = PleStudioClass::select(
            'PLECUN AS CIF',
            'CLINAM AS NOMBRE',
            'CLITE1 AS TELEFONO',
            'CLIEM1 AS CORREO',
            'CARDSC AS CARRERA',
            'CARCOD AS CARRERA_ID',
            'PLETAB AS COD_PLAN_ESTUDIO',
            'PLECAR AS CARRERA',
            'NIVDSC AS FACULTAD',
            'NIVCOD AS FACULTAD_ID',
            'PLEMOF AS MODALIDAD'
        )
            ->join('CARRERA', 'PLECAR', '=', 'CARCOD')
            ->join('NIVELES', 'PLENIV', '=', 'NIVCOD')
            ->join('CLIENTES', 'PLEIDU', '=', 'CLIIDU')
            ->where('PLECUN', $usuario->email)
            ->where('CLIPIN', $usuario->password)
            ->where('CLISTS', 'A')
            ->where('PLESTS', 'A')
            ->get();

        if ($buscar->count() > 0) :

            $estudiante = $buscar->first();

            /**
             * La modalidad es semipresencial
             * se le asigna un 0 ya que viene como ""
             */
            if ($estudiante->MODALIDAD == "") :
                $estudiante->MODALIDAD = 0;
            endif;

            $buscar_evaluacion = $this->buscar_evaluaciones_activas_estudiante($estudiante);

            // agregar propiedad con el numero de evaluacion
            $estudiante->evaluacions = $buscar_evaluacion->count() ? $buscar_evaluacion->count() : 0;

            if ($estudiante->evaluacions == 0) :
                Auth::logout();
                return  abort(401, 'NO ENCONTRAMOS EVALUACION ACTIVAS');
            endif;

            return $estudiante;
        endif;
    }

    /**
     * buscar evaluaciones activas para el estudiante
     *
     * @param mix $estudiante
     * @return object
     */
    protected function buscar_evaluaciones_activas_estudiante($estudiante)
    {
        $buscar_evaluaciones_activa = EvaEvaluacione::whereHas('tiposEvaluacione.tpeConfiguracion.configuracionEntidades', function ($query) {
            $query->where('evaluador_id', 3);
        })
            ->whereHas('tiposEvaluacione.tpeConfiguracion.configuracionFacultades', function ($query) use ($estudiante) {
                $query->where('codigo_facultad', $estudiante->CARRERA);
            })
            ->whereHas('tiposEvaluacione.tpeConfiguracion.configuracionModalidades', function ($query) use ($estudiante) {
                $query->where('modalidad', $estudiante->MODALIDAD ? $estudiante->MODALIDAD : 0);
            })
            ->where('estado', 1)
            ->get();

        // dd($buscar_evaluaciones_activa);

        return $buscar_evaluaciones_activa;
    }
}
