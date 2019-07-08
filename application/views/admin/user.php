<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manajemen User</title>
    <link rel = "icon" type = "image/png" href = "<?=base_url()?>assets/images/iconkoperasi.png">
    <?php $this->load->view('_part/cssjs.php')?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('_part/navbar.php') ?>
    <?php $this->load->view('_part/sidebar.php')?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Manajemen User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div style="margin-bottom:10px"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#TambahUser"><span class="fa fa-plus"></span> Tambah User</a></div>
    <div class="row" id="show_data">

    </div>
    </section>

    <!-- modal -->

    <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Saldo</h3>
            </div>
            <form class="form-horizontal" id="saldo">
                <div class="modal-body">


                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                        <input name="usersaldo" class="form-control" value="" style="width:335px;" readonly>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah Saldo</label>
                        <div class="col-xs-9">
                        <!-- <input name="usersaldo" id="textkode" value="" readonly> -->
                        <input type="hidden" name="idtambahsaldo" id="idsaldo" value="">
                        <input type="hidden" name="saldolama" id="saldolama" value="">
                            <input name="saldo" id="isisaldo" class="form-control" type="text" placeholder="Jumlah Saldo..." style="width:335px;" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah Point</label>
                        <div class="col-xs-9">
                        <!-- <input name="usersaldo" id="textkode" value="" readonly> -->
                        <input type="hidden" name="pointlama" id="pointlama" value="">
                            <input name="saldo" id="isipoint" class="form-control" type="text" placeholder="Jumlah Saldo..." style="width:335px;" required>
                        </div>
                    </div>
 
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" type="submit" id="btn_saldo">Okee</button>
                </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="TambahUser" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah User</h3>
            </div>
            <form class="form-horizontal" id="tambahuser">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIM</label>
                        <div class="col-xs-9">
                        <input name="nim" class="form-control" placeholder="NIM..." type="text" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-9">
                            <input name="password" id="password" class="form-control" type="password" placeholder="Password..." style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Level</label>
                        <div class="col-xs-9">
                        <select class="form-control select2 select2-hidden-accessible" name="level" id="level" style="width:335px;" tabindex="-1" aria-hidden="true">
                        <option selected="selected" disabled>Pilih</option>
                        <option value="2">Admin</option>
                        <option value="1">User</option>
                      </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" type="submit" id="btn_user">Tambahkan</button>
                </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus User</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="idhapus" id="idnyahapus" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus User ini?</p></div>                   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    <!-- /.content -->
  </div>
    <?php $this->load->view('_part/footer.php')?>
    
</div>
<?php $this->load->view('_part/js.php')?>
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_user();
        tampilkan_cart();
         
        // $('#mydata').dataTable();
          
        //fungsi tampil barang
        function tampil_data_user(){
            $.ajax({
                type  : 'AJAX',
                url   : '<?php echo base_url()?>index.php/user/data_user',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<div class="col-md-2">'+
                                  '<div class="box box-widget widget-user">'+
                                      '<div class="widget-user-header">'+
                                          '<div class="btn-group pull-right">'+
                                          '<a type="button" class="warning" data-toggle="dropdown" aria-expanded="false">'+
                                              '<i class="fa fa-ellipsis-h"></i></a>'+
                                            '<ul class="dropdown-menu pull-right" role="menu">'+
                                              '<li><a href="#">Lihat User</a></li>'+
                                              '<li><a href="javascript:;" class="item_hapus" data="'+data[i].id_akun+'">Hapus User</a></li>'+
                                              '<li class="divider"></li>'+
                                              '<li><a href="javascript:;" class="tambah_saldo" data="'+data[i].id_akun+'" datauser="'+data[i].name+'" saldolama="'+data[i].saldo+'" pointlama="'+data[i].point+'">Tambah Saldo/Point</a></li>'+
                                            '</ul>'+
                                      '</div>'+
                                      '<div class="widget-user-image">'+
                                          '<img class="img-circle" width="150px" height="150px" src="<?=base_url()?>/assets/dist/img/user2-160x160.jpg" alt="User Avatar">'+
                                      '</div>'+
                                      '</div>'+
                                      '<div class="box-footer">'+
                                      '<h3 class="">'+data[i].name+'</h3>'+
                                        '<h5 class="">Rp.'+data[i].saldo+'</h5>'+
                                        '<h5 class="">Pt.'+data[i].point+'</h5>'+
                                      '</div>'+
                                    '</div>'+
                                  '</div>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
        //GET Tambah Saldo
        $('#show_data').on('click','.tambah_saldo',function(){
            var user=$(this).attr('datauser')
            var id=$(this).attr('data');
            var saldolama=$(this).attr('saldolama');
            var pointlama=$(this).attr('pointlama');
            $('#ModalaAdd').modal('show');
            $('[name="usersaldo"]').val(user);
            $('[name="idtambahsaldo"]').val(id);
            $('[name="saldolama"]').val(saldolama);
            $('[name="pointlama"]').val(pointlama);
        });
        //TambahSaldo
        $('#btn_saldo').on('click',function(){
            var id=$('#idsaldo').val();
            var saldo=Number($('#isisaldo').val())+Number($('#saldolama').val());
            var point=Number($('#isipoint').val())+Number($('#pointlama').val());
            // alert(saldo);
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/user/tambah_saldo')?>",
            dataType : "JSON",
                    data : {id_akun:id ,saldo:saldo,point:point},
                    success: function(data){
                            $('#ModalaAdd').modal('hide');
                            tampil_data_user();
                    }
                });
                return false;
            });

        //TambahUser
        $('#btn_user').on('click',function(){
            var nim=$('[name="nim"]').val();
            var password=$('[name="password"]').val();
            var level=$('[name="level"]').val();
            // alert(level);
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/user/tambah_user')?>",
            dataType : "JSON",
                    data : {nim:nim,password:password,level:level},
                    success: function(data){
                            $('#TambahUser').modal('hide');
                            tampil_data_user();
                    }
                });
                return false;
            });    

        //GET HAPUS
      $('#show_data').on('click','.item_hapus',function(){
        var id=$(this).attr('data');
        $('#ModalHapus').modal('show');
        $('[name="idhapus"]').val(id);
        });
        //Hapus User
        $('#btn_hapus').on('click',function(){
            var id=$('#idnyahapus').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/user/hapus_akun')?>",
            dataType : "JSON",
                    data : {id_akun: id},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data_user();
                    }
                });
                return false;
            });
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
 
 
</script>
</body>
</html>