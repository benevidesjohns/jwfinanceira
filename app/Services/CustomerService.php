<?php

namespace App\Services;

use App\Repositories\Customer\CustomerRepositoryInterface;

/**
 * Summary of CustomerService
 */
class CustomerService
{
    private $repoCustomer;

    /**
     * Summary of __construct
     * @param CustomerRepositoryInterface $repoCustomer
     */
    public function __construct(CustomerRepositoryInterface $repoCustomer)
    {
        $this->repoCustomer = $repoCustomer;
    }

    /**
     * Summary of store
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->repoCustomer->store($data);
    }

    /**
     * Summary of getList
     */
    public function getList()
    {
        return $this->repoCustomer->getList();
    }

    /**
     * Summary of get
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->repoCustomer->get($id);
    }

    /**
     * Summary of update
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->repoCustomer->update($data, $id);
    }

    /**
     * Summary of destroy
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repoCustomer->destroy($id);
    }
}
