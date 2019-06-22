<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjualan extends CI_Model {
    function list_order(){
        $hasil=$this->db->query("SELECT tb_order.*,tb_akuns.username FROM tb_order INNER JOIN tb_akuns ON tb_order.id_akun=tb_akuns.id_akun WHERE id_status='1'");
        return $hasil->result();
    }

    function get_detailorder_byid($idorder){
        $hasil=$this->db->query("SELECT tb_detail_order.*, tb_order.waktu_order, tb_order.id_akun, tb_akuns.username, tb_produk.nama_produk FROM tb_detail_order INNER JOIN tb_order ON tb_detail_order.id_order=tb_order.id_order INNER JOIN tb_akuns ON tb_order.id_akun=tb_akuns.id_akun INNER JOIN tb_produk ON tb_detail_order.id_produk=tb_produk.id_produk WHERE tb_detail_order.id_order='$idorder'");
        if ($hasil->num_rows()>0) {
            foreach ($hasil->result() as $data) {
                $hasilnya[]=array(
                    'id_order' => $data->id_order,
                    'nama_produk' => $data->nama_produk,
                    'waktu_order' => $data->waktu_order,
                    'kuantitas' => $data->kuantitas,
                    'total_harga' => $data->total_harga
                );

            }
            
        }
        return $hasilnya;
    }

    function hapus_order($idorder){
        $hasil=$this->db->query("DELETE FROM tb_detail_order WHERE id_order='$idorder'");
        $hasil=$this->db->query("DELETE FROM tb_order WHERE id_order='$idorder'");
        return $hasil;
    }

    function konfirmasi_order($idorder){
        $hasil=$this->db->query("UPDATE tb_order SET id_status='2' WHERE id_order='$idorder'");
        return $hasil;
    }

    function histori_order(){
        $hasil=$this->db->query("SELECT tb_order.*,tb_akuns.username FROM tb_order INNER JOIN tb_akuns ON tb_order.id_akun=tb_akuns.id_akun WHERE id_status='2'");
        return $hasil->result();
    }

}

/* End of file M_penjualan.php */

?>