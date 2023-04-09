<?php

namespace App\Repositories\Transaction;

use App\Models\Transaction;

class TransactionRepositoryEloquent implements TransactionRepositoryInterface
{
    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Armazena uma nova instância de Transaction no banco de dados
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @return Transaction
     */
    public function store($data)
    {
        return $this->transaction->create($data);
    }

    /**
     * Retorna todas as instâncias de Transaction do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->transaction->all()->map(function ($transaction) {
            $transaction->account;
            $transaction->transactionType;
            return $transaction;
        })->sort()->values();
    }

    /**
     * Retorna uma instância de Transaction a partir do id informado
     * @param int|string $id
     * @return Transaction
     */
    public function get($id)
    {
        return $this->transaction->find($id);
    }

    /**
     * Atualiza os dados de uma instância de Transaction
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @param int|string $id
     * @return Transaction
     */
    public function update($data, $id)
    {
        return $this->transaction->find($id)->update($data);
    }

    /**
     * Remove uma instância de Transaction do banco de dados
     * @param int|string $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->transaction->find($id)->delete();
    }
}
