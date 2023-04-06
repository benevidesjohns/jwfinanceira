<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function accounts(){
        return $this->hasMany(Account::class, 'fk_account_type');
    }

}
