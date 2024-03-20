<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $CMTPER
 * @property string $CMTANO
 * @property string $CMTTPE
 * @property string $CMTSTS
 * @property string $CMTREG
 * @property string $CMTFAP
 * @property string $CMTFIP
 * @property string $CMTFFP
 * @property string $CMTBNK
 * @property string $CMTFIC
 * @property string $CMTFFC
 * @property string $CMTFIR
 * @property string $CMTFFR
 * @property float $CMTRCX
 * @property string $CMTFCI
 * @property string $CMTFCF
 * @property string $CMTPIS
 * @property string $CMTAIS
 * @property string $CMTFIE
 * @property string $CMTFFE
 * @property integer $CMTUNI
 */
class ControlMatricula extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'CONTROLMATRI';

    /**
     * @var array
     */
    protected $fillable = ['CMTPER', 'CMTANO', 'CMTTPE', 'CMTSTS', 'CMTREG', 'CMTFAP', 'CMTFIP', 'CMTFFP', 'CMTBNK', 'CMTFIC', 'CMTFFC', 'CMTFIR', 'CMTFFR', 'CMTRCX', 'CMTFCI', 'CMTFCF', 'CMTPIS', 'CMTAIS', 'CMTFIE', 'CMTFFE', 'CMTUNI'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sqlsrv_class';
}
