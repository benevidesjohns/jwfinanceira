$(function () {
    $("#table").DataTable({
        ajax: 'http://localhost/accounts/show-self',
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
                "width": "20%",
                "data": "name",
                "name": "name"
            },
            {
                "width": "43%",
                "data": "type",
                "name": "type"
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
