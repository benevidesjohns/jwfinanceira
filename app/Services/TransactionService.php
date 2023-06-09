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
     * @return array
     */
    public function store(array $data)
    {
        $errors = [];

        try {
            // Busca a conta e o tipo de transação passados no banco de dados
            $currentAccount = $this->repoAccount->get($data['fk_account']);
            $currentTransactionType = $this->repoTransactionType->get($data['fk_transaction_type']);

            // Dispara uma exceção caso a conta ou o tipo de transação passados forem nulos
            throw_if($currentAccount == null || $currentTransactionType == null);

            // Armazena a transação no banco de dados e associa a conta e o tipo a mesma
            $transaction = $this->repoTransaction->store($data);
            $transaction->account;
            $transaction->transactionType;

            return [
                'transaction' => $transaction,
                'status' => 201
            ];

        } catch (\Throwable) {
            if ($currentAccount == null)
                array_push($errors, 'Account not found');
            if ($currentTransactionType == null)
                array_push($errors, 'Transaction type not found');

            return [
                'info' => $errors,
                'status' => 404
            ];
        }
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
     * @return array
     */
    public function get($id)
    {
        try {
            $transaction = $this->repoTransaction->get($id);
            $transaction->account;
            $transaction->transactionType;

            throw_if($transaction == null);

            return [
                'transaction' => $transaction,
                'status' => 200
            ];

        } catch (\Throwable) {
            return [
                'info' => ['Transaction not found'],
                'status' => 404
            ];
        }
    }

    /**
     * Atualiza os dados de uma instância de Transaction
     * @param array $data
     * @param mixed $id
     * @return array
     */
    public function update(array $data, $id)
    {
        try {
            // TODO: Tratar os dados da requisição, antes de chamar o repoTransaction->update
            $this->repoTransaction->update($data, $id);

            $transaction = $this->repoTransaction->get($id);

            return [
                'transaction' => $transaction,
                'status' => 200
            ];

        } catch (\Throwable) {
            return [
                'info' => ['Transaction not found'],
                'status' => 404
            ];
        }
    }

    /**
     * Remove uma instância de Transaction do banco de dados
     * @param int|string $id
     * @return array
     */
    public function destroy($id)
    {
        $transaction = $this->repoTransaction->get($id);

        if ($transaction == null) {
            $info = ['Transaction not found'];
            $status = 404;
        } else {
            $this->repoTransaction->destroy($id);
            $info = ['Transaction destroyed'];
            $status = 204;
        }

        return compact('info', 'status');
    }
}
