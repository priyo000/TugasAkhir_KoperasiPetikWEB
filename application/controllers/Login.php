<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index()
    {
        $this->load->view('vlogin');
        
    }

    //cek nim dan password mahasiswa
    function aut(){
        $id=$this->input->post('id');
        $pass=$this->input->post('pass');
        $hasil=$this->M_login->cek_akun($id,$pass);
        $data=$hasil->row_array();
        if ($data['level']>0) {
            if ($data['level']=='2') {
                $this->session->set_userdata('id_user',$data['id_akun']);
                $this->session->set_userdata('level',$data['level']);
                $this->session->set_userdata('nama',$data['name']);

                $url=base_url().'index.php/home';
                redirect($url);
            } else {
                $this->session->set_userdata('id_user',$data['id_akun']);
                $this->session->set_userdata('level',$data['level']);
                $this->session->set_userdata('nama',$data['name']);
                $this->session->set_userdata('username',$data['username']);
                
                $url=base_url().'index.php/home';
                redirect($url);
            }
            
        } else {
            $url=base_url().'index.php/login';
            redirect($url);
            
        }
        

    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'index.php/login');
    }
 

}

/* End of file Login.php */

?>