$(function () {

	var table = $('#tbList').DataTable({
		"dom": 'Bfrtip',
		"buttons": [
			{ 
				extend: 'print',
				text: '<i class="fa fa-print"></i> Imprimir',
				titleAttr: 'Imprimir',
				className: 'btn btn-default',
				key: '1',
                messageTop: null,
                messageBottom: function () {
                    return 'Impresso por Cakephp-App';
                },
                footer: true,
                autoPrint: true,
                exportOptions: {
                    columns: ':visible'
                }
			},
			{ 
				extend: 'copyHtml5',
				text: '<i class="fa fa-files-o"></i> Copiar',
				titleAttr: 'Copiar',
				className: 'btn btn-default',
				key: '2',
                footer: true,
                exportOptions: {
                    columns: ':visible'
                }
			},
			{ 
				extend: 'excelHtml5',
				text: '<i class="fa fa-file-excel-o"></i> Excel',
				titleAttr: 'Exportar para Excel',
				className: 'btn btn-default',
				key: '3',
				footer: false,
				autoFilter: true,
                exportOptions: {
                    columns: ':visible'
                }
			},
			{ 
				extend: 'csvHtml5',
				text: '<i class="fa fa-file-text-o"></i> CSV',
				titleAttr: 'Exportar para CSV',
				className: 'btn btn-default',
				key: '4',
				footer: false,
                exportOptions: {
                    columns: ':visible'
                }
			},
			{ 
				extend: 'pdfHtml5',
				text: '<i class="fa fa-file-pdf-o"></i> PDF',
				titleAttr: 'Exportar para PDF',
				className: 'btn btn-default',
				key: '5',
				footer: true,
                orientation: 'portrait', // landscape
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
			},
			{ 
                text: 'JSON',
				titleAttr: 'Exportar para JSON',
                action: function ( e, dt, button, config ) {
                    var data = dt.buttons.exportData();
 
                    $.fn.dataTable.fileSave(
                        new Blob( [ JSON.stringify( data ) ] ),
                        'Export.json'
                    );
                },
				className: 'btn btn-default',
				key: '6'
			},
			{
                extend: 'colvis',
                collectionTitle: 'Colunas visíveis',
                autoClose: false,
				text: '<i class="fa fa-columns"></i>',
				titleAttr: 'Colunas visíveis',
				className: 'btn btn-default',
				key: '7'
			}
		],	
		"paging": true,
		"lengthChange": true,
		"pageLength": 50,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": true,
		"select": true,
		"stateSave": true,
		"language": {
			"url": "/js/datatable/i18n/Portuguese-Brasil.json"

		},
		"columnDefs": {
			"targets": -1,
			"visible": false
		}
	});
	
});