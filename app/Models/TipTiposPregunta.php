<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipTiposPregunta extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tipTiposPreguntas';

    protected $fillable = ['nombre','entrada','comentario','estado'];
	
}
