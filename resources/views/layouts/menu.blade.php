@php
    use App\Helpers\Permission;
@endphp

<!-- Home -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<!-- Accounts -->
@can(Permission::CAN_MANAGE_SELF_ACCOUNTS)
    <li class="nav-item">
        <a href="{{ route('accounts') }}" class="nav-link {{ Request::is('accounts') ? 'active' : '' }}">
            <i class="nav-icon fas fa-calendar-check"></i>
            <p>Minhas contas</p>
        </a>
    </li>
@endcan

<!-- Transactions -->
@can(Permission::CAN_READ_SELF_TRANSACTIONS)
    <li class="nav-item">
        <a href="{{ route('transactions') }}" class="nav-link {{ Request::is('transactions') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Minhas Transações</p>
        </a>
    </li>
@endcan

<!-- Gerenciamento -->
@can([Permission::CAN_MANAGE_ACCOUNTS, Permission::CAN_MANAGE_ADDRESSES, Permission::CAN_MANAGE_USERS,
    Permission::CAN_MANAGE_TRANSACTIONS])
    <li
        class="nav-item {{ Request::is('management/users', 'management/accounts', 'management/addresses', 'management/transactions') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-hands-helping"></i>
            <p>
                Gerenciamento
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <!-- Accounts -->
            <li class="nav-item">
                <a href="{{ route('management/accounts') }}"
                    class="nav-link {{ Request::is('management/accounts') ? 'active' : '' }}">
                    &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-calendar-check"></i>
                    <p>Contas</p>
                </a>
            </li>
            <!-- Addresses -->
            <li class="nav-item">
                <a href="{{ route('management/addresses') }}"
                    class="nav-link {{ Request::is('management/addresses') ? 'active' : '' }}">
                    &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-home"></i>
                    <p>Endereços</p>
                </a>
            </li>
            <!-- Users -->
            <li class="nav-item">
                <a href="{{ route('management/users') }}"
                    class="nav-link {{ Request::is('management/users') ? 'active' : '' }}">
                    &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-list-ol"></i>
                    <p>Usuários</p>
                </a>
            </li>
            <!-- Transactions -->
            <li class="nav-item">
                <a href="{{ route('management/transactions') }}" class="nav-link {{ Request::is('management/transactions') ? 'active' : '' }}">
                    &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-home"></i>
                    <p>Transações</p>
                </a>
            </li>
        </ul>
    </li>
@endcan

<!-- Types -->
@can(Permission::CAN_MANAGE_TYPES)
    <li class="nav-item {{ Request::is('types/account', 'types/transaction') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-hands-helping"></i>
            <p>Tipos<i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
            <!-- Account Types -->
            <li class="nav-item">
                <a href="{{ route('types/account') }}"
                    class="nav-link {{ Request::is('types/account') ? 'active' : '' }}">
                    &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-home"></i>
                    <p>Tipos de conta</p>
                </a>
            </li>
            <!-- Transaction Types -->
            <li class="nav-item">
                <a href="{{ route('types/transaction') }}"
                    class="nav-link {{ Request::is('types/transaction') ? 'active' : '' }}">
                    &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-home"></i>
                    <p>Tipos de transação</p>
                </a>
            </li>
        </ul>
    </li>
@endcan
