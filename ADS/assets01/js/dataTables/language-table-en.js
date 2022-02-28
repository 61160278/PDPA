	$.extend(true, $.fn.dataTable.defaults, {
		"language": {
				  "sProcessing": "On process...",
				  "sLengthMenu": "Display _MENU_ Row",
				  "sEmptyTable": "No records available",
				  "sInfo": "Display _START_ to _END_ of _TOTAL_ row",
				  "sInfoEmpty": "Showing page 0 to 0 of 0 ",
				  "sInfoFiltered": "(Fil _MAX_ Allrow)",
				  "sInfoPostFix": "",
				  "sSearch": "Search:",
				  "sUrl": "",
				  "oPaginate": {
								"sFirst": "Start",
								"sPrevious": "Previous",
								"sNext": "Next",
								"sLast": "End"
				  }
		 }
	});

	$('.table').DataTable();