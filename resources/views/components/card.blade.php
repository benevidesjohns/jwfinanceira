<div class="card">
    <div class="card-header d-flex align-items-center">
        <h4 class="mb-0">Lista de {{ $title }}</h4>
        @if ($route_create != 'transactions/create/')
            <a href="{{ $route_create }}" class="btn btn-secondary ml-auto">
                <i class="fas fa-solid fa-plus"></i>
                Criar {{ $title }}
            </a>
        @endif
    </div>
    @if ($association)
        <span class="card-header"><strong>*</strong> Botão desabilitado para <strong>{{ $title }}</strong>
            com
            <strong>{{ $association }}</strong>
            associadas </span>
    @endif
    <div class="card-body">
        @include('components.datatable')
    </div>
</div>
