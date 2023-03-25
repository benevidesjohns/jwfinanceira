<?php

namespace App\Repositories\Account;

use \Illuminate\Database\Eloquent\Model;

class AccountRepositoryEloquent implements AccountRepositoryInterface
{
    protected $account;

    /**
     * @param  $account
     * @return mixed
     */
    public function __construct(Model $account)
    {
        $this->account = $account;
    }

    /**
     *
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        print_r(typeOf($this->account));
        return $this->account->create($data);
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->account->all();
    }

    /**
     *
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->account->find($id);
    }

    /**
     *
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $currentAccount = $this->account->find($id);
        $currentAccount->update($data);
        return $currentAccount;
    }

    /**
     *
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->account->find($id)->delete();
    }
}
