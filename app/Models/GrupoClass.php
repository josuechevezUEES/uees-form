<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $GRPBNK
 * @property string $GRPCCY
 * @property string $GRPREG
 * @property string $GRPPLA
 * @property string $GRPCOD
 * @property string $GRPCUR
 * @property string $GRPDIA
 * @property string $GRPINI
 * @property string $GRPFIN
 * @property string $GRPDSC
 * @property string $GRPCUN
 * @property string $GRPRES
 * @property float $GRPAMT
 * @property float $GRPDCT
 * @property string $GRPSTS
 * @property string $GRPFMT
 * @property string $GRPOFI
 * @property string $GRPPER
 * @property string $GRPANO
 * @property string $GRPCAJ
 * @property float $GRPREF
 * @property string $GRPNTA
 * @property string $GRPSTN
 * @property string $GRPURA
 * @property string $GRPOB1
 * @property string $GRPOB2
 * @property string $GRPOB3
 * @property string $GRPOB4
 * @property string $GRPNIV
 * @property float $GRPACC
 * @property string $GRPSUC
 * @property string $GRPKEY
 * @property string $GRPTCV
 * @property string $GRPREL
 * @property string $GRPTIN
 * @property string $GRPTFI
 * @property string $GRPDAY
 * @property string $GRPSEN
 * @property string $GRPMEH
 * @property string $GRPBEC
 * @property string $GRPNTE
 * @property string $GRPNTL
 * @property string $GRPTBE
 * @property float $GRPAMB
 * @property float $GRPAMD
 * @property string $GRPMTP
 * @property float $GRPBON
 * @property string $GRPSPE
 * @property string $GRPMOD
 * @property float $GRPSEC
 * @property string $GRPOPT
 * @property integer $GRPUNH
 */
class GrupoClass extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'GRUPOS';

    /**
     * @var array
     */
    protected $fillable = ['GRPBNK', 'GRPCCY', 'GRPREG', 'GRPPLA', 'GRPCOD', 'GRPCUR', 'GRPDIA', 'GRPINI', 'GRPFIN', 'GRPDSC', 'GRPCUN', 'GRPRES', 'GRPAMT', 'GRPDCT', 'GRPSTS', 'GRPFMT', 'GRPOFI', 'GRPPER', 'GRPANO', 'GRPCAJ', 'GRPREF', 'GRPNTA', 'GRPSTN', 'GRPURA', 'GRPOB1', 'GRPOB2', 'GRPOB3', 'GRPOB4', 'GRPNIV', 'GRPACC', 'GRPSUC', 'GRPKEY', 'GRPTCV', 'GRPREL', 'GRPTIN', 'GRPTFI', 'GRPDAY', 'GRPSEN', 'GRPMEH', 'GRPBEC', 'GRPNTE', 'GRPNTL', 'GRPTBE', 'GRPAMB', 'GRPAMD', 'GRPMTP', 'GRPBON', 'GRPSPE', 'GRPMOD', 'GRPSEC', 'GRPOPT', 'GRPUNH'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sqlsrv_class';
}
