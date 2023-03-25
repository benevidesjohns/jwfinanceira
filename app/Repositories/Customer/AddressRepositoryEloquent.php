<?php

namespace App\Repositories\Customer;

use \Illuminate\Database\Eloquent\Model;

class AddressRepositoryEloquent implements AddressRepositoryInterface
{
    protected $address;

    /**
     * @param  $address
     * @return mixed
     */
    public function __construct(Model $address)
    {
        $this->address = $address;
    }

    /**
     *
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->address->create($data);
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->address->all();
    }

    /**
     *
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->address->find($id);
    }

    /**
     *
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->address->find($id)->update($data);
    }

    /**
     *
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->address->find($id)->delete();
    }
}
