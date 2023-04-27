<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>';
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($data as $user)
        <user>
            <id>{{ $user->id }}</id>
            <name>{{ $user->name }}</name>
            <phone_number>{{ $user->phone_number }}</phone_number>
            <cpf>{{ $user->cpf }}</cpf>
            <fk_address>{{ $user->fk_address }}</fk_address>
            <address>
                <id>{{ $user->address->id }}</id>
                <city>{{ $user->address->city }}</city>
                <state>{{ $user->address->state }}</state>
                <cep>{{ $user->address->cep }}</cep>
                <address>{{ $user->address->address }}</address>
            </address>
        </user>
    @endforeach
</urlset>
