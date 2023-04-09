<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>'; ?>';
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($data as $account)
        <account>
            <id>{{ $account->id }}</id>
            <balance>{{ $account->balance }}</balance>
            <type>{{ $account->fk_account_type }}</type>
            <fk_customer>{{ $account->fk_customer }}</fk_customer>
        </account>
    @endforeach
</urlset>
