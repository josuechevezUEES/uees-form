<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $PLECUN
 * @property string $PLECAR
 * @property string $PLENIV
 * @property string $PLETAB
 * @property string $PLEFAP
 * @property string $PLESUC
 * @property string $PLEUSR
 * @property string $PLEFAT
 * @property string $PLESTS
 * @property string $PLEOB1
 * @property string $PLEOB2
 * @property string $PLEOB3
 * @property string $PLEBNK
 * @property string $PLEANT
 * @property string $PLETUR
 * @property string $PLETOM
 * @property string $PLEFOL
 * @property string $PLEASI
 * @property string $PLEFGR
 * @property string $PLEHOR
 * @property integer $PLEIDU
 * @property string $PLEMOF
 * @property float $PLECUM
 */
class PleStudioClass extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'PLESTUDIO';

    /**
     * @var array
     */
    protected $fillable = ['PLECUN', 'PLECAR', 'PLENIV', 'PLETAB', 'PLEFAP', 'PLESUC', 'PLEUSR', 'PLEFAT', 'PLESTS', 'PLEOB1', 'PLEOB2', 'PLEOB3', 'PLEBNK', 'PLEANT', 'PLETUR', 'PLETOM', 'PLEFOL', 'PLEASI', 'PLEFGR', 'PLEHOR', 'PLEIDU', 'PLEMOF', 'PLECUM'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sqlsrv_class';
}
