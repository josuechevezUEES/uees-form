<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $seccion_id
 * @property string $created_at
 * @property string $updated_at
 * @property InsInstrumentosSeccione $insInstrumentosSeccione
 */
class InstrumentoCuestionario extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ins_instrumentos_cuestionarios';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['seccion_id'];

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
    public function insInstrumentosSeccione()
    {
        return $this->belongsTo('App\Models\InsInstrumentosSeccione', 'seccion_id');
    }

    public function instrumentoPreguntas()
    {
        return $this->hasMany(InsInstrumentosPregunta::class, 'cuestionario_id', 'id');
    }
}
