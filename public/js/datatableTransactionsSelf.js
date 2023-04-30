$(function () {
    $("#table").DataTable({
        ajax: 'http://api.local/transactions/show-self',
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        order: [[4, "ASC"]],
        columns: [
            {
                // width: "30%",
                data: "id",
                name: "id"
            },
            {
                // width: "20%",
                data: "account",
                name: "account"
            },
            {
                // width: "30%",
                data: "amount",
                name: "amount"
            },
            {
                // width: "20%",
                data: "type",
                name: "type"
            },
            {
                // width: "20%",
                data: "date",
                name: "date"
            },
            {
                // width: "20%",
                data: "acao",
                name: "acao"
            },
        ]
    });
});
