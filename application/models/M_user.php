<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    function list_akun()
    {
        $hasil=$this->db->query("SELECT tb_akuns.* , dompet.saldo FROM tb_akuns INNER JOIN dompet ON tb_akuns.id_dompet=dompet.id_dompet");
        return $hasil->result();
    }

    function tambah_saldo($idakun,$saldo){
        $hasil=$this->db->query("UPDATE dompet SET saldo='$saldo' WHERE id_akun='$idakun'");
        return $hasil;
    }

    function hapus_akun($idakun){
        $hasil=$this->db->query("DELETE FROM tb_akuns WHERE id_akun='$idakun'");
        return $hasil;
    }

    function get_akun($idakun){
        $hasil=$this->db->query("SELECT tb_akuns.*, dompet.saldo,dompet.point, tb_room.room FROM tb_akuns INNER JOIN dompet ON tb_akuns.id_dompet=dompet.id_dompet INNER JOIN tb_room ON tb_room.id_room=tb_akuns.id_room WHERE tb_akuns.id_akun=$idakun");
        return $hasil->row_array();    
        }
    function edit_akun($nama,$ttl,$nope,$email,$idkamar,$motto,$idakun){
            $hasil=$this->db->query("UPDATE tb_akuns SET name='$nama',birth='$ttl',no_hp='$nope',email='$email',id_room='$idkamar',motto='$motto' WHERE id_akun='$idakun'");
            return $hasil;
        }
        
    }





/* End of file M_user.php */

?>