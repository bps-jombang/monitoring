<?php 

class Model_admin extends CI_Model {  

    private $_seksi = "seksi", $_mitra = "mitra", $_kecamatan = "kecamatan", $_pejabat = "pejabat",
            $_kegiatan_detail = "kegiatan_detail", $_user   = "user", $_admin   = "admin", 
            $_kegiatan = "kegiatan", $_jabatan = "jabatan";

    // ONLY CREATES 
    public function createData($tabel,$no) // DONE ALL
    {
        // 1 = seksi, 2 = mitra, 3 = jabatan, 4 = user, 5 = kegiatan,  6 = kegiatan detail, 7 = admin, 8 = pejabat
        $dataSeksi = array(
            'nama_seksi' => ucwords(htmlspecialchars($this->input->post('nama_seksi',TRUE)))
        );
        $dataAdmin = array( // Tabel Admin
            'id_role'  => $this->input->post('check'),
            'username' => strtolower(htmlspecialchars($this->input->post('username',TRUE))),
            'password' => password_hash($this->input->post('username',TRUE),PASSWORD_DEFAULT)
        );
        $dataMitra = array( // Tabel Mitra
            'nama_mitra' => htmlspecialchars(ucwords($this->input->post('nama_mitra',TRUE))), // NAME LABEL DI VIEWS ex: name="apa"
        );
        $dataUser = array ( // Tabel User
            'id_kecamatan'  => $this->input->post('input_kecamatan'),
            'nama_user'     => htmlspecialchars($this->input->post('nama_user',TRUE)),
        );
        $dataKegiatan = array ( // Tabel Kegiatan
            'id_seksi'              => htmlspecialchars($this->input->post('input_seksi')),
            'uraian_kegiatan'       => htmlspecialchars($this->input->post('nama_kegiatan')),
            'vol'                   => htmlspecialchars($this->input->post('input_vol')),
            'satuan'                => htmlspecialchars($this->input->post('input_satuan')),
            'target_penyelesaian'   => htmlspecialchars($this->input->post('target_penyelesaian')),
            'keterangan'            => htmlspecialchars($this->input->post('keterangan')),
        );
        $dataKegiatanDetail = array( // Tabel Kegiatan detail
            array(
                'id_kegiatan'   => $this->input->post('input_kegiatan'), 
                'id_user'       => $this->input->post('input_user'),
                'target'        => htmlspecialchars($this->input->post('target_user')),
            ),
            array(
                'id_kegiatan'   => $this->input->post('input_kegiatan'), 
                'id_pejabat'    => $this->input->post('input_pejabat'),
                'target'        => htmlspecialchars($this->input->post('target_pejabat')),
            ),
            array(
                'id_kegiatan'   => $this->input->post('input_kegiatan'), 
                'id_mitra'      => $this->input->post('input_mitra'),
                'target'        => htmlspecialchars($this->input->post('target_mitra')),
            )
        );
        $dataJabatan = array ( // Tabel Jabatan
            'nama_jabatan'  => htmlspecialchars($this->input->post('nama_jabatan',TRUE))
        );
        $dataPejabat = array ( // Tabel Pejabat
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
        }else if($no == 6){ // DONE insert tabel kegiatan detail
            // insert ke tabel kegiatan detail 
            if ($dataKegiatanDetail[0]['id_user'] != NULL && $dataKegiatanDetail[1]['id_pejabat'] == NULL && $dataKegiatanDetail[2]['id_mitra'] == NULL) {
                $this->db->insert($tabel,$dataKegiatanDetail[0]); // insert target user
            }elseif($dataKegiatanDetail[1]['id_pejabat'] != NULL && $dataKegiatanDetail[0]['id_user'] == NULL && $dataKegiatanDetail[2]['id_mitra'] == NULL){
                $this->db->insert($tabel,$dataKegiatanDetail[1]); // insert target pejabat
            }elseif($dataKegiatanDetail[2]['id_mitra'] != NULL && $dataKegiatanDetail[1]['id_pejabat'] == NULL && $dataKegiatanDetail[0]['id_user'] == NULL){
                $this->db->insert($tabel,$dataKegiatanDetail[2]); // insert target mitra
            }elseif($dataKegiatanDetail[0]['id_user'] != NULL && $dataKegiatanDetail[1]['id_pejabat'] != NULL && $dataKegiatanDetail[2]['id_mitra'] != NULL){
                $this->db->insert($tabel,$dataKegiatanDetail[0]);
                $this->db->insert($tabel,$dataKegiatanDetail[1]);
                $this->db->insert($tabel,$dataKegiatanDetail[2]);
            }
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
        }else if($no == 8){ // insert ke tabel pejabat
            $this->db->insert($tabel,$dataPejabat); // DONE
        }
    }
    
