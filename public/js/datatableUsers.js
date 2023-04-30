$(function () {
    $("#table").DataTable({
        ajax: 'http://api.local/users/show',
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
                // width: "20%",
                data: "name",
                name: "name"
            },
            {
                // width: "30%",
                data: "email",
                name: "email"
            },
            {
                // width: "20%",
                data: "phone_number",
                name: "phone_number"
            },
            {
                // width: "20%",
                data: "cpf",
                name: "cpf"
            },
            {
                // width: "20%",
                data: "acao",
                name: "acao"
            },
        ]
    });
});
