<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsInstrumentosSeccione extends Model
{
    use HasFactory;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    public $timestamps = true;

    protected $table = 'ins_instrumentos_secciones';

    protected $fillable = ['instrumento_id', 'nombre', 'literal', 'fondo_img', 'estado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function insInstrumentosEvaluacione()
    {
        return $this->hasOne('App\Models\InsInstrumentosEvaluacione', 'id', 'instrumento_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function instrumentoCuestionario()
    {
        return $this->hasOne('App\Models\InstrumentoCuestionario', 'seccion_id', 'id');
    }

    public function verificar_seccion_completada_por_usuario($userId, $seccion_id)
    {
        $hasResponses = EvaEvaluacionesRespuesta::where('usuario_encuestado', $userId)
            ->where('seccion_id', $seccion_id)
            ->exists();

        return $hasResponses;
    }
}
