<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;

/**
 * Summary of UserService
 */
class UserService
{
    private $repoUser;

    /**
     * Construtor da classe UserService
     * @param UserRepositoryInterface $repoUser
     */
    public function __construct(UserRepositoryInterface $repoUser)
    {
        $this->repoUser = $repoUser;
    }

    /**
     * Envia para o UserRepository os dados para criar uma nova instância de User
     * @param array $data
     * @return array|mixed
     */
    public function store($data)
    {
        $errors = [];

        try {
            // Busca o endereço passado no banco de dados
            $currentAddress = $this->repoUser->get($data['fk_address']);

            // Dispara uma exceção caso o endereço passado seja nulo
            throw_if($currentAddress == null);

            // TODO: Tratar os dados da requisição, antes de chamar o repoUser->store
            $user = $this->repoUser->store($data);
            $user->address;

            return [
                'user' => $user,
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
     * Retorna todas as instâncias de User do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->repoUser->getList();
    }

    /**
     * Retorna uma instância de User a partir do id informado
     * @param int|string $id
     * @return array
     */
    public function get($id)
    {
        try {
            $user = $this->repoUser->get($id);
            $user->address;

            throw_if($user == null);

            return [
                'user' => $user,
                'status' => 200
            ];

        } catch (\Throwable) {
            return [
                'info' => ['User not found'],
                'status' => 404
            ];
        }
    }

    /**
     * Atualiza os dados de uma instância de User
     * @param array $data
     * @param int|string $id
     * @return array|mixed
     */
    public function update($data, $id)
    {
        try {
            // TODO: Tratar os dados da requisição, antes de chamar o repoUser->store
            $keys = [];
            $values = [];
            foreach ($data as $key => $value) {
                array_push($keys, $key);
                array_push($values, $value);
            }

            $processed_data = array_combine($keys, $values);

            $this->repoUser->update($processed_data, $id);
            $user = $this->repoUser->get($id);

            throw_if($user == null);

            return [
                'user' => $user,
                'status' => 200
            ];

        } catch (\Throwable) {
            return [
                'info' => ['User not found'],
                'status' => 404
            ];
        }
    }

    /**
     * Remove uma instância de User do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        $user = $this->repoUser->get($id);

        if ($user == null) {
            $info = ['User not found'];
            $status = 404;
        } else if (count($user->accounts) > 0) {
            $info = ['This user has associated account'];
            $status = 405;
        } else {
            $this->repoUser->destroy($id);
            $info = ['User destroyed'];
            $status = 204;
        }

        return compact('info', 'status');
    }

    public function verifyAssociation($user, $accounts)
    {
        $user_id = $user['id'];
        $is_disabled = '';

        $is_associated_account = array_filter($accounts, function ($account) use ($user_id) {
            return $account['fk_user'] == $user_id;
        });

        if ($is_associated_account) {
            $is_disabled = 'btn-secondary disabled';
        }

        return $is_disabled;
    }
}
