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

            // Dispara uma exceção caso o endereço passado for nulo
            throw_if($currentAddress == null);

            // TODO: Tratar os dados da requisição, antes de chamar o repoCustomer->store
            $customer = $this->repoCustomer->store($data);
            $customer->address;
            $status = 200;

            return compact('customer', 'status');

        } catch (\Throwable) {
            if ($currentAddress == null) {
                array_push($errors, 'Address not found');
            } else {
                array_push($errors, 'CPF already exists');
            }

            return [
                'message' => $errors,
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
            $status = 200;

            throw_if($customer == null);

            return compact('customer', 'status');

        } catch (\Throwable) {
            $message = 'Customer not found';
            $status = 404;

            return compact('message', 'status');
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

            $status = 200;

            $this->repoCustomer->update($processed_data, $id);
            $customer = $this->repoCustomer->get($id);
            $status = 200;

            throw_if($customer == null);

            return compact('customer', 'status');

        } catch (\Throwable) {
            $message = 'Customer not found';
            $status = 404;

            return compact('message', 'status');
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
            $message = 'Customer not found';
            $status = 404;
        } else if (count($customer->accounts) > 0) {
            $message = 'This customer has associated account';
            $status = 405;
        } else {
            $this->repoCustomer->destroy($id);
            $message = 'Customer destroyed';
            $status = 204;
        }

        return compact('message', 'status');
    }
}
