<?php

namespace App\Repositories\Customer;

use \Illuminate\Database\Eloquent\Model;

class CustomerRepositoryEloquent implements CustomerRepositoryInterface
{
    protected $customer;

    /**
     * @param  $customer
     * @return mixed
     */
    public function __construct(Model $customer)
    {
        $this->customer = $customer;
    }

    /**
     *
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->customer->create($data);
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->customer->all();
    }

    /**
     *
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->customer->find($id);
    }

    /**
     *
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->customer->find($id)->update($data);
    }

    /**
     *
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->customer->find($id)->delete();
    }
}
