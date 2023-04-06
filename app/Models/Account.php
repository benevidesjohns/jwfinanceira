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

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function accountType()
    {
        return $this->belongsTo(Accountype::class, 'fk_account_type');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'fk_customer');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'fk_transaction');
    }
}
