<?php

namespace App\Repositories\Account;

use App\Models\AccountType;

class AccountTypeRepositoryEloquent implements AccountTypeRepositoryInterface
{
    protected $accountType;

    public function __construct(AccountType $accountType)
    {
        $this->accountType = $accountType;
    }

    /**
     * Armazena uma nova instância de AccountType no banco de dados
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @return AccountType
     */
    public function store($data)
    {
        $this->accountType->create($data);
        return $this->accountType;
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
     * @param int|string $id
     * @return AccountType
     */
    public function get($id)
    {
        return $this->accountType->find($id);
    }

    /**
     * Atualiza os dados de uma instância de AccountType
     * @param \Illuminate\Support\Collection|array|int|string $data $data
     * @param int|string $id
     * @return AccountType
     */
    public function update($data, $id)
    {
        return $this->accountType->find($id)->update($data);
    }

    /**
     * Remove uma instância de AccountType do banco de dados
     * @param int|string $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->accountType->find($id)->delete();
    }
}
