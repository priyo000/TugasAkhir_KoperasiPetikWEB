<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_produk extends CI_Model {
        function list_produk()
        {
            $hasil=$this->db->query("SELECT * FROM tb_produk");
            return $hasil->result();
        }

        function simpan_produk($kode,$nama,$kategori,$modal,$jual,$stok,$deskripsi,$gambar){
            $hasil=$this->db->query("INSERT INTO tb_produk (id_produk,nama_produk,harga_modal,harga_jual,id_kategori,stok_produk,deskripsi_produk,gambar_produk) VALUES ('$kode','$nama','$modal','$jual','$kategori','$stok','$deskripsi','$gambar')");
            return $hasil->result();
        }
        
        function get_produk_byid($kode){
            $hsil=$this->db->query("SELECT * FROM tb_produk WHERE id_produk='$kode'");
            if ($hsil->num_rows()>0) {
                foreach ($hsil->result() as $data) {
                    $hasil=array(
                        'id_produk' => $data->id_produk,
                        'nama_produk' => $data->nama_produk,
                        'harga_modal' => $data->harga_modal,
                        'harga_jual' => $data->harga_jual,
                        'id_kategori' => $data->id_kategori,
                        'stok_produk' => $data->stok_produk,
                        'deskripsi_produk' => $data->deskripsi_produk,
                        'gambar_produk' => $data->gambar_produk,
                        // 'terjual' => $data->terjual

                    );
                }
            }
            return $hasil;
        }

        function update_produk($kode,$nama,$kategori,$modal,$jual,$stok,$deskripsi,$gambar){
            $hasil=$this->db->query("UPDATE tb_produk SET id_produk='$kode',nama_produk='$nama',harga_modal='$modal',harga_jual='$jual',id_kategori='$kategori',stok_produk='$stok',deskripsi_produk='$deskripsi',gambar_produk='$gambar'");
            return $hasil;
        }

        function hapus_produk($kode){
            $hasil=$this->db->query("DELETE FROM tb_produk WHERE id_produk='$kode'");
            return $hasil;
        }
    
    }
    
    /* End of file M_produk.php */
    
?>