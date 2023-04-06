<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'amount', 'message', 'fk_account', 'fk_transaction_type'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function account(){
        return $this->belongsTo(Account::class, 'fk_account');
    }

    public function transactionType(){
        return $this->belongsTo(TransactionType::class, 'fk_transaction_type');
    }
}
