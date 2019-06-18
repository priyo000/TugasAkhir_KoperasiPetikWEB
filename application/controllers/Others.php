<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Others extends CI_Controller {

    public function investasi()
    {
        $this->load->view('admin/investasi.php');
        
    }
    public function hutang()
    {
        $this->load->view('admin/hutang.php');
    }

}

/* End of file Others.php */

?>