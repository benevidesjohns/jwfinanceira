<?php

namespace App\Repositories\Account;

use App\Models\Account;

interface AccountRepositoryInterface
{
    public function __construct(Account $account);

    /**
     * Armazena uma nova instância de Account no banco de dados
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @return Account
     */
    public function store($data);

    /**
     * Retorna todas as instâncias de Account do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList();

    /**
     * Retorna uma instância de Account a partir do id informado
     * @param int|string $id
     * @return Account
     */
    public function get($id);

    /**
     * Atualiza os dados de uma instância de Account
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @param int|string $id
     * @return Account
     */
    public function update($data, $id);

    /**
     * Remove uma instância de Account do banco de dados
     * @param int|string $id
     * @return int
     */
    public function destroy($id);
}
