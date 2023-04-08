<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'cpf',
        'fk_address'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'fk_address');
    }
}
