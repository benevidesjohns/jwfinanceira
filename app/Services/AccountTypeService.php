<?php

namespace App\Services;

use App\Repositories\Account\AccountTypeRepositoryInterface;

/**
 * Summary of AccountTypeService
 */
class AccountTypeService
{
    private $repoAccountType;

    /**
     * Construtor da classe AccountTypeService
     * @param AccountTypeRepositoryInterface $repoAccountType
     */
    public function __construct(AccountTypeRepositoryInterface $repoAccountType)
    {
        $this->repoAccountType = $repoAccountType;
    }

    /**
     * Envia para o AccountTypeRepository os dados para criar uma nova instância de AccountType
     * @param array $data
     * @return array|mixed
     */
    public function store($data)
    {
        try {
            // TODO: Tratar os dados da requisição, antes de chamar o repoAccountType->store
            $accountType = $this->repoAccountType->store([
                'type' => $data['type'],
            ]);

            return [
                'accountType' => $accountType,
                'status' => 201
            ];

        } catch (\Throwable) {
            return [
                'info' => ['Account Type already exists'],
                'status' => 400,
            ];
        }
    }

    /**
     * Retorna todas as instâncias de AccountType do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->repoAccountType->getList();
    }

    /**
     * Retorna uma instância de AccountType a partir do id informado
     * @param mixed $id
     * @return array
     */
    public function get($id)
    {
        try {
            $accountType = $this->repoAccountType->get($id);

            throw_if($accountType == null);

            return [
                'accountType' => $accountType,
                'status' => 200
            ];

        } catch (\Throwable) {
            return [
                'info' => ['Account Type not found'],
                'status' => 404,
            ];
        }
    }

    /**
     * Atualiza os dados de uma instância de AccountType
     * @param array $data
     * @param int|string $id
     * @return array|mixed
     */
    public function update($data, $id)
    {
        $errors = [];

        try {
            // TODO: Tratar os dados da requisição, antes de chamar o repoAccountType->store
            $keys = [];
            $values = [];
            foreach ($data as $key => $value) {
                array_push($keys, $key);
                array_push($values, $value);
            }

            $processed_data = array_combine($keys, $values);

            $this->repoAccountType->update($processed_data, $id);
            $accountType = $this->repoAccountType->get($id);

            throw_if($accountType == null);

            return [
                'accountType' => $accountType,
                'status' => 200
            ];

        } catch (\Throwable) {
            if ($accountType == null) {
                array_push($errors, 'Account Type not found');
                $status = 404;
            } else {
                array_push($errors, 'Account Type already exists');
                $status = 405;
            }

            return [
                'info' => $errors,
                'status' => $status,
            ];
        }
    }

    /**
     * Remove uma instância de AccountType do banco de dados
     * @param int|string $id
     * @return array
     */
    public function destroy($id)
    {
        $accountType = $this->repoAccountType->get($id);

        if ($accountType == null) {
            $info = ['Account Type not found'];
            $status = 404;
        } else if (count($accountType->accounts) > 0) {
            $info = ['This Account Type has associated accounts'];
            $status = 405;
        } else {
            $this->repoAccountType->destroy($id);
            $info = ['Account Type destroyed'];
            $status = 204;
        }

        return compact('info', 'status');
    }
}
