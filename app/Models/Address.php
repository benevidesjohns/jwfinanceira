<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'city',
        'state',
        'cep',
        'address'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class, 'fk_address');
    }
}
