<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Imovel extends Model
{
    use HasFactory;

    protected $table = 'imoveis';

    protected $fillable = [
        'nome',
        'tipo',
        'transacao',
        'endereco',
        'numero_quartos',
        'estado',
        'preco',
        'id_corrector'
    ];
    
    public function corrector(): BelongsTo 
    {
        return $this->belongsTo(Corrector::class, 'id_corrector');
    }

    public function notificacoes(): HasMany
    {
        return $this->hasMany(Notificacao::class, 'id_imovel');
    }

    const CREATED_AT = 'criado_aos';
    const UPDATED_AT = 'atualizado_aos';
}
