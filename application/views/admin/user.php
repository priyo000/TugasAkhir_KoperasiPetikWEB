<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <?php $this->load->view('admin/_part/cssjs.php')?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('admin/_part/navbar.php') ?>
    <?php $this->load->view('admin/_part/sidebar.php')?>
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
    <section class="content container-fluid">
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
                        <label class="control-label col-xs-3" >Username</label>
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
 
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" type="submit" id="btn_saldo">Okee</button>
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
    <?php $this->load->view('admin/_part/footer.php')?>
    
</div>
<?php $this->load->view('admin/_part/js.php')?>
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_user();
         
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
                                              '<li><a href="javascript:;" class="tambah_saldo" data="'+data[i].id_akun+'" datauser="'+data[i].username+'" saldolama="'+data[i].saldo+'">Tambah Saldo</a></li>'+
                                            '</ul>'+
                                      '</div>'+
                                      '<div class="widget-user-image">'+
                                          '<img class="img-circle" width="150px" height="150px" src="<?=base_url()?>/assets/dist/img/user2-160x160.jpg" alt="User Avatar">'+
                                      '</div>'+
                                      '</div>'+
                                      '<div class="box-footer">'+
                                      '<h3 class="">'+data[i].username+'</h3>'+
                                        '<h5 class="">Rp.'+data[i].saldo+'</h5>'+
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
            $('#ModalaAdd').modal('show');
            $('[name="usersaldo"]').val(user);
            $('[name="idtambahsaldo"]').val(id);
            $('[name="saldolama"]').val(saldolama);
        });
        //TambahSaldo
        $('#btn_saldo').on('click',function(){
            var id=$('#idsaldo').val();
            var saldo=Number($('#isisaldo').val())+Number($('#saldolama').val());
            // alert(saldo);
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/user/tambah_saldo')?>",
            dataType : "JSON",
                    data : {id_akun:id ,saldo:saldo},
                    success: function(data){
                            $('#ModalaAdd').modal('hide');
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
 
 
</script>
</body>
</html>