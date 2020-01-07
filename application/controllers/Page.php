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
    
    public function profile()
    {   
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/page/profile');
        $this->load->view('template_admin/header');
    }
}

