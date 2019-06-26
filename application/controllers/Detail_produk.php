<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_produk extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_produk');
        
    }
    
    public function index()
    {
        $data["user"]=$this->M_user->get_akun($_SESSION['id_user']);
        $kode=$this->input->get('id');
        $data["produk"]=$this->M_produk->get_produk_byid($kode);
        // var_dump($data["produk"]);
        $this->load->view('produk',$data);
        
    }

}

/* End of file Detail_produk.php */
?>