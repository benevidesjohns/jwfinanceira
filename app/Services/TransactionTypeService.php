<?php

namespace App\Services;

use App\Repositories\Transaction\TransactionTypeRepositoryInterface;

/**
 * Summary of TransactionTypeService
 */
class TransactionTypeService
{
    private $repoTransactionType;

    /**
     * Construtor da classe TransactionTypeService
     * @param TransactionTypeRepositoryInterface $repoTransactionType
     */
    public function __construct(TransactionTypeRepositoryInterface $repoTransactionType)
    {
        $this->repoTransactionType = $repoTransactionType;
    }

    /**
     * Envia para o TransactionTypeRepository os dados para criar uma nova instância de TransactionType
     * @param array $data
     * @return array|mixed
     */
    public function store($data)
    {
        try {
            // TODO: Tratar os dados da requisição, antes de chamar o repoTransactionType->store
            $transactionType = $this->repoTransactionType->store([
                'type' => $data['type'],
            ]);

            $status = 200;

            return compact('transactionType', 'status');

        } catch (\Throwable) {
            $message = 'Transaction Type not stored';
            $status = 400;

            return compact('message', 'status');
        }
    }

    /**
     * Retorna todas as instâncias de TransactionType do banco de dados
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getList()
    {
        return $this->repoTransactionType->getList();
    }

    /**
     * Retorna uma instância de TransactionType a partir do id informado
     * @param mixed $id
     * @return array
     */
    public function get($id)
    {
        try {
            $transactionType = $this->repoTransactionType->get($id);
            $status = 200;

            throw_if($transactionType == null);

            return compact('transactionType', 'status');

        } catch (\Throwable) {
            $message = 'Transaction Type not found';
            $status = 404;

            return compact('message', 'status');
        }
    }

    /**
     * Atualiza os dados de uma instância de TransactionType
     * @param array $data
     * @param int|string $id
     * @return array|mixed
     */
    public function update($data, $id)
    {
        try {
            // TODO: Tratar os dados da requisição, antes de chamar o repoTransactionType->store
            $keys = [];
            $values = [];
            foreach ($data as $key => $value) {
                array_push($keys, $key);
                array_push($values, $value);
            }

            $processed_data = array_combine($keys, $values);

            $status = 200;

            $this->repoTransactionType->update($processed_data, $id);
            $transactionType = $this->repoTransactionType->get($id);
            $status = 200;

            throw_if($transactionType == null);

            return compact('transactionType', 'status');

        } catch (\Throwable) {
            $message = 'Transaction Type not found';
            $status = 404;

            return compact('message', 'status');
        }
    }
    /**
     * Remove uma instância de TransactionType do banco de dados
     * @param int|string $id
     * @return array
     */
    public function destroy($id)
    {
        $transactionType = $this->repoTransactionType->get($id);

        if ($transactionType == null) {
            $message = 'Address not found';
            $status = 404;
        } else if (count($transactionType->transactions) > 0) {
            $message = 'This Transaction Type has associated transactions';
            $status = 405;
        } else {
            $this->repoTransactionType->destroy($id);
            $message = 'Transaction Type destroyed';
            $status = 204;
        }

        return compact('message', 'status');
    }
}
