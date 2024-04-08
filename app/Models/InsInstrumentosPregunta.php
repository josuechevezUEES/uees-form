<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsInstrumentosPregunta extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'insInstrumentosPreguntas';

    protected $fillable = ['cuestionario_id','tipo_pregunta_id','sub_numeral','requerido'];
	
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
