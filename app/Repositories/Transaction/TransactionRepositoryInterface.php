<?php

namespace App\Repositories\Transaction;

use App\Models\Transaction;

interface TransactionRepositoryInterface
{
    public function __construct(Transaction $transaction);

    /**
     * Armazena uma nova instância de Transaction no banco de dados
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @return Transaction
     */
    public function store($data);

    /**
     * Retorna todas as instâncias de Transaction do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList();

    /**
     * Retorna uma instância de Transaction a partir do id informado
     * @param int|string $id
     * @return Transaction
     */
    public function get($id);

    /**
     * Atualiza os dados de uma instância de Transaction
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @param int|string $id
     * @return Transaction
     */
    public function update($data, $id);

    /**
     * Remove uma instância de Transaction do banco de dados
     * @param int|string $id
     * @return int
     */
    public function destroy($id);
}
