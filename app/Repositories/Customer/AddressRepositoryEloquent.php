<?php

namespace App\Repositories\Customer;

use \Illuminate\Database\Eloquent\Model;

class AddressRepositoryEloquent implements AddressRepositoryInterface
{
    protected $address;

    /**
     * Construtor da classe AddressRepositoryInterface
     * @param $address
     */
    public function __construct(Model $address)
    {
        $this->address = $address;
    }

    /**
     * Armazena uma nova instância de Address no banco de dados
     * @param array $data
     * @return \App\Models\Address
     */
    public function store(array $data)
    {
        return $this->address->create($data);
    }

    /**
     * Retorna todas as instâncias de Address do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->address->all();
    }

    /**
     * Retorna uma instância de Address a partir do id informado
     * @param mixed $id
     * @return \App\Models\Address
     */
    public function get($id)
    {
        return $this->address->find($id);
    }

    /**
     * Atualiza os dados de uma instância de Address
     * @param array $data
     * @param mixed $id
     * @return \App\Models\Address
     */
    public function update(array $data, $id)
    {
        $currentAddress = $this->address->find($id);
        $currentAddress->update($data);
        return $currentAddress;
    }

    /**
     * Remove uma instância de Address do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->address->find($id)->delete();
    }
}
