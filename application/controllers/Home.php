<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        if ($this->session->userdata('masuk') != TRUE) {
            show_404();
        }

        
        // var_dump($data["user"][0]->id_akun);
    }
    

    public function index()
    {
        $data["user"]=$this->M_user->get_akun($_SESSION['id_user']);
        $this->load->view('home',$data);
    }
    

}

/* End of file Home.php */

?>    