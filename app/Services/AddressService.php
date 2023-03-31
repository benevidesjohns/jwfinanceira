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
     * @return array[\App\Models\Address]
     */
    public function getList()
    {
        return $this->repoAddress->getList();
    }

    /**
     * Retorna uma instância de Address a partir do id informado
     * @param mixed $id
     * @return \App\Models\Address
     */
    public function get($id)
    {
        return $this->repoAddress->get($id);
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
