<!-- Home -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<!-- Accounts -->
<li class="nav-item">
    <a href="{{ route('accounts') }}" class="nav-link {{ Request::is('accounts') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Accounts</p>
    </a>
</li>

<!-- Account Types -->
<li class="nav-item">
    <a href="{{ route('account_types') }}" class="nav-link {{ Request::is('account_types') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Account Types</p>
    </a>
</li>

<!-- Addresses -->
<li class="nav-item">
    <a href="{{ route('addresses') }}" class="nav-link {{ Request::is('addresses') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Addresses</p>
    </a>
</li>

<!-- Transactions -->
<li class="nav-item">
    <a href="{{ route('transactions') }}" class="nav-link {{ Request::is('transactions') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Transactions</p>
    </a>
</li>

<!-- Transaction Types -->
<li class="nav-item">
    <a href="{{ route('transaction_types') }}" class="nav-link {{ Request::is('transaction_types') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Transaction Types</p>
    </a>
</li>

<!-- Users -->
<li class="nav-item">
    <a href="{{ route('users') }}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Users</p>
    </a>
</li>
