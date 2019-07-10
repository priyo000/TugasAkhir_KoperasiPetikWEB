<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        if ($this->session->userdata('masuk') != TRUE || $this->session->userdata('level')!='2') {
            show_404();
        } 
    }

    public function index()
    {
        $data["user"]=$this->M_user->get_akun($_SESSION['id_user']);
        $this->load->view('admin/user.php',$data);
        
    }

    function data_user()
    {
        $data=$this->M_user->list_akun();
        echo json_encode($data);
    }

    function tambah_user(){
        $nim=$this->input->post('nim');
        $password=$this->input->post('password');
        $level=$this->input->post('level');
        $data=$this->M_user->tambah_user($nim,md5($password),$level);
        echo json_encode($data);
    }

    function tambah_saldo(){
        $idakun=$this->input->post('id_akun');
        $saldo=$this->input->post('saldo');
        $point=$this->input->post('point');
        $data=$this->M_user->tambah_saldo($idakun,$saldo,$point);
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