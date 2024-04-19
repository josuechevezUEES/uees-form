<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $CLICUN
 * @property string $CLINAM
 * @property string $CLINOM
 * @property string $CLIAP1
 * @property string $CLIAP2
 * @property string $CLISHO
 * @property string $CLIESP
 * @property string $CLITIP
 * @property string $CLIIDE
 * @property string $CLIFNA
 * @property string $CLIPAI
 * @property string $CLICIV
 * @property string $CLISEX
 * @property string $CLIDIR
 * @property float $CLITE1
 * @property float $CLITE2
 * @property float $CLIFAX
 * @property string $CLIEM1
 * @property string $CLIAPT
 * @property string $CLIPRO
 * @property string $CLICAN
 * @property string $CLIDIS
 * @property string $CLIFUA
 * @property string $CLIFAP
 * @property string $CLISTS
 * @property string $CLISUC
 * @property string $CLIOFI
 * @property string $CLICTO
 * @property string $CLIPST
 * @property float $CLILCR
 * @property string $CLIPLZ
 * @property string $CLIOB1
 * @property string $CLIMOD
 * @property string $CLIBNK
 * @property string $CLITID
 * @property string $CLIPIN
 * @property float $CLITCE
 * @property string $CLIFIN
 * @property string $CLITUR
 * @property string $CLIEM2
 * @property string $CLILNC
 * @property string $CLICCY
 * @property string $CLICAR
 * @property integer $CLIIDU
 * @property string $CLIDI2
 * @property string $CLIBTB
 * @property float $CLICTB
 * @property string $CLIBAN
 * @property string $CLICCP
 * @property string $CLICAT
 * @property string $CLITCT
 * @property string $CLIFNT
 * @property string $CLIBTD
 * @property string $CLICUF
 * @property string $CLIRCT
 * @property string $CLIATE
 * @property string $CLITCB
 * @property string $CLICXP
 * @property string $CLITIC
 * @property string $CLIDUI
 */
class ClienteClass extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'CLIENTES';

    /**
     * @var array
     */
    protected $fillable = ['CLICUN', 'CLINAM', 'CLINOM', 'CLIAP1', 'CLIAP2', 'CLISHO', 'CLIESP', 'CLITIP', 'CLIIDE', 'CLIFNA', 'CLIPAI', 'CLICIV', 'CLISEX', 'CLIDIR', 'CLITE1', 'CLITE2', 'CLIFAX', 'CLIEM1', 'CLIAPT', 'CLIPRO', 'CLICAN', 'CLIDIS', 'CLIFUA', 'CLIFAP', 'CLISTS', 'CLISUC', 'CLIOFI', 'CLICTO', 'CLIPST', 'CLILCR', 'CLIPLZ', 'CLIOB1', 'CLIMOD', 'CLIBNK', 'CLITID', 'CLIPIN', 'CLITCE', 'CLIFIN', 'CLITUR', 'CLIEM2', 'CLILNC', 'CLICCY', 'CLICAR', 'CLIIDU', 'CLIDI2', 'CLIBTB', 'CLICTB', 'CLIBAN', 'CLICCP', 'CLICAT', 'CLITCT', 'CLIFNT', 'CLIBTD', 'CLICUF', 'CLIRCT', 'CLIATE', 'CLITCB', 'CLICXP', 'CLITIC', 'CLIDUI'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sqlsrv_class';

    public function busar_cif_estudiante(string $cif)
    {
        return $this->where('CLICUN', $cif)->get();
    }
}
