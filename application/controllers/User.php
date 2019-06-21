<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        
    }

    public function index()
    {
        $this->load->view('admin/user.php');
        
    }

    function data_user()
    {
        $data=$this->M_user->list_akun();
        echo json_encode($data);
    }

    function tambah_saldo(){
        $idakun=$this->input->post('id_akun');
        $saldo=$this->input->post('saldo');
        $data=$this->M_user->tambah_saldo($idakun,$saldo);
        echo json_encode($data);
    }

    function hapus_akun(){
        $idakun=$this->input->post('id_akun');
        $data=$this->M_user->hapus_akun($idakun);
        echo json_encode($data);
    }



}

/* End of file User.php */

?>