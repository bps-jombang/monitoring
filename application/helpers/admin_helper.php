<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('target_user'))
{
    function target_user($id_kegiatan,$id_user,$id_pejabat,$id_mitra)
    {
        $CI =& get_instance();
        $CI->db->select('target');
        if ($id_user != NULL && $id_pejabat == 0) {
            // user ada,pejabat 0,mitra 0
            $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan,"id_user" => $id_user])->row_array();
        }elseif($id_pejabat != NULL && $id_user == 0){
            // user 0,pejabat ada,mitra 0
            $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan,"id_pejabat" => $id_pejabat])->row_array();
        }elseif($id_mitra != NULL && $id_user == 0 && $id_pejabat == 0){
            // user 0,pejabat 0,mitra ada
           $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan,"id_mitra" => $id_mitra])->row_array();
        }
        // if ($query == NULL) {
        //     return FALSE;
        // }else{
            return $query;
        // }
    }
}
if ( ! function_exists('realisasi_user'))
{
    function realisasi_user($id_kegiatan,$id_user,$id_pejabat,$id_mitra)
    {
        $CI =& get_instance();
        $CI->db->select('realisasi');
        if ($id_user != NULL && $id_pejabat == 0 && $id_mitra == 0) { 
            // user ada,pejabat 0,mitra 0
            $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan,"id_user" => $id_user])->row_array();
        } elseif($id_pejabat != NULL && $id_user == 0 && $id_mitra == 0) {
            // user 0,pejabat ada,mitra 0
            $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan,"id_pejabat" => $id_pejabat])->row_array();
        } elseif($id_mitra != NULL && $id_user == 0 && $id_pejabat == 0){
            // mitra ada,user 0,pejabat 0
            $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan,"id_mitra" => $id_mitra])->row_array();
        }
        // echo $CI->db->last_query();
        // if ($query == NULL) {
        //     return FALSE;
        // }else{
            return $query;
        // }
    }
}

// Total semua realisasi & target tabel
if ( ! function_exists('total_realisasi'))
{
    function total_realisasi($id_kegiatan)
    {
        $CI =& get_instance();
        $CI->db->select('SUM(realisasi)');
        $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan])->row_array();
        return $query;
    }
}
if ( ! function_exists('total_target'))
{
    function total_target($id_kegiatan)
    {
        $CI =& get_instance();
        $CI->db->select('SUM(target)');
        $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan])->row_array();
        return $query;
    }
}


if ( ! function_exists('target_usaja'))
{
    function target_usaja($id_kegiatan,$id_user)
    {
        $CI =& get_instance();
        $CI->db->select('target');
        $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan,"id_user" => $id_user])->row_array();
        if ($query == NULL) {
            return "0";
        }else{
            return $query;
        }
    }
}








if ( ! function_exists('getMenuLink'))
{
    function getMenuLink()
    {
        return  [ // Menu sidebar           // Url on routes
                "Kelola Admin"          => 'admin',
                "Kelola Seksi"          => 'seksi',
                "Kelola Kegiatan"       => 'kegiatan',
                "Kelola Pejabat"        => 'pejabat',
                "Kelola Jabatan"        => 'jabatan',
                "Kelola Target"         => 'targetuser',
                "Kelola Anggota"        => 'user',
                "Kelola Mitra"          => 'mitra'
        ];
    }
}
if ( ! function_exists('getMenuForm'))
{
    function getMenuForm()
    {
        return [
            "Tambah Admin",
            "Tambah Seksi",
            "Tambah Kegiatan",
            "Tambah Pejabat",
            "Tambah Jabatan",
            "Tambah Target Anggota",
            "Tambah Anggota",
            "Tambah Mitra",
            "Form Tambah Data",
            "Tambah User"
        ];
    }
}  
if ( ! function_exists('getUserKecamatan'))
{
    function getUserKecamatan($id = null)
    {
        $CI =& get_instance();
        $CI->db->select('u.id_user,k.nomor_kecamatan,k.nama_kecamatan,u.nama_user');
        $CI->db->join('kecamatan as k','k.id_kecamatan = u.id_kecamatan');
        return $CI->db->get('user as u')->result_array();

    }
}
if ( ! function_exists('getSeksiKegiatan'))
{
    function getSeksiKegiatan()
    {
        $CI =& get_instance();
        $CI->db->select('s.nama_seksi');
        $CI->db->join('seksi as s','s.id_seksi = k.id_seksi');
        return $CI->db->get('kegiatan as k')->result_array();
    }
}
if ( ! function_exists('getPejabatDetail'))
{
    function getPejabatDetail()
    {
        $CI =& get_instance();
        $CI->db->select('p.id_pejabat,j.id_jabatan,j.nama_jabatan,p.id_seksi,s.nama_seksi,p.nama_user,p.id_pejabat');
        $CI->db->join('jabatan as j','j.id_jabatan = p.id_jabatan');
        $CI->db->join('seksi as s','s.id_seksi = p.id_seksi');
        return $CI->db->get('pejabat as p')->result_array();
    }
}