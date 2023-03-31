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
     * Construtor da classe TransactionTypeService
     * @param TransactionTypeRepositoryInterface $repoTransactionType
     */
    public function __construct(TransactionTypeRepositoryInterface $repoTransactionType)
    {
        $this->repoTransactionType = $repoTransactionType;
    }

    /**
     * Envia para o TransactionTypeRepository os dados para criar uma nova instância de TransactionType
     * @param array $data
     * @return \App\Models\TransactionType
     */
    public function store(array $data)
    {
        return $this->repoTransactionType->store($data);
    }

    /**
     * Retorna todas as instâncias de TransactionType do banco de dados
     * @return array[\App\Models\TransactionType]
     */
    public function getList()
    {
        return $this->repoTransactionType->getList();
    }

    /**
     * Retorna uma instância de TransactionType a partir do id informado
     * @param mixed $id
     * @return \App\Models\TransactionType
     */
    public function get($id)
    {
        return $this->repoTransactionType->get($id);
    }

    /**
     * Atualiza os dados de uma instância de TransactionType
     * @param array $data
     * @param mixed $id
     * @return \App\Models\TransactionType
     */
    public function update(array $data, $id)
    {
        return $this->repoTransactionType->update($data, $id);
    }

    /**
     * Remove uma instância de TransactionType do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repoTransactionType->destroy($id);
    }
}
