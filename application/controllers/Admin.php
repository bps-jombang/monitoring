<?php

class Admin extends CI_Controller
{

    public function __construct() 
    { 
        parent::__construct(); 
        $this->load->library('form_validation');
        $this->load->model(['Model_admin' => 'modeladmin','Model_login' => 'modellogin']);
        $this->load->helper('admin_helper');

        if (!$this->session->userdata('username')) {
            redirect(base_url('loginadmin'));
        }
    }

    public function index() // DONE
    {
        $title['judul']     = "BPS";
        $data['sumtarget']  = $this->db->select('SUM(target)')->get('kegiatan_detail')->row_array();
        $data['sumseksi']   = $this->db->select('COUNT(nama_seksi)')->get('seksi')->row_array();
        $data['listseksi']  = $this->db->get('seksi')->result_array();
        $data['listmenu']   = getMenuLink(); // array di helper   

        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/index');
        $this->load->view('template_admin/footer');
    }

    public function detailUser() 
    {
        $title['judul']     = "Detail Pencapaian User | BPS";
        $data['listmenu']   = getMenuLink(); // array di helper   
        $data['menuform'] = getMenuForm();// array class
        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/detailUser');
        $this->load->view('template_admin/footer');
    }

    public function dataKegiatan()
    {
        $title['judul'] = "List Kegiatan | BPS";
        $this->db->select('k.uraian_kegiatan,s.nama_seksi,k.vol,k.satuan,k.target_penyelesaian,u.nama_user,kc.nama_kecamatan,kd.target,kd.realisasi');
        $this->db->join('user as u','u.id_user = kd.id_user');
        $this->db->join('kegiatan as k','k.id_kegiatan = kd.id_kegiatan');
        $this->db->join('kecamatan as kc','kc.id_kecamatan = kd.id_user');
        $this->db->join('seksi as s','s.id_seksi = kd.id_user');
        $data['list'] = $this->db->get('kegiatan_detail as kd')->result_array();

        $this->db->order_by('id_kegiatan');
        $data['semuakegiatan'] = $this->db->get('kegiatan')->result_array();
        $data['listmitra'] = $this->db->get('mitra')->result_array();
        //SELECT k.nama_kecamatan,u.nama_user FROM user as u INNER JOIN kecamatan as k ON k.id_kecamatan = u.id_kecamatan
        $this->db->select('u.id_user,k.nomor_kecamatan,k.nama_kecamatan,u.nama_user');
        $this->db->join('kecamatan as k','k.id_kecamatan = u.id_kecamatan');
        $data['listuser'] = $this->db->get('user as u')->result_array();

        $data['kegiatan_detail'] = $this->db->get('kegiatan_detail')->result_array();

        $this->db->select('j.id_jabatan,j.nama_jabatan,s.nama_seksi,p.nama_user,p.id_pejabat');
        $this->db->join('jabatan as j','j.id_jabatan = p.id_jabatan');
        $this->db->join('seksi as s','s.id_seksi = p.id_seksi');
        $this->db->group_by('p.id_pejabat');
        $data['listpejabat'] = $this->db->get('pejabat as p')->result_array();
        // $data['mitra']= $this->db->get('mitra')->result_array();
        // $this->db->group_by('id_user');
        // $data['sortuser'] = $this->db->get('kegiatan_detail')->result_array();

        // $data['mitra'] = $this->db->get('mitra')->result_array();
        $data['listmenu']   = getMenuLink(); // array di helper   
        $data['menuform'] = getMenuForm();// array class
        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/dataKegiatan');
        $this->load->view('template_admin/footer');
    }

    public function detailKegiatanUser($id)
    {
        $title['judul'] = "Kegiatan Detail User | BPS";
        //SELECT u.nama_user,kd.target,kd.realisasi FROM kegiatan_detail as kd INNER JOIN user as u on u.id_user = kd.id_user
        // $this->db->select('u.nama_user,kd.target,kd.realisasi');
        // $this->db->join('user as u','u.id_user = kd.id_user');
        // $this->db->group_by('kd.id_user');
        // $data['userdetail'] = $this->db->get_where('kegiatan_detail as kd',["kd.id_user" => $id])->result_array();
        // print_r($data['userdetail']);die;
        // SELECT k.uraian_kegiatan,u.nama_user,kd.target,kd.realisasi FROM kegiatan_detail as kd
        // INNER JOIN user as u 
        // on u.id_user = kd.id_user
        // INNER JOIN kegiatan as k
        // on k.id_kegiatan = kd.id_kegiatan
        // WHERE kd.id_user = 4
        $this->db->select('k.uraian_kegiatan,u.nama_user,kd.target,kd.realisasi,kd.target');
        $this->db->join('user as u','u.id_user = kd.id_user');
        $this->db->join('kegiatan as k','k.id_kegiatan = kd.id_kegiatan');
        // $this->db->group_by('kd.id_user');
        $data['kegiatandetail'] = $this->db->get_where('kegiatan_detail as kd',["kd.id_user" => $id])->result_array();
        $data['userdetail'] = $this->db->get_where('user',["id_user" => $id])->result_array();
        ///select kd.id_kegiatan,kd.id_user from kegiatan_detail as kd where kd.id_user = 4
        // $data['kegiatandetail'] = $this->db->get_where('kegiatan_detail',["id_user" => $id])->result_array();
        //var_dump($data['kegiatandetail']);die;

        $data['listmenu']   = getMenuLink(); // array di helper   
        $data['menuform'] = getMenuForm();// array class
        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/detailuser');
        $this->load->view('template_admin/footer');
    }

