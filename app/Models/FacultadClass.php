<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $CARCOD
 * @property string $CARDSC
 * @property string $CARFAC
 * @property string $CARDIR
 * @property string $CARFAP
 * @property string $CARSTS
 * @property string $CARBNK
 */
class FacultadClass extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'CARRERA';

    /**
     * Primary from model
     *
     * @var string
     */
    public $primaryKey = 'CARCOD';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var array
     */
    protected $fillable = ['CARCOD', 'CARDSC', 'CARFAC', 'CARDIR', 'CARFAP', 'CARSTS', 'CARBNK'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv_class';
}
