<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('random')){

    function getuser(){
        $CI =& get_instance();
        $query = $CI->db->get('user')->result_array();
        return $query;
        
    }

}
if ( ! function_exists('target_user'))
{
    function target_user($id_kegiatan,$id_user,$id_pejabat)
    {
        $CI =& get_instance();
        $CI->db->select('target');
        if ($id_user != NULL && $id_pejabat == 0) {
            $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan,"id_user" => $id_user])->row_array();
        }elseif($id_pejabat != NULL && $id_user == 0){
            $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan,"id_pejabat" => $id_pejabat])->row_array();
        }
        if ($query == NULL) {
            return FALSE;
        }else{
            return $query;
        }
    }
}
if ( ! function_exists('realisasi_user'))
{
    function realisasi_user($id_kegiatan,$id_user,$id_pejabat)
    {
        // SELECT id_kegiatan,id_user,realisasi FROM `kegiatan_detail` where id_kegiatan = 1 and id_user =3
        $CI =& get_instance();
        $CI->db->select('realisasi');
        if ($id_user != NULL && $id_pejabat == 0) {
            $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan,"id_user" => $id_user])->row_array();
        } elseif($id_pejabat != NULL && $id_user == 0) {
            $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan,"id_pejabat" => $id_pejabat])->row_array();
        }
        // echo $CI->db->last_query();
        if ($query == NULL) {
            return FALSE;
        }else{
            return $query;
        }
    }
}
if ( ! function_exists('total_target'))
{
    function total_target($id_kegiatan)
    {
        $CI =& get_instance();
        $CI->db->select('SUM(target)');
        $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan])->row_array();
        // echo $CI->db->last_query();
        return $query;
    }
}
if ( ! function_exists('total_realisasi'))
{
    function total_realisasi($id_kegiatan)
    {
        $CI =& get_instance();
        $CI->db->select('SUM(realisasi)');
        $query = $CI->db->get_where('kegiatan_detail',["id_kegiatan" => $id_kegiatan])->row_array();
        // echo $CI->db->last_query();
        return $query;
    }
}
if ( ! function_exists('getMenuLink'))
{
    function getMenuLink()
    {
        return  [
                "Tambah Admin"          => base_url('addadmin'),
                "Tambah Seksi"          => base_url('seksi'),
                "Tambah Kegiatan"       => base_url('kegiatan'),
                "Tambah Pejabat"        => base_url('pejabat'),
                "Tambah Jabatan"        => base_url('jabatan'),
                "Tambah Target User"    => base_url('targetuser'),
                "Tambah Anggota"        => base_url('user'),
                "Tambah Mitra"          => base_url('mitra')
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
