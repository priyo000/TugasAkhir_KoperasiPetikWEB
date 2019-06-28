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
        $pnt=$this->input->post('pnt');
        $hrg=$this->input->post('hrg');
        $ttl=$qty*$hrg;
        $ttl2=$qty*$pnt;
        if (count($cek)>0) {
            $this->M_cart->tambah_isi($cek[0]->id_order,$idproduk,$qty,$ttl,$ttl2);
        }else{
            $idorder=time();
            $this->M_cart->buat_keranjang($idorder,$_SESSION['id_user']);
            $this->M_cart->tambah_isi($idorder,$idproduk,$qty,$ttl);
        }
    }
    function bayar_saldo()
    {
        $idorder=$this->input->post('id_order');
        $jumlahbayar=$this->input->post('jml_saldo');

        $ceksaldo=$this->M_user->get_akun($_SESSION['id_user']);
            if($ceksaldo['saldo']>$jumlahbayar){
                $byrsaldo=$ceksaldo['saldo']-$jumlahbayar;
                $this->M_cart->byr_saldo($byrsaldo,$_SESSION['id_user']);
                $this->M_cart->bayar($idorder);
                $this->session->set_flashdata('berhasilbayar',"Swal.fire(
                    'Terima Kasih',
                    'Anda Telah Melakukan Pembayaran',
                    'success'
                );");
            }else{
                $this->session->set_flashdata('saldokurang',"Swal.fire('Maaf Saldo Ente Kurang ...!');");
            }
    }
    function bayar_point()
    {
        $idorder=$this->input->post('id_order');
        $jumlahbayar=$this->input->post('jml_point');

        $ceksaldo=$this->M_user->get_akun($_SESSION['id_user']);
            if($ceksaldo['point']>$jumlahbayar){
                $byrpoint=$ceksaldo['point']-$jumlahbayar;
                $berhasil=$this->M_cart->byr_point($byrpoint,$_SESSION['id_user']);
                $this->M_cart->bayar($idorder);
                $this->session->set_flashdata('berhasilbayar',"Swal.fire(
                    'Terima Kasih',
                    'Anda Telah Melakukan Pembayaran',
                    'success'
                );");
            }else{
                $this->session->set_flashdata('saldokurang',"Swal.fire('Maaf Point Ente Kurang');");
            }
    }


}

/* End of file Cart.php */



?>