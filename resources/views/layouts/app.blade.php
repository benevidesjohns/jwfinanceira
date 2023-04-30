<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Header -->
        @include('components.navbar')

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        @include('layouts.footer')

    </div>

    @vite(['resources/js/app.js'])

    @include('layouts.scripts')

    @yield('scripts')

</body>

</html>
