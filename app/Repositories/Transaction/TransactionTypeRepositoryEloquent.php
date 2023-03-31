<?php

namespace App\Repositories\Transaction;

use App\Models\TransactionType;

class TransactionTypeRepositoryEloquent implements TransactionTypeRepositoryInterface
{
    protected $transactionType;

    public function __construct(TransactionType $transactionType)
    {
        $this->transactionType = $transactionType;
    }

    /**
     * Armazena uma nova instância de TransactionType no banco de dados
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @return TransactionType
     */
    public function store($data)
    {
        $this->transactionType->create($data);
        return $this->transactionType;
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
     * @param int|string $id
     * @return TransactionType
     */
    public function get($id)
    {
        return $this->transactionType->find($id);
    }

    /**
     * Atualiza os dados de uma instância de TransactionType
     * @param \Illuminate\Support\Collection|array|int|string $data $data
     * @param int|string $id
     * @return TransactionType
     */
    public function update($data, $id)
    {
        return $this->transactionType->find($id)->update($data);
    }

    /**
     * Remove uma instância de TransactionType do banco de dados
     * @param int|string $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->transactionType->find($id)->delete();
    }
}
