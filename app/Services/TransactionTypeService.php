<?php

namespace App\Services;

use App\Repositories\Transaction\TransactionTypeRepositoryInterface;

/**
 * Summary of TransactionTypeService
 */
class TransactionTypeService
{
    private $repoTransactionType;

    /**
     * Summary of __construct
     * @param TransactionTypeRepositoryInterface $repoTransactionType
     */
    public function __construct(TransactionTypeRepositoryInterface $repoTransactionType)
    {
        $this->repoTransactionType = $repoTransactionType;
    }

    /**
     * Summary of store
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->repoTransactionType->store($data);
    }

    /**
     * Summary of getList
     */
    public function getList()
    {
        return $this->repoTransactionType->getList();
    }

    /**
     * Summary of get
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->repoTransactionType->get($id);
    }

    /**
     * Summary of update
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->repoTransactionType->update($data, $id);
    }

    /**
     * Summary of destroy
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repoTransactionType->destroy($id);
    }
}
