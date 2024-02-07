<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'password',
        'papel'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];


    public function notificacoes() : HasMany
    {
        return $this->hasMany(Notificacao::class,'id_usuario');
    }

    public function corrector() : HasOne
    {
        return $this->hasOne(Corrector::class,'id_usuario');
    }

    public function mecanico() : HasOne
    {
        return $this->hasOne(Mecanico::class,'id_usuario');
    }

    

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    const CREATED_AT = 'criado_aos';
    const UPDATED_AT = 'atualizado_aos';
}
