<?php

namespace App\Repositories\Transaction;

use Illuminate\Database\Eloquent\Model;

interface TransactionTypeRepositoryInterface
{
    public function __construct(Model $transactionType);
    public function store(array $data);
    public function getList();
    public function get($id);
    public function update(array $data, $id);
    public function destroy($id);
}
