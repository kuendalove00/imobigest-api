<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

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
        'id_corrector',
        'slug'
    ];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::saving(function ($imovel) {
            $imovel->slug = $this->id."-".Str::slug($this->slug);
        });
    }

    protected $appends = ['descEstado', 'descTransacao', 'descTipo'];

    public function getDescEstadoAttribute () {
        $estados_imoveis = array(
            'D' => 'Disponível',
            'A' => 'Alugado',
            'V' => 'Vendido',
            'N' => 'Em Negociações'
        );
        return $estados_imoveis[$this->estado];
    }

    public function getDescTransacaoAttribute() {
       $trans = [
           "A" => "Arrendar",
           "V" => "Vender"
       ];
       return $trans[$this->transacao];
    }

    public function getDescTipoAttribute() {
        $tipo = [
            "R" => "Resisdencial",
            "C" => "Comercial"
        ];

        return $tipo[$this->tipo];
    }
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
