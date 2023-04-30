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
        columns: [
            {
                // width: "30%",
                data: "id",
                name: "id"
            },
            {
                // width: "20%",
                data: "city",
                name: "city"
            },
            {
                // width: "30%",
                data: "state",
                name: "state"
            },
            {
                // width: "30%",
                data: "cep",
                name: "cep"
            },
            {
                // width: "20%",
                data: "address",
                name: "address"
            },
            {
                // width: "20%",
                data: "acao",
                name: "acao"
            },
        ]
    });
});
