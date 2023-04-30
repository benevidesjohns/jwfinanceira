<div class="card">
    <div class="card-header d-flex align-items-center">
        <h4 class="mb-0">Lista de {{ $title }}</h4>
        <a href="" class="btn btn-dark ml-auto">Criar {{ $title }}</a>
    </div>
    <div class="card-body">
        @include('components.datatable')
    </div>
</div>
