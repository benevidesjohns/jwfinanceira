<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\AccountType;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\TransactionType;

use App\Repositories\Account\AccountRepositoryEloquent;
use App\Repositories\Account\AccountRepositoryInterface;

use App\Repositories\Account\AccountTypeRepositoryEloquent;
use App\Repositories\Account\AccountTypeRepositoryInterface;

use App\Repositories\Customer\AddressRepositoryEloquent;
use App\Repositories\Customer\AddressRepositoryInterface;

use App\Repositories\Customer\CustomerRepositoryEloquent;
use App\Repositories\Customer\CustomerRepositoryInterface;

use App\Repositories\Transaction\TransactionRepositoryEloquent;
use App\Repositories\Transaction\TransactionRepositoryInterface;

use App\Repositories\Transaction\TransactionTypeRepositoryEloquent;
use App\Repositories\Transaction\TransactionTypeRepositoryInterface;

use Illuminate\Support\ServiceProvider;

/**
 * Summary of AppServiceProvider
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Account
        $this->app->bind(
            AccountRepositoryEloquent::class,
            AccountRepositoryInterface::class
        );
        $this->app->bind(AccountRepositoryInterface::class, function () {
            return new AccountRepositoryEloquent(new Account());
        });

        // AccountType
        $this->app->bind(
            AccountTypeRepositoryEloquent::class,
            AccountTypeRepositoryInterface::class
        );
        $this->app->bind(AccountTypeRepositoryInterface::class, function () {
            return new AccountTypeRepositoryEloquent(new AccountType());
        });

        // Address
        $this->app->bind(
            AddressRepositoryEloquent::class,
            AddressRepositoryInterface::class
        );
        $this->app->bind(AddressRepositoryInterface::class, function () {
            return new AddressRepositoryEloquent(new Address());
        });

        // Customer
        $this->app->bind(
            CustomerRepositoryEloquent::class,
            CustomerRepositoryInterface::class
        );
        $this->app->bind(CustomerRepositoryInterface::class, function () {
            return new CustomerRepositoryEloquent(new Customer());
        });

        // Transaction
        $this->app->bind(
            TransactionRepositoryEloquent::class,
            TransactionRepositoryInterface::class
        );
        $this->app->bind(TransactionRepositoryInterface::class, function () {
            return new TransactionRepositoryEloquent(new Transaction());
        });

        // TransactionType
        $this->app->bind(
            TransactionTypeRepositoryEloquent::class,
            TransactionTypeRepositoryInterface::class
        );
        $this->app->bind(TransactionTypeRepositoryInterface::class, function () {
            return new TransactionTypeRepositoryEloquent(new TransactionType());
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
