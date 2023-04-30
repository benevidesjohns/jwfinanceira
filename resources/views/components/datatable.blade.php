<table class="table table-secondary table-striped table-bordered table-hover" id="table" width="100%">
    <thead>
        <tr>
            @foreach ($columns as $column)
                <th>{{ $column }}</th>
            @endforeach
        </tr>
    </thead>
</table>
