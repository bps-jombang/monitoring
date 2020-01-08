<?php 

class Page extends CI_Controller { 


    public function __construct() 
    { 
        parent::__construct(); 
    }
    
    public function login()
	{	
		$this->load->view('auth/loginadmin');
    }

    public function dashboard()
	{	
        $this->load->view('template_admin/header');
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

    public function dataKegiatan()
	{	
        $data['list'] = $this->db->get('pimp')->result_array();
        // var_dump($data);die;
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/page/dataKegiatan',$data); 
        $this->load->view('template_admin/footer');
    }
    
    public function profile()
    {   
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/page/profile');
        $this->load->view('template_admin/footer');
    }
}

