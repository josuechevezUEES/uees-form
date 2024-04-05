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
}
