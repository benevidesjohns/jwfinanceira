<?php

namespace App\Services;

use App\Repositories\Account\AccountRepositoryInterface;
use App\Repositories\Account\AccountTypeRepositoryInterface;
use App\Repositories\Customer\CustomerRepositoryInterface;


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
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @return array
     */
    public function store($data)
    {
        $errors = [];

        try {
            // TODO: Tratar os dados da requisição, antes de chamar o repoAccount->store
            $currentCustomer = $this->repoCustomer->get($data['fk_customer']);
            $currentAccountType = $this->repoAccountType->get($data['fk_account_type']);

            return [
                'data' => [
                    'account' => $this->repoAccount->store($data),
                    'customer' => $currentCustomer,
                    'account_type' => $currentAccountType,
                ],
                'status' => 201
            ];

        } catch (\Throwable) {
            if ($currentCustomer == null)
                array_push($errors, 'Customer not found');
            if ($currentAccountType == null)
                array_push($errors, 'Account type not found');

            return [
                'message' => $errors,
                'status' => 404
            ];
        }
    }

    /**
     * Retorna todas as instâncias de Account do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->repoAccount->getList();
    }

    /**
     * Retorna uma instância de Account a partir do id informado
     * @param int|string $id
     * @return array
     */
    public function get($id)
    {
        try {
            $account = $this->repoAccount->get($id);
            $account->accountType;
            $account->customer;
            $status = 200;

            throw_if($account == null);

            return compact('account', 'status');

        } catch (\Throwable) {
            return [
                'message' => 'Account not found',
                'status' => 404
            ];
        }
    }

    /**
     * Atualiza os dados de uma instância de Account
     * @param \Illuminate\Support\Collection|array|int|string $data
     * @param int|string $id
     * @return array
     */
    public function update($data, $id)
    {
        try {
            // TODO: Tratar os dados da requisição, antes de chamar o repoAccount->update
            $keys = [];
            $values = [];
            foreach ($data as $key => $value) {
                array_push($keys, $key);
                array_push($values, $value);
            }

            $processed_data = array_combine($keys, $values);

            $status = 200;

            $this->repoAccount->update($processed_data, $id);
            $account = $this->repoAccount->get($id);
            $status = 200;

            throw_if($account == null);

            return compact('account', 'status');

        } catch (\Throwable) {
            return [
                'message' => 'Account not found',
                'status' => 404
            ];
        }
    }

    /**
     * Remove uma instância de Account do banco de dados
     * @param int|string $id
     * @return array
     */
    public function destroy($id)
    {
        $account = $this->repoAccount->get($id);

        if ($account == null) {
            $message = 'Account not found';
            $status = 404;
        } else if (count($account->transactions) > 0) {
            $message = 'This account has associated transactions';
            $status = 405;
        } else {
            $this->repoAccount->destroy($id);
            $message = 'Account destroyed';
            $status = 204;
        }

        return compact('message', 'status');
    }
}
