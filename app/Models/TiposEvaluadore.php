<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposEvaluadore extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'tipos_evaluadores';

    protected $fillable = ['nombre','descripcion','estado'];

}