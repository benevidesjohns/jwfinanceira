<?php

namespace App\Repositories\Transaction;

use App\Models\TransactionType;

interface TransactionTypeRepositoryInterface
{
    public function __construct(TransactionType $transactionType);

    /**
     * Armazena uma nova instância de TransactionType no banco de dados
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @return TransactionType
     */
    public function store($data);

    /**
     * Retorna todas as instâncias de TransactionType do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList();

    /**
     * Retorna uma instância de TransactionType a partir do id informado
     * @param int|string $id
     * @return TransactionType
     */
    public function get($id);

    /**
     * Atualiza os dados de uma instância de TransactionType
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @param int|string $id
     * @return TransactionType
     */
    public function update($data, $id);

    /**
     * Remove uma instância de TransactionType do banco de dados
     * @param int|string $id
     * @return int
     */
    public function destroy($id);
}
