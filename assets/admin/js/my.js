$(document).ready(function() {
	const sites			= "http://localhost/monitoring";
	const hapusadmin 	= sites+"/hapusadmin";		// DONE
	const hapusmitra 	= sites+"/hapusmitra"; 		// DONE
	const hapusseksi 	= sites+"/hapusseksi";		// DONE
	const hapususer 	= sites+"/hapususer";		// DONE
	const hapusjabatan 	= sites+"/hapusjabatan"; 	// DONE
	const hapuspejabat 	= sites+"/hapuspejabat"; 	// DONE
	
	// hapus kegiatan 
	const hapuskegiatan 		= sites+"/hapuskegiatan";
	const hapuskegiatandetail 	= sites+"/hapuskegiatandetail";
	const hapussemuakegiatan 	= sites+"/deleteallkegiatan";

    const tabel = $(".mytable tr th");
	tabel.addClass("align-middle");
	
	// ALERT TAMBAH & UPDATE DATA
	const flashData = $('.flash-data').data('flashdata');
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

	// Hapus semua kegiatan
	$('.tombol-hapus-semua').on('click', function (e) {
		e.preventDefault();

		swal.fire({
			title: 'Apakah anda yakin',
			text: 'Data semua kegiatan akan dihapus, pastikan sudah export excel dahulu',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus semua'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: hapussemuakegiatan,
					success: function (data) {
						document.location.reload();
					}
				});
			}
		})
	});

	// Hapus Kegiatan by Id
	$('.tombol-hapus-kegiatan').on('click', function (e) {
		e.preventDefault();
		const idkegiatan = $(this).attr('id');

		swal.fire({
			title: 'Apakah anda yakin',
			text: 'Jika data kegiatan akan dihapus, kegiatan detail juga akan terhapus',
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
	$('.tombol-hapus-kegiatan-detail').on('click', function (e) {
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
 
	// Modal update
	$('.btn-detail-user').on('click', function (){
		$('#modalku').modal('show');
		let id_kegiatan_detail 	= $(this).data('id');
		let usersid 			= $(this).data('usersid');
		let target 				= $(this).data('targetuser');
		let realisasi 			= $(this).data('realisasi');
		let uraian_kegiatan		= $(this).data('uraian');
		$('[name="idkegdet"]').val(id_kegiatan_detail);
		$('[name="uraian_kegiatan"]').val(uraian_kegiatan)
		$('[name="iduser"]').val(usersid);
		$('[name="target"]').val(target);
		$('[name="realisasi"]').val(realisasi);
		$('#formupdate').attr('action', sites + '/updatedetailuser/' + id_kegiatan_detail);
	});
	$('.btn-detail-mitra').on('click', function () {
		$('#modalku').modal('show');
		let id_kegiatan_detail 	= $(this).data('id');
		let idmitra 			= $(this).data('usersid');
		let target 				= $(this).data('targetuser');
		let realisasi 			= $(this).data('realisasi');
		let uraian_kegiatan 	= $(this).data('uraian');
		$('[name="idkegdet"]').val(id_kegiatan_detail);
		$('[name="uraian_kegiatan"]').val(uraian_kegiatan);
		$('[name="idmitra"]').val(idmitra);
		$('[name="target"]').val(target);
		$('[name="realisasi"]').val(realisasi);
		$('#formupdate').attr('action', sites + '/updatedetailmitra/' + id_kegiatan_detail);
	});
	$('.btn-detail-pejabat').on('click', function () {
		$('#modalku').modal('show');
		let id_kegiatan_detail 	= $(this).data('id');
		let idpejabat 			= $(this).data('usersid');
		let target 				= $(this).data('targetuser');
		let realisasi 			= $(this).data('realisasi');
		let uraian_kegiatan 	= $(this).data('uraian');
		$('[name="idkegdet"]').val(id_kegiatan_detail);
		$('[name="uraian_kegiatan"]').val(uraian_kegiatan);
		$('[name="idpejabat"]').val(idpejabat);
		$('[name="target"]').val(target);
		$('[name="realisasi"]').val(realisasi);
		$('#formupdate').attr('action', sites + '/updatedetailpejabat/' + id_kegiatan_detail);
	});
	$('.btn-detail-admin').on('click', function () {
		// $('#modalku').modal('show');
		let idadmin = $(this).data('idadmin');
		let username = $(this).data('user');
		
		$('[name="idadmin"]').val(idadmin);
		$('[name="modal_username"]').val(username);
		$('[name="modal_password"]').val();

		$('#formupdate').attr('action', sites + '/Admin/resetadmin/' + idadmin);
	});

	$('.btn-detail-seksi').on('click',function(){
		$('#modalku').modal('show');
		let id_seksi = $(this).data('id');
		let nama_seksi = $(this).data('nama');
		$('[name="id_seksi"]').val(id_seksi);
		$('[name="modal_namaseksi"]').val(nama_seksi);
		$('#formupdateseksi').attr('action', sites + '/Admin/updateseksi/' + id_seksi);
	});
	$('.btn-detail-jabatan').on('click', function () {
		$('#modalku').modal('show');
		let id_jabatan = $(this).data('id');
		let nama_jabatan = $(this).data('nama');
		$('[name="id_jabatan"]').val(id_jabatan);
		$('[name="modal_namajabatan"]').val(nama_jabatan);
		$('#formupdatejabatan').attr('action', sites + '/Admin/updatejabatan/' + id_jabatan);
	});
	$('.btn-detail-pejabat').on('click', function () {
		$('#modalku').modal('show');
		let id_pejabat = $(this).data('id');
		let nama_pejabat = $(this).data('nama');
		$('[name="id_pejabat"]').val(id_pejabat);
		$('[name="modal_namapejabat"]').val(nama_pejabat);
		$('#formupdatepejabat').attr('action', sites + '/Admin/updatepejabat/' + id_pejabat);
	});

	// remove class active on sidebar
	$('.nav-item').on('click', function () {
		$('.nav-item').removeClass('active');
		$(this).addClass('active');
	});

	// change attr password to text
	$('.lihat-pass').on('click',function (){
		// e.preventDefault();
		// console.log('tombol see');
		const con = $('.passkonfir').attr('input');
		
		
	});
})