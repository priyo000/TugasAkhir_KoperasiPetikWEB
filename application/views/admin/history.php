<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Manajemen Riwayat</title>
  <link rel = "icon" type = "image/png" href = "<?=base_url()?>assets/images/iconkoperasi.png">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <?php $this->load->view('_part/cssjs.php')?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('_part/navbar.php') ?>
    <?php $this->load->view('_part/sidebar.php')?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content-header">
      <h1>
        Riwayat Penjualan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li><a href="#">Manajemen Penjualan</a></li>
        <li class="active">Riwayat Penjualan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th>Total Harga</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="histori">
                
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
      <!-- modal -->
        <!-- MODAL EDIT -->
        <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
            </div>
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Sub Total</th>
                </tr>
                </thead>
                <tbody id="rincian">
                
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4">TOTAL DENGAN SALDO </th>
                    <th>Rp. <span class="totalorder"></span> </th>
                  </tr>
                  <tr>
                    <th colspan="4">TOTAL DENGAN POINT</th>
                    <th>Pt. <span class="totalorder2"></span></th>
                  </tr>
                </tfoot>
              </table>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT-->
        <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalaHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Order</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="idorder" id="idorderHapus" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau Membatalkan Order ini?</p></div>                 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btnhapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->
  </div>
  </div>
  <?php $this->load->view('_part/footer.php')?>
  <?php $this->load->view('_part/js.php')?>
<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript">
$(document).ready(function(){
        tampil_data_histori();   //pemanggilan fungsi tampil barang.
        tampilkan_cart()
         
          
        //fungsi tampil barang
        function tampil_data_histori(){
            $.ajax({
                type  : 'AJAX',
                url   : '<?php echo base_url()?>index.php/penjualan/data_histori',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].id_order+'</td>'+
                                '<td>'+data[i].name+'</td>'+
                                '<td>'+data[i].waktu_order+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id_order+'">Rincian</a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id_order+'">Hapus</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#histori').html(html);
                }
 
            });
        }
 
        //GET UPDATE
        $('#histori').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $('#btnkonfirmasi').attr('data',$(this).attr('data'));
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/penjualan/get_detail_order')?>",
                dataType : "JSON",
                data : {id_order:id},
                success: function(data,){
                    var oh = '';
                    var th=0;
                    var tp=0;
                    for(i=0;i<data.length;i++){
                        th+=Number(data[i].total_harga);
                        tp+=Number(data[i].total_harga2);
                        oh += '<tr>'+
                                '<td><img class="" width="50px" height="50px" src="<?=base_url()?>/assets/images/produk/800x800/'+data[i].gambar_produk+'" alt="User Avatar"></td>'+
                                '<td>'+data[i].nama_produk+'</td>'+
                                '<td>Rp. '+data[i].harga_jual+'<br/> Pt. '+data[i].harga_modal+'</td>'+
                                '<td>'+data[i].kuantitas+'</td>'+
                                '<td>Rp. '+data[i].total_harga+'<br/> Pt. '+data[i].total_harga2+'</td>'+
                                '</tr>';
                                  
            }
            $('.totalorder').html(th);
            $('.totalorder2').html(tp);
            $('#pengorder').html(data[0].name);
            $('.metode').html(data[0].metode_bayar);
            $('.kodeorder').html(data[0].id_order);
            $('#rincian').html(oh);
            $('#ModalaEdit').modal('show');
        }
      });
      return false;
    });
 
 
        //GET HAPUS
        $('#histori').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalaHapus').modal('show');
            $('[name="idorder"]').val(id);
            // alert($('#idorderHapus').val());
        });
 
        //Update Barang
        $('#btnkonfirmasi').on('click',function(){
            var idorder=$('#btnkonfirmasi').attr('data');
            // alert(idorder);
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/penjualan/konfirmasi')?>",
            dataType : "JSON",
                    data : {idorder: idorder},
                    success: function(data){
                            $('#ModalaEdit').modal('hide');
                            tampil_data_order();
                    }
                });
                return false;
            });
 
        //Hapus Barang
        $('#btnhapus').on('click',function(){
            var kode=$('#idorderHapus').val();
            // alert(kode);
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/penjualan/hapus_riwayat')?>",
            dataType : "JSON",
                    data : {idorder: kode},
                    success: function(data){
                            $('#ModalaHapus').modal('hide');
                            tampil_data_histori();
                    }
                });
                return false;
            });
 
    });
    function tampilkan_cart(){
            $.ajax({
                type  : 'AJAX',
                url   : '<?php echo base_url()?>index.php/cart/load_keranjang',
                async : false,
                dataType : 'json',
                success : function(data){
                  $('.isi-cart').html(data.length);
                    var html = '';
                    var bayar ="";
                    var i;
                    var total=0;
                    var total2=0;
                    for(i=0; i<data.length; i++){
                      var idorder= data[0].id_order;
                        total+=Number(data[i].total_harga);
                        total2+=Number(data[i].total_harga2);
                        html += '<tr>'+
                                '<td><img class="" width="50px" height="50px" src="<?=base_url()?>/assets/images/produk/800x800/'+data[i].gambar_produk+'" alt="User Avatar"></td>'+
                                '<td>'+data[i].nama_produk+'</td>'+
                                '<td>Rp. '+data[i].harga_jual+'<br/> Pt. '+data[i].harga_modal+'</td>'+
                                '<td>'+data[i].kuantitas+'</td>'+
                                '<td>Rp. '+data[i].total_harga+'<br/> Pt. '+data[i].total_harga2+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<button href="javascript:;" class="btn btn-danger btn-xs hapus_cart" data="'+data[i].id_detail_order+'">Hapus</button>'+
                                '</td>'+
                                '</tr>';
                    }
                    bayar =
                      '<button name="bayar_saldo" data="'+idorder+'" class="btn btn-danger bayar_saldo" style="margin-right:10px;">Bayar Menggunakan Saldo</button>'+
                      '<button name="bayar_point" data="'+idorder+'" class="btn btn-warning bayar_point">Bayar Menggunakan Point</button>';
                    $('.totalcart').html(total);
                    $('.totalcart2').html(total2);
                    $('.cart').html(html);
                    $('#bayar').html(bayar);
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
 
</script>
</body>
</html>