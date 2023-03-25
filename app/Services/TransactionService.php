<?php

namespace App\Services;

use App\Repositories\Transaction\TransactionRepositoryInterface;

/**
 * Summary of TransactionService
 */
class TransactionService
{
    private $repoTransaction;

    /**
     * Summary of __construct
     * @param TransactionRepositoryInterface $repoTransaction
     */
    public function __construct(TransactionRepositoryInterface $repoTransaction)
    {
        $this->repoTransaction = $repoTransaction;
    }

    /**
     * Summary of store
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->repoTransaction->store($data);
    }

    /**
     * Summary of getList
     */
    public function getList()
    {
        return $this->repoTransaction->getList();
    }

    /**
     * Summary of get
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->repoTransaction->get($id);
    }

    /**
     * Summary of update
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->repoTransaction->update($data, $id);
    }

    /**
     * Summary of destroy
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repoTransaction->destroy($id);
    }
}
