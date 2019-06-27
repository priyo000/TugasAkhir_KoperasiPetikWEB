<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model {

    function buat_keranjang($idorder,$akun){
        $hasil=$this->db->query("INSERT INTO tb_order (id_order,id_akun,id_status) VALUES ('$idorder','$akun','0')");
        return $hasil;
    }
    function cek_keranjang($id){
        $hasil=$this->db->query("SELECT * FROM tb_order WHERE id_akun='$id' && id_status='0'");
        return $hasil->result();
    }
    function isi_keranjang($id){
        $hasil=$this->db->query("SELECT tb_detail_order.id_order, tb_detail_order.id_detail_order, tb_produk.*, tb_detail_order.kuantitas, tb_detail_order.total_harga, tb_detail_order.total_harga2, tb_order.id_akun, tb_order.id_status FROM tb_detail_order INNER JOIN tb_order ON tb_order.id_order=tb_detail_order.id_order INNER JOIN tb_produk ON tb_produk.id_produk=tb_detail_order.id_produk WHERE tb_order.id_akun=$id && tb_order.id_status=0");
        return $hasil->result();
    }
    function hapus_isi($id){
        $hasil=$this->db->query("DELETE FROM tb_detail_order WHERE id_detail_order='$id'");
        return $hasil;
    }
    function update_isi($id,$qty,$subtotal){
        $hasil=$this->db->query("UPDATE tb_detail_order SET kuantitas=$qty, total_harga=$subtotal WHERE id_detail_order=$id");
        return $hasil;
    }
    function tambah_isi($idorder,$idproduk,$qty,$ttl,$ttl2){
        $hasil=$this->db->query("INSERT INTO tb_detail_order (id_order,id_produk,kuantitas,total_harga,total_harga2) VALUES ('$idorder','$idproduk','$qty','$ttl','$ttl2')");
        return $hasil;
    }

    function bayar($idorder)
    {
        $date=date("Y-m-d h:i:s");
        $hasil=$this->db->query("UPDATE tb_order SET id_status='1',waktu_order='$date' WHERE id_order=$idorder");
        return $hasil;
    }
    function byr_saldo($saldo,$akun){
        $hasil=$this->db->query("UPDATE dompet SET saldo='$saldo' WHERE id_akun='$akun'");
        return $hasil;
    }
    function byr_point($point,$akun){
        $hasil=$this->db->query("UPDATE dompet SET point='$point' WHERE id_akun='$akun'");
        return $hasil;
    }
    // function get_order($idakun){
    //     $hasil=$this->db->query("SELECT * FROM tb_order WHERE id_akun='$idakun' && id_status='1'");
    //     return $hasil->result();
    // }
    
}

/* End of file M_cart.php */

?>