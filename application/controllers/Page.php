<?php 

class Page extends CI_Controller { 


    public function __construct() 
    { 
        parent::__construct(); 
    }
    
    public function index() 
    {
        $this->db->select([
            'customerNumber','customerName',
            'contactLastName','city','country',
            'addressLine1','addressLine2','postalCode'
            ,'creditLimit'
        ]);
        $data['list'] = $this->db->get('customers')->result_array();
        // var_dump($data);die;
        $this->load->view('admin/index',$data); 
    }
    
    

}

