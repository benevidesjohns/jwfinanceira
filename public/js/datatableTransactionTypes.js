$(function () {
    $("#table").DataTable({
        ajax: 'http://api.local/types/transactions/show',
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        order: [[1, "ASC"]],
        columns: [
            {
                // width: "30%",
                data: "id",
                name: "id"
            },
            {
                // width: "30%",
                data: "type",
                name: "type"
            },
            {
                // width: "20%",
                data: "acao",
                name: "acao"
            },
        ]
    });
});
