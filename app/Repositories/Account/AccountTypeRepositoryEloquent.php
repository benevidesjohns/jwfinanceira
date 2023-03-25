<?php

namespace App\Repositories\Account;

use \Illuminate\Database\Eloquent\Model;

class AccountTypeRepositoryEloquent implements AccountTypeRepositoryInterface
{
    protected $accountType;

    /**
     * @param  $accountType
     * @return mixed
     */
    public function __construct(Model $accountType)
    {
        $this->accountType = $accountType;
    }

    /**
     *
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->accountType->create($data);
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->accountType->all();
    }

    /**
     *
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->accountType->find($id);
    }

    /**
     *
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->accountType->find($id)->update($data);
    }

    /**
     *
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->accountType->find($id)->delete();
    }
}
