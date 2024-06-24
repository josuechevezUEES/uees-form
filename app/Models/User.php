<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'departamento',
        'departamento_nombre',
        'facultad_id',
        'facultad_nombre',
        'carrera_id',
        'carrera_nombre',
        'usuario_class',
        'cif',
        'dui',
        'estado',
        'modalidad',
        'created_at', // Asegúrate de incluir estos campos
        'updated_at', // Asegúrate de incluir estos campos
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // public $timestamps = true;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function cuestionarion_respuestas()
    {
        return $this->hasMany(EvaEvaluacionesRespuesta::class, 'usuario_id', 'id');
    }

    public function nombre_estudiante($cif)
    {
        return ClienteClass::find($cif);
    }
}
