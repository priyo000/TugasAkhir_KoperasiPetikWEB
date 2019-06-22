<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('vlogin');
        
    }

    //cek nim dan password mahasiswa
    function auth_mahasiswa($username,$password){
        $query=$this->db->query("SELECT * FROM mahasiswa WHERE nim='$username' AND pass=MD5('$password') LIMIT 1");
        return $query;
    }
 

}

/* End of file Login.php */

?>