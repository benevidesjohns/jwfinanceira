<?php

namespace App\Repositories\Customer;

use App\Models\Address;

interface AddressRepositoryInterface
{
    public function __construct(Address $address);

    /**
     * Armazena uma nova instância de Address no banco de dados
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @return Address
     */
    public function store($data);

    /**
     * Retorna todas as instâncias de Address do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList();

    /**
     * Retorna uma instância de Address a partir do id informado
     * @param int|string $id
     * @return Address
     */
    public function get($id);

    /**
     * Atualiza os dados de uma instância de Address
     * @param \Illuminate\Support\Collection|array|int|string $data $data
     * @param int|string $id
     * @return Address
     */
    public function update($data, $id);

    /**
     * Remove uma instância de Address do banco de dados
     * @param int|string $id
     * @return int
     */
    public function destroy($id);
}
