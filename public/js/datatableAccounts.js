$(function () {
    $("#table").DataTable({
        ajax: 'http://api.local/accounts/show',
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        order: [[1, "ASC"]],
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
        },
        columns: [
            {
                "width": "10%",
                "data": "account_number",
                "name": "account_number"
            },
            {
                "width": "29%",
                "data": "type",
                "name": "type"
            },
            {
                "width": "34%",
                "data": "name",
                "name": "name"
            },
            {
                "width": "10%",
                "data": "balance",
                "name": "balance"
            },
            {
                "width": "17%",
                "data": "acao",
                "name": "acao"
            },
        ]
    });
});
