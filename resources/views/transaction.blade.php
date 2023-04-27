<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>';
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($data as $transaction)
        <transaction>
            <id>{{ $transaction->id }}</id>
            <date>{{ $transaction->date }}</date>
            <amount>{{ $transaction->amount }}</amount>
            <message>{{ $transaction->message }}</message>
            <fk_account>{{ $transaction->fk_account }}</fk_account>
            <fk_transaction_type>{{ $transaction->fk_transaction_type }}</fk_transaction_type>
            <account>
                <id>{{ $transaction->account->id }}</id>
                <balance>{{ $transaction->account->balance }}</balance>
                <fk_user>{{ $transaction->account->fk_user }}</fk_user>
                <fk_account_type>{{ $transaction->account->fk_account_type }}</fk_account_type>
            </account>
            <transaction_type>
                <id>{{ $transaction->transactionType->id }}</id>
                <type>{{ $transaction->transactionType->type }}</type>
            </transaction_type>
        </transaction>
    @endforeach
</urlset>
