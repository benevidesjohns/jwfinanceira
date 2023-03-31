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
     * Construtor da classe TransactionService
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
     * Envia para o TransactionRepository os dados para criar uma nova instância de Transaction
     * @param array $data
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
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

        } catch (\Throwable) {
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
     * Retorna todas as instâncias de Transaction do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->repoTransaction->getList();
    }

    /**
     * Retorna uma instância de Transaction a partir do id informado
     * @param mixed $id
     * @return \App\Models\Transaction
     */
    public function get($id)
    {
        return $this->repoTransaction->get($id);
    }

    /**
     * Atualiza os dados de uma instância de Transaction
     * @param array $data
     * @param mixed $id
     * @return \App\Models\Transaction
     */
    public function update(array $data, $id)
    {
        return $this->repoTransaction->update($data, $id);
    }

    /**
     * Remove uma instância de Transaction do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repoTransaction->destroy($id);
    }
}
