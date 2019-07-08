<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        if ($this->session->userdata('masuk') != TRUE){
            redirect('index.php/login');
        }  
    }
    

    public function index()
    {
        // var_dump($this->session->userdata('masuk')); exit();
        $data["user"]=$this->M_user->get_akun($_SESSION['id_user']);
        $this->load->view('home',$data);
    }
    

}

/* End of file Home.php */

?>    