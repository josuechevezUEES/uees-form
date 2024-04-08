<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsInstrumentosOpcione extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'insInstrumentosOpciones';

    protected $fillable = ['pregunta_id','nombre','entrada'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function insInstrumentosPregunta()
    {
        return $this->hasOne('App\Models\InsInstrumentosPregunta', 'id', 'pregunta_id');
    }
    
}
