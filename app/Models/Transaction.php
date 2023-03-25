<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'amount', 'fk_account', 'fk_transaction_type'
    ];

    public function account(){
        return $this->hasOne(Conta::class, 'fk_account');
    }

    public function transactionType(){
        return $this->hasOne(TransactionType::class, 'fk_transaction_type');
    }
}
