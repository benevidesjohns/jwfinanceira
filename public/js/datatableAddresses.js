$(function () {
    $("#table").DataTable({
        ajax: 'http://api.local/addresses/show',
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        order: [[0, "ASC"]],
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
        },
        columns: [
            {
                "width": "15%",
                "data": "cep",
                "name": "cep"
            },
            {
                "width": "28%",
                "data": "address",
                "name": "address"
            },
            {
                "width": "20%",
                "data": "city",
                "name": "city"
            },
            {
                "width": "10%",
                "data": "state",
                "name": "state"
            },
            {
                "width": "17%",
                "data": "acao",
                "name": "acao"
            },
        ]
    });
});
