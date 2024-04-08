<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsInstrumentosPregunta extends Model
{
    use HasFactory;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    public $timestamps = true;

    protected $table = 'ins_instrumentos_preguntas';

    protected $fillable = ['cuestionario_id', 'nombre', 'tipo_pregunta_id', 'sub_numeral', 'requerido'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function insInstrumentosCuestionario()
    {
        return $this->hasOne('App\Models\InsInstrumentosCuestionario', 'id', 'cuestionario_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipTiposPregunta()
    {
        return $this->hasOne('App\Models\TipTiposPregunta', 'id', 'tipo_pregunta_id');
    }
}
