<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaEvaluacione extends Model
{
    use HasFactory;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    public $timestamps = true;

    protected $table = 'eva_evaluaciones';

    protected $fillable = [
        'tipo_evaluacion_id',
        'instrumento_id',
        'fecha_inicio_evaluacion',
        'fecha_fin_evaluacion',
        'estado'
    ];

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
    public function tiposEvaluacione()
    {
        return $this->hasOne('App\Models\TiposEvaluacione', 'id', 'tipo_evaluacion_id');
    }
}
