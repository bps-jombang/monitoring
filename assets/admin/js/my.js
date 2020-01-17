// $(document).ready(function() {
	const hapusmitra = "http://localhost/monitoring/hapusmitra";


    const tabel = $(".mytable tr th");
    tabel.addClass("align-middle");
	
	// tombol hapus
	const flashData = $('.flash-data').data('flashdata');
	// console.log(flashData);
	if (flashData) {
		swal.fire({
			title: 'Data ',
			text: 'Berhasil '+flashData,
			icon: 'success'
		});
	}
	
	// Hapus mitra
	$('.tombol-hapus').on('click', function(e){
		e.preventDefault();
		const userid = $(this).attr('id');

		swal.fire({
			title	: 	'Apakah anda yakin',
			text	: 	'Data ini akan dihapus',
			icon	:	'warning',
			showCancelButton	: true,
			confirmButtonColor	:'#3085d6',
			cancelButtonColor	:'#d33',
			confirmButtonText	: 'Ya hapus'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: hapusmitra+'/'+userid,
					success: function (data) {
						document.location.reload();
					}
				});  
			}
		})
	});
	

// });