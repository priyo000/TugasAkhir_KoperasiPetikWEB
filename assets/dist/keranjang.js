
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
                                '<td>'+data[i].harga_jual+'</td>'+
                                '<td>'+data[i].kuantitas+'</td>'+
                                '<td>'+data[i].total_harga+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<button href="javascript:;" class="btn btn-danger btn-xs hapus_cart" data="'+data[i].id_detail_order+'">Hapus</button>'+
                                '</td>'+
                                '</tr>';
                    }
                    bayar ='<form class="bayar">'+
                      '<input type="hidden" name="id_order" value="'+idorder+'">'+
                      '<input type="hidden" name="jml_saldo" value="'+total+'">'+
                      '<input type="hidden" name="jml_point" value="'+total2+'">'+
                      '<button class="btn btn-danger bayar_saldo" style="margin-right:10px;">Bayar Menggunakan Saldo</button>'+
                      '<button class="btn btn-warning bayar_point" >Bayar Menggunakan Point</button>'+
                    '</form>';

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
