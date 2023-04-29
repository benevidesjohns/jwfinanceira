<?php

namespace App\Helpers;

class Permission
{
    /*
     * 'Nomenclatura das Permissões':
     *
     * 'SELF': só permite ao usuário executar operações em elementos vinculados ao mesmo
     * 'MANAGE': permite todas as operações (CRUD)
     * 'CREATE': apenas permite criar algum elemento
     * 'READ': permite ler um ou mais elementos (GET, GETLIST)
     */


    // SELF Permissions
    public const CAN_MANAGE_SELF_ACCOUNTS = 'manage self accounts';
    public const CAN_MANAGE_SELF_PROFILE = 'manage self profile';
    public const CAN_CREATE_SELF_TRANSACTION = 'create self transactions';
    public const CAN_READ_SELF_TRANSACTIONS = 'read self transactions';


    // MANAGE Permissions
    public const CAN_MANAGE_ACCOUNTS = 'manage accounts';
    public const CAN_MANAGE_ADDRESSES = 'manage addresses';
    public const CAN_MANAGE_USERS = 'manage users';
    public const CAN_MANAGE_TRANSACTIONS = 'manage transactions';
    public const CAN_MANAGE_TYPES = 'manage types';


    // READ Permissions (GET, GETLIST)
    public const CAN_READ_TYPES = 'read types';


    public const ALL = [
        // SELF Permissions
        Permission::CAN_MANAGE_SELF_ACCOUNTS,
        Permission::CAN_MANAGE_SELF_PROFILE,
        Permission::CAN_CREATE_SELF_TRANSACTION,
        Permission::CAN_READ_SELF_TRANSACTIONS,

        // MANAGE Permissions
        Permission::CAN_MANAGE_ACCOUNTS,
        Permission::CAN_MANAGE_ADDRESSES,
        Permission::CAN_MANAGE_USERS,
        Permission::CAN_MANAGE_TRANSACTIONS,
        Permission::CAN_MANAGE_TYPES,

        // READ Permissions (GET, GETLIST)
        Permission::CAN_READ_TYPES,
    ];

    public const ADMIN = [
        // SELF Permissions
        Permission::CAN_MANAGE_SELF_ACCOUNTS,
        Permission::CAN_MANAGE_SELF_PROFILE,
        Permission::CAN_CREATE_SELF_TRANSACTION,
        Permission::CAN_READ_SELF_TRANSACTIONS,

        // MANAGE Permissions
        Permission::CAN_MANAGE_ACCOUNTS,
        Permission::CAN_MANAGE_ADDRESSES,
        Permission::CAN_MANAGE_USERS,
        Permission::CAN_MANAGE_TRANSACTIONS,
        Permission::CAN_MANAGE_TYPES,

        // READ Permissions (GET, GETLIST)
        Permission::CAN_READ_TYPES,
    ];

    public const CUSTOMER = [
        // SELF Permissions
        Permission::CAN_MANAGE_SELF_ACCOUNTS,
        Permission::CAN_MANAGE_SELF_PROFILE,
        Permission::CAN_CREATE_SELF_TRANSACTION,
        Permission::CAN_READ_SELF_TRANSACTIONS,

        // READ Permissions (GET, GETLIST)
        Permission::CAN_READ_TYPES,
    ];

}
