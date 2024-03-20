<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $PLACOD
 * @property string $PLADSC
 * @property string $PLACAR
 * @property string $PLANIV
 * @property string $PLACUR
 * @property string $PLAFAP
 * @property string $PLAREG
 * @property float $PLAPER
 * @property float $PLASEC
 * @property string $PLAREL
 * @property string $PLABNK
 * @property string $PLAANO
 * @property string $PLAOPT
 * @property string $PLAOGP
 * @property string $PLAENC
 * @property string $PLAOBL
 * @property string $PLAEXA
 * @property float $PLATEC
 * @property string $PLADST
 * @property string $PLAINF
 * @property string $PLAREQ
 * @property string $PLASTS
 * @property string $PLAMPL
 * @property string $PLACME
 * @property float $PLACRO
 * @property float $PLACOT
 * @property float $PLAAMT
 * @property string $PLAACB
 * @property string $PLAANP
 * @property string $PLAAOF
 * @property string $PLAAOP
 * @property integer $PLARCA
 * @property boolean $PLAAAC
 */
class PlanClasS extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'PLANES';

    /**
     * @var array
     */
    protected $fillable = ['PLACOD', 'PLADSC', 'PLACAR', 'PLANIV', 'PLACUR', 'PLAFAP', 'PLAREG', 'PLAPER', 'PLASEC', 'PLAREL', 'PLABNK', 'PLAANO', 'PLAOPT', 'PLAOGP', 'PLAENC', 'PLAOBL', 'PLAEXA', 'PLATEC', 'PLADST', 'PLAINF', 'PLAREQ', 'PLASTS', 'PLAMPL', 'PLACME', 'PLACRO', 'PLACOT', 'PLAAMT', 'PLAACB', 'PLAANP', 'PLAAOF', 'PLAAOP', 'PLARCA', 'PLAAAC'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sqlsrv_class';
}
