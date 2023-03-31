<?php

namespace App\Services;

use App\Repositories\Account\AccountTypeRepositoryInterface;

/**
 * Summary of AccountTypeService
 */
class AccountTypeService
{
    private $repoAccountType;

    /**
     * Construtor da classe AccountTypeService
     * @param AccountTypeRepositoryInterface $repoAccountType
     */
    public function __construct(AccountTypeRepositoryInterface $repoAccountType)
    {
        $this->repoAccountType = $repoAccountType;
    }

    /**
     * Envia para o AccountTypeRepository os dados para criar uma nova instância de AccountType
     * @param array $data
     * @return \App\Models\AccountType
     */
    public function store(array $data)
    {
        return $this->repoAccountType->store($data);
    }

    /**
     * Retorna todas as instâncias de AccountType do banco de dados
     * @return array[\App\Models\AccountType]
     */
    public function getList()
    {
        return $this->repoAccountType->getList();
    }

    /**
     * Retorna uma instância de AccountType a partir do id informado
     * @param mixed $id
     * @return \App\Models\AccountType
     */
    public function get($id)
    {
        return $this->repoAccountType->get($id);
    }

    /**
     * Atualiza os dados de uma instância de AccountType
     * @param array $data
     * @param mixed $id
     * @return \App\Models\AccountType
     */
    public function update(array $data, $id)
    {
        return $this->repoAccountType->update($data, $id);
    }

    /**
     * Remove uma instância de AccountType do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repoAccountType->destroy($id);
    }
}
