<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interesse extends Model
{
    use HasFactory;

    protected $table = 'interesses';

    protected $fillable = [
        'id_cliente',
        'id_imovel',
        'data'
    ];
    
    const CREATED_AT = 'criado_aos';
    const UPDATED_AT = 'atualizado_aos';
}
