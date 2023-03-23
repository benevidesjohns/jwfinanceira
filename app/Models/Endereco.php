<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Cliente;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'cidade',
        'estado',
        'cep',
        'rua',
        'bairro',
        'numero'
    ];

    public function enderecos()
    {
        return $this->belongsToMany(Cliente::class);
    }
}
