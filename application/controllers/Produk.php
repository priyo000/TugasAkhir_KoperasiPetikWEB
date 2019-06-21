<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    function __construct()
    {   
        parent::__construct();
        $this->load->model('M_produk');
    }

    public function index()
    {
        $this->load->view('admin/produk.php');
        
    }

    function data_produk()
    {
        $data=$this->M_produk->list_produk();
        echo json_encode($data);
    }

    function get_produk()
    {
        $kode=$this->input->get('id');
        $data=$this->M_produk->get_produk_byid($kode);
        echo json_encode($data);
        
    }
    
    function simpan_produk(){
        $nama=$this->input->post('nama');
        $kode=crc32($nama);
        $kategori=$this->input->post('kategori');
        $modal=$this->input->post('modal');
        $jual=$this->input->post('jual');
        $stok=$this->input->post('stok');
        $deskripsi=$this->input->post('deskripsi');
        $gambar=$this->_gambar($kode);
        $data=$this->M_produk->simpan_produk($kode,$nama,$kategori,$modal,$jual,$stok,$deskripsi,$gambar);
        echo json_decode($data);
    }

    function update_produk(){
        $nama=$this->input->post('nama');
        $kode=$this->input->post('kode');
        $kategori=$this->input->post('kategori');
        $modal=$this->input->post('modal');
        $jual=$this->input->post('jual');
        $stok=$this->input->post('stok');
        $deskripsi=$this->input->post('deskripsi');
        $gambar=$this->_gambar($kode);
        $data=$this->M_produk->update_produk($kode,$nama,$kategori,$modal,$jual,$stok,$deskripsi,$gambar);
        echo json_decode($data);
    }

    function hapus_produk(){
        $kode=$this->input->post('kode');
        $this->load->helper("file");
        unlink('./assets/images/produk/800x800/'.$kode.'.jpg');
        $data=$this->M_produk->hapus_produk($kode);
        echo json_encode($data);
    }
    private function _gambar($kode){
        $config['upload_path']          ='./assets/images/produk/800x800';
        $config['allowed_types']        ='gif|jpg|png';
        $config['file_name']            = $kode.'.jpg';
        $config['overwrite']            =true;
        $config['max_size']             =1024;
        // $config['max_width']            =800;
        // $config['max_width']            =800;
        
        //$this->input->post('gambar');
        $this->load->library('upload',$config);
        
        // var_dump($this->upload->data("file_name")); exit();
        if ($this->upload->do_upload("file")){
            return $this->upload->data("file_name");
        }
        else {
            return 'default.jpg';
        }
    }



}

/* End of file Produk.php */

?>