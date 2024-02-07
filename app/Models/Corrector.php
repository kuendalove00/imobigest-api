<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Corrector extends Model
{
    use HasFactory;

    protected $table = 'correctores';

    protected $fillable = [
        'nome',
        'sobrenome',
        'bi',
        'data_nascimento',
        'genero',
        'telefone',
        'id_usuario'
    ];
    

    public function vendas(): HasMany
    {
        return $this->hasMany(Venda::class, 'id_corrector');
    }

    public function manutencoes(): HasMany
    {
        return $this->hasMany(Manutencao::class, 'id_corrector');
    }

    public function usuario(): BelongsTo 
    {
        return $this->belongsTo(Usuario::class,'id_usuario');
    }

    public function imoveis(): HasMany
    {
        return $this->hasMany(Imovel::class, 'id_imovel');
    }

    const CREATED_AT = 'criado_aos';
    const UPDATED_AT = 'atualizado_aos';
}
