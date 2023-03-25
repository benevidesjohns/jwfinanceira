<?php

namespace App\Repositories\Customer;

use Illuminate\Database\Eloquent\Model;

interface AddressRepositoryInterface
{
    public function __construct(Model $address);
    public function store(array $data);
    public function getList();
    public function get($id);
    public function update(array $data, $id);
    public function destroy($id);
}
