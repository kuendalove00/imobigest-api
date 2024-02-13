<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteImovel extends Model
{
    use HasFactory;
    protected $fillable = ["cliente_id", "imovel_id"];
}
