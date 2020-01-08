// Call the dataTables jQuery plugin
$(document).ready(function () {
  // $('#dataTabelkiri').DataTable();
  // $('#dataTablesku').DataTable({
  //     "scrollX": true,
  //     // // searching:true,
  //     // // paging: true
  //     // "info": false,
  //     // pagingType: "numbers"
  //     // "lengthMenu": [
  //     // 	[10, 25, 50, -1],
  //     // 	[10, 25, 50, "All"]
  //     // ]
  //     "paging": true,
  //     "ordering": true,
  //     // "info": true,
  //     searching: true
  // });
    // $('#dataTableku').DataTable({
    //   "paging": true,
    // });
    $('#dataTableKiri').DataTable({
      "lengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ]
    });
    $('#dataTableku').DataTable({

      "lengthMenu": [
      	[5,10, 25, 50, -1],
      	[5,10, 25, 50, "All"]
      ]
    });
    $('#dataTablemu').DataTable({
      "paging": true,
      searching: false,
      pagingType: "numbers",
      "scrollY": "400px"
      
    });
});
