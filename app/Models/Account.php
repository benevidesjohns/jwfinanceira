<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'balance',
        'fk_user',
        'fk_account_type'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function accountType()
    {
        return $this->belongsTo(AccountType::class, 'fk_account_type');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'fk_account');
    }
}
