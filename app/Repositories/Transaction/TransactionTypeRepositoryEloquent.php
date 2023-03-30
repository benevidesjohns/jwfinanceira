<?php

namespace App\Repositories\Transaction;

use \Illuminate\Database\Eloquent\Model;

class TransactionTypeRepositoryEloquent implements TransactionTypeRepositoryInterface
{
    protected $transactionType;

    /**
     * Construtor da classe TransactionTypeRepositoryInterface
     * @param $transactionType
     */
    public function __construct(Model $transactionType)
    {
        $this->transactionType = $transactionType;
    }

    /**
     * Armazena uma nova instância de TransactionType no banco de dados
     * @param array $data
     * @return \App\Models\TransactionType
     */
    public function store(array $data)
    {
        return $this->transactionType->create($data);
    }

    /**
     * Retorna todas as instâncias de TransactionType do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->transactionType->all();
    }

    /**
     * Retorna uma instância de TransactionType a partir do id informado
     * @param mixed $id
     * @return \App\Models\TransactionType
     */
    public function get($id)
    {
        return $this->transactionType->find($id);
    }

    /**
     * Atualiza os dados de uma instância de TransactionType
     * @param array $data
     * @param mixed $id
     * @return \App\Models\TransactionType
     */
    public function update(array $data, $id)
    {
        $currentTransactionType = $this->transactionType->find($id);
        $currentTransactionType->update($data);
        return $currentTransactionType;
    }

    /**
     * Remove uma instância de TransactionType do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->transactionType->find($id)->delete();
    }
}
