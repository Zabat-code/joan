window.onload =  function() {
    $('#forms-table').DataTable({
        processing: true,
        serverSide: true,
        // Usa la clase de DataTables para Tailwind
        dom: 'lfrtip',
        ajax: BASE_URL+"/forms/list",
        columns: [
            {data: 'id_document_header', name: 'id_document_header'},
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'state', name: 'state'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        initComplete: function () {
            // Añadir clases Tailwind a la tabla y controles generados por DataTables
            const table = $('#forms-table');
            table.addClass('min-w-full divide-y divide-gray-200');
            table.find('thead th').addClass('px-4 py-3 text-left text-sm font-medium text-gray-700');

            // Estilizar input de búsqueda y select de longitud
            const filter = $('#forms-table_filter');
            filter.addClass('mb-4');
            filter.find('label').addClass('flex items-center space-x-2');
            filter.find('input').addClass('border border-gray-300 rounded px-2 py-1 text-sm');

            const length = $('#forms-table_length');
            length.find('select').addClass('border border-gray-300 rounded px-2 py-1 text-sm');

            // Estilizar paginación e info
            const paginate = $('#forms-table_paginate');
            paginate.addClass('flex items-center space-x-1');
            paginate.find('.paginate_button').addClass('px-3 py-1 border rounded bg-white text-gray-700');

            $('#forms-table_info').addClass('text-sm text-gray-600');

            // Contenedor general de DataTables
            const wrapper = table.closest('.dataTables_wrapper');
            wrapper.addClass('space-y-4');

            // Estilizar processing overlay
            wrapper.find('.dataTables_processing').addClass('bg-white border rounded px-4 py-2 shadow text-sm text-gray-700');

            // Filas: aplicar alternado suave
            table.find('tbody tr').each(function (i) {
                $(this).removeClass('bg-white bg-emerald-50');
                if (i % 2 === 0) {
                    $(this).addClass('bg-white');
                } else {
                    $(this).addClass('bg-emerald-50');
                }
                $(this).find('td').addClass('px-4 py-2 text-sm text-gray-700');
            });

            // Paginación: destacar página activa y botones
            paginate.find('a').removeClass('bg-emerald-600 text-white border-gray-300');
            paginate.find('a').addClass('px-3 py-1 border rounded bg-white text-gray-700');
            paginate.find('.paginate_button.current, .paginate_button.active').each(function () {
                $(this).removeClass('bg-white text-gray-700');
                $(this).addClass('bg-emerald-600 text-white border-emerald-600');
            });
        },
        language: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
  };
