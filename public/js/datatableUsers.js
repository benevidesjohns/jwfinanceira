$(function () {
    $("#table").DataTable({
        ajax: 'http://localhost/users/show',
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
                "width": "14%",
                "data": "cpf",
                "name": "cpf"
            },
            {
                "width": "22%",
                "data": "name",
                "name": "name"
            },
            {
                "width": "22%",
                "data": "email",
                "name": "email"
            },
            {
                "width": "15%",
                "data": "phone_number",
                "name": "phone_number"
            },
            {
                "width": "17%",
                "data": "acao",
                "name": "acao"
            },
        ]
    });
});
