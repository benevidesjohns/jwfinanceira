<?php

namespace App\Helpers;

class Permission
{
    public const CAN_CREATE_ACCOUNT = 'create account';
    public const CAN_EDIT_ACCOUNT = 'edit account';
    public const CAN_LIST_ACCOUNTS = 'list accounts';
    public const CAN_DELETE_ACCOUNT = 'delete account';

    public const CAN_CREATE_ACCOUNT_TYPE = 'create account type';
    public const CAN_EDIT_ACCOUNT_TYPE = 'edit account type';
    public const CAN_LIST_ACCOUNT_TYPES = 'list account types';
    public const CAN_DELETE_ACCOUNT_TYPE = 'delete account type';

    public const CAN_CREATE_TRANSACTION = 'create transaction';
    public const CAN_EDIT_TRANSACTION = 'edit transaction';
    public const CAN_LIST_TRANSACTIONS = 'list transactions';
    public const CAN_LIST_ALL_TRANSACTIONS = 'list all transactions';
    public const CAN_DELETE_TRANSACTION = 'delete transaction';

    public const CAN_CREATE_TRANSACTION_TYPE = 'create transaction type';
    public const CAN_EDIT_TRANSACTION_TYPE = 'edit transaction type';
    public const CAN_LIST_TRANSACTION_TYPES = 'list transaction types';
    public const CAN_DELETE_TRANSACTION_TYPE = 'delete transaction type';

    public const CAN_CREATE_USER = 'create user';
    public const CAN_EDIT_USER = 'edit user';
    public const CAN_LIST_USERS = 'list users';
    public const CAN_DELETE_USER = 'delete user';

    public const ALL = [
        Permission::CAN_CREATE_ACCOUNT,
        Permission::CAN_EDIT_ACCOUNT,
        Permission::CAN_LIST_ACCOUNTS,
        Permission::CAN_DELETE_ACCOUNT,
        Permission::CAN_CREATE_ACCOUNT_TYPE,
        Permission::CAN_EDIT_ACCOUNT_TYPE,
        Permission::CAN_LIST_ACCOUNT_TYPES,
        Permission::CAN_DELETE_ACCOUNT_TYPE,
        Permission::CAN_CREATE_TRANSACTION,
        Permission::CAN_EDIT_TRANSACTION,
        Permission::CAN_LIST_TRANSACTIONS,
        Permission::CAN_LIST_ALL_TRANSACTIONS,
        Permission::CAN_DELETE_TRANSACTION,
        Permission::CAN_CREATE_TRANSACTION_TYPE,
        Permission::CAN_EDIT_TRANSACTION_TYPE,
        Permission::CAN_LIST_TRANSACTION_TYPES,
        Permission::CAN_DELETE_TRANSACTION_TYPE,
        Permission::CAN_CREATE_USER,
        Permission::CAN_EDIT_USER,
        Permission::CAN_LIST_USERS,
        Permission::CAN_DELETE_USER,
    ];

    public const ADMIN = [
        Permission::CAN_CREATE_ACCOUNT,
        Permission::CAN_EDIT_ACCOUNT,
        Permission::CAN_LIST_ACCOUNTS,
        Permission::CAN_DELETE_ACCOUNT,
        Permission::CAN_CREATE_ACCOUNT_TYPE,
        Permission::CAN_EDIT_ACCOUNT_TYPE,
        Permission::CAN_LIST_ACCOUNT_TYPES,
        Permission::CAN_DELETE_ACCOUNT_TYPE,
        Permission::CAN_LIST_TRANSACTIONS,
        Permission::CAN_LIST_ALL_TRANSACTIONS,
        Permission::CAN_DELETE_TRANSACTION,
        Permission::CAN_CREATE_TRANSACTION_TYPE,
        Permission::CAN_EDIT_TRANSACTION_TYPE,
        Permission::CAN_LIST_TRANSACTION_TYPES,
        Permission::CAN_DELETE_TRANSACTION_TYPE,
        Permission::CAN_CREATE_USER,
        Permission::CAN_EDIT_USER,
        Permission::CAN_LIST_USERS,
        Permission::CAN_DELETE_USER,
    ];

    public const CUSTOMER = [
        Permission::CAN_CREATE_ACCOUNT,
        Permission::CAN_EDIT_ACCOUNT,
        Permission::CAN_DELETE_ACCOUNT,
        Permission::CAN_CREATE_TRANSACTION,
        Permission::CAN_EDIT_TRANSACTION,
        Permission::CAN_LIST_TRANSACTIONS,
        Permission::CAN_EDIT_USER,
        Permission::CAN_DELETE_USER,
    ];

}