    public function addseksi() // DONE
    {   
        $data['judul']      = "Tambah Seksi | BPS";
        $data['listmenu']   = getMenuLink(); // array di helper   
        $data['menuform'] = getMenuForm();// array class
        $data['listseksi'] = $this->modeladmin->getUser('seksi',0);
        
        $this->form_validation->set_rules('nama_seksi','Nama Seksi','required'); // validation 

        if ($this->form_validation->run() == FALSE) { 
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahseksi');
            $this->load->view('template_admin/footer',$data);
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('seksi',1);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('seksi')); 
        } 
    }

    public function addmitra()// DONE
    {
        $title['judul']     = "Tambah Mitra  | BPS";
        $data['listmenu'] = getMenuLink(); // array di helper
        $data['menuform'] = getMenuForm();// array class
        $data['listmitra'] = $this->modeladmin->getUser('mitra',0);
        
        $this->form_validation->set_rules('nama_mitra','Mitra','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahmitra');
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('mitra',2);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('mitra')); 
        }
    }

    public function addjabatan() // DONE
    {
        $title['judul']     = "Tambah Jabatan | BPS";
        $data['listmenu'] = getMenuLink(); // array di helper
        $data['menuform'] = getMenuForm();// array class
        $data['listjabatan'] = $this->modeladmin->getUser('jabatan',0);
        

        $this->form_validation->set_rules('nama_jabatan','Jabatan','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahjabatan');
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('jabatan',3);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('jabatan')); 
        }
    }

    public function addkegiatan()
    {
        $title['judul']     = "Tambah Kegiatan | BPS";
        $data['listmenu'] = getMenuLink(); // array di helper
        $data['menuform'] = getMenuForm();// array class
        $data['listseksi'] = $this->modeladmin->getUser('seksi',0);
        $data['listuser'] = $this->db->get_where('user',["nama_user !=" => NULL])->result_array();

        // $this->form_validation->set_rules('input_seksi','Seksi','required');
        $this->form_validation->set_rules('nama_kegiatan','Kegiatan','required'); // validation
        // $this->form_validation->set_rules('input_vol','Volume','required');
        // $this->form_validation->set_rules('input_satuan','Satuan','required');
        // $this->form_validation->set_rules('target_penyelesaian','target_penyelesaian','required');

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahkegiatan');
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('kegiatan',5);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('kegiatan')); 
        }
    }

    public function addtargetuser()
    {
        $title['judul']     = "Tambah Targget User | BPS";
        $data['listmenu'] = getMenuLink(); // array di helper
        $data['menuform'] = getMenuForm();// array class
        $data['listuser'] = $this->db->get_where('user',["nama_user !=" => NULL])->result_array();
        $data['listkegiatan'] = $this->db->get('kegiatan')->result_array();

        $this->form_validation->set_rules('input_target','Target','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahtarget');
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('kegiatan_detail',7);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('targetuser')); 
        }
    }
    public function adduser() // DONE
    {
        $title['judul']     = "Tambah User | BPS";
        $data['listmenu'] = getMenuLink(); // array di helper
        $data['menuform'] = getMenuForm();// array class
        
        $data['listuser'] = $this->db->get_where('user',["nama_user !=" => NULL])->result_array();
        $data['listseksi'] = $this->modeladmin->getUser('seksi',0);
        $data['listjabatan'] = $this->modeladmin->getUser('jabatan',0);
        $data['listkecamatan'] = $this->modeladmin->getUser('kecamatan',0);
        $this->form_validation->set_rules('nama_user','User','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahuser');
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('user',4);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('user')); 
        }
    }

    public function addadmin() // DONE
    {
        if ($this->session->userdata('id_role') == 2) {
            redirect(base_url('admin'));
        }
        $title['judul']     = "Tambah Admin | BPS";
        $data['listmenu'] = getMenuLink(); // array di helper
        $data['menuform']   = getMenuForm(); // array di helper
        
        $data['listadmin'] = $this->modeladmin->getUser('admin',0);

        $this->form_validation->set_rules('username','Username','required');

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahadmin', $data);
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $data = $this->modeladmin->createData('admin',8);
            if ($data == true) {
                $this->session->set_flashdata('usernamesama','<div class="alert alert-danger" role="alert" dismiss="close">Username <strong>tidak boleh sama</strong></div>');
                redirect(base_url('addadmin'));
            }else{
                # code...
                $this->session->set_flashdata('pesan','Ditambah');
                redirect(base_url('addadmin'));
            }
        }
        
    }

    public function addpejabat() // DONE
    {
        $title['judul']     = "Tambah User | BPS";
        $data['listmenu']   = getMenuLink(); // array di helper
        $data['menuform']   = getMenuForm(); // array di helper

        $this->db->select('p.id_pejabat,s.nama_seksi,j.id_jabatan,j.nama_jabatan,p.id_seksi,p.nama_user');
        $this->db->join('seksi as s','s.id_seksi = p.id_seksi');
        $this->db->join('jabatan as j','j.id_jabatan = p.id_jabatan');
        $data['listpejabat']    = $this->db->get('pejabat as p')->result_array();

        $data['listseksi']      = $this->modeladmin->getUser('seksi',0);
        $data['listjabatan']    = $this->modeladmin->getUser('jabatan',0);

        $this->form_validation->set_rules('nama_user','Nama Anggota','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahpejabat', $data);
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('pejabat',9);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('pejabat')); 
        }
    }



    public function editmitra($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('mitra'));
        }
        $title['judul']     = "Edit Mitra  | BPS";
        $data['listmenu']   = getMenuLink(); // array di helper
        $data['menuform'] = getMenuForm();// array class
        $data['listmitra']  = $this->modeladmin->getUser('mitra',$id);
        $data['allmitra']   = $this->modeladmin->getUser('mitra',0);

        $this->form_validation->set_rules('nama_mitra','Nama Mitra','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/editdata/editmitra', $data);
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->updateData('mitra',1,$id);
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('mitra')); 
        }
        
    }

    // --------------------------- \\
    //        DELETE FUNCTIONS      \\
    // ----------------------------- \\
    // 1 = seksi, 2 = mitra, 3 = user, 4 = kegiatan, 5 = jabatan, 6 = admin, 7 = pejabat
    public function deleteSeksi($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('seksi'));
        }
        $this->modeladmin->deleteData('seksi',1,$id);
        $this->session->set_flashdata('pesan','Dihapus');
    }
    public function deleteMitra($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('mitra'));
        }
        $this->modeladmin->deleteData('mitra',2,$id);
        $this->session->set_flashdata('pesan','Dihapus');
    }
    public function deleteUser($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('user'));
        }
        $this->modeladmin->deleteData('user',3,$id);
        $this->session->set_flashdata('pesan','Dihapus');
    }
    public function deleteAdmin($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('addadmin'));
        }
        $this->modeladmin->deleteData('admin',6,$id);
        $this->session->set_flashdata('pesan','Dihapus');
    }
    public function deleteJabatan($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('jabatan'));
        }
        $this->modeladmin->deleteData('jabatan',5,$id);
        $this->session->set_flashdata('pesan','Dihapus');
    }
    public function deletePejabat($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('pejabat'));
        }
        $this->modeladmin->deleteData('pejabat',7,$id);
        $this->session->set_flashdata('pesan','Dihapus');
    }

    public function deleteKegiatan($id = null)
    {
        if (!$id) {
            $data = array('status' => false , 'messages' => 'no results from database' );
            echo json_encode($data);
        }else{
            $data = $this->modeladmin->deleteData('kegiatan',5,$id);
            if ($data == true) {
                $this->session->set_flashdata('hapus','Berhasil dihapus');
                redirect(base_url('kegiatan'));
            }else{
                echo "data gagal dihapus";
            }
        }
    }
    

    























    // INI JANGAN DIUTIK GAYS :D BUAT TESTING 
    public function hh($tabel = null,$id = null){
        // $data = $this->modeladmin->getTarget(1,4);
        // echo json_encode($data);die;
        // model
        if ($tabel == null) {
            echo json_encode(["status" => false, "messages" => "access denied"]);
        }else{
            $data['data'] = $this->modeladmin->getUser($tabel,$id);
            echo $data['data'];
        }
        // helper
        // $list = getuser();
        // echo json_encode($list);
    }
    public function show(){
        $res = $this->db->get('user')->result_object();
        echo json_encode(array("data" => $res));
    }
    public function tes()
    {
        // $data['list'] = $this->db->get('user')->result_array();
        // print_r($data['list']);die;
        // $data = array("list" =>  $this->db->get('user')->result_array());
        // return json_encode($data);
        
        $data['listmenu']   = getMenuLink(); // array di helper   
        $data['menuform'] = getMenuForm();// array class
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/tes');
        $this->load->view('template_admin/footer');
        
        // $data = $this->db->get_where('user',["nama_user !=" => NULL])->result_array();
        // echo json_encode($data);
        // if ($id) {
        //     $data['list'] = $this->modeladmin->getUser($id);
        //     var_dump($data['list']);//die;
        // } else {
        //     $data['list'] = $this->modeladmin->getUser();
        //     var_dump($data['list']);
        // }
        
        // echo "<h1>".$this->db->last_query()."</h1>"; 
    }

    public function test() {
        $semua_kegiatan = $this->db->get('v_kegiatan')->result_array();
        $semua_user = $this->db->query("SELECT * FROM v_kegiatan_detail GROUP BY id_user")->result_array();

        $parser['semua_kegiatan'] = $semua_kegiatan;
        $parser['semua_user'] = $semua_user;

        $this->load->view('test', $parser);
    }



}
