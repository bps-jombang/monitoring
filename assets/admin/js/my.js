// $(document).ready(function() {
    const tabel = $(".mytable tr th");
    tabel.addClass("align-middle");
    // setTimeout(function () {
    //     $('#pesan').fadeOut('slow');
    // }, 500);
    // $('.btn btn-md btn-default resetyo').click(function () {
    //     $('.selectpicker').selectpicker('val', 'Mustard');
	// });
	
	
	// const urlupdatebarang = "http://localhost/admin/editmitra/"
    // $('#btn_update').on('click', function () {
    // 	// var idmitra = $('#id_mitra').val();
    // 	var mitra = $('#nama_mitra').val();
    // 	// var nabar = $('#nama_barang2').val();
    // 	// var harga = $('#harga2').val();
    // 	$.ajax({
    // 		type: "POST",
    // 		url: urlupdatebarang,
    // 		dataType: "JSON",
    // 		data: {
	// 			// id_mitra: id_mitra,
    // 			nama_mitra: mitra
    // 		},
    // 		success: function (data) {
    // 			$('[name="edit_idmitra"]').val("");
    // 			$('[name="edit_mitra"]').val(mitra);
    // 			$('#editdata').modal('hide');
    // 			// tampil_data_barang();
    // 		}
    // 	});
    // 	return false;
    // });

	// tombol hapus
	const flashData = $('.flash-data').data('flashdata');
	console.log(flashData);
	if (flashData) {
		swal.fire({
			title: 'Data ',
			text: 'Berhasil '+flashData,
			icon: 'success'
		});
	}

	$('.tombol-hapus').on('click', function(e){
		e.preventDefault();
		const href = $(this).attr('href');
		swal.fire({
			title: 'Apakah anda yakin',
			text: 'data akan dihapus',
			icon:'warning',
			showCancelButton: true,
			confirmButtonColor:'#3085d6',
			cancelButtonColor:'#d33',
			confirmButtonText: 'Ya hapus'
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		})
	});
	

// });