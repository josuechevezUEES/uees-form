<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsInstrumentosOpcione extends Model
{
    use HasFactory;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    public $timestamps = true;

    protected $table = 'ins_instrumentos_opciones';

    protected $fillable = ['pregunta_id', 'nombre', 'entrada'];

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
    public function preguntaComentario()
    {
        return $this->hasOne('App\Models\InsInstrumentosComentario', 'id', 'pregunta_id');
    }
}
