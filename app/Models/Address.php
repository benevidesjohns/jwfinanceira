<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'state',
        'cep',
        'address'
    ];

    public function addresses()
    {
        return $this->belongsToMany(Customer::class);
    }
}
