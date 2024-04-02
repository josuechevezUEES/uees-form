<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposEvaluacione extends Model
{
    use HasFactory;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    protected $table = 'tipos_evaluaciones';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado'
    ];

    public $timestamps = true;
}
