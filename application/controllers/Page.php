<?php 

class Page extends CI_Controller { 


    public function __construct() 
    { 
        parent::__construct(); 
    }
    
    public function login()
	{	
		$this->load->view('admin/page/login');
    }
    
    public function profile()
    {
        $this->load->view('admin/page/profile');
    }
}

