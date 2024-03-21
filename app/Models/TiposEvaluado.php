<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposEvaluado extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tiposEvaluados';

    protected $fillable = ['nombre','descripcion','estado'];
	
}
