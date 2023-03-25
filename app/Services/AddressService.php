<?php

namespace App\Services;

use App\Repositories\Customer\AddressRepositoryInterface;

/**
 * Summary of AddressService
 */
class AddressService
{
    private $repoAddress;

    /**
     * Summary of __construct
     * @param AddressRepositoryInterface $repoAddress
     */
    public function __construct(AddressRepositoryInterface $repoAddress)
    {
        $this->repoAddress = $repoAddress;
    }

    /**
     * Summary of store
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->repoAddress->store($data);
    }

    /**
     * Summary of getList
     */
    public function getList()
    {
        return $this->repoAddress->getList();
    }

    /**
     * Summary of get
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->repoAddress->get($id);
    }

    /**
     * Summary of update
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->repoAddress->update($data, $id);
    }

    /**
     * Summary of destroy
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repoAddress->destroy($id);
    }
}
