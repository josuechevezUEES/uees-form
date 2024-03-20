<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $NIVCOD
 * @property string $NIVDSC
 * @property string $NIVFAC
 * @property string $NIVDIR
 * @property string $NIVCAR
 * @property float $NIVCRE
 * @property float $NIVMAT
 * @property float $NIVMTE
 * @property string $NIVFAP
 * @property string $NIVCCY
 * @property string $NIVSTS
 * @property string $NIVNTA
 * @property float $NIVINS
 * @property string $NIVGLN
 * @property string $NIVTAB
 * @property string $NIVGRA
 * @property string $NIVCXC
 * @property string $NIVMTR
 * @property float $NIVCNE
 * @property string $NIVCTC
 * @property string $NIVBNK
 * @property string $NIVLET
 * @property string $NIVBEC
 * @property string $NIVDES
 * @property float $NIVNTB
 * @property float $NIVPEN
 * @property string $NIVMOD
 * @property string $NIVCPE
 * @property string $NIVCXP
 * @property string $NIVCCN
 * @property string $NIVCDM
 * @property string $NIVCDC
 * @property string $NIVDSM
 * @property string $NIVDSA
 * @property string $nivpcr
 * @property string $NIVCLA
 * @property float $NIVITU
 * @property string $NIVTRA
 * @property string $NIVCTU
 * @property string $NIVCSU
 * @property string $NIVCCV
 * @property string $NIVTCM
 * @property string $NIVDDC
 * @property string $NIVDCC
 * @property string $NIVCDI
 * @property string $NIVABE
 * @property string $NIVAPE
 * @property string $NIVCCP
 * @property string $NIVDOC
 * @property integer $NIVUNI
 * @property float $NIVRCX
 * @property string $NIVBEA
 * @property string $NIVBEM
 * @property string $NIVBEF
 * @property string $NIVIMP
 * @property integer $NIVMRA
 * @property float $NIVMFN
 */
class CarreraClass extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'NIVELES';

    /**
     * @var array
     */
    protected $fillable = ['NIVCOD', 'NIVDSC', 'NIVFAC', 'NIVDIR', 'NIVCAR', 'NIVCRE', 'NIVMAT', 'NIVMTE', 'NIVFAP', 'NIVCCY', 'NIVSTS', 'NIVNTA', 'NIVINS', 'NIVGLN', 'NIVTAB', 'NIVGRA', 'NIVCXC', 'NIVMTR', 'NIVCNE', 'NIVCTC', 'NIVBNK', 'NIVLET', 'NIVBEC', 'NIVDES', 'NIVNTB', 'NIVPEN', 'NIVMOD', 'NIVCPE', 'NIVCXP', 'NIVCCN', 'NIVCDM', 'NIVCDC', 'NIVDSM', 'NIVDSA', 'nivpcr', 'NIVCLA', 'NIVITU', 'NIVTRA', 'NIVCTU', 'NIVCSU', 'NIVCCV', 'NIVTCM', 'NIVDDC', 'NIVDCC', 'NIVCDI', 'NIVABE', 'NIVAPE', 'NIVCCP', 'NIVDOC', 'NIVUNI', 'NIVRCX', 'NIVBEA', 'NIVBEM', 'NIVBEF', 'NIVIMP', 'NIVMRA', 'NIVMFN'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sqlsrv_class';
}
