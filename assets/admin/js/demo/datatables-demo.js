// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTablesku').DataTable({
      scrollX: true,
      // searching:true,
      // paging: true
      pagingType: "numbers",
      // "lengthMenu": [
      // 	[10, 25, 50, -1],
      // 	[10, 25, 50, "All"]
      // ]
  });
});