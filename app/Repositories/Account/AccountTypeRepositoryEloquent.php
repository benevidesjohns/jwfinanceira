<?php

namespace App\Repositories\Account;

use \Illuminate\Database\Eloquent\Model;

class AccountTypeRepositoryEloquent implements AccountTypeRepositoryInterface
{
    protected $accountType;

    /**
     * Construtor da classe AccountTypeRepositoryInterface
     * @param $accountType
     */
    public function __construct(Model $accountType)
    {
        $this->accountType = $accountType;
    }

    /**
     * Armazena uma nova instância de AccountType no banco de dados
     * @param array $data
     * @return \App\Models\AccountType
     */
    public function store(array $data)
    {
        return $this->accountType->create($data);
    }

    /**
     * Retorna todas as instâncias de AccountType do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->accountType->all();
    }

    /**
     * Retorna uma instância de AccountType a partir do id informado
     * @param mixed $id
     * @return \App\Models\AccountType
     */
    public function get($id)
    {
        return $this->accountType->find($id);
    }

    /**
     * Atualiza os dados de uma instância de AccountType
     * @param array $data
     * @param mixed $id
     * @return \App\Models\AccountType
     */
    public function update(array $data, $id)
    {
        $currentAccountType = $this->accountType->find($id);
        $currentAccountType->update($data);
        return $currentAccountType;
    }

    /**
     * Remove uma instância de AccountType do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->accountType->find($id)->delete();
    }
}
