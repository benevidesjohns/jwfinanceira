<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $fillable = [
        'balanco', 'fk_cliente', 'fk_tipo_conta'
    ];

    public function tipoConta()
    {
        return $this->hasOne(TipoConta::class, 'fk_tipo_conta');
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'fk_cliente');
    }

    public function transacoes()
    {
        return $this->belongsToMany(Transacao::class);
    }
}
