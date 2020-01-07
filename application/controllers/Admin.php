<?php 

class Admin extends CI_Controller { 


    public function __construct() 
    { 
        parent::__construct(); 
        $this->load->library('form_validation');
        
    }
    
    public function index() 
    {
        // $this->db->select([
        //     'customerNumber','customerName',
        //     'contactLastName','city','country',
        //     'addressLine1','addressLine2','postalCode'
        //     ,'creditLimit'
        // ]);
        // $this->db->select(['id_role','nama_role']);
        
        $data['list'] = $this->db->get('pimp')->result_array();
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

