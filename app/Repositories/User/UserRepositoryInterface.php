<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function __construct(User $user);

    /**
     * Armazena uma nova instância de User no banco de dados
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @return User
     */
    public function store($data);

    /**
     * Retorna todas as instâncias de User do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList();

    /**
     * Retorna uma instância de User a partir do id informado
     * @param int|string $id
     * @return User
     */
    public function get($id);

    /**
     * Atualiza os dados de uma instância de User
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @param int|string $id
     * @return User
     */
    public function update($data, $id);

    /**
     * Remove uma instância de User do banco de dados
     * @param int|string $id
     * @return int
     */
    public function destroy($id);
}
