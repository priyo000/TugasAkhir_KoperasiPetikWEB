<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_login extends CI_Model {
    
        function cek_akun($nim,$password)
        {
            $hasil=$this->db->query("SELECT * FROM tb_akuns WHERE nim='$nim' && password='$password' LIMIT 1");
            return $hasil;
        }
    
    }
    
    /* End of file M_login.php */
    
?>