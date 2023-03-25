<?php

namespace App\Repositories\Account;

use \Illuminate\Database\Eloquent\Model;

class AccountRepositoryEloquent implements AccountRepositoryInterface
{
    protected $account;

    /**
     * Construtor da classe AccountRepositoryInterface
     * @param $account
     */
    public function __construct(Model $account)
    {
        $this->account = $account;
    }

    /**
     * Armazena uma nova instância de Account no banco de dados
     * @param array $data
     * @return \App\Models\Account
     */
    public function store(array $data)
    {
        $this->account->create($data);
        return $this->account;
    }

    /**
     * Retorna todas as instâncias de Account do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->account->all();
    }

    /**
     * Retorna uma instância de Account a partir do id informado
     * @param mixed $id
     * @return \App\Models\Account
     */
    public function get($id)
    {
        return $this->account->find($id);
    }

    /**
     * Atualiza os dados de uma instância de Account
     * @param array $data
     * @param mixed $id
     * @return \App\Models\Account
     */
    public function update(array $data, $id)
    {
        return $this->account->find($id)->update($data);
    }

    /**
     * Remove uma instância de Account do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->account->find($id)->delete();
    }
}
