<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Others extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }
    

    public function investasi()
    {
        $data["user"]=$this->M_user->get_akun($_SESSION['id_user']);
        $this->load->view('admin/investasi.php',$data);
        $this->load->model('M_user');
        
    }
    public function hutang()
    {
        $data["user"]=$this->M_user->get_akun($_SESSION['id_user']);
        $this->load->view('admin/hutang.php',$data);
    }

}

/* End of file Others.php */

?>