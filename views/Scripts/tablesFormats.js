$(document).ready(function () {
    $('#maintable').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        responsive: "true",
        dom: 'Bfrtilp',
        buttons:[
            {
                extend: 'excelHtml5',
                text:   '<i class="fas fa-file-excel"></i>',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                text:   '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text:   '<i class="fas fa-print"></i>',
                titleAttr: 'Enviar a impresora',
                className: 'btn btn-info'
            },
        ]
    });
});