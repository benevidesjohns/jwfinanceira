<?php

namespace App\Repositories\Account;

use App\Models\Account;

class AccountRepositoryEloquent implements AccountRepositoryInterface
{
    protected $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    /**
     * Armazena uma nova instância de Account no banco de dados
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @return Account
     */
    public function store($data)
    {
        return $this->account->create($data);
    }

    /**
     * Retorna todas as instâncias de Account do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->account->all()->map(function ($account) {
            $account->user;
            $account->accountType;
            return $account;
        })->sort()->values();
    }

    /**
     * Retorna uma instância de Account a partir do id informado
     * @param int|string $id
     * @return Account
     */
    public function get($id)
    {
        return $this->account->find($id);
    }

    /**
     * Atualiza os dados de uma instância de Account
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @param int|string $id
     * @return Account
     */
    public function update($data, $id)
    {
        return $this->account->find($id)->update($data);
    }

    /**
     * Remove uma instância de Account do banco de dados
     * @param int|string $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->account->find($id)->delete();
    }
}
