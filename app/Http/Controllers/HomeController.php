<?php

namespace App\Http\Controllers;

use App\Models\EvaEvaluacione;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'evaluaciones' => $this->buscar_evaluaciones_activas_estudiante(),
        ]);
    }

    protected function buscar_evaluaciones_activas_estudiante()
    {
        $buscar_evaluaciones_activa = EvaEvaluacione::where('estado', 1)
            ->get();

        // dd($buscar_evaluaciones_activa);

        return $buscar_evaluaciones_activa;
    }
}
