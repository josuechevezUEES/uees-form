<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposEvaluado extends Model
{
	use HasFactory;

    protected $connection = 'sqlsrv';

    public $timestamps = true;

    protected $table = 'tipos_evaluados';

    protected $fillable = ['nombre','descripcion','estado'];

}
