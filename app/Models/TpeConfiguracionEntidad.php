<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $tpe_configuracion_id
 * @property integer $evaluador_id
 * @property integer $evaluados_id
 * @property string $created_at
 * @property string $updated_at
 * @property TiposEvaluadore $tiposEvaluadore
 * @property TiposEvaluado $tiposEvaluado
 * @property TpeConfiguracion $tpeConfiguracion
 */
class TpeConfiguracionEntidad extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tpe_configuraciones_entidades';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['tpe_configuracion_id', 'evaluador_id', 'evaluados_id'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposEvaluadore()
    {
        return $this->belongsTo('App\Models\TiposEvaluadore', 'evaluador_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposEvaluado()
    {
        return $this->belongsTo('App\Models\TiposEvaluado', 'evaluados_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tpeConfiguracion()
    {
        return $this->belongsTo('App\Models\TpeConfiguracion');
    }
}
