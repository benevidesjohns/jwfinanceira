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
     * @return array|mixed
     */
    public function store($data)
    {
        $errors = [];

        try {
            // Busca o endereço passado no banco de dados
            $currentAddress = $this->repoCustomer->get($data['fk_address']);

            // Dispara uma exceção caso o endereço passado seja nulo
            throw_if($currentAddress == null);

            // TODO: Tratar os dados da requisição, antes de chamar o repoCustomer->store
            $customer = $this->repoCustomer->store($data);
            $customer->address;

            return [
                'customer' => $customer,
                'status' => 201
            ];

        } catch (\Throwable) {
            if ($currentAddress == null) {
                array_push($errors, 'Address not found');
            } else {
                array_push($errors, 'CPF already exists');
            }

            return [
                'info' => $errors,
                'status' => 404
            ];
        }
    }


    /**
     * Retorna todas as instâncias de Customer do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->repoCustomer->getList();
    }

    /**
     * Retorna uma instância de Customer a partir do id informado
     * @param int|string $id
     * @return array
     */
    public function get($id)
    {
        try {
            $customer = $this->repoCustomer->get($id);
            $customer->address;

            throw_if($customer == null);

            return [
                'customer' => $customer,
                'status' => 200
            ];

        } catch (\Throwable) {
            return [
                'info' => ['Customer not found'],
                'status' => 404
            ];
        }
    }

    /**
     * Atualiza os dados de uma instância de Customer
     * @param array $data
     * @param int|string $id
     * @return array|mixed
     */
    public function update($data, $id)
    {
        try {
            // TODO: Tratar os dados da requisição, antes de chamar o repoCustomer->store
            $keys = [];
            $values = [];
            foreach ($data as $key => $value) {
                array_push($keys, $key);
                array_push($values, $value);
            }

            $processed_data = array_combine($keys, $values);

            $this->repoCustomer->update($processed_data, $id);
            $customer = $this->repoCustomer->get($id);

            throw_if($customer == null);

            return [
                'customer' => $customer,
                'status' => 200
            ];

        } catch (\Throwable) {
            return [
                'info' => ['Customer not found'],
                'status' => 404
            ];
        }
    }

    /**
     * Remove uma instância de Customer do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        $customer = $this->repoCustomer->get($id);

        if ($customer == null) {
            $info = ['Customer not found'];
            $status = 404;
        } else if (count($customer->accounts) > 0) {
            $info = ['This customer has associated account'];
            $status = 405;
        } else {
            $this->repoCustomer->destroy($id);
            $info = ['Customer destroyed'];
            $status = 204;
        }

        return compact('info', 'status');
    }
}
