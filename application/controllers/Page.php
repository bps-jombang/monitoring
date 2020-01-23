<?php 

class Page extends CI_Controller { 


    public function __construct() 
    { 
        parent::__construct(); 
        $this->load->model(['Model_admin' => 'modeladmin','Model_login' => 'modellogin']);
        $this->load->helper('admin_helper');
        $this->load->library('form_validation');
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
    
    public function profile()
    {   
        $title['judul']     = "MyProfile | BPS";
        $data['user']  = $this->db->get('admin',["id_admin" => $this->session->userdata('id_admin')])->row_array();
        $data['listmenu']   = getMenuLink(); // array di helper   

        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar',$data);
        $this->load->view('admin/page/profile',$data);
        $this->load->view('template_admin/footer');
        
    }
    public function updatepass()
    {
        $title['judul']     = "MyProfile | BPS";
        $data['user']       = $this->db->get_where('admin',["username" => $this->session->userdata('username')])->row_array();
        $data['listmenu']   = getMenuLink(); // array di helper   

        $this->form_validation->set_rules('passlama','password lama','required');
        $this->form_validation->set_rules('passbaru','password baru','required|matches[passkonfir]');
        $this->form_validation->set_rules('passkonfir','password lama','required|matches[passbaru]');

        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar',$data);
            $this->load->view('admin/page/profile',$data);
            $this->load->view('template_admin/footer');

        }else{
            $passbaru       = $this->input->post('passbaru');
            $passlama     = $this->input->post('passlama');
             
            if (!password_verify($passlama,$data["user"]["password"])) {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert" dismiss="close">Password <strong>tidak sama!!</strong></div>');
                redirect(base_url('profile/'.uniqid($this->session->userdata('id_admin'))));
            }else{
                if ($passbaru == $passlama) {
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert" dismiss="close">Password <strong>baru tidak boleh seperti password lama</strong></div>');
                    redirect(base_url('profile/'.uniqid($this->session->userdata('id_admin'))));
                }else{
                    $this->db->update('admin',["password" => password_hash($passbaru,PASSWORD_DEFAULT)],["username" => $this->session->userdata('username')]);
                    $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert" dismiss="close">Password <strong>berhasil diubah!!</strong></div>');
                    redirect(base_url('profile/'.uniqid($this->session->userdata('id_admin'))));
                }
            }
        }

    }
}

