<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_penjualan');
        // $this->load->model('M_');
        
    }
    

    public function index()
    {
        $data["order"]=$this->M_penjualan->get_order($_SESSION['id_user']);
        $data["user"]=$this->M_user->get_akun($_SESSION['id_user']);
        $this->load->view('profil',$data);
    }

    function get_akun(){
        $data["user"]=$this->M_user->get_akun($_SESSION['id_user']);
        echo json_encode($data);
    }
    function riwayat(){
        $riwayat=$this->M_penjualan->get_riwayat($_SESSION['id_user']);
        echo json_encode($riwayat);
    }

}

/* End of file Profil.php */


?>