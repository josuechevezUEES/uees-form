<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $HRABNK
 * @property string $HRASUC
 * @property string $HRAPER
 * @property string $HRAANO
 * @property string $HRAREG
 * @property string $HRAAUL
 * @property string $HRAFAC
 * @property string $HRADIA
 * @property string $HRAINI
 * @property string $HRAFIN
 * @property string $HRARES
 * @property string $HRAMOT
 * @property float $HRASEC
 * @property string $HRATPE
 * @property string $HRAREL
 * @property string $HRAFDD
 * @property string $HRAFHH
 * @property string $HRATHR
 * @property string $HRASTS
 * @property string $HRAKEY
 * @property string $HRANIV
 * @property string $HRACUP
 * @property string $HRALAB
 * @property string $HRAMAX
 * @property string $HRASPE
 * @property string $HRAWEB
 * @property string $HRAFRQ
 * @property string $HRATIP
 * @property string $HRAVIR
 * @property string $HRAMOD
 * @property integer $HRAUNI
 * @property float $HRAHPR
 * @property integer $HRAUNR
 * @property float $HRAROT
 * @property string $HRATPO
 * @property string $HRAGAR
 */
class HrAulaClass extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'HRAULA';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'HRAUNI';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['HRABNK', 'HRASUC', 'HRAPER', 'HRAANO', 'HRAREG', 'HRAAUL', 'HRAFAC', 'HRADIA', 'HRAINI', 'HRAFIN', 'HRARES', 'HRAMOT', 'HRASEC', 'HRATPE', 'HRAREL', 'HRAFDD', 'HRAFHH', 'HRATHR', 'HRASTS', 'HRAKEY', 'HRANIV', 'HRACUP', 'HRALAB', 'HRAMAX', 'HRASPE', 'HRAWEB', 'HRAFRQ', 'HRATIP', 'HRAVIR', 'HRAMOD', 'HRAHPR', 'HRAUNR', 'HRAROT', 'HRATPO', 'HRAGAR'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sqlsrv_class';
}
