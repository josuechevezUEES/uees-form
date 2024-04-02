<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $tpe_configuracion_id
 * @property string $modalidad
 * @property string $created_at
 * @property string $updated_at
 * @property TpeConfiguracion $tpeConfiguracion
 */
class TpeConfiguracionModalidad extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tpe_configuraciones_modalidades';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['tpe_configuracion_id', 'modalidad'];

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
    public function tpeConfiguracion()
    {
        return $this->belongsTo('App\Models\TpeConfiguracion');
    }
}
