$(document).ready(function () {
    $('#maintable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        responsive: "true",
        "order": [],
        dom: 'Bfrtil',
        buttons:[
            {
                extend: 'excelHtml5',
                text:   '<i class="fas fa-file-excel"></i>',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success btn-sm'
            },
            {
                extend: 'pdfHtml5',
                text:   '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger btn-sm'
            },
        ]
    });
});