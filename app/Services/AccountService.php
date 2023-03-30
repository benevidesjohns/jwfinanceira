<?php

namespace App\Services;

use App\Repositories\Account\AccountRepositoryInterface;
use App\Repositories\Account\AccountTypeRepositoryInterface;
use App\Repositories\Customer\CustomerRepositoryInterface;
use Exception;

/**
 * Summary of AccountService
 */
class AccountService
{
    private $repoAccount, $repoAccountType, $repoCustomer;

    /**
     * Construtor da classe AccountService
     * @param AccountRepositoryInterface $repoAccount
     */
    public function __construct(
        AccountRepositoryInterface $repoAccount,
        AccountTypeRepositoryInterface $repoAccountType,
        CustomerRepositoryInterface $repoCustomer
    ) {
        $this->repoAccount = $repoAccount;
        $this->repoCustomer = $repoCustomer;
        $this->repoAccountType = $repoAccountType;
    }

    /**
     * Envia para o AccountRepository os dados para criar uma nova instância de Account
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        $errors = [];

        try {
            $currentCustomer = $this->repoCustomer->get($data['fk_customer']);
            $currentAccountType = $this->repoAccountType->get($data['fk_account_type']);

            return response(
                json_encode([
                    'account' => $this->repoAccount->store($data),
                    'customer' => $currentCustomer,
                    'account_type' => $currentAccountType,
                ]),
                201
            );

        } catch (\Throwable $th) {
            if ($currentCustomer == null)
                array_push($errors, 'Customer not found');
            if ($currentAccountType == null)
                array_push($errors, 'Account type not found');

            return response(
                json_encode([
                    'msg' => $errors,
                ]),
                404
            );
        }
    }

    /**
     * Retorna todas as instâncias de Account do banco de dados
     * @return array[\App\Models\Account]
     */
    public function getList()
    {
        return $this->repoAccount->getList();
    }

    /**
     * Retorna uma instância de Account a partir do id informado
     * @param mixed $id
     * @return \App\Models\Account
     */
    public function get($id)
    {
        return $this->repoAccount->get($id);
    }

    /**
     * Atualiza os dados de uma instância de Account
     * @param array $data
     * @param mixed $id
     * @return \App\Models\Account
     */
    public function update(array $data, $id)
    {
        return $this->repoAccount->update($data, $id);
    }

    /**
     * Remove uma instância de Account do banco de dados
     * @param mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repoAccount->destroy($id);
    }
}