    // ONLY UPDATE
    public function updateData($tabel,$no,$id) // DONE ALL
    {
        // 1 = seksi, 2 = mitra, 3 = user, 4 = kegiatan, 5 = jabatan, 6 = Kegiatan Detail, 7 = pejabat, [8] = Admin
        $dataSeksi = array ( // DONE MODAL
            'nama_seksi'            => htmlspecialchars($this->input->post('modal_namaseksi',TRUE))
        );
        $dataMitra = array ( // DONE MODAL
            'nama_mitra'            => htmlspecialchars($this->input->post('modal_namamitra',TRUE))
        );
        $dataUser = array(
            'id_kecamatan'          => $this->input->post('input_kecamatan'),
            'nama_user'             => htmlspecialchars($this->input->post('nama_user',TRUE))
        );
        $dataKegiatan = array(
            'id_seksi'              => $this->input->post('input_seksi'),
            'uraian_kegiatan'       => $this->input->post('nama_kegiatan'),
            'vol'	                => htmlspecialchars($this->input->post('input_vol',TRUE)),
            'satuan'	            => htmlspecialchars($this->input->post('input_satuan',TRUE)),
            'target_penyelesaian'	=> htmlspecialchars($this->input->post('target_penyelesaian',TRUE))
        );
        $dataJabatan = array ( // DONE MODAL
            'nama_jabatan'          => htmlspecialchars($this->input->post('modal_namajabatan',TRUE))
        );
        $dataKegiatanDetail = array ( // DONE MODAL
            'target'                => htmlspecialchars($this->input->post('target',TRUE)),
            'realisasi'             => htmlspecialchars($this->input->post('realisasi',TRUE))
        );
        $dataPejabat = array (
            'id_seksi'              => $this->input->post('input_seksi'),
            'id_jabatan'            => $this->input->post('input_jabatan'),
            'nama_user'             => htmlspecialchars($this->input->post('nama_pejabat',TRUE))
        );
        $dataAdmin  = array (
            'username'              => $this->input->post('modal_username'),
            'password'              => password_hash($this->input->post('modal_password'),PASSWORD_DEFAULT)
        );
        if ($no == 1 ) {
            return $this->db->update($tabel,$dataSeksi,['id_seksi' => $id]); // DONE
        }elseif($no == 2){
            return $this->db->update($tabel,$dataMitra,['id_mitra' => $id]);// DONE
        }elseif($no == 3){
            return $this->db->update($tabel,$dataUser,['id_user' => $id]);// DONE
        }elseif($no == 4){
            return $this->db->update($tabel,$dataKegiatan,['id_kegiatan' => $id]);// DONE
        }elseif($no == 5){
            return $this->db->update($tabel,$dataJabatan,['id_jabatan' => $id]);// DONE
        }elseif($no == 6){
            return $this->db->update($tabel,$dataKegiatanDetail,['id_kegiatan_detail' => $id]);// DONE
        }elseif($no == 7){
            return $this->db->update($tabel,$dataPejabat,['id_pejabat' => $id]);// DONE
        }elseif($no == 8){
            return $this->db->update($tabel,$dataAdmin,['id_admin' => $id]);// DONE
        }
    }
    
    // ONLY SHOW ALL & SHOW BY ID
    public function readData($tabel,$id = null) // DONE ALL
    {
        /*  1 = seksi, 2 = user,3 = mitra, 4 = kegiatan, 5 = admin, 
            6 = jabatan, 7 = kecamatan, 8 = pejabat,9 = jabatan, 10 kegiatan_detail */
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
                return $this->db->get_where($this->_user,["id_user" => $id])->row_array();
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
    public function deleteData($tabel,$no,$id) // DONE ALL
    {
        // 1 = seksi, 2 = mitra, 3 = user, 4 = kegiatan, 5 = jabatan, 6 = admin, 7 = pejabat
        if ($no == 1 ) {
            return $this->db->delete($tabel,["id_seksi"             => $id]); // DONE
        }else if($no == 2){
            return $this->db->delete($tabel,["id_mitra"             => $id]); // DONE
        }else if($no == 3){
            return $this->db->delete($tabel,["id_user"              => $id]); // DONE
        }else if($no == 4){
            return $this->db->delete($tabel,["id_kegiatan"          => $id]); // DONE
        }else if($no == 5){
            return $this->db->delete($tabel,["id_jabatan"           => $id]); // DONE
        }else if($no == 6){
            return $this->db->delete($tabel,["id_admin"             => $id]); // DONE
        }else if($no == 7){
            return $this->db->delete($tabel,["id_pejabat"           => $id]); // DONE
        }else if($no == 8){
            return $this->db->delete($tabel,["id_kegiatan_detail"   => $id]); // DONE
        }
    }

    public function printkegiatan()
    {
        // join kegiatan
        $this->db->select('s.id_seksi,s.nama_seksi,k.id_kegiatan,k.uraian_kegiatan,k.vol,k.satuan,k.target_penyelesaian,k.keterangan');
        $this->db->join('seksi as s','s.id_seksi = k.id_seksi');
        $this->db->group_by('k.id_kegiatan','ASC');
        return $this->db->get('kegiatan as k')->result_array();
    }
    public function printuserkecamatan(){
        $this->db->select('u.id_user,u.nama_user,k.id_kecamatan,k.nama_kecamatan');
        $this->db->join('kecamatan as k','k.id_kecamatan = u.id_kecamatan');
        return $this->db->get('user as u')->result_array();
    }

}
?>