<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTransacao extends Model
{
    use HasFactory;

    protected $fillable = ['tipo'];

    public function transacoes(){
        return $this->belongsToMany(Transacao::class);
    }
}
