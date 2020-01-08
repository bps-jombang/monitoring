<?php 

class Admin extends CI_Controller { 


    public function __construct() 
    { 
        parent::__construct(); 
        $this->load->library('form_validation');
        
    }
    
    public function index() 
    {
        $this->db->select('k.nomor_kecamatan,k.nama_kecamatan,user.nama_user');
        $this->db->join('kecamatan as k','k.id_kecamatan = user.id_kecamatan');
        $data['user'] = $this->db->get('user')->result_array();

        $this->db->select('kegiatan.id_kegiatan,s.nama_seksi,kegiatan.uraian_kegiatan,kegiatan.vol,kegiatan.satuan,kegiatan.target_penyelesaian');
        $this->db->join('seksi as s','s.id_seksi = kegiatan.id_seksi');
        $data['kegiatan'] = $this->db->get('kegiatan')->result_array();
        // var_dump($data);die;
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/index',$data); 
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

