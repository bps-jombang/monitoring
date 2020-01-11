<?php 

class Model_admin extends CI_Model {  

    private $_seksi = "seksi", $_mitra = "mitra", $_kecamatan = "kecamatan",
            $_user   = "user", $_kegiatan = "kegiatan";

    // ONLY CREATES 
    public function createData($tabel,$no)
    {
        // 1 = seksi, 2 = mitra, 3 kecamatan, 4 = user, 5 = kegiatan, 6 = jabatan
        
        $dataMitra = array( // TABEL MITRA
            'nama_mitra' => ($this->input->post('nama_mitra')) // NAME LABEL DI VIEWS ex: name="apa"
        );
        $dataKecamatan = array( // TABEL KECAMATAN
            'nomor_kecamatan' => stripslashes($this->input->post('nokec')), 
            'nama_kecamatan' => stripslashes($this->input->post('nakec'))
        );
        $dataUser = array (
            'nama_user' => (this->input->post('nama_user'))
        );
        $dataKegiatan = array (
            'uraian_kegiatan' => ($this->input->post('uraian_kegiatan')),
            'vol' => ($this->input->post('vol')),
            'satuan' => ($this->input->post('satuan')),
            'target_penyelesaian' => ($this->input->post('target_penyelesaian'))
        );

        $dataJabatan = array (
            'nama_jabatan' => ($this->input->post('nama_jabatan'))
        );
        // SESUAIKAN DI DATABASE YAA


        if ($no == 1) { // insert ke tabel seksi
            $this->db->insert($tabel,$x);
        }else if($no == 2){ // insert ke tabel mitra
            $this->db->insert($tabel,$dataMitra);
        }else if($no == 3){ // insert ke tabel kecamatan
            $this->db->insert($tabel,$dataKecamatan);
        }else if($no == 4){ // insert ke tabel user
            $this->db->insert($tabel,$dataUser);
        }else if($no == 5){ // insert tabael kegiatan
            $this->db->insert($tabel,$dataKegiatan);
        }else if($no == 6){
            $this->db->insert($tabel,$dataJabatan);
        }
    }
    
    // ONLY UPDATE
    public function updateUser()
    {
        //
    }

    // ONLY SHOW ALL
    public function getUser($status,$id = null)
    {
        // 1 = seksi, 2 = user,3 = mitra, 4 = kegiatan, 5 = kecamatan
        if ($status == "seksi") {
            // select tabel seksi
            if ($id) {
                return json_encode($this->db->get_where($this->_seksi,["id_seksi" => $id])->row_array());
            }else{
                return json_encode($this->db->get($this->_seksi)->result_array());
            }
        }
        else if($status == "user") {
            // select tabel user
            if ($id) {
                return json_encode($this->db->get_where($this->_user,["id_user" => $id])->row_array());
            }else{
                return json_encode($this->db->get($this->_user)->result_array());
            }
        }
        // else{
        //     return json_encode($this->db->get($this->user)->result_array());
        // }
    }

    // ONLY DELETE
    public function deleteByIdUser()
    {
        //
    }

}
?>