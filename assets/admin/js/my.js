$(document).ready(function() {
    const tabel = $(".mytable tr th");
    tabel.addClass("align-middle");
    // setTimeout(function () {
    //     $('#pesan').fadeOut('slow');
    // }, 500);
    $('.btn btn-md btn-default resetyo').click(function () {
        $('.selectpicker').selectpicker('val', 'Mustard');
	});
	
	
	const urlupdatebarang = "http://localhost/admin/editmitra/"
    $('#btn_update').on('click', function () {
    	// var idmitra = $('#id_mitra').val();
    	var mitra = $('#nama_mitra').val();
    	// var nabar = $('#nama_barang2').val();
    	// var harga = $('#harga2').val();
    	$.ajax({
    		type: "POST",
    		url: urlupdatebarang,
    		dataType: "JSON",
    		data: {
				// id_mitra: id_mitra,
    			nama_mitra: mitra
    		},
    		success: function (data) {
    			$('[name="edit_idmitra"]').val("");
    			$('[name="edit_mitra"]').val(mitra);
    			$('#editdata').modal('hide');
    			// tampil_data_barang();
    		}
    	});
    	return false;
    });



});