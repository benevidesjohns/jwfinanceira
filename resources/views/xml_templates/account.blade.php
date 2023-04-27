<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>';
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($data as $account)
        <account>
            <id>{{ $account->id }}</id>
            <balance>{{ $account->balance }}</balance>
            <fk_user>{{ $account->fk_user }}</fk_user>
            <fk_account_type>{{ $account->fk_account_type }}</fk_account_type>
            <user>
                <id>{{ $account->user->id }}</id>
                <name>{{ $account->user->name }}</name>
                <phone_number>{{ $account->user->phone_number }}</phone_number>
                <cpf>{{ $account->user->cpf }}</cpf>
                <fk_address>{{ $account->user->fk_address }}</fk_address>
            </user>
            <account_type>
                <id>{{ $account->accountType->id }}</id>
                <type>{{ $account->accountType->type }}</type>
            </account_type>
        </account>
    @endforeach
</urlset>
