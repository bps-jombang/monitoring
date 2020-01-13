<?php

class Admin extends CI_Controller
{

    public $info = 
        ["sidebar" => 
            [
                "arrTambah" => [
                    "Tambah Seksi" => "link seksi",
                    "Tambah Admin" => "link admin",
                    "Tambah Kecamatan" => "link kecamatan",
                    "Tambah User" => "link user",
                    "Tambah Mitra" => "link mitra"
                ],
                "User" => "Tambah User",
                "Seksi" => "Tambah Seksi",
                "Mitra" => "Tambah Mitra",
                "Kegiatan" => "Tambah Kegiatan",
                "Jabatan" => "Tambah Jabatan",
            ],
        "nama_form" => "Form tambah data"
        ];
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

    public function index() 
    {
        $data['sidebar']    = $this->info; // array class
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/index', $this->info);
        $this->load->view('template_admin/footer');
    }

    public function dataKegiatan()
    {
        $this->db->select('k.uraian_kegiatan,s.nama_seksi,k.vol,k.satuan,k.target_penyelesaian,u.nama_user,kc.nama_kecamatan,kd.target,kd.realisasi');
        $this->db->join('user as u','u.id_user = kd.id_user');
        $this->db->join('kegiatan as k','k.id_kegiatan = kd.id_kegiatan');
        $this->db->join('kecamatan as kc','kc.id_kecamatan = kd.id_user');
        $this->db->join('seksi as s','s.id_seksi = kd.id_user');
        $data['list'] = $this->db->get('kegiatan_detail as kd')->result_array();

        $this->db->order_by('id_kegiatan');
        $data['orderuraian'] = $this->db->get('kegiatan')->result_array();

        $this->db->group_by('id_user');
        $data['sortuser'] = $this->db->get('kegiatan_detail')->result_array();

        $data['listmenu']   = getMenuLink(); // array di helper   
        $data['sidebar']    = $this->info; // array class
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/dataKegiatan', $this->info);
        $this->load->view('template_admin/footer');
        // $this->load->view('admin/index',$parser); 

        // FROM kegiatan_detail as kd
        // INNER JOIN user as u 
        // ON u.id_user = kd.id_user
        // INNER JOIN kegiatan as k 
        // ON k.id_kegiatan = kd.id_kegiatan
        // INNER JOIN kecamatan as kc
        // ON kc.id_kecamatan = kd.id_user
        $this->db->select('k.uraian_kegiatan,s.nama_seksi,k.vol,k.satuan,k.target_penyelesaian,u.nama_user,kc.nama_kecamatan,kd.target,kd.realisasi');
        $this->db->join('user as u', 'u.id_user = kd.id_user');
        $this->db->join('kegiatan as k', 'k.id_kegiatan = kd.id_kegiatan');
        $this->db->join('kecamatan as kc', 'kc.id_kecamatan = kd.id_user');
        $this->db->join('seksi as s', 's.id_seksi = kd.id_user');
        $data['list'] = $this->db->get('kegiatan_detail as kd')->result_array();
        // var_dump($data);die;
        // $this->load->view('template_admin/header');
        // $this->load->view('template_admin/sidebar');
        // // $this->load->view('admin/index',$data); 
        // $this->load->view('template_admin/footer');
    }

    public function addseksi()
    {   
        $data['listmenu']   = getMenuLink(); // array di helper   
        $data['sidebar']    = $this->info; // array class
        $data['listseksi'] = $this->modeladmin->getUser('seksi',0);
        
        $this->form_validation->set_rules('nama_seksi','Nama Seksi','required'); // validation 

        if ($this->form_validation->run() == FALSE) { 
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahsie', $this->info);
            $this->load->view('template_admin/modal');
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('seksi',1);
            $this->session->set_flashdata('pesan','<span class="alert alert-success">Data berhasil Ditambah</span>');
            redirect(base_url('seksi')); 
        } 
    }

    public function addmitra()
    {
        $data['listmenu'] = getMenuLink(); // array di helper
        $data['sidebar'] = $this->info; // array class
        
        $this->form_validation->set_rules('nama_mitra','Mitra','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahmitra', $this->info);
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('mitra',2);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('mitra')); 
        }
    }
    // COPAS DIBAWAH ini untuk add kegiatan,jabatan dsb
    public function addjabatan()
    {
        $data['listmenu'] = getMenuLink(); // array di helper
        $data['sidebar'] = $this->info; // array class
        
        $this->form_validation->set_rules('nama_jabatan','Jabatan','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahjabatan', $this->info);
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('jabatan',6);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('jabatan')); 
        }
    }

    public function addkegiatan()
    {
        $data['listmenu'] = getMenuLink(); // array di helper
        $data['sidebar'] = $this->info; // array class
        $this->form_validation->set_rules('uraian_kegiatan','Kegiatan','required'); // validation
        $this->form_validation->set_rules('vol','Volume','required');
        $this->form_validation->set_rules('satuan','Satuan','required');
        $this->form_validation->set_rules('target_penyelesaian','target_penyelesaian','required');

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahkegiatan', $this->info);
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('kegiatan',5);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('kegiatan')); 
        }
    }

    public function adduser()
    {
        $data['listmenu'] = getMenuLink(); // array di helper
        $data['sidebar'] = $this->info; // array class
        $this->form_validation->set_rules('nama_user','User','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahUser', $this->info);
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('user',4);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('user')); 
        }
    }







    

    // INI JANGAN DIUTIK GAYS :D BUAT TESTING 
    public function hh($tabel = null,$id = null){
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
    public function tes($id = null)
    {
        if ($id) {
            $data['list'] = $this->modeladmin->getUser($id);
            var_dump($data['list']);//die;
        } else {
            $data['list'] = $this->modeladmin->getUser();
            var_dump($data['list']);
        }
        
        echo "<h1>".$this->db->last_query()."</h1>"; 
    }
}
