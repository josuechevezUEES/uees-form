<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaEvaluacionesRespuesta extends Model
{
    use HasFactory;

    /* The connection name for the model.
    *
    * @var string
    */
    protected $connection = 'sqlsrv';

    public $timestamps = true;

    protected $table = 'eva_evaluaciones_respuestas';

    protected $fillable = [
        'usuario_encuestado',
        'evaluacion_id',
        'seccion_id',
        'pregunta_id',
        'opcion_id',
        'comentario'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function evaEvaluacione()
    {
        return $this->hasOne('App\Models\EvaEvaluacione', 'id', 'evaluacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function insInstrumentosOpcione()
    {
        return $this->hasOne('App\Models\InsInstrumentosOpcione', 'id', 'opcion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function insInstrumentosPregunta()
    {
        return $this->hasOne('App\Models\InsInstrumentosPregunta', 'id', 'pregunta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function insInstrumentosSeccione()
    {
        return $this->hasOne('App\Models\InsInstrumentosSeccione', 'id', 'seccion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'usuario_encuestado');
    }
}
