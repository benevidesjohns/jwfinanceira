<?php

namespace App\Repositories\Transaction;

use \Illuminate\Database\Eloquent\Model;

class TransactionTypeRepositoryEloquent implements TransactionTypeRepositoryInterface
{
    protected $transactionType;

    /**
     * @param  $transactionType
     * @return mixed
     */
    public function __construct(Model $transactionType)
    {
        $this->transactionType = $transactionType;
    }

    /**
     *
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->transactionType->create($data);
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->transactionType->all();
    }

    /**
     *
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->transactionType->find($id);
    }

    /**
     *
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->transactionType->find($id)->update($data);
    }

    /**
     *
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->transactionType->find($id)->delete();
    }
}
