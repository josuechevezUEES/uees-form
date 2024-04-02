<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsInstrumentosEvaluacione extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'insInstrumentosEvaluaciones';

    protected $fillable = ['nombre','descripcion','estado'];
	
}
