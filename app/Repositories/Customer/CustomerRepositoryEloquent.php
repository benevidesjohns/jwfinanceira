<?php

namespace App\Repositories\Customer;

use \Illuminate\Database\Eloquent\Model;

class CustomerRepositoryEloquent implements CustomerRepositoryInterface
{
    protected $customer;

    /**
     * Construtor da classe CustomerRepositoryInterface
     * @param $customer
     */
    public function __construct(Model $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Armazena uma nova instância de Customer no banco de dados
     * @param array $data
     * @return \App\Models\Customer
     */
    public function store(array $data)
    {
        return $this->customer->create($data);
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
     * @param mixed $id
     * @return \App\Models\Customer
     */
    public function get($id)
    {
        return $this->customer->find($id);
    }

    /**
     * Atualiza os dados de uma instância de Customer
     * @param array $data
     * @param mixed $id
     * @return \App\Models\Customer
     */
    public function update(array $data, $id)
    {
        $currentCustomer = $this->customer->find($id);
        $currentCustomer->update($data);
        return $currentCustomer;
    }

    /**
     * Remove uma instância de Customer do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->customer->find($id)->delete();
    }
}
