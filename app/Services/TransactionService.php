<?php

namespace App\Services;

use App\Repositories\Account\AccountRepositoryInterface;
use App\Repositories\Transaction\TransactionRepositoryInterface;
use App\Repositories\Transaction\TransactionTypeRepositoryInterface;

/**
 * Summary of TransactionService
 */
class TransactionService
{
    private $repoTransaction, $repoAccount, $repoTransactionType;

    /**
     * Summary of __construct
     * @param TransactionRepositoryInterface $repoTransaction
     */
    public function __construct(
        TransactionRepositoryInterface $repoTransaction,
        AccountRepositoryInterface $repoAccount,
        TransactionTypeRepositoryInterface $repoTransactionType
    ) {
        $this->repoTransaction = $repoTransaction;
        $this->repoAccount = $repoAccount;
        $this->repoTransactionType = $repoTransactionType;
    }

    /**
     * Summary of store
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        $errors = [];

        try {
            $currentAccount = $this->repoAccount->get($data['fk_account']);
            $currentTransactionType = $this->repoTransactionType->get($data['fk_transaction_type']);

            return response(
                json_encode([
                    'transaction' => $this->repoTransaction->store($data),
                    'account' => $currentAccount,
                    'transaction_type' => $currentTransactionType,
                ]),
                201
            );

        } catch (\Throwable $th) {
            if ($currentAccount == null)
                array_push($errors, 'Account not found');
            if ($currentTransactionType == null)
                array_push($errors, 'Transaction type not found');

            return response(
                json_encode([
                    'msg' => $errors,
                ]),
                404
            );
        }

        // return $this->repoTransaction->store($data);
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
