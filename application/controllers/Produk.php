<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function index()
    {
        $this->load->view('admin/produk.php');
        
    }

}

/* End of file Produk.php */

?>