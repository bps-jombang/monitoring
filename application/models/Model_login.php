<?php 

class Model_login extends CI_Model { 

    public function login($tabel,$where,$username,$password)
    {
        $username   =   stripslashes($username);
        $password   =   password_verify($password);
    }


}

