<?php 

class Auth extends CI_Controller { 

    public function __construct() 
    { 
        parent::__construct(); 
        $this->load->library('form_validation');
        $this->load->model('Model_login', 'modellogin');
    }
    
    public function index()
    {
        redirect(base_url('auth/admin'));
    }

    public function admin()
    {
        if ($this->session->userdata('username')) { // Jika ada session admin tidak boleh login lagi
            redirect(base_url('home'));
		} else {
            $this->load->view('auth/loginadmin');
		}
    }

    public function prosesloginadmin()
    {
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/loginadmin');
        }else{
            $username   = strtolower(htmlspecialchars($this->input->post('username',true)));
            $password   = htmlspecialchars($this->input->post('password',true));
            $query      = $this->modellogin->login('admin',$username,$password);
            if ($query > 0 ) {
                if($query["id_role"] == 2){
                    $data = ["id_admin" => $query['id_admin'],"username" => $username, "id_role" => $query['id_role']];
                    $this->session->set_userdata($data);
                    redirect(base_url('home'));
                }else{
                    $data = ["id_admin" => $query['id_admin'],"username" => $username, "id_role" => $query['id_role']];
                    $this->session->set_userdata($data);
                    redirect(base_url('home'));
                }
            }else{
                $this->session->set_flashdata('gagal','<div class="alert alert-danger" role="alert">Username atau Password salah!!</div>');
                redirect(base_url('loginadmin'));
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect(base_url('loginadmin'));
    }

}