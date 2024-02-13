<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'sobrenome',
        'data_nascimento',
        'genero',
        'telefone',
        'id_usuario'
    ];

    public function vendas() : HasMany
    {
        return $this->hasMany(Venda::class,'id_cliente');
    }

    public function imovelInteressado () : BelongsToMany {
        return $this->belongsToMany(
            Imovel::class,
            'cliente_id',
            'imovel_id'
        );
    }

    const CREATED_AT = 'criado_aos';
    const UPDATED_AT = 'atualizado_aos';
}
