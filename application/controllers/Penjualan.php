<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    public function order()
    {
        $this->load->view('admin/order.php');
    }
    public function histori(){
        $this->load->view('admin/history.php');  
    }


}

/* End of file Penjualan.php */

?>