<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_cart');
        $this->load->model('M_user');
        
    }
    
    
    
    public function index()
    {
        $data["user"]=$this->M_user->get_akun($_SESSION['id_user']);
        $this->load->view('checkout',$data);
    }

    function load_keranjang()
    {
        $isi=$this->M_cart->isi_keranjang($_SESSION['id_user']);
        echo json_encode($isi);
    }
    function hapus_isi()
    {
        $id=$this->input->post('id_dorder');
        $isi=$this->M_cart->hapus_isi($id);
        echo json_encode($isi);
    }
    function update_isi()
    {
        $id=$this->input->post('id_dorder');
        $qty=$this->input->post('qty');
        $st=$this->input->post('subtotal');
        $isi=$this->M_cart->hapus_isi($id,$qty,$st);
        // echo json_encode($isi);
    }
    function tambah_isi(){
        $cek=$this->M_cart->cek_keranjang($_SESSION['id_user']);
        $idproduk=$this->input->post('idproduk');
        $qty=$this->input->post('qty');
        $hrg=$this->input->post('hrg');
        $ttl=$qty*$hrg;
        if (count($cek)>0) {
            $this->M_cart->tambah_isi($cek[0]->id_order,$idproduk,$qty,$ttl);
        }else{
            $idorder=time();
            $this->M_cart->buat_keranjang($idorder,$_SESSION['id_user']);
            $this->M_cart->tambah_isi($idorder,$idproduk,$qty,$ttl);
        }
    }
    function bayar_saldo()
    {
        $id=$this->input->post('id_dorder');
        $qty=$this->input->post('qty');
        $st=$this->input->post('subtotal');
        $isi=$this->M_cart->hapus_isi($id,$qty,$st);
        // echo json_encode($isi);
    }
    function bayar_point()
    {
        $id=$this->input->post('id_dorder');
        $qty=$this->input->post('qty');
        $st=$this->input->post('subtotal');
        $isi=$this->M_cart->hapus_isi($id,$qty,$st);
        // echo json_encode($isi);
    }


}

/* End of file Cart.php */



?>