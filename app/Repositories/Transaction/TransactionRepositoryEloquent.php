<?php

namespace App\Repositories\Transaction;

use \Illuminate\Database\Eloquent\Model;

class TransactionRepositoryEloquent implements TransactionRepositoryInterface
{
    protected $transaction;

    /**
     * Construtor da classe TransactionRepositoryInterface
     * @param $transaction
     */
    public function __construct(Model $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Armazena uma nova instância de Transaction no banco de dados
     * @param array $data
     * @return \App\Models\Transaction
     */
    public function store(array $data)
    {
        return $this->transaction->create($data);
    }

    /**
     * Retorna todas as instâncias de Transaction do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->transaction->all();
    }

    /**
     * Retorna uma instância de Transaction a partir do id informado
     * @param mixed $id
     * @return \App\Models\Transaction
     */
    public function get($id)
    {
        return $this->transaction->find($id);
    }

    /**
     * Atualiza os dados de uma instância de Transaction
     * @param array $data
     * @param mixed $id
     * @return \App\Models\Transaction
     */
    public function update(array $data, $id)
    {
        $currentTransaction = $this->transaction->find($id);
        $currentTransaction->update($data);
        return $currentTransaction;
    }

    /**
     * Remove uma instância de Transaction do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->transaction->find($id)->delete();
    }
}
