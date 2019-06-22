<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_penjualan');
    }


    public function order()
    {
        $this->load->view('admin/order.php');
    }

    public function histori(){
        $this->load->view('admin/history.php');  
    }

    function data_order(){
        $data=$this->M_penjualan->list_order();
        echo json_encode($data);
    }
    function hapus_order(){
        $idorder=$this->input->post('idorder');
        $data=$this->M_penjualan->hapus_order($idorder);
        echo json_encode($data);
    }
    function get_detail_order(){
        $idorder=$this->input->get('id_order');
        $data=$this->M_penjualan->get_detailorder_byid($idorder);
        // var_dump($data); exit();
        echo json_encode($data);
    }
    function konfirmasi(){
        $idorder=$this->input->post('idorder');
        $data=$this->M_penjualan->konfirmasi_order($idorder);
        echo json_encode($data);
    }
    function data_histori(){
        $data=$this->M_penjualan->histori_order();
        echo json_encode($data);
    }


}

/* End of file Penjualan.php */

?>