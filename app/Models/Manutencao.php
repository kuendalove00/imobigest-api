<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manutencao extends Model
{
    use HasFactory;

    protected $table = 'manutencoes';

    protected $fillable = [
        'id_corrector',
        'id_mecanico',
        'descricao',
        'estado',
        'data_abertura',
        'data_conclusao'
    ];

    public function historico(): BelongsTo
    {
        return $this->belongsTo(Historico::class,'id_manutencao');
    }

    public function corrector(): BelongsTo
    {
        return $this->belongsTo(Corrector::class,'id_corrector');
    }
    
    public function mecanico(): BelongsTo
    {
        return $this->belongsTo(Mecanico::class,'id_mecanico');
    }

    
    const CREATED_AT = 'criado_aos';
    const UPDATED_AT = 'atualizado_aos';
}
