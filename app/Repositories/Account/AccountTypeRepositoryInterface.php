<?php

namespace App\Repositories\Account;

use App\Models\AccountType;

interface AccountTypeRepositoryInterface
{
    public function __construct(AccountType $accountType);

    /**
     * Armazena uma nova instância de AccountType no banco de dados
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @return AccountType
     */
    public function store($data);

    /**
     * Retorna todas as instâncias de AccountType do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList();

    /**
     * Retorna uma instância de AccountType a partir do id informado
     * @param int|string $id
     * @return AccountType
     */
    public function get($id);

    /**
     * Atualiza os dados de uma instância de AccountType
     * @param \Illuminate\Support\Collection|array|int|string $data $data
     * @param int|string $id
     * @return AccountType
     */
    public function update($data, $id);

    /**
     * Remove uma instância de AccountType do banco de dados
     * @param int|string $id
     * @return int
     */
    public function destroy($id);
}
