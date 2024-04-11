<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsInstrumentosEvaluacione extends Model
{
    use HasFactory;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    public $timestamps = true;

    protected $table = 'ins_instrumentos_evaluaciones';

    protected $fillable = ['nombre', 'descripcion', 'estado'];

    public function secciones()
    {
        return $this->hasMany(InsInstrumentosSeccione::class, 'instrumento_id', 'id');
    }
}
