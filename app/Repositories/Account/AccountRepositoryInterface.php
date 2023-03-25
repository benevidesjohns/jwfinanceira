<?php

namespace App\Repositories\Account;

use Illuminate\Database\Eloquent\Model;

interface AccountRepositoryInterface
{
    public function __construct(Model $account);
    public function store(array $data);
    public function getList();
    public function get($id);
    public function update(array $data, $id);
    public function destroy($id);
}
