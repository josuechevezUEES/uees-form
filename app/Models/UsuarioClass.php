<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property string $USRUID
 * @property string $USRINI
 * @property string $USRDSC
 * @property string $USRPWD
 * @property string $USRPAS
 * @property float $USROMI
 * @property string $USRDBN
 * @property string $USRDBE
 * @property string $USRASI
 * @property string $USRCTA
 * @property string $USRRES
 * @property string $USRCIF
 * @property string $USREST
 * @property string $USRDPT
 * @property string $USRSUC
 * @property string $USROFI
 * @property string $USRSTS
 * @property string $USRACT
 * @property string $USRFVT
 * @property string $USRFIR
 * @property string $USREML
 * @property string $USRFUA
 * @property string $USRCAD
 */
class UsuarioClass extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'USUARIOS';

    /**
     * @var array
     */
    protected $fillable = ['USRUID', 'USRINI', 'USRDSC', 'USRPWD', 'USRPAS', 'USROMI', 'USRDBN', 'USRDBE', 'USRASI', 'USRCTA', 'USRRES', 'USRCIF', 'USREST', 'USRDPT', 'USRSUC', 'USROFI', 'USRSTS', 'USRACT', 'USRFVT', 'USRFIR', 'USREML', 'USRFUA', 'USRCAD'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv_class';


    /**
     * Ejecutar el procedimiento almacenado SRH_CONSULTA_EMPLEADO_JEFE
     *
     * @param int $parametro1
     * @param string $parametro2
     * @return mixed
     */
    public static function ejecutarSP($parametro1)
    {
        $result = DB::connection('sqlsrv_suees')
            ->select('EXEC SRH_CONSULTA_EMPLEADO_JEFE ?', array($parametro1));

        return $result;
    }
}
