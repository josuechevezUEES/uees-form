<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpeConfiguracionesFacultade extends Model
{
    use HasFactory;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    public $timestamps = true;

    protected $table = 'tpe_configuraciones_facultades';

    protected $fillable = ['tpe_configuracion_id', 'codigo_facultad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tpeConfiguracion()
    {
        return $this->hasOne('App\Models\TpeConfiguracion', 'id', 'tpe_configuracion_id');
    }
}
