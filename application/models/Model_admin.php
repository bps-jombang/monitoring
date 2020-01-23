<?php 

class Model_admin extends CI_Model {  

    private $_seksi = "seksi", $_mitra = "mitra", $_kecamatan = "kecamatan", $_pejabat = "pejabat",
            $_kegiatan_detail = "kegiatan_detail", $_user   = "user", $_admin   = "admin", 
            $_kegiatan = "kegiatan", $_jabatan = "jabatan";

    // ONLY CREATES 
    public function createData($tabel,$no)
    {
        // 1 = seksi, 2 = mitra, 3 = jabatan, 4 = user, 5 = kegiatan,  6 = kegiatan detail, 7 = admin, 8 = pejabat
        $dataSeksi = array(
            'nama_seksi' => ucwords(htmlspecialchars($this->input->post('nama_seksi',TRUE)))
        );
        $dataAdmin = array(
            'id_role'  => $this->input->post('check'),
            'username' => strtolower(htmlspecialchars($this->input->post('username',TRUE))),
            'password' => password_hash($this->input->post('username',TRUE),PASSWORD_DEFAULT)
        );
        $dataMitra = array( // TABEL MITRA
            'nama_mitra' => htmlspecialchars(ucwords($this->input->post('nama_mitra',TRUE))) // NAME LABEL DI VIEWS ex: name="apa"
        );
        $dataUser = array ( // USER
            'id_jabatan'    => $this->input->post('input_jabatan'),
            'id_seksi'      => $this->input->post('input_seksi'),
            'id_kecamatan'  => $this->input->post('input_kecamatan'),
            'nama_user'     => htmlspecialchars($this->input->post('nama_user',TRUE)),
        );
        $dataKegiatan = array ( // Kegiatan
            'id_seksi'              => htmlspecialchars($this->input->post('input_seksi')),
            'uraian_kegiatan'       => htmlspecialchars($this->input->post('nama_kegiatan')),
            'vol'                   => htmlspecialchars($this->input->post('input_vol')),
            'satuan'                => htmlspecialchars($this->input->post('input_satuan')),
            'target_penyelesaian'   => htmlspecialchars($this->input->post('target_penyelesaian'))
        );
        $dataKegiatandetail = array( // Kegiatan detail
            'id_user'       => htmlspecialchars($this->input->post('input_user')), 
            'id_kegiatan'   => htmlspecialchars($this->input->post('input_kegiatan')), 
            'target'        => htmlspecialchars($this->input->post('input_target'))
        );
        $dataJabatan = array ( // Jabatan
            'nama_jabatan'  => htmlspecialchars($this->input->post('nama_jabatan',TRUE))
        );
        $dataPejabat = array ( // Pejabat
            'id_jabatan'    => $this->input->post('input_jabatan'),
            'id_seksi'      => $this->input->post('input_seksi'),
            'nama_user'     => ucwords(htmlspecialchars($this->input->post('nama_user',TRUE)))
        );

        if ($no == 1) { // insert ke tabel seksi
            $this->db->insert($tabel,$dataSeksi); // DONE
        }else if($no == 2){ // insert ke tabel mitra
            $this->db->insert($tabel,$dataMitra); // DONE
        }else if($no == 3){ // insert ke tabel Jabatan
            $this->db->insert($tabel,$dataJabatan); // DONE
        }else if($no == 4){ // insert ke tabel user
            $this->db->insert($tabel,$dataUser); // DONE
        }else if($no == 5){ // insert ke tabel kegiatan
            $this->db->insert($tabel,$dataKegiatan);  // DONE
        }else if($no == 6){ // insert ke tabel kegiatan detail
            $this->db->insert($tabel,$dataKegiatandetail);
        }else if($no == 7){ // insert ke tabel admin
            $result     =   $this->db->get_where($tabel,['username' => $dataAdmin["username"]])->row_array();
            if ($dataAdmin["username"] == $result["username"] ) {
                return true;
            }else{
                if ($dataAdmin["id_role"] == "on") {
                    $dataAsli       =   array("on",$dataAdmin["username"],$dataAdmin["password"]);
                    $dataReplace    =   array(1,$dataAdmin["username"],$dataAdmin["password"]);
                    $dataBaru       =   array("id_role" => $dataReplace[0],"username" => $dataReplace[1],"password" => $dataReplace[2]);
                    $this->db->insert($tabel,$dataBaru);
                }else{
                    $dataAsli       =   array(NULL,$dataAdmin["username"],$dataAdmin["password"]);
                    $dataReplace    =   array(2,$dataAdmin["username"],$dataAdmin["password"]);
                    $dataBaru       =   array("id_role" => $dataReplace[0],"username" => $dataReplace[1],"password" => $dataReplace[2]);
                    $this->db->insert($tabel,$dataBaru);
                }
            }
        }else if($no == 8){
            $this->db->insert($tabel,$dataPejabat);
        }
    }
    
