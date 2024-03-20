<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposEvaluacione extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tiposEvaluaciones';

    protected $fillable = ['nombre','descripcion','estado'];
	
}
