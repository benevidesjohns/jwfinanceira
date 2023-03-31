<?php

namespace App\Services;

use App\Repositories\Customer\CustomerRepositoryInterface;

/**
 * Summary of CustomerService
 */
class CustomerService
{
    private $repoCustomer;

    /**
     * Construtor da classe CustomerService
     * @param CustomerRepositoryInterface $repoCustomer
     */
    public function __construct(CustomerRepositoryInterface $repoCustomer)
    {
        $this->repoCustomer = $repoCustomer;
    }

    /**
     * Envia para o CustomerRepository os dados para criar uma nova instância de Customer
     * @param array $data
     * @return \App\Models\Customer
     */
    public function store(array $data)
    {
        return $this->repoCustomer->store($data);
    }

    /**
     * Retorna todas as instâncias de Customer do banco de dados
     * @return array[\App\Models\Customer]
     */
    public function getList()
    {
        return $this->repoCustomer->getList();
    }

    /**
     * Retorna uma instância de Customer a partir do id informado
     * @param mixed $id
     * @return \App\Models\Customer
     */
    public function get($id)
    {
        return $this->repoCustomer->get($id);
    }

    /**
     * Atualiza os dados de uma instância de Customer
     * @param array $data
     * @param mixed $id
     * @return \App\Models\Customer
     */
    public function update(array $data, $id)
    {
        return $this->repoCustomer->update($data, $id);
    }

    /**
     * Remove uma instância de Customer do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repoCustomer->destroy($id);
    }
}
