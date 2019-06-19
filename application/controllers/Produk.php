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
        $kode=$this->input->post('kode');
        $nama=$this->input->post('nama');
        $kategori=$this->input->post('kategori');
        $modal=$this->input->post('modal');
        $jual=$this->input->post('jual');
        $stok=$this->input->post('stok');
        $deskripsi=$this->input->post('deskripsi');
        $gambar=$this->_uploadImage();
        $data=$this->M_produk->simpan_produk($kode,$nama,$kategori,$modal,$jual,$stok,$deskripsi,$gambar);
        echo json_encode($data);
    }

    function update_produk(){
        $kode=$this->input->post('kode');
        $nama=$this->input->post('nama');
        $kategori=$this->input->post('kategori');
        $modal=$this->input->post('modal');
        $jual=$this->input->post('jual');
        $stok=$this->input->post('stok');
        $deskripsi=$this->input->post('deskripsi');
        $gambar=$this->_uploadImage();
        $data=$this->M_produk->update_produk($kode,$nama,$kategori,$modal,$jual,$stok,$deskripsi,$gambar);
        echo json_encode($data);
    }

    function hapus_produk(){
        $kode=$this->input->post('kode');
        $data=$this->M_produk->hapus_produk($kode);
        echo json_encode($data);
    }

    function _uploadImage(){
        $config['upload_path']          ='./assets/images/produk/800x800';
        $config['allowed_types']        ='gif|jpg|png';
        $config['file_name']            =$this->id_produk;
        $config['overwrite']            =true;
        $config['max_size']             =2048;
        // $config['max_width']            =800;
        // $config['max_width']            =800;

        $this->load->library('upload',$config);

        if ($this->upload->do_upload('image')){
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }

}

/* End of file Produk.php */

?>