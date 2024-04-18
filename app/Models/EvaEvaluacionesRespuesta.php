<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaEvaluacionesRespuesta extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';

    public $timestamps = true;

    protected $table = 'eva_evaluaciones_respuestas';

    protected $fillable = ['evaluacion_id', 'seccion_id', 'pregunta_id', 'respuesta', 'cif'];

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
}
