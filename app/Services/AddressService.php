<?php

namespace App\Services;

use App\Repositories\User\AddressRepositoryInterface;

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
            $address = $this->repoAddress->store($data);

            return [
                'address' => $address,
                'status' => 201
            ];

        } catch (\Throwable) {
            return [
                'info' => ['Address not stored'],
                'status' => 500
            ];
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
            $address->users;

            throw_if($address == null);

            return [
                'address' => $address,
                'status' => 200
            ];

        } catch (\Throwable) {
            return [
                'info' => ['Address not found'],
                'status' => 404
            ];
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
            // TODO: Tratar os dados da requisição, antes de chamar o repoAddress->update
            $keys = [];
            $values = [];
            foreach ($data as $key => $value) {
                array_push($keys, $key);
                array_push($values, $value);
            }

            $processed_data = array_combine($keys, $values);

            $this->repoAddress->update($processed_data, $id);
            $address = $this->repoAddress->get($id);

            throw_if($address == null);

            return [
                'address' => $address,
                'status' => 200
            ];

        } catch (\Throwable) {
            return [
                'info' => ['Address not found'],
                'status' => 404
            ];
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
            $info = ['Address not found'];
            $status = 404;
        } else if (count($address->users) > 0) {
            $info = ['This address has associated users'];
            $status = 405;
        } else {
            $this->repoAddress->destroy($id);
            $info = ['Address destroyed'];
            $status = 204;
        }

        return compact('info', 'status');
    }
}