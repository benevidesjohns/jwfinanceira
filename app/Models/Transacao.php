<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'data', 'valor', 'detalhes', 'fk_conta', 'fk_tipo_transacao'
    ];

    public function conta(){
        return $this->hasOne(Conta::class, 'fk_conta');
    }

    public function tipoTransacao(){
        return $this->hasOne(TipoTransacao::class, 'fk_tipo_transacao');
    }
}
