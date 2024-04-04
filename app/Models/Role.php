<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    public $timestamps = true;

    protected $table = 'roles';

    protected $fillable = ['name', 'guard_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function modelHasRole()
    {
        return $this->hasOne('App\Models\ModelHasRole', 'role_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roleHasPermissions()
    {
        return $this->hasMany('App\Models\RoleHasPermission', 'role_id', 'id');
    }
}
