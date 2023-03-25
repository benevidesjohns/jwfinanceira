<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'balance', 'fk_customer', 'fk_account_type'
    ];

    public function accountType()
    {
        return $this->hasOne(Accountype::class, 'fk_account_type');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'fk_customer');
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class);
    }
}
