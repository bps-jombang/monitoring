// $(document).ready(function() {
	const sites			= "http://localhost/monitoring";
	const urleditseksi  	= sites+"/Admin/editseksi/";

	const hapusadmin 	= sites+"/hapusadmin";	// DONE
	const hapusmitra 	= sites+"/hapusmitra"; 	// DONE
	const hapusseksi 	= sites+"/hapusseksi";	// DONE
	const hapususer 	= sites+"/hapususer";		// DONE
	const hapusjabatan 	= sites+"/hapusjabatan"; 	// DONE
	const hapuspejabat 	= sites+"/hapuspejabat"; 	// DONE
	
	// hapus kegiatan 
	const hapuskegiatan 		= sites+"/hapuskegiatan";
	const hapuskegiatandetail 	= sites+"/hapuskegiatandetail";

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

	// GET MODAL EDIT
	// $('.modal-update-seksi').on('click',function(){
	// 	e.preventDefault();
	// 	$('#modal_edit').modal('show');

	// 	const id_seksi 	= 	$(this).data('id');
	// 	const nama_seksi 		= 	$(this).data('seksi');
	// 	// GET DATA FROM INPUT NAME
	// 	$('[name="nama_seksi2"]').val(nama_seksi);
	// 	$('[name="id_seksi2"]').val(id_seksi);
	// });
	// $('#btn_update').on('click', function(e){
	// 	e.preventDefault();
	// 	console.log('btn_update');

	// 	// const id_seksi = $(this).data('id');
	// 	// const nama_seksi = $(this).data('seksi');

	// 	let id = $('#id_seksi2').val();
	// 	let nama = $('#nama_seksi2').val();
		
	// 	$.ajax({
	// 		url: 'http://localhost/monitoring/Admin/editseksi',
	// 		method: 'POST',
	// 		data:{
	// 			id_seksi:id,
	// 			nama_seksi:nama
	// 		},
			
	// 		success: function (data) {
	// 			console.log(data);
	// 		}
	// 	})
	// });

	// MODAL EDIT MITRA
	$('.modal-update-mitra').on('click', function(e){
		e.preventDefault();
		// $('#modal_edit').modal('show');
		const id = $(this).data('id');
		// const nama = $(this).data('nama');
		// $('[name="id_mitra_edit"]').val(id_mitra);
		// $('#nama_mitra_edit').val(nama_mitra);
		$.ajax({
				type: "GET",
				url : "http://localhost/monitoring/Admin/get_mitra",
				dataType: "JSON",
				data: {id_mitra:id},
				success: function (data) {
						$.each(data,function(){
							$('#modal_edit').modal('show');
							$('#nama_mitra_edit').val(data[0].nama_mitra);
							$('#id_mitra_edit').val(data[0].id_mitra);
							// console.log(data[0]);
							
								// $('#modal_edit').modal('show');
							// $('[name="id_mitra_edit"]').val(data.id_mitra);
							// console.log('id'+data.id_mitra);
							// console.log('nama'+data.nama_mitra);
							
							// $('#nama_mitra_edit').val(data.nama_mitra);
				});
			}
		});
		return false;
	});
	$('#btn_update').on('click',function(){
		// e.preventDefault();
		let id_mitra = $('#id_mitra_edit').val();
		let nama_mitra = $('#nama_mitra_edit').val();
		$.ajax({
			type:"POST",
			url: "http://localhost/monitoring/Admin/update_mitra",
			dataType:"JSON",
			data:{id_mitra:id_mitra,nama_mitra:nama_mitra},
			success:function (data) {
				$('[name="nama_mitra_edit"]').val("");
				$('[name="id_mitra_edit"]').val("");
				$('#modal_edit').modal('hide');
				console.log(data);
				
			}
		});
		return false;
	});
	
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


$('.nav-item').on('click', function () {
	$('.nav-item').removeClass('active');
	$(this).addClass('active');
});

$('.lihat-pass').on('click',function (){
	// e.preventDefault();
	// console.log('tombol see');
	const con = $('.passkonfir').attr('input');
	
	
});





















