<?php 

class Admin extends CI_Controller { 

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
                "Jabatan" => "Tambah Jabatan",
            ],
        "nama_form" => "Form tambah data"
        ];
    public function __construct() 
    { 
        parent::__construct(); 
        $this->load->library('form_validation');
        $this->load->model('Model_admin', 'modeladmin');
        $this->load->helper('admin_helper');
        $this->load->library('form_validation');
        
    }
    public function ass(){
        // $data = getMenuLink();
        // print_r($data);
        // $this->load->view('admin/testing',$data);
        
        // var_dump($menu);
        // foreach ($this->data["sidebar"] as $key1 => $value1) {
        //     echo "<br>Key [ ".$key1. " ] value => ".$value1;
        // }
        // foreach ($this->data as $key1 => $value1) {
        //    echo "<br>Key [ ".$key1. " ] value => ".$value1;
        // }
       // echo "<br>". count($this->data["sidebar"]["arrTambah"]);
        // echo "<br>". $this->data["sidebar2"]["Seksi2"]["TambahSeksi2"];
        // echo json_encode($this->data);
    }
    public function addseksi()
    {
        // $data["list"] = $this->modeladmin->createSeksi();
        // $data = $this->modeladmin->createSeksi();
        // echo json_encode($data);
        
        $data['listmenu']   = getMenuLink(); // array di helper   
        $data['sidebar']    = $this->info; // array class
        
        $this->form_validation->set_rules('nokec','Nomor kecamatan','required');
        $this->form_validation->set_rules('nakec','Nama kecamatan','required');

        if ($this->form_validation->run() == FALSE) {
            # 
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahsie', $this->info);
            $this->load->view('template_admin/footer');
        }else{
            $this->modeladmin->createSeksi('kecamatan');
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('seksi')); 
        } 
    }
    public function addmitra()
    {
        $data['listmenu'] = getMenuLink(); // array di helper
        $data['sidebar'] = $this->info; // array class
        
        $this->form_validation->set_rules('nama_mitra','Mitra','required');

        if ($this->form_validation->run() == FALSE) {
            # 
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahmitra', $this->info);
            $this->load->view('template_admin/footer');
        }else{
            $this->modeladmin->createSeksi('mitra',1);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('mitra')); 
        }
    }
    public function hh(){
        $list = getuser();
        echo json_encode($list);
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
    public function index() 
    {
        // $this->db->select('k.nomor_kecamatan,k.nama_kecamatan,user.nama_user');
        // $this->db->join('kecamatan as k','k.id_kecamatan = user.id_kecamatan');
        // $data['user'] = $this->db->get('user')->result_array();

        // $this->db->select('kegiatan.id_kegiatan,s.nama_seksi,kegiatan.uraian_kegiatan,kegiatan.vol,kegiatan.satuan,kegiatan.target_penyelesaian');
        // $this->db->join('seksi as s','s.id_seksi = kegiatan.id_seksi');
        // $data['kegiatan'] = $this->db->get('kegiatan')->result_array();

        // $data['detail'] = $this->db->get('kegiatan_detail')->result_array();

        // SELECT k.uraian_kegiatan,k.id_seksi,k.vol,k.satuan,k.target_penyelesaian,u.nama_user,kc.nama_kecamatan,kd.target,kd.realisasi

        // FROM kegiatan_detail as kd
        // INNER JOIN user as u 
        // ON u.id_user = kd.id_user
        // INNER JOIN kegiatan as k 
        // ON k.id_kegiatan = kd.id_kegiatan
        // INNER JOIN kecamatan as kc
        // ON kc.id_kecamatan = kd.id_user
        // $data['list'] = $this->modeladmin->getUser(1);
        // var_dump($data['list']);die;

        $this->db->select('k.uraian_kegiatan,s.nama_seksi,k.vol,k.satuan,k.target_penyelesaian,u.nama_user,kc.nama_kecamatan,kd.target,kd.realisasi');
        $this->db->join('user as u','u.id_user = kd.id_user');
        $this->db->join('kegiatan as k','k.id_kegiatan = kd.id_kegiatan');
        $this->db->join('kecamatan as kc','kc.id_kecamatan = kd.id_user');
        $this->db->join('seksi as s','s.id_seksi = kd.id_user');
        $resdb['list'] = $this->db->get('kegiatan_detail as kd')->result_array();

        $this->db->order_by('id_kegiatan');
        $resdb['orderuraian'] = $this->db->get('kegiatan')->result_array();

        // SELECT * FROM `kegiatan_detail` GROUP BY id_user ASC 
        $this->db->group_by('id_user');
        $resdb['sortuser'] = $this->db->get('kegiatan_detail')->result_array();
        // $this->db->distinct('id_user');
        // $data['user']= $this->db->get('user')->result_array();
         // var_dump($data);die;
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar', $this->data);
        $this->load->view('template_admin/navbar');
        
        $this->load->view('admin/index',$resdb);
        $this->load->view('template_admin/footer');
    }
    public function loginadmin()
    {
        $this->load->view('auth/loginadmin');
    }

    public function prosesloginadmin()
    {
        $this->form_validation->set_rules('username','Username','trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password','Password','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/loginadmin');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            var_dump($this->input->post());
        }
    }
}

