<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>';
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($data as $account_type)
        <account_type>
            <id>{{ $account_type->id }}</id>
            <type>{{ $account_type->type }}</type>
        </account_type>
    @endforeach
</urlset>
