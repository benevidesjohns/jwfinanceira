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

            $status = 200;

            return compact('accountType', 'status');

        } catch (\Throwable) {
            $message = 'Account Type not stored';
            $status = 400;

            return compact('message', 'status');
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
            $status = 200;

            throw_if($accountType == null);

            return compact('accountType', 'status');

        } catch (\Throwable) {
            $message = 'Account Type not found';
            $status = 404;

            return compact('message', 'status');
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
        try {

            // TODO: Tratar os dados da requisição, antes de chamar o repoAccountType->store
            $keys = [];
            $values = [];
            foreach ($data as $key => $value) {
                array_push($keys, $key);
                array_push($values, $value);
            }

            $processed_data = array_combine($keys, $values);

            $status = 200;

            $this->repoAccountType->update($processed_data, $id);
            $accountType = $this->repoAccountType->get($id);
            $status = 200;

            throw_if($accountType == null);

            return compact('accountType', 'status');

        } catch (\Throwable) {
            $message = 'Account Type not found';
            $status = 404;

            return compact('message', 'status');
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
            $message = 'Account Type not found';
            $status = 404;
        } else if (count($accountType->accounts) > 0) {
            $message = 'This Account Type has associated accounts';
            $status = 405;
        } else {
            $this->repoAccountType->destroy($id);
            $message = 'Account Type destroyed';
            $status = 204;
        }

        return compact('message', 'status');
    }
}
