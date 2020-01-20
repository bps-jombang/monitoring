// $(document).ready(function() {
	const hapusadmin 	= "http://localhost/monitoring/hapusadmin";// DONE
	const hapusmitra 	= "http://localhost/monitoring/hapusmitra"; // DONE
	const hapusseksi 	= "http://localhost/monitoring/hapusseksi";// DONE
	const hapususer 	= "http://localhost/monitoring/hapususer";// DONE
	const hapusjabatan = "http://localhost/monitoring/hapusjabatan"; // DONE
	const hapuspejabat = "http://localhost/monitoring/hapuspejabat"; // DONE
	
	// hapus kegiatan 
	const hapuskegiatan 		= "http://localhost/monitoring/hapuskegiatan";
	const hapuskegiatandetail 	= "http://localhost/monitoring/hapuskegiatandetail";

    const tabel = $(".mytable tr th");
    tabel.addClass("align-middle");
	
	// ALERT TAMBAH & UPDATE DATA
	const flashData = $('.flash-data').data('flashdata');
	// console.log(flashData);
	if (flashData) {
		swal.fire({
			title: 'Data ',
			text: 'Berhasil '+flashData,
			icon: 'success'
		});
	}
	
// ALERT HAPUS DATA
	// Hapus Mitra
	$('.tombol-hapus-mitra').on('click', function(e){
		e.preventDefault();
		const mitraid = $(this).attr('id');

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
					url: hapusmitra+'/'+mitraid,
					success: function (data) {
						document.location.reload();
					}
				});  
			}
		})
	});
	// Hapus Admin
	$('.tombol-hapus-admin').on('click', function(e){
		e.preventDefault();
		const adminid = $(this).attr('id');

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
					url: hapusadmin+'/'+adminid,
					success: function (data) {
						document.location.reload();
					}
				});  
			}
		})
	});
	// Hapus Seksi
	$('.tombol-hapus-seksi').on('click', function(e){
		e.preventDefault();
		const idseksi = $(this).attr('id');

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
					url: hapusseksi+'/'+idseksi,
					success: function (data) {
						document.location.reload();
					}
				});  
			}
		})
	});
	// Hapus User
	$('.tombol-hapus-user').on('click', function(e){
		e.preventDefault();
		const iduser = $(this).attr('id');

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
					url: hapususer+'/'+iduser,
					success: function (data) {
						document.location.reload();
					}
				});  
			}
		})
	});
	// Hapus Jabatan
	$('.tombol-hapus-jabatan').on('click', function(e){
		e.preventDefault();
		const idjabatan = $(this).attr('id');

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
					url: hapusjabatan+'/'+idjabatan,
					success: function (data) {
						document.location.reload();
					}
				});  
			}
		})
	});
	// Hapus Pejabat
	$('.tombol-hapus-pejabat').on('click', function(e){
		e.preventDefault();
		const idpejabat = $(this).attr('id');

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
					url: hapuspejabat+'/'+idpejabat,
					success: function (data) {
						document.location.reload();
					}
				});  
			}
		})
	});

// HAPUS KEGIATAN
	// Hapus Kegiatan
	$('.tombol-hapus-kegiatan').on('click', function (e) {
		e.preventDefault();
		const idkegiatan = $(this).attr('id');

		swal.fire({
			title: 'Apakah anda yakin',
			text: 'Data ini akan dihapus',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya hapus'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: hapuskegiatan + '/' + idkegiatan,
					success: function (data) {
						document.location.reload();
					}
				});
			}
		})
	});
	// Hapus Kegiatan detail
	$('.tombol-hapus-kegiatandetail').on('click', function (e) {
		e.preventDefault();
		const idkegdetail = $(this).attr('id');

		swal.fire({
			title: 'Apakah anda yakin',
			text: 'Data ini akan dihapus',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya hapus'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: hapuskegiatandetail + '/' + idkegdetail,
					success: function (data) {
						document.location.reload();
					}
				});
			}
		})
	});

// });