<?php

namespace App\Services;

use App\Repositories\Account\AccountRepositoryInterface;

/**
 * Summary of AccountService
 */
class AccountService
{
    private $repoAccount;

    /**
     * Construtor da classe AccountService
     * @param AccountRepositoryInterface $repoAccount
     */
    public function __construct(AccountRepositoryInterface $repoAccount)
    {
        $this->repoAccount = $repoAccount;
    }

    /**
     * Envia para o AccountRepository os dados para criar uma nova instância de Account
     * @param array $data
     * @return \App\Models\Account
     */
    public function store(array $data)
    {
        return $this->repoAccount->store($data);
    }

    /**
     * Retorna todas as instâncias de Account do banco de dados
     * @return array[\App\Models\Account]
     */
    public function getList()
    {
        return $this->repoAccount->getList();
    }

    /**
     * Retorna uma instância de Account a partir do id informado
     * @param mixed $id
     * @return \App\Models\Account
     */
    public function get($id)
    {
        return $this->repoAccount->get($id);
    }

    /**
     * Atualiza os dados de uma instância de Account
     * @param array $data
     * @param mixed $id
     * @return \App\Models\Account
     */
    public function update(array $data, $id)
    {
        return $this->repoAccount->update($data, $id);
    }

    /**
     * Remove uma instância de Account do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repoAccount->destroy($id);
    }
}
