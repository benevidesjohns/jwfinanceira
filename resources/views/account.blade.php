<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>';
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($data as $account)
        <account>
            <id>{{ $account->id }}</id>
            <balance>{{ $account->balance }}</balance>
            <fk_customer>{{ $account->fk_customer }}</fk_customer>
            <fk_account_type>{{ $account->fk_account_type }}</fk_account_type>
            <customer>
                <id>{{ $account->customer->id }}</id>
                <name>{{ $account->customer->name }}</name>
                <phone_number>{{ $account->customer->phone_number }}</phone_number>
                <cpf>{{ $account->customer->cpf }}</cpf>
                <fk_address>{{ $account->customer->fk_address }}</fk_address>
            </customer>
            <account_type>
                <id>{{ $account->accountType->id }}</id>
                <type>{{ $account->accountType->type }}</type>
            </account_type>
        </account>
    @endforeach
</urlset>
