<?php 

class Model_admin extends CI_Model {  

    private $_table          = "seksi";
    private $user = "user";


    // ONLY CREATES 
    public function createSeksi($tabel,$no)
    {
        // nama_mitra
        $dataM = array(
            'nama_mitra' => $this->input->post('mitra')
        );
        $dataKec = array(
            'nomor_kecamatan' => $this->input->post('nokec'), 
            'nama_kecamatan' => $this->input->post('nakec')
        );
        // var_dump($data);
        if ($no == 1) {
            $this->db->insert($tabel,$dataM);
        }else if($no == 2){
        $this->db->insert($tabel,$dataKec);
        }
    }
    
    // ONLY UPDATE
    public function updateUser()
    {
        //
    }
    public function updateKegiatanDanDetail()
    {
        //
    }
    public function updateSeksi()
    {
        //
    }
    public function updateJabatan()
    {
        //
    }
    public function updateMitra()
    {
        //
    }

    // ONLY SHOW ALL
    public function getUser($id = null)
    {
        // $res = $id ? $this->db->get_where($this->user,["id_user" => $id])->row_array(); : $this->db->get($this->user)->result_array();
        if ($id) {
            return $this->db->get_where($this->user,["id_user" => $id])->row_array();
        }else{
            return $this->db->get($this->user)->result_array();
        }
    }
    public function getAllKegiatanDanDetail()
    {
        //
    }
    public function getAllSeksi()
    {
        //
    }
    public function getAllJabatan()
    {
        //
    }
    public function getAllMitra()
    {
        //
    }

    // ONLY SHOW BY ID
    public function getByIdUser($id)
    {
        //
    }
    public function getByIdKegiatanDanDetail($id)
    {
        //
    }
    public function getByIdSeksi($id)
    {
        //
    }
    public function getByIdJabatan($id)
    {
        //
    }
    public function getByIdMitra($id)
    {
        //
    }

    // ONLY DELETE
    public function deleteByIdUser()
    {
        //
    }
    public function deleteByIdKegiatanDanDetail()
    {
        //
    }
    public function deleteByIdSeksi()
    {
        //
    }
    public function deleteByIdJabatan()
    {
        //
    }
    public function deleteByIdMitra()
    {
        //
    }

}
?>