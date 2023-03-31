<?php

namespace App\Repositories\Customer;

use App\Models\Customer;

class CustomerRepositoryEloquent implements CustomerRepositoryInterface
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Armazena uma nova instância de Customer no banco de dados
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @return Customer
     */
    public function store($data)
    {
        $this->customer->create($data);
        return $this->customer;
    }

    /**
     * Retorna todas as instâncias de Customer do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->customer->all();
    }

    /**
     * Retorna uma instância de Customer a partir do id informado
     * @param int|string $id
     * @return Customer
     */
    public function get($id)
    {
        return $this->customer->find($id);
    }

    /**
     * Atualiza os dados de uma instância de Customer
     * @param \Illuminate\Support\Collection|array|int|string $data $data
     * @param int|string $id
     * @return Customer
     */
    public function update($data, $id)
    {
        return $this->customer->find($id)->update($data);
    }

    /**
     * Remove uma instância de Customer do banco de dados
     * @param int|string $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->customer->find($id)->delete();
    }
}
