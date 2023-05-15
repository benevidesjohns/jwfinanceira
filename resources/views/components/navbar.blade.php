<nav
    class="main-header navbar navbar-expand d-flex flex-wrap align-items-center
     justify-content-center justify-content-md-between navbar-dark bg-dark">
    <!-- Left navbar links -->
    <div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </div>

    <div class="d-flex justify-content-center py-3">
        <h1 class="text-white-50">@yield('navbar', 'Title')</h1>
    </div>

    <div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    {{-- <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                        class="user-image img-circle elevation-2" alt="User Image"> --}}
                    <div class="btn btn-secondary bg-dark p-1">
                        <span class="d-none d-md-inline"> Olá, {{ Auth::user()->name }}</span>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-secondary">
                        {{-- <img src="https://assets.infyom.com/logo/blue_logo_150x150.png" class="img-circle elevation-2"
                            alt="User Image"> --}}
                        <p>
                            {{ Auth::user()->name }}
                            <small>Membro desde {{ Auth::user()->created_at->format('M. Y') }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="../profile/{{ Auth::user()->id }}/edit"
                            class="btn btn-default btn-flat bg-secondary">Perfil</a>
                        <a href="#" class="btn btn-default btn-flat float-right bg-secondary"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sair
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
