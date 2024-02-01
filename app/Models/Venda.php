<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class Venda extends Model
{
    use HasFactory;

    protected $table = 'vendas';

    protected $fillable = [
        'id_cliente',
        'id_corrector',
        'pagamento',
        'metodo',
        'comprovativo'
    ];

    public function cliente(): BelongsTo 
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function corrector(): BelongsTo 
    {
        return $this->belongsTo(Corrector::class, 'id_corrector');
    }
    
    const CREATED_AT = 'criado_aos';
    const UPDATED_AT = 'atualizado_aos';
}
