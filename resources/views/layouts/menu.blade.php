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
            <p>Accounts</p>
        </a>
    </li>
@endcan

<!-- Transactions -->
@can(Permission::CAN_READ_SELF_TRANSACTIONS)
    <li class="nav-item">
        <a href="{{ route('transactions') }}" class="nav-link {{ Request::is('transactions') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Transactions</p>
        </a>
    </li>
@endcan

<!-- Gerenciamento -->
@can([Permission::CAN_MANAGE_ACCOUNTS, Permission::CAN_MANAGE_ADDRESSES, Permission::CAN_MANAGE_USERS])
    <li
        class="nav-item {{ Request::is('management/users', 'management/accounts', 'management/addresses') ? 'menu-open' : '' }}">
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
                    <p>Accounts</p>
                </a>
            </li>
            <!-- Addresses -->
            <li class="nav-item">
                <a href="{{ route('management/addresses') }}"
                    class="nav-link {{ Request::is('management/addresses') ? 'active' : '' }}">
                    &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-home"></i>
                    <p>Addresses</p>
                </a>
            </li>
            <!-- Users -->
            <li class="nav-item">
                <a href="{{ route('management/users') }}"
                    class="nav-link {{ Request::is('management/users') ? 'active' : '' }}">
                    &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-list-ol"></i>
                    <p>Users</p>
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
            <p>Types<i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
            <!-- Account Types -->
            <li class="nav-item">
                <a href="{{ route('types/account') }}"
                    class="nav-link {{ Request::is('types/account') ? 'active' : '' }}">
                    &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-home"></i>
                    <p>Account Types</p>
                </a>
            </li>
            <!-- Transaction Types -->
            <li class="nav-item">
                <a href="{{ route('types/transaction') }}"
                    class="nav-link {{ Request::is('types/transaction') ? 'active' : '' }}">
                    &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-home"></i>
                    <p>Transaction Types</p>
                </a>
            </li>
        </ul>
    </li>
@endcan
