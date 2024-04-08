<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipTiposPregunta extends Model
{
    use HasFactory;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    public $timestamps = true;

    protected $table = 'tip_tipos_preguntas';

    protected $fillable = ['nombre', 'entrada', 'comentario', 'estado'];
}
