<?php

namespace App\Services;

use App\Repositories\Account\AccountRepositoryInterface;

/**
 * Summary of AccountService
 */
class AccountService
{
    private $repoAccount;

    /**
     * Summary of __construct
     * @param AccountRepositoryInterface $repoAccount
     */
    public function __construct(AccountRepositoryInterface $repoAccount)
    {
        $this->repoAccount = $repoAccount;
    }

    /**
     * Summary of store
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->repoAccount->store($data);
    }

    /**
     * Summary of getList
     */
    public function getList()
    {
        return $this->repoAccount->getList();
    }

    /**
     * Summary of get
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->repoAccount->get($id);
    }

    /**
     * Summary of update
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->repoAccount->update($data, $id);
    }

    /**
     * Summary of destroy
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repoAccount->destroy($id);
    }
}
