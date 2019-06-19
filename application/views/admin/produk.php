<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <style>
    label.cabinet{
	display: block;
	cursor: pointer;
}

label.cabinet input.file{
	position: relative;
	height: 100%;
	width: auto;
	opacity: 0;
	-moz-opacity: 0;
  filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
  margin-top:-30px;
}

#upload-demo{
	width: 250px;
	height: 250px;
  padding-bottom:25px;
}
figure figcaption {
    position: absolute;
    bottom: 0;
    color: #fff;
    width: 100%;
    padding-left: 9px;
    padding-bottom: 5px;
    text-shadow: 0 0 10px #000;
}
  </style>
  <?php $this->load->view('admin/_part/cssjs.php')?>

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
    <?php $this->load->view('admin/_part/navbar.php') ?>
    <?php $this->load->view('admin/_part/sidebar.php')?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
              <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah Barang</a></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Kode</th>
                  <th>Gambar</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Harga Modal</th>
                  <th>Harga Jual</th>
                  <th>Stok</th>
                  <th>Terjual</th>
                  <th>Aksi</th>
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
            <form class="form-horizontal">
                <div class="modal-body">
                
                <div class="form-group">
                  <label class="control-label col-xs-3">Gambar</label>
                  <div class="col-xs-9">
                  <input name="gambar" id="gambar" class="form-control" type="text" placeholder="Kode Barang" style="width:335px;" required>
                  </div> 
                </div>


                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kode" id="kode_produk" class="form-control" type="text" placeholder="Kode Barang" style="width:335px;" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="nama" id="nama_produk" class="form-control" type="text" placeholder="Nama Barang" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-xs-3">Kategori</label>
                      <div class="col-xs-9">
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
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
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
                <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
 
                <div class="form-group">
                  <label class="control-label col-xs-3">Gambar</label>
                  <div class="col-xs-9">
                  
                  </div> 
                </div>


                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kodeedit" id="kode_produk2" class="form-control" type="text" placeholder="Kode Barang" style="width:335px;" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="namaedit" id="nama_produk2" class="form-control" type="text" placeholder="Nama Barang" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-xs-3">Kategori</label>
                      <div class="col-xs-9">
                      <select class="form-control select2 select2-hidden-accessible" name="kategoriedit" id="kategori2" style="width:335px;" tabindex="-1" aria-hidden="true">
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
                            <input name="modaledit" id="modal2" class="form-control" type="text" placeholder="Harga Modal" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga Jual</label>
                        <div class="col-xs-9">
                            <input name="jualedit" id="jual2" class="form-control" type="text" placeholder="Harga Jual" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Stok</label>
                        <div class="col-xs-9">
                            <input name="stokedit" id="stok2" class="form-control" type="text" placeholder="Stok" style="width:335px;" required>
                        </div>
                    </div>

                <div class="form-group">
                  <label class="control-label col-xs-3">Deskripsi</label>
                  <div class="col-xs-9">
                  <textarea class="form-control" name="deskripsiedit" id="deskripsi2" rows="3" placeholder="Deskripsi ..."></textarea>
                  </div>
                </div>
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT-->
        <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="kodehapus" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus barang ini?</p></div>
                                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->

        
                


    <!-- akhir modal -->
  </div>
  </div>
  <?php $this->load->view('admin/_part/footer.php')?>
  <?php $this->load->view('admin/_part/js.php')?>
<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_produk();   //pemanggilan fungsi tampil barang.
         
        $('#mydata').dataTable();
          
        //fungsi tampil barang
        function tampil_data_produk(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>index.php/produk/data_produk',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].id_produk+'</td>'+
                                '<td>'+data[i].gambar_produk+'</td>'+
                                '<td>'+data[i].nama_produk+'</td>'+
                                '<td>'+data[i].id_kategori+'</td>'+
                                '<td>'+data[i].harga_modal+'</td>'+
                                '<td>'+data[i].harga_jual+'</td>'+
                                '<td>'+data[i].stok_produk+'</td>'+
                                '<td>'+data[i].terjual+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id_produk+'">Edit</a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id_produk+'">Hapus</a>'+
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
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/produk/get_produk')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id_produk,nama_produk,kategori_produk,harga_modal,harga_jual,stok_produk,deskripsi_produk,gambar_produk){
                        $('#ModalaEdit').modal('show');
                        $('[name="kodeedit"]').val(data.id_produk);
                        $('[name="namaedit"]').val(data.nama_produk);
                        $('[name="kategoriedit"] option').eq(data.id_kategori).prop('selected', true);;
                        $('[name="modaledit"]').val(data.harga_modal);
                        $('[name="jualedit"]').val(data.harga_jual);
                        $('[name="stokedit"]').val(data.stok_produk);
                        $('[name="deskripsiedit"]').val(data.deskripsi_produk);
                        $('[name="gambaredit"]').val(data.gambar_produk);
                    });
                }
            });
            return false;
        });
 
 
        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kodehapus"]').val(id);
        });
 
        //Simpan Barang
        $('#btn_simpan').on('click',function(){
            var kode=$('#kode_produk').val();
            var nama=$('#nama_produk').val();
            var kategori=$('#kategori option:selected').index();
            var modal=$('#modal').val();
            var jual=$('#jual').val();
            var stok=$('#stok').val();
            var deskripsi=$('#deskripsi').val();
            var gambar=$('#gambar').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/produk/simpan_produk')?>",
                dataType : "JSON",
                data : {kode:kode, nama:nama, kategori:kategori, modal:modal, jual:jual, stok:stok, deskripsi:deskripsi, gambar:gambar},
                success: function(data){
                    // $('[name="kode"]').val("");
                    // $('[name="nama"]').val("");
                    // $('#kategori').attr('selectedIndex',0);
                    // $('[name="modal"]').val("");
                    // $('[name="jual"]').val("");
                    // $('[name="stok"]').val("");
                    // $('[name="deskripsi"]').val("");
                    // $('[name="gambar"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data_produk();
                }
            });
            return false;
        });
 
        //Update Barang
        $('#btn_update').on('click',function(){
            var kobar=$('#kode_barang2').val();
            var nabar=$('#nama_barang2').val();
            var harga=$('#harga2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/barang/update_barang')?>",
                dataType : "JSON",
                data : {kobar:kobar , nabar:nabar, harga:harga},
                success: function(data){
                    $('[name="kobar_edit"]').val("");
                    $('[name="nabar_edit"]').val("");
                    $('[name="harga_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });
 
        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/produk/hapus_produk')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data_produk();
                    }
                });
                return false;
            });
 
    });
 
</script>
</body>
</html>