<table class="table table-dark bg-dark table-bordered table-hover" id="table" width="100%">
    <thead>
        <tr>
            @foreach ($columns as $column)
                <th>{{ $column }}</th>
            @endforeach
        </tr>
    </thead>
</table>
