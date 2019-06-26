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
        // if($hasil->num_rows > 0){
        //     foreach ($hasil as $data ) {
        //         $hasil=array(
        //         'idakun'=> $data->id_akun,
        //         'username'=> $data->username,
        //         'name'=> $data->name,
        //         'birth'=> $data->birth,
        //         'email'=> $data->email,
        //         'no_hp'=> $data->no_hp,
        //         'gender'=> $data->gender,
        //         'created'=> $data->created,
        //         'last_login'=> $data->last_login,
        //         'saldo'=> $data->saldo,
        //         'room'=> $data->room
        //         );
        //     }
        
        return $hasil->row_array();    
        }
        
    }





/* End of file M_user.php */

?>