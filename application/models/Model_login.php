<?php 

class Model_login extends CI_Model { 

    public function login($tabel,$username,$password)
    {
        $username   =   htmlspecialchars($username,true);
        $password   =   stripslashes($password);
        $result     =   $this->db->get_where($tabel,['username' => $username])->row_array();
        if (password_verify($password,$result['password'])) {
            return $result;
        }else{
            return false;
        }
    }

}