<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class Historico extends Model
{
    use HasFactory;

    protected $table = 'historico';

    protected $fillable = [
        'id_manutencao',
        'data',
    ];

    public function Manutencao(): HasMany
    {
        return $this->hasMany(Manutencao::class, 'id_manutencao');
    }

    const CREATED_AT = 'criado_aos';
    const UPDATED_AT = 'atualizado_aos';
}