    // ONLY UPDATE
    public function updateData($tabel,$no)
    {
        // 1 seksi, 2 mitra, 3 kecamatan,4 user,5 kegiatan
        $dataMitra = array ('nama_mitra' => $this->input->post('nama_mitra'));
        $dataSeksi  =  [
            'id_seksi'    =>  $this->input->post('id_seksi'),
            'nama_seksi'    =>$this->input->post('nama_seksi2')
        ];
        if ($no == 1 ) {
            // $this->db->set($dataSeksi);
            $data = $this->db->update($tabel,["nama_seksi" => $dataSeksi['nama_seksi']],["id_seksi" => $dataSeksi['id_seksi']]);
            // var_dump($data);
            // return $data;
            // var_dump($data);
        }elseif($no == 2){
            return $this->db->update($tabel,$dataMitra,["id_mitra" => $id]);
        }
    }

    // ONLY SHOW ALL & SHOW BY ID
    public function getData($tabel,$id = null)
    {
        // 1 = seksi, 2 = user,3 = mitra, 4 = kegiatan, 5 = kecamatan
        if ($tabel == "seksi") {
            // select tabel seksi
            if ($id) {
                return $this->db->get_where($this->_seksi,["id_seksi" => $id])->row_array();
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
                return $this->db->get_where($this->_kegiatan,["id_kegiatan" => $id])->row_array();
            }else{
                return $this->db->get($this->_kegiatan)->result_array();
            }
        }else if($tabel == "admin") {
            // select tabel kecamatan
            if ($id) {
                return $this->db->get_where($this->_admin,["id_admin" => $id])->row_array();
            }else{
                return $this->db->get($this->_admin)->result_array();
            }
        }else if($tabel == "jabatan") {
            // select tabel kecamatan
            if ($id) {
                return $this->db->get_where($this->_jabatan,["id_jabatan" => $id])->row_array();
            }else{
                return $this->db->get($this->_jabatan)->result_array();
            }
        }else if($tabel == "kecamatan") {
            // select tabel kecamatan
            if ($id) {
                return $this->db->get_where($this->_kecamatan,["id_kecamatan" => $id])->row_array();
            }else{
                return $this->db->get($this->_kecamatan)->result_array();
            }
        }else if($tabel == "pejabat") {
            // select tabel pejabat
            if ($id) {
                return $this->db->get_where($this->_pejabat,["id_pejabat" => $id])->row_array();
            }else{
                return $this->db->get($this->_pejabat)->result_array();
            }
        }else if($tabel == "jabatan") {
            // select tabel jabatan
            if ($id) {
                return $this->db->get_where($this->_jabatan,["id_jabatan" => $id])->row_array();
            }else{
                return $this->db->get($this->_jabatan)->result_array();
            }
        }else if($tabel == "kegiatan_detail") {
            // select tabel kegiatan_detail
            if ($id) {
                return $this->db->get_where($this->_kegiatan_detail,["id_kegiatan_detail" => $id])->row_array();
            }else{
                return $this->db->get($this->_kegiatan_detail)->result_array();
            }
        }
    }

    // ONLY DELETE
    public function deleteData($tabel,$no,$id)
    {
        // 1 = seksi, 2 = mitra, 3 = user, 4 = kegiatan, 5 = jabatan, 6 = admin, 7 = pejabat
        if ($no == 1 ) {
            return $this->db->delete($tabel,["id_seksi"     => $id]); // DONE
        }else if($no == 2){
            return $this->db->delete($tabel,["id_mitra"     => $id]); // DONE
        }else if($no == 3){
            return $this->db->delete($tabel,["id_user"      => $id]);
        }else if($no == 4){
            return $this->db->delete($tabel,["id_kegiatan"  => $id]);
        }else if($no == 5){
            return $this->db->delete($tabel,["id_jabatan"   => $id]); // DONE
        }else if($no == 6){
            return $this->db->delete($tabel,["id_admin"     => $id]); // DONE
        }else if($no == 7){
            return $this->db->delete($tabel,["id_pejabat"   => $id]); // DONE
        }
    }

}
?>