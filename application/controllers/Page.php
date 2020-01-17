<?php 

class Page extends CI_Controller { 


    public function __construct() 
    { 
        parent::__construct(); 
        $this->load->model(['Model_admin' => 'modeladmin','Model_login' => 'modellogin']);
        $this->load->helper('admin_helper');
        if (!$this->session->userdata('username')) {
            redirect(base_url('loginadmin'));
        }
    }
    
    public function login()
	{	
		$this->load->view('auth/loginadmin');
    }

    public function dashboard()
	{	
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/page/dashboard');
    }

    public function tambahData()
	{	
        $data['list'] = $this->db->get('pimp')->result_array();
        // var_dump($data);die;
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/page/tambahData',$data); 
        $this->load->view('template_admin/footer');
    }
    
    public function profile($id)
    {   
        
        $title['judul']     = "MyProfile | BPS";
        $data['user']  = $this->db->get('admin',["id_admin" => $id])->row_array();
        $data['listmenu']   = getMenuLink(); // array di helper   

        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar',$data);
        $this->load->view('admin/page/profile',$data);
        $this->load->view('template_admin/footer');
        
    }
}

