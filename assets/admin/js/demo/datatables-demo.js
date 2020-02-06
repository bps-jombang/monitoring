// Call the dataTables jQuery plugin
$(document).ready(function () {

    $('#dtablemitra').DataTable({
    	"lengthMenu": [
    		[5, 10, 25, 50, -1],
    		[5, 10, 25, 50, "All"]
    	]
    });
    $('#dataTableKegiatan').DataTable({
      "lengthMenu": [
      	[5,10, 25, 50, -1],
      	[5,10, 25, 50, "All"]
      ]
    });
    $('#dataTableTes').DataTable({
    	"lengthMenu": [
    		[5, 10, 25, 50, -1],
    		[5, 10, 25, 50, "All"]
    	],
    	dom: 'Bfrtip',
    	buttons: {
    		buttons: [{
    			extend: 'excel',
    			className: 'excelButton'
    		}]
    	},
    });
});
