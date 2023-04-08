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
     * @return \App\Models\Address
     */
    public function store(array $data)
    {
        return $this->repoAddress->store($data);
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
     * @param mixed $id
     * @return array
     */
    public function get($id)
    {
        try {
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
     * Atualiza os dados de uma instância de Address
     * @param array $data
     * @param mixed $id
     * @return \App\Models\Address
     */
    public function update(array $data, $id)
    {
        return $this->repoAddress->update($data, $id);
    }

    /**
     * Remove uma instância de Address do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repoAddress->destroy($id);
    }
}
