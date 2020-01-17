<?php 

class Model_admin extends CI_Model {  

    private $_seksi = "seksi", $_mitra = "mitra", $_kecamatan = "kecamatan",
            $_user   = "user", $_kegiatan = "kegiatan", $_jabatan = "jabatan";

    // ONLY CREATES 
    public function createData($tabel,$no)
    {
        // 1 = seksi, 2 = mitra, 3 kecamatan, 4 = user, 5 = kegiatan, 6 = jabatan
        $dataSeksi = array(
            'nama_seksi' => stripslashes($this->input->post('nama_seksi'))
        );

        $dataMitra = array( // TABEL MITRA
            'nama_mitra' => htmlspecialchars(ucwords($this->input->post('nama_mitra',TRUE))) // NAME LABEL DI VIEWS ex: name="apa"
        );
        $dataKecamatan = array( // TABEL KECAMATAN
            'nomor_kecamatan' => stripslashes($this->input->post('nokec')), 
            'nama_kecamatan' => stripslashes($this->input->post('nakec'))
        );
        $dataUser = array ( // USER
            'nama_user' => stripslashes($this->input->post('nama_user'))
        );
        $dataKegiatan = array ( // KEGIATAN
            'id_seksi' => htmlspecialchars($this->input->post('input_seksi')),
            'uraian_kegiatan' => htmlspecialchars($this->input->post('nama_kegiatan')),
            'vol' => htmlspecialchars($this->input->post('input_vol')),
            'satuan' => htmlspecialchars($this->input->post('input_satuan')),
            'target_penyelesaian' => htmlspecialchars($this->input->post('target_penyelesaian'))
        );
        $dataKegiatandetail = array(
            'id_user' => htmlspecialchars($this->input->post('input_user')), 
            'id_kegiatan' => htmlspecialchars($this->input->post('input_kegiatan')), 
            'target' => htmlspecialchars($this->input->post('input_target'))
        );

        $dataJabatan = array ( // JABATAN
            'nama_jabatan' => htmlspecialchars($this->input->post('nama_jabatan'))
        );
        // SESUAIKAN DI DATABASE YAA


        if ($no == 1) { // insert ke tabel seksi
            // var_dump($dataSeksi);die;
            $this->db->insert($tabel,$dataSeksi);
        }else if($no == 2){ // insert ke tabel mitra
            // var_dump($dataMitra);die;    
            $this->db->insert($tabel,$dataMitra);
        }else if($no == 3){ // insert ke tabel kecamatan
            // var_dump($dataKecamatan);die;
            $this->db->insert($tabel,$dataKecamatan);
        }else if($no == 4){ // insert ke tabel user
            // var_dump($dataUser);die;
            $this->db->insert($tabel,$dataUser);
        }else if($no == 5){ // insert tabael kegiatan
            // echo json_encode($dataKegiatan);die;
            // var_dump($dataKegiatan);die;
            $this->db->insert($tabel,$dataKegiatan);
        }else if($no == 6){
            // var_dump($dataJabatan);die;
            $this->db->insert($tabel,$dataJabatan);
        }else if($no == 7){
            // echo json_encode($dataKegiatandetail);die;
            $this->db->insert($tabel,$dataKegiatandetail);
        }
    }
    
    // ONLY UPDATE
    public function updateData($tabel,$no,$id)
    {
        // 1 seksi, 2 mitra, 3 kecamatan,4 user,5 kegiatan
        $dataMitra = array ('nama_mitra' => $this->input->post('nama_mitra'));
        if ($no == 1 ) {
            // var_dump($dataMitra);die;
            return $this->db->update($tabel,$dataMitra,["id_mitra" => $id]);
        }
    }

    // ONLY SHOW ALL & SHOW BY ID
    public function getUser($tabel,$id = null)
    {
        // 1 = seksi, 2 = user,3 = mitra, 4 = kegiatan, 5 = kecamatan
        if ($tabel == 'seksi') {
            // select tabel seksi
            if ($id) {
                return json_encode($this->db->get_where($this->_seksi,["id_seksi" => $id])->row_array());
            }else{
                return $this->db->get($this->_seksi)->result_array();
            }
        }else if($tabel == "user") {
            // select tabel user
            if ($id) {
                return json_encode($this->db->get_where($this->_user,["id_user" => $id])->row_array());
            }else{
                return $this->db->get($this->_user)->result_array();
            }
        }else if($tabel == "mitra") {
            // select tabel user
            if ($id) {
                return $this->db->get_where($this->_mitra,["id_mitra" => $id])->row_array();
            }else{
                return $this->db->get($this->_mitra)->result_array();
            }
        }else if($tabel == "kegiatan") {
            // select tabel kegiatan
            if ($id) {
                return json_encode($this->db->get_where($this->_kegiatan,["id_kegiatan" => $id])->row_array());
            }else{
                return json_encode($this->db->get($this->_kegiatan)->result_array());
            }
        }else if($tabel == "kecamatan") {
            // select tabel kecamatan
            if ($id) {
                return json_encode($this->db->get_where($this->_kecamatan,["id_kecamatan" => $id])->row_array());
            }else{
                return json_encode($this->db->get($this->_kecamatan)->result_array());
            }
        }
        // else{
        //     return json_encode($this->db->get($this->user)->result_array());
        // }
    }

    // ONLY DELETE
    public function deleteData($tabel,$no,$id)
    {
        // 1 = seksi, 2 = mitra, 3 kecamatan, 4 = user, 5 = kegiatan, 6 = jabatan
        if ($no == 1 ) {
            // var_dump($tabel);die;
            // return $this->db->get_where($tabel,["id_mitra" => $id])->row_array();
            return $this->db->delete($tabel,["id_seksi" => $id]);
        }else if($no == 2){
            return $this->db->delete($tabel,["id_mitra" => $id]);
        }
        else if($no == 3){
            return $this->db->delete($tabel,["id_kecamatan" => $id]);
        }
        else if($no == 4){
            return $this->db->delete($tabel,["id_user" => $id]);
        }
        else if($no == 5){
            return $this->db->delete($tabel,["id_kegiatan" => $id]);
        }
        else if($no == 6){
            return $this->db->delete($tabel,["id_jabatan" => $id]);
        }
    }

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