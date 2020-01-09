<?php 

class Admin extends CI_Controller { 


    public function __construct() 
    { 
        parent::__construct(); 
        $this->load->library('form_validation');
        
    }
    public function tes()
    {
        $this->db->select('k.uraian_kegiatan,s.nama_seksi,k.vol,k.satuan,k.target_penyelesaian,u.nama_user,kc.nama_kecamatan,kd.target,kd.realisasi');
        $this->db->join('user as u','u.id_user = kd.id_user');
        $this->db->join('kegiatan as k','k.id_kegiatan = kd.id_kegiatan');
        $this->db->join('kecamatan as kc','kc.id_kecamatan = kd.id_user');
        $this->db->join('seksi as s','s.id_seksi = kd.id_user');
        // $this->db->where('u.id_user = kd.id_user');
        // $this->db->distinct('id_user');
        $data['list'] = $this->db->get('kegiatan_detail as kd')->result_array();
        //$this->db->select("id_user");
        //SELECT COUNT(DISTINCT Country) FROM Customers;
        // $data['list'] = $this->db->get('kegiatan_detail')->result_array();
        // var_dump($data['list']);die;
        // $this->db->join('kegiatan_detail' ,'kegiatan_detail.id_user = user.id_user');
        // $data['user']= $this->db->get('user')->result_array();
        // $this->db->where('id_user' );
        // $data['list'] = $this->db->get('kegiatan_detail')->result_array();
        // print_r($data['list']);
        // $this->db->distinct();
        // $data['distinct'] = $this->db->get('kegiatan_detail')->result_array();
        
        // SELECT COUNT(DISTINCT Country) FROM Customers;
        // $this->db->select(COUNT(DISTINCT id_user));
        // $this->;
        echo $this->db->last_query(); 
        $this->load->view('admin/tes',$data); 
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
        $this->db->select('k.uraian_kegiatan,s.nama_seksi,k.vol,k.satuan,k.target_penyelesaian,u.nama_user,kc.nama_kecamatan,kd.target,kd.realisasi');
        $this->db->join('user as u','u.id_user = kd.id_user');
        $this->db->join('kegiatan as k','k.id_kegiatan = kd.id_kegiatan');
        $this->db->join('kecamatan as kc','kc.id_kecamatan = kd.id_user');
        $this->db->join('seksi as s','s.id_seksi = kd.id_user');
        $data['list'] = $this->db->get('kegiatan_detail as kd')->result_array();

        $this->db->order_by('id_kegiatan');
        $data['orderuraian'] = $this->db->get('kegiatan')->result_array();

        // SELECT * FROM `kegiatan_detail` GROUP BY id_user ASC 
        $this->db->group_by('id_user');
        $data['sortuser'] = $this->db->get('kegiatan_detail')->result_array();
        // $this->db->distinct('id_user');
        // $data['user']= $this->db->get('user')->result_array();
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

