<?php

namespace App\Repositories\Customer;

use App\Models\Address;

class AddressRepositoryEloquent implements AddressRepositoryInterface
{
    protected $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    /**
     * Armazena uma nova instância de Address no banco de dados
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @return Address
     */
    public function store($data)
    {
        $this->address->create($data);
        return $this->address;
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
     * @param int|string $id
     * @return Address
     */
    public function get($id)
    {
        return $this->address->find($id);
    }

    /**
     * Atualiza os dados de uma instância de Address
     * @param \Illuminate\Support\Collection|array|int|string $data $data
     * @param int|string $id
     * @return Address
     */
    public function update($data, $id)
    {
        return $this->address->find($id)->update($data);
    }

    /**
     * Remove uma instância de Address do banco de dados
     * @param int|string $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->address->find($id)->delete();
    }
}
