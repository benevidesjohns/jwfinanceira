<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>';
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($data as $transaction_type)
        <transaction_type>
            <id>{{ $transaction_type->id }}</id>
            <type>{{ $transaction_type->type }}</type>
        </transaction_type>
    @endforeach
</urlset>
