<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Notificacao extends Model
{
    use HasFactory;

    protected $table = 'notificacoes';

    protected $fillable = [
        'id_usuario',
        'id_imovel',
        'mensagem',
        'data'
    ];

    public function usuario(): BelongsTo 
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function imovel(): BelongsTo
    {
        return $this->belongsTo(Imovel::class, 'id_imovel');
    }
    
    const CREATED_AT = 'criado_aos';
    const UPDATED_AT = 'atualizado_aos';
}
