<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <section class="content container">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Check Out</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="xxx" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Sub Total</th>
                  <th></th>
                </tr>
                </thead>
                <tbody class="cart">
                    
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4">TOTAL DENGAN SALDO </th>
                    <th class="totalcart"></th>
                  </tr>
                  <tr>
                    <th colspan="4">TOTAL DENGAN POINT</th>
                    <th class="totalcart2"></th>
                  </tr>
                </tfoot>
              </table>
              <div id="bayar" class="pull-right">

              </div>
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
        tampilkan_cart();
        function tampilkan_cart(){
            $.ajax({
                type  : 'AJAX',
                url   : '<?php echo base_url()?>index.php/cart/load_keranjang',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var bayar ='<a href="<?=base_url()?>index.php/cart/byr_saldo?'+data[0].id_order+'" class="btn btn-danger" style="margin-right:10px;">Bayar Menggunakan Saldo</a>'+
                              '<a href="<?=base_url()?>index.php/cart/byr_point?'+data[0].id_order+'" class="btn btn-warning">Bayar Menggunakan Point</a>';
                    var i;
                    var total=0;
                    var total2=0;
                    for(i=0; i<data.length; i++){
                        total+=Number(data[i].total_harga);
                        total2+=Number(data[i].total_harga2);
                        html += '<tr>'+
                                '<td><img class="" width="50px" height="50px" src="<?=base_url()?>/assets/images/produk/800x800/'+data[i].gambar_produk+'" alt="User Avatar"></td>'+
                                '<td>'+data[i].nama_produk+'</td>'+
                                '<td>'+data[i].harga_jual+'</td>'+
                                '<td>'+data[i].kuantitas+'</td>'+
                                '<td>'+data[i].total_harga+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<button href="javascript:;" class="btn btn-danger btn-xs hapus_cart" data="'+data[i].id_detail_order+'">Hapus</button>'+
                                '</td>'+
                                '</tr>';
                    }
                    alert(data[0].total_harga2);
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
        
        $('.hapus_cart').click(function() {
            var id= $(this).attr('data');
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/cart/hapus_isi')?>",
            dataType : "JSON",
            data : {id_dorder:id},
                success: function(data){
                    
                }
                });
                tampilkan_cart();
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