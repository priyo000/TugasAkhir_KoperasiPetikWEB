<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    function list_akun()
    {
        $hasil=$this->db->query("SELECT tb_akuns.* , dompet.saldo, dompet.point FROM tb_akuns INNER JOIN dompet ON dompet.id_akun=tb_akuns.id_akun");
        return $hasil->result();
    }

    function tambah_user($nim,$pass,$l){
        // var_dump($l); exit();
        $akun = time();
        $data = array(
            'id_akun' => $akun,
            'nim' => $nim,
            'password' => $pass,
            'level' => $l
        );
        $hasil = $this->db->query("INSERT INTO `dompet`(`id_akun`) VALUES ($akun)");
        $hasil = $this->db->insert('tb_akuns', $data);
        // $hasil=$this->db->query("INSERT INTO tb_akuns ('id_akun','username','password','level') VALUES ('$akun','$user','$pass','$l');");
        
        return $hasil;
    }

    function tambah_saldo($idakun,$saldo,$point){
        $hasil=$this->db->query("UPDATE dompet SET saldo='$saldo',point='$point' WHERE id_akun='$idakun'");
        return $hasil;
    }

    function hapus_akun($idakun){
        $hasil=$this->db->query("DELETE FROM tb_akuns WHERE id_akun='$idakun'");
        return $hasil;
    }

    function get_akun($idakun){
        $hasil=$this->db->query("SELECT tb_akuns.*, dompet.saldo,dompet.point, tb_room.room FROM tb_akuns INNER JOIN dompet ON tb_akuns.id_akun=dompet.id_akun INNER JOIN tb_room ON tb_room.id_room=tb_akuns.id_room WHERE tb_akuns.id_akun=$idakun");
        return $hasil->row_array();    
        }
    function edit_akun($nama,$tempat,$ttl,$nope,$email,$idkamar,$motto,$idakun){
            $hasil=$this->db->query("UPDATE tb_akuns SET name='$nama',tempat_lahir='$tempat',birth='$ttl',no_hp='$nope',email='$email',id_room='$idkamar',motto='$motto' WHERE id_akun='$idakun'");
            return $hasil;
        }
        
    }





/* End of file M_user.php */

?>