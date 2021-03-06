<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Manajemen Produk</title>
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
        Manajemen Produk
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Produk</h3>
              <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah Barang</a></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <!-- <th>Kode</th> -->
                  <th>Kode Barang</th>
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
                        <option value="Minuman">Minuman</option>
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
                    <button class="btn btn-info" type="submit" id="btn_simpan">Simpan</button>
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
            <form class="form-horizontal" id="update">
                <div class="modal-body">

                <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kodee" id="nama_produk2" class="form-control" type="text" placeholder="Nama Barang" style="width:335px;" readonly>
                        </div>
                </div>
 
                <div class="form-group">
                  <label class="control-label col-xs-3">Gambar</label>
                  <div class="col-xs-9">
                    <input type="file" name="filee" id="gambar" class="form-control" style="width:335px;" >
                  </div> 
                </div>

 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="namae" id="nama_produk2" class="form-control" type="text" placeholder="Nama Barang" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-xs-3">Kategori</label>
                      <div class="col-xs-9">
                      <select class="form-control select2 select2-hidden-accessible" name="kategorie" id="kategori2" style="width:335px;" tabindex="-1" aria-hidden="true" required>
                        <option selected="selected" hidden>Pilih</option>
                        <option>Makanan</option>
                        <option>Minuman</option>
                        <option>DLL</option>
                      </select>
                      </div>
                  </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga Modal</label>
                        <div class="col-xs-9">
                            <input name="modale" id="modal2" class="form-control" type="text" placeholder="Harga Modal" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga Jual</label>
                        <div class="col-xs-9">
                            <input name="juale" id="jual2" class="form-control" type="text" placeholder="Harga Jual" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Stok</label>
                        <div class="col-xs-9">
                            <input name="stoke" id="stok2" class="form-control" type="text" placeholder="Stok" style="width:335px;" required>
                        </div>
                    </div>

                <div class="form-group">
                  <label class="control-label col-xs-3">Deskripsi</label>
                  <div class="col-xs-9">
                  <textarea class="form-control" name="deskripsie" id="deskripsi2" rows="3" placeholder="Deskripsi ..."></textarea>
                  </div>
                </div>
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button type="submit" class="btn btn-info" id="btn_update">Update</button>
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

        <!-- modalimage -->
<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Upload & Crop Image</h4>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-8 text-center">
						  <div id="image_demo" style="width:350px; margin-top:30px"></div>
  					</div>
  					<div class="col-md-4" style="padding-top:30px;">
  						<br />
  						<br />
  						<br/>
						  <button class="btn btn-success crop_image">Crop & Upload Image</button>
					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
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
      'info'        : false,
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
                type  : 'AJAX',
                url   : '<?php echo base_url()?>index.php/produk/data_produk',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].id_produk+'</td>'+
                                '<td><img src="<?=base_url()?>assets/images/produk/800x800/'+data[i].gambar_produk+'" width="50px"/></td>'+
                                '<td>'+data[i].nama_produk+'</td>'+
                                '<td>'+data[i].id_kategori+'</td>'+
                                '<td>'+data[i].harga_modal+'</td>'+
                                '<td>'+data[i].harga_jual+'</td>'+
                                '<td>'+data[i].stok_produk+'</td>'+
                                '<td>'+data[i].terjual+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id_produk+'">Edit</a>'+
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
                        $('[name="kodee"]').val(data.id_produk);
                        $('[name="namae"]').val(data.nama_produk);
                        $('#kategori2').val(data.id_kategori).attr('selected','selected');
                        $('[name="modale"]').val(data.harga_modal);
                        $('[name="juale"]').val(data.harga_jual);
                        $('[name="stoke"]').val(data.stok_produk);
                        $('[name="deskripsie"]').val(data.deskripsi_produk);
                        $('[name="gambare"]').val(data.gambar_produk);
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
            $('#submit').submit(function(e){
            e.preventDefault();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/produk/simpan_produk')?>",
                dataType : "JSON",
                data : new FormData(this),//{kode:kode, nama:nama, kategori:kategori, modal:modal, jual:jual, stok:stok, deskripsi:deskripsi, gambar:gambar},
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(data){
                    $('[name="kode"]').val("");
                    $('[name="nama"]').val("");
                    // $('[name="kategori"] option').eq(0).prop('selected', true);
                    $('[name="modal"]').val("");
                    $('[name="jual"]').val("");
                    $('[name="stok"]').val("");
                    $('[name="deskripsi"]').val("");
                    // $('[name="gambar"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data_produk();
                }
            });
            return false;
        });
 
        //Update Barang
        $('#update').submit(function(e){
            e.preventDefault();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/produk/update_produk')?>",
                dataType : "JSON",
                data :new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(data){
                    $('#ModalaEdit').modal('hide');
                    tampil_data_produk();
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