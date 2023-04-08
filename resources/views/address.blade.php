<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>';
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($data as $address)
        <address>
            <id>{{ $address->id }}</id>
            <city>{{ $address->city }}</city>
            <state>{{ $address->state }}</state>
            <cep>{{ $address->cep }}</cep>
            <address>{{ $address->address }}</address>
            <createdat>{{ $address->created_at->tz('UTC')->toAtomString() }}</createdat>
        </address>
    @endforeach
</urlset>
