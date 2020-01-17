<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('random')){

    function getuser(){
        $CI =& get_instance();
        $query = $CI->db->get('user')->result_array();
        return $query;
    }

}
if ( ! function_exists('getMenuLink')){
    function getMenuLink(){
        return  [
                "Tambah Admin"      => base_url('addadmin'),
                "Tambah Seksi"      => base_url('seksi'),
                "Tambah Kegiatan"   => base_url('kegiatan'),
                "Tambah Target User"=> base_url('targetuser'),
                "Tambah User"       => base_url('user'),
                "Tambah Mitra"      => base_url('mitra')
        ];
    }
}
if ( ! function_exists('random')){
   function random(){
         $number = rand(1111,9999);
         return $number;
       }
   }
 
if ( ! function_exists('current_utc_date_time')){
   function current_utc_date_time(){
         $dateTime = gmdate("Y-m-d\TH:i:s\Z");;
         return $dateTime;
       }
   }   
