<?php 

class Model_admin extends CI_Model {
    public function getRealisasi($id_kegiatan, $id_user) {
        $data = $this->db->get_where('kegiatan_detail', array('id_kegiatan' => $id_kegiatan, 'id_user' => $id_user))->result_array();

        if(count($data) > 0) {
            return $data[0]['realisasi'];
        } else {
            return "-";
        }
    }

    public function getTarget($id_kegiatan, $id_user) {
        $data = $this->db->get_where('kegiatan_detail', array('id_kegiatan' => $id_kegiatan, 'id_user' => $id_user))->result_array();

        if(count($data) > 0) {
            return $data[0]['target'];
        } else {
            return "-";
        }
    }
}


?>