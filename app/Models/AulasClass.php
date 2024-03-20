<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $AULCOD
 * @property string $AULDSC
 * @property string $AULFAC
 * @property string $AULSTS
 * @property float $AULCUP
 * @property string $AULSUC
 * @property string $AULBNK
 * @property string $AULOB1
 * @property string $AULUBC
 */
class AulasClass extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'AULAS';

    /**
     * @var array
     */
    protected $fillable = ['AULCOD', 'AULDSC', 'AULFAC', 'AULSTS', 'AULCUP', 'AULSUC', 'AULBNK', 'AULOB1', 'AULUBC'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sqlsrv_class';
}
