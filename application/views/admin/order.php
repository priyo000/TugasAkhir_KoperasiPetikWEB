<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Manajemen Order</title>
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
        Manajemen Order
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li><a href="#">Manajemen Penjualan</a></li>
        <li class="active">Pesanan</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manajemen Pesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <!-- <th>Kode</th> -->
                  <th>Kode Order</th>
                  <th>Username</th>
                  <th>Waktu Order</th>
                  <th>Transaksi</th>
                </tr>
                </thead>
                <tbody id="show_data">
                
                </tbody>
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
    <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Produk</h3>
            </div>
            <form class="form-horizontal" id="submit">
                <div class="modal-body">
                
                <div class="form-group">
                  <label class="control-label col-xs-3">Gambar</label>
                  <div class="col-xs-9">
                  <input type="file" name="file" id="gambar" class="form-control" style="width:335px;" required>
                  </div> 
                </div>


                    <!-- <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kode" id="kode_produk" class="form-control" type="text" placeholder="Kode Barang" style="width:335px;" required>
                        </div>
                    </div> -->
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="nama" id="nama_produk" class="form-control" type="text" placeholder="Nama Barang" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-xs-3">Kategori</label>
                      <div class="col-xs-9">
                      <!-- <input name="kategori" id="nama_produk" class="form-control" type="text" placeholder="Nama Barang" style="width:335px;" required> -->
                      <select class="form-control select2 select2-hidden-accessible" name="kategori" id="kategori" style="width:335px;" tabindex="-1" aria-hidden="true">
                        <option selected="selected">Pilih</option>
                        <option>Makanan</option>
                        <option>Minuman</option>
                        <option>DLL</option>
                      </select>
                      </div>
                  </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga Modal</label>
                        <div class="col-xs-9">
                            <input name="modal" id="modal" class="form-control" type="text" placeholder="Harga Modal" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga Jual</label>
                        <div class="col-xs-9">
                            <input name="jual" id="jual" class="form-control" type="text" placeholder="Harga Jual" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Stok</label>
                        <div class="col-xs-9">
                            <input name="stok" id="stok" class="form-control" type="text" placeholder="Stok" style="width:335px;" required>
                        </div>
                    </div>

                <div class="form-group">
                  <label class="control-label col-xs-3">Deskripsi</label>
                  <div class="col-xs-9">
                  <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Deskripsi ..."></textarea>
                  </div>
                </div>
 
                </div>
 
                <div class="modal-footer">
            
                </div>
          </form>
        </div>
      </div>
    </div>

        <!-- MODAL EDIT -->
        <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Orderan <span class="pull-right kodeorder"></span></h3>
                <h5 class="pull-right metode"></h5>
                <h4 id="pengorder"></h4>
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
                <button class="btn_hapus btn btn-success" style="width: 500px" id="btnkonfirmasi" data="">Konfirmasi</button>
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
                            <input type="hidden" name="idakun" id="idakunHapus" value="">
                            <input type="hidden" name="kembalikan" id="kembalikanHapus" value="">
                            <input type="hidden" name="metode" id="metodeHapus" value="">
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
    <!-- akhir modal -->
  </div>
  </div>
  <?php $this->load->view('_part/footer.php')?>
  <?php $this->load->view('_part/js.php')?>
<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example2').DataTable()
    $('#example1').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_order();   //pemanggilan fungsi tampil barang.
        tampilkan_cart();
         
        $('#mydata').dataTable();
          
        //fungsi tampil barang
        function tampil_data_order(){
            $.ajax({
                type  : 'AJAX',
                url   : '<?php echo base_url()?>index.php/penjualan/data_order',
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
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id_order+'">Batalkan</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
 
        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
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

        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            var th=0;
            var th2=0;
            $('#btnkonfirmasi').attr('data',$(this).attr('data'));
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/penjualan/get_detail_order')?>",
                dataType : "JSON",
                data : {id_order:id},
                success: function(data){
                    for(i=0;i<data.length;i++){
                        th+=Number(data[i].total_harga);
                        th2+=Number(data[i].total_harga2);      
            }
            $('#idorderHapus').val(data[0].id_order);
            $('#idakunHapus').val(data[0].id_akun);
            $('#metodeHapus').val(data[0].metode_bayar);
            if($('#metodeHapus').val()=='Dengan Point'){
                $('#kembalikanHapus').val(th);
            }else{
                $('#kembalikanHapus').val(th2);
            }
            $('#ModalaHapus').modal('show');
        }
      });
      return false;
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
            var idorder=$('#idorderHapus').val();
            var idakun=$('#idakunHapus').val();
            var metode=$('#metodeHapus').val();
            var kembalikan=$('#kembalikanHapus').val();
            // alert(kode);
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/penjualan/hapus_order')?>",
            dataType : "JSON",
                    data : {idorder: idorder,idakun:idakun,metode:metode,kembalikan:kembalikan},
                    success: function(data){
                            $('#ModalaHapus').modal('hide');
                            tampil_data_order();
                    }
                });
                return false;
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
 
    });
 
</script>
</body>
</html>