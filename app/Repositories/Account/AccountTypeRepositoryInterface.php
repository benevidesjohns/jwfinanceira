<?php

namespace App\Repositories\Account;

use Illuminate\Database\Eloquent\Model;

interface AccountTypeRepositoryInterface
{
    public function __construct(Model $accountType);
    public function store(array $data);
    public function getList();
    public function get($id);
    public function update(array $data, $id);
    public function destroy($id);
}
