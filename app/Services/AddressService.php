<?php

namespace App\Services;

use App\Repositories\Customer\AddressRepositoryInterface;

/**
 * Summary of AddressService
 */
class AddressService
{
    private $repoAddress;

    /**
     * Construtor da classe AddressService
     * @param AddressRepositoryInterface $repoAddress
     */
    public function __construct(AddressRepositoryInterface $repoAddress)
    {
        $this->repoAddress = $repoAddress;
    }

    /**
     * Envia para o AddressRepository os dados para criar uma nova instância de Address
     * @param array $data
     * @return array|mixed
     */
    public function store($data)
    {
        try {
            // TODO: Tratar os dados da requisição, antes de chamar o repoAddress->store
            $address = $this->repoAddress->store([
                'city' => $data['city'],
                'state' => $data['state'],
                'cep' => $data['cep'],
                'address' => $data['address']
            ]);

            $status = 200;

            return compact('address', 'status');

        } catch (\Throwable) {
            $message = 'Address not stored';
            $status = 400;

            return compact('message', 'status');
        }
    }

    /**
     * Retorna todas as instâncias de Address do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->repoAddress->getList();
    }

    /**
     * Retorna uma instância de Address a partir do id informado
     * @param int|string $id
     * @return array
     */
    public function get($id)
    {
        try {
            $address = $this->repoAddress->get($id);
            $address->customers;
            $status = 200;

            throw_if($address == null);

            return compact('address', 'status');

        } catch (\Throwable) {
            $message = 'Address not found';
            $status = 404;

            return compact('message', 'status');
        }
    }

    /**
     * Atualiza os dados de uma instância de Address
     * @param array $data
     * @param int|string $id
     * @return array|mixed
     */
    public function update($data, $id)
    {
        try {
            // TODO: Tratar os dados da requisição, antes de chamar o repoAddress->store
            $keys = [];
            $values = [];
            foreach ($data as $key => $value) {
                array_push($keys, $key);
                array_push($values, $value);
            }

            $processed_data = array_combine($keys, $values);

            $status = 200;

            $this->repoAddress->update($processed_data, $id);
            $address = $this->repoAddress->get($id);
            $status = 200;

            throw_if($address == null);

            return compact('address', 'status');

        } catch (\Throwable) {
            $message = 'Address not found';
            $status = 404;

            return compact('message', 'status');
        }
    }

    /**
     * Remove uma instância de Address do banco de dados
     * @param int|string $id
     * @return array
     */
    public function destroy($id)
    {
        $address = $this->repoAddress->get($id);

        if ($address == null) {
            $message = 'Address not found';
            $status = 404;
        } else if (count($address->customers) > 0) {
            $message = 'This address has associated customers';
            $status = 405;
        } else {
            $this->repoAddress->destroy($id);
            $message = 'Address destroyed';
            $status = 204;
        }

        return compact('message', 'status');
    }
}
