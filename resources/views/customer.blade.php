<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>';
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($data as $customer)
        <customer>
            <id>{{ $customer->id }}</id>
            <name>{{ $customer->name }}</name>
            <phone_number>{{ $customer->phone_number }}</phone_number>
            <cpf>{{ $customer->cpf }}</cpf>
            <fk_address>{{ $customer->fk_address }}</fk_address>
        </customer>
    @endforeach
</urlset>