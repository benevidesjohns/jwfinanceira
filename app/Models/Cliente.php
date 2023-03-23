<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'detalhes',
        'fk_endereco'
    ];

    public function cliente()
    {
        return $this->hasOne(Endereco::class, 'fk_endereco');
    }
}
