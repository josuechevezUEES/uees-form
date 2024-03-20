<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $CURCOD
 * @property string $CURDSC
 * @property string $CURCAR
 * @property string $CURNIV
 * @property float $CURCRE
 * @property float $CURVAL
 * @property float $CURVEX
 * @property string $CURCCY
 * @property string $CURPER
 * @property string $CURFAP
 * @property string $CURSTS
 * @property float $CURCVN
 * @property float $CURCVE
 * @property float $CURSUN
 * @property float $CURSUE
 * @property string $CURMIE
 * @property string $CURVIS
 * @property string $CURALI
 * @property string $CURNTA
 * @property float $CUREXN
 * @property float $CUREXE
 * @property string $CURNTS
 * @property string $CURNTE
 * @property string $CURTAR
 * @property float $CURNL1
 * @property float $CURNL2
 * @property float $CURNL3
 * @property float $CURNS1
 * @property float $CURNS2
 * @property float $CURNS3
 * @property float $CURND1
 * @property float $CURND2
 * @property float $CURND3
 * @property float $CUREL1
 * @property float $CUREL2
 * @property float $CUREL3
 * @property float $CURES1
 * @property float $CURES2
 * @property float $CURES3
 * @property float $CURED1
 * @property float $CURED2
 * @property float $CURED3
 * @property string $CURBNK
 * @property string $CURPGD
 * @property string $CURPPF
 * @property float $CURTUN
 * @property float $CURTUE
 * @property float $CURCPM
 * @property string $CURIND
 * @property string $CURRUV
 * @property string $CURCCN
 * @property float $CURAUS
 * @property float $CURHRA
 * @property string $CURABD
 * @property string $CURREL
 */
class MateriaClass extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'CURSOS';

    /**
     * @var array
     */
    protected $fillable = ['CURCOD', 'CURDSC', 'CURCAR', 'CURNIV', 'CURCRE', 'CURVAL', 'CURVEX', 'CURCCY', 'CURPER', 'CURFAP', 'CURSTS', 'CURCVN', 'CURCVE', 'CURSUN', 'CURSUE', 'CURMIE', 'CURVIS', 'CURALI', 'CURNTA', 'CUREXN', 'CUREXE', 'CURNTS', 'CURNTE', 'CURTAR', 'CURNL1', 'CURNL2', 'CURNL3', 'CURNS1', 'CURNS2', 'CURNS3', 'CURND1', 'CURND2', 'CURND3', 'CUREL1', 'CUREL2', 'CUREL3', 'CURES1', 'CURES2', 'CURES3', 'CURED1', 'CURED2', 'CURED3', 'CURBNK', 'CURPGD', 'CURPPF', 'CURTUN', 'CURTUE', 'CURCPM', 'CURIND', 'CURRUV', 'CURCCN', 'CURAUS', 'CURHRA', 'CURABD', 'CURREL'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sqlsrv_class';
}
