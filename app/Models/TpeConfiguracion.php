<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $tipo_evaluacion_id
 * @property string $created_at
 * @property string $updated_at
 * @property TiposEvaluacione $tiposEvaluacione
 */
class TpeConfiguracion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tpe_configuracion';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['tipo_evaluacion_id'];

    public $timestamps = true;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposEvaluacione()
    {
        return $this->belongsTo('App\Models\TiposEvaluacione', 'tipo_evaluacion_id');
    }

    public function configuracionEntidades()
    {
        return $this->hasOne(TpeConfiguracionEntidad::class, 'tpe_configuracion_id', 'id');
    }

    public function configuracionFacultades()
    {
        return $this->hasMany(TpeConfiguracionesFacultade::class, 'tpe_configuracion_id', 'id');
    }

    public function configuracionModalidades()
    {
        return $this->hasMany(TpeConfiguracionModalidad::class, 'tpe_configuracion_id', 'id');
    }
}
