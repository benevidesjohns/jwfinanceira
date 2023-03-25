<?php

namespace App\Services;

use App\Repositories\Account\AccountTypeRepositoryInterface;

/**
 * Summary of AccountTypeService
 */
class AccountTypeService
{
    private $repoAccountType;

    /**
     * Summary of __construct
     * @param AccountTypeRepositoryInterface $repoAccountType
     */
    public function __construct(AccountTypeRepositoryInterface $repoAccountType)
    {
        $this->repoAccountType = $repoAccountType;
    }

    /**
     * Summary of store
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->repoAccountType->store($data);
    }

    /**
     * Summary of getList
     */
    public function getList()
    {
        return $this->repoAccountType->getList();
    }

    /**
     * Summary of get
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->repoAccountType->get($id);
    }

    /**
     * Summary of update
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->repoAccountType->update($data, $id);
    }

    /**
     * Summary of destroy
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repoAccountType->destroy($id);
    }
}
