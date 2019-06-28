<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <?php $this->load->view('_part/cssjs.php')?>
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <?php $this->load->view('_part/navbar.php') ?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container">
    <div class="row" style="background-color:white; min-height:550px;">

      <div class="col-lg-6" style="padding-top:20px;">
          <img class="card-img-top img-fluid" style="max-height:500px;max-width:500px;" src="<?php echo base_url()?>assets/images/produk/800x800/<?=$produk['gambar_produk']?>" alt="">
      </div>
        <!-- /.card -->
        <div class="col-lg-6">
            
            <h1 class="card-title"><?=$produk['nama_produk']?></h1>
            <h4>Rp. <?=$produk['harga_jual']?><span class="pull-right small"><?=$produk['id_kategori']?></span></h4>
            <h5>Rp.<?=$produk['harga_modal']?><span class="pull-right">Stok : <?=$produk['stok_produk']?></h5>
            <hr>
            <h4 class="">Deskripsi</h4>
            <p><?=$produk['deskripsi_produk']?></p>
            <hr>
            <hr>
              <form class="tambah_cart">
                <input type="hidden" name="idproduk" step="1" value="<?=$produk['id_produk']?>">
                <input type="hidden" name="pnt" value="<?=$produk['harga_modal']?>">
                <input type="hidden" name="hrg" value="<?=$produk['harga_jual']?>">
                <input type="number" name="qty" min="1" step="1" style="width:50px;" value="1">
                <button type="submit" class="btn btn-danger pull-right">Masukkan Keranjang</button>
              </form>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    

    </section>
    <!-- /.content -->
  </div>
    <?php $this->load->view('_part/footer.php')?>
    
</div>
<?php $this->load->view('_part/js.php')?>
<script type="text/javascript">
    $(document).ready(function(){
        tampilkan_cart();
        function tampilkan_cart(){
            $.ajax({
                type  : 'AJAX',
                url   : '<?php echo base_url()?>index.php/cart/load_keranjang',
                async : false,
                dataType : 'json',
                success : function(data){
                    $('.isi-cart').html(data.length);
                    var html = '';
                    var i;
                    $total=0;
                    for(i=0; i<data.length; i++){
                        $total+=Number(data[i].total_harga);
                        html += '<tr>'+
                                '<td>'+data[i].nama_produk+'</td>'+
                                '<td>'+data[i].harga_jual+'</td>'+
                                '<td>'+data[i].kuantitas+'</td>'+
                                '<td>'+data[i].total_harga+'</td>'+
                                '<td style="text-align:right; id="hapus_isi">'+
                                    '<button href="javascript:;" class="btn btn-danger btn-xs hapus_cart" data="'+data[i].id_detail_order+'">Hapus</button>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('.totalcart').html($total);
                    $('.cart').html(html);
                }
 
            });
        }

        $('.tambah_cart').submit(function(e) {
            e.preventDefault();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/cart/tambah_isi')?>",
            dataType : "JSON",
            data : new FormData(this),
            processData : false,
            contentType : false,
            cache : false,
            async : false,
            success: function(data){
                
                }
            });
                tampilkan_cart();
                return false;
          });

        $('.cart').on('click','.hapus_cart',function(){
            var id= $(this).attr('data');
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/cart/hapus_isi')?>",
            dataType : "JSON",
            data : {id_dorder:id},
                success: function(data){
                    tampilkan_cart();
                }
                });
                
                return false;
          });

        //   $('#cart').on('change','#qty',function () {
        //     // var id= $('.hapus_cart').attr('data');

        //     var qty=Number($('#qty').val());
        //     var hrg=Number($('#hrg').html());
        //     var subtotal=Number(qty*hrg);
        //     // alert(Number($(this).html()));
        //     // $('#ttl').html(Number($('#hrg').html())*Number($('#qty').val()));
        //     $.ajax({
        //     type : "POST",
        //     url  : "<?php echo base_url('index.php/cart/update_isi')?>",
        //     dataType : "JSON",
        //             data : {id_dorder:id,qty:qty,subtotal:subtotal },
        //             success: function(data){
        //                 tampil_cart();
        //             }
        //         });
        //         // return false;
        //   });
        });  
</script>
</body>
</html>