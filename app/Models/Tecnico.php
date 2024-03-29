<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tecnico extends Model
{
    use HasFactory;

    protected $table = 'tecnicos';

    protected $fillable = [
        'nome',
        'sobrenome',
        'bi',
        'data_nascimento',
        'genero',
        'id_usuario'
    ];

    public function manutencoes(): HasMany
    {
        return $this->hasMany(Manutencao::class, 'id_tecnico');
    }
    
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class,'id_usuario');
    }

    const CREATED_AT = 'criado_aos';
    const UPDATED_AT = 'atualizado_aos';
}
