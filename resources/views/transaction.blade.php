<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>';
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($data as $transaction)
        <transaction>
            <id>{{ $transaction->id }}</id>
            <value>{{ $transaction->value }}</value>
            <date>{{ $transaction->date->tz('UTC')->toAtomString() }}</date>
            <message>{{ $transaction->message }}</message>
            <fk_transaction_type>{{ $transaction->fk_transaction_type }}</fk_transaction_type>
            <fk_account>{{ $transaction->fk_account }}</fk_account>
        </transaction>
    @endforeach
</urlset>
