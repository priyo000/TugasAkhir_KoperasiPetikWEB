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
    <section class="conent container">
    <div class="row">

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
            <a href="#" class="btn btn-danger">Masukkan Keranjang</a>
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
    // $(document).ready(function(){
    //     tampil_data_produk();
    //     function tampil_data_produk(){
    //         $.ajax({
    //             type  : 'AJAX',
    //             url   : '<?php echo base_url()?>index.php/produk/data_produk',
    //             async : false,
    //             dataType : 'json',
    //             success : function(data){
    //                 var html = '';
    //                 var i;
    //                 for(i=0; i<data.length; i++){
    //                     html += '<div class="col-md-2">'+
    //                               '<div class="box box-widget widget-user">'+
    //                                   '<div class="widget-user-header" style="width:100%;height:100%;padding:0;">'+
    //                                       '<img class="" width="100%" height="100%" src="<?=base_url()?>/assets/images/produk/800x800/'+data[i].gambar_produk+'" alt="User Avatar">'+
    //                                   '</div>'+
    //                                   '<div class="box-footer" style="padding-top:10px;">'+
    //                                   '<h3 class="" style="margin-top:0px;">'+data[i].nama_produk+'</h3>'+
    //                                     '<h5 class="">Point : Rp.'+data[i].harga_modal+'<span class="pull-right">'+data[i].id_kategori+'</span></h5>'+
    //                                     '<h5 class="">Harga : Rp.'+data[i].harga_jual+'</h5>'+
    //                                     '<a href="javascript:;" class="btn btn-danger btn-xs cart" data="'+data[i].id_produk+'">Masukkan Keranjang</a>'+
    //                                   '</div>'+
    //                                 '</div>'+
    //                               '</div>';
    //                 }
    //                 $('#show_data').html(html);
    //             }
 
    //         });
    //     }
    //     });    
 
 
</script>
</body>
</html>