<?php

namespace App\Repositories\Transaction;

use \Illuminate\Database\Eloquent\Model;

class TransactionRepositoryEloquent implements TransactionRepositoryInterface
{
    protected $transaction;

    /**
     * @param  $transaction
     * @return mixed
     */
    public function __construct(Model $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     *
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->transaction->create($data);
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->transaction->all();
    }

    /**
     *
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->transaction->find($id);
    }

    /**
     *
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->transaction->find($id)->update($data);
    }

    /**
     *
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->transaction->find($id)->delete();
    }
}
