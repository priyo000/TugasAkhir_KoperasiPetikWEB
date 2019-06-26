<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
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
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-4 " id="propil">
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Order</a></li>
              <li><a href="#timeline" data-toggle="tab">Riwayat</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <!-- <th>Kode</th> -->
                  <th>Kode Order</th>
                  <th>Waktu Order</th>
                  <th>Transaksi</th>
                </tr>
                </thead>
                <tbody id="show_data">
                  <?php foreach ($order as $o) {?>
                    <tr>
                        <td><?=$o->id_order?></td>
                        <td><?=$o->waktu_order?></td>
                        <td style="text-align:right;">
                            <a href="javascript:;" class="btn btn-info btn-xs rincian" data="<?=$o->id_order?>">Rincian</a> 
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
              </table>
                
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <!-- <th>Kode</th> -->
                  <th>Kode Order</th>
                  <th>Waktu Order</th>
                  <th>Transaksi</th>
                </tr>
                </thead>
                <tbody id="riwayat">
                    
                
                </tbody>
            </table>
              </div>
              <!-- /.tab-pane -->
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
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
                  
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th>Total Harga</th>
                  
                </tr>
                </thead>
                <tbody id="rincian">
                
                </tbody>
              </table>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
            </div>
            </div>
    </div>

    <div class="modal fade" id="ModalaHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Order</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="idriwayat" id="riwayatHapus" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau Membatalkan Riwayat ini?</p></div>                 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btnhapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
    </div>
  </div>
    <?php $this->load->view('_part/footer.php')?>
    
<?php $this->load->view('_part/js.php')?>
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_user();
        tampil_riwayat();
         
        // $('#mydata').dataTable();
          
        //fungsi tampil barang
        function tampil_data_user(){
            $.ajax({
                type  : 'AJAX',
                url   : '<?php echo base_url()?>index.php/profil/get_akun',
                async : false,
                dataType : 'json',
                success : function(data){
    
                    var html = '';
          
                        html += '<div class="box box-primary">'+
            '<div class="box-body box-profile">'+
              '<img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>assets/images/user/800x800/default.jpg" alt="User profile picture">'+

              '<h3 class="profile-username text-center">'+data.user.name+'</h3>'+

              '<p class="text-muted text-center">Software Engineer</p>'+

              '<ul class="list-group list-group-unbordered">'+
                '<li class="list-group-item">'+
                  '<b>Saldo</b> <a class="pull-right">'+data.user.saldo+'</a>'+
                '</li>'+
                '<li class="list-group-item">'+
                  '<b>Email</b> <a class="pull-right">'+data.user.email+'</a>'+
                '</li>'+
                '<li class="list-group-item">'+
                  '<b>Nomor hape</b> <a class="pull-right">'+data.user.no_hp+'</a>'+
                '</li>'+
                '<li class="list-group-item">'+
                  '<b>Kamar</b> <a class="pull-right">'+data.user.room+'</a>'+
                '</li>'+
              '</ul>'+

              '<a href="#" class="btn btn-primary btn-block"><b>Edit Profil</b></a>'+
            '</div>'+
            '<!-- /.box-body -->'+
          '</div>'+
          '<!-- /.box -->'+

          '<!-- About Me Box -->'+
          '<div class="box box-primary">'+
            '<div class="box-header with-border">'+
              '<h3 class="box-title">About Me</h3>'+
            '</div>'+
            '<!-- /.box-header -->'+
            '<div class="box-body">'+
              '<strong><i class="fa fa-book margin-r-5"></i>Nama</strong>'+

              '<p class="text-muted">'+data.user.name+'</p>'+
            
              '<hr>'+

              '<strong><i class="fa fa-map-marker margin-r-5"></i>Birth</strong>'+

              '<p class="text-muted">'+data.user.birth+'</p>'+

              '<hr>'+

              '<strong><i class="fa fa-pencil margin-r-5"></i> Jenis Kelamin</strong>'+

              '<p>'+data.user.gender+'</p>'+
              '<hr>'+

              '<strong><i class="fa fa-file-text-o margin-r-5"></i> Motto Hidup</strong>'+

              '<p>'+data.user.motto+'</p>'+
            '</div>'+
            '<!-- /.box-body -->'+
          '</div>';

                    $('#propil').html(html);
                }
 
            });
        }
        function tampil_riwayat(){
            $.ajax({
                type  : 'AJAX',
                url   : '<?php echo base_url()?>index.php/profil/riwayat',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>'+
                        '<td>'+data[i].id_order+'</td>'+
                        '<td>'+data[i].waktu_order+'</td>'+
                        '<td style="text-align:right;">'+
                            '<a href="javascript:;" class="btn btn-info btn-xs rincian" data="'+data[i].id_order+'">Rincian</a>'+
                            '<a href="javascript:;" class="btn btn-danger btn-xs hapus_riwayat" data="'+data[i].id_order+'">Hapus</a>'+ 
                        '</td>'+
                    '</tr>';
                  }
                    $('#riwayat').html(html);
                }
 
            });
        }
        $('.rincian').on('click',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/penjualan/get_detail_order')?>",
                dataType : "JSON",
                data : {id_order:id},
                success: function(data,){
                    var oh = '';
                    $.each(data,function(i,nama_produk,kuantitas,total_harga){
                        // alert(data[i].nama_produk);
                        oh += '<tr>'+
                                '<td>'+data[i].nama_produk+'</td>'+
                                '<td>'+data[i].kuantitas+'</td>'+
                                '<td>'+data[i].total_harga+'</td>'+
                                '<td style="text-align:right;">'+
                                    // '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data.id_order+'">Rincian</a>'+
                                '</td>'+
                                '</tr>';
                                  
            });
            $('#rincian').html(oh);
            $('#ModalaEdit').modal('show');
        }
      });
      return false;
    });
    //     //TambahSaldo
    //     $('#btn_saldo').on('click',function(){
    //         var id=$('#idsaldo').val();
    //         var saldo=Number($('#isisaldo').val())+Number($('#saldolama').val());
    //         // alert(saldo);
    //         $.ajax({
    //         type : "POST",
    //         url  : "<?php echo base_url('index.php/user/tambah_saldo')?>",
    //         dataType : "JSON",
    //                 data : {id_akun:id ,saldo:saldo},
    //                 success: function(data){
    //                         $('#ModalaAdd').modal('hide');
    //                         tampil_data_user();
    //                 }
    //             });
    //             return false;
    //         });
    

    //     //GET HAPUS RIWAYAT
      $('#riwayat').on('click','.hapus_riwayat',function(){
        var id=$(this).attr('data');
        $('#ModalaHapus').modal('show');
        $('[name="idriwayat"]').val(id);
        });

        //Hapus RIWAYAT
        $('#btnhapus').on('click',function(){
            var id=$('#riwayatHapus').val();
            // alert(id);
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/penjualan/hapus_order')?>",
            dataType : "JSON",
                    data : {idorder: id},
                    success: function(data){
                            $('#ModalaHapus').modal('hide');
                            tampil_riwayat();
                    }
                });
                return false;
            });
        });    
 
 
</script>
</body>
</html>