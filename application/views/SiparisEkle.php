
  
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="<?php echo base_url(); ?>/assets/dist/css/style.min.css" rel="stylesheet">
  

    <div class="page-wrapper">
          
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">
                       <?php echo $masalar[0]["table_name"]; ?><span style="display:none;" class="id"><?php echo $this->uri->segment('3');?></span> 
<span class="Masa-State">
<?php if(isset($siparis) && !isset($siparis[0])){ ?>
        <?php if($masalar[0]["is_busy"]==1){ ?>
    <button style="margin-left:20px;" class="Masa-open btn btn-warning text-dark"><span>  <?php echo $masalar[0]["table_name"]; ?></span> Siparişsiz Aç </button>
        <?php }?> 
        <?php if($masalar[0]["is_busy"] == 2 ){ ?>
            <button style="margin-left:20px;" class="Masa-close btn btn-danger text-white"><span>  <?php echo $masalar[0]["table_name"]; ?></span> Siparişsiz Kapat </button>
        <?php }?> 

    <?php } ?></span></h4>  
                    </div>
                </div>
            </div>
          
            <div class="container-fluid">

            <div class="row">
            <div class="col-md-6">  
            <div class="row" >

           

            <?php 
for($v=0;$v<count($kategoriler);$v++){
 
    echo '<div class=" col-lg-12"><button style="height:50px; margin-top:5px;"  onClick="Goster('.$kategoriler[$v]["id"].')" class="btn btn-danger col-lg-12"><b>'.$kategoriler[$v]["product_name"].'</b></button></div><br><br>';
    
    for($i=0;$i<count($urunler);$i++){
        if($kategoriler[$v]["id"]==$urunler[$i]["product_type"]){  
         
        ?>
     <div style="margin-top:5px; height:auto;width:150px;" class="col-md-6 col-6 col-lg-3 urun kategori-<?php echo $urunler[$i]["product_type"];  ?>">
                          
                          <div  class="card card-hover" data-toggle="modal" data-target="#UrunAcil<?php echo $urunler[$i]["id"]; ?>">
                         <div  class="box bg-info text-center">
                               <h1   style="width:100%; " class="font-light text-white"><img class="urun" width="100%" height="95" id="<?php echo $i ?>" src="<?php echo base_url("assets/images/").$urunler[$i]["product_image"]; ?>"></h1>
                               <h6 class="text-white"><?php echo $urunler[$i]["product_name"]; ?></h6>
                                        </div>
                           </div>
                   </div>   
        <div class="modal fade" id="UrunAcil<?php echo $urunler[$i]["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $urunler[$i]["product_name"]; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="row">
                  
                  <div class="col-4">
                      Miktar:<input type="number" disabled data-price="<?php echo $urunler[$i]["price"]; ?>"  data-id="<?php echo $urunler[$i]["id"]; ?>" class="form-control count" min="1" value="1" >
                      <button class="btn btn-success add-one"   data-price="<?php echo $urunler[$i]["price"]; ?>" data-id="<?php echo $urunler[$i]["id"]; ?>" style="font-size:15pt;margin:3px;width:40%;padding:5px;float:left;text-align:center;"  >+</button> <button  data-price="<?php echo $urunler[$i]["price"]; ?>" data-id="<?php echo $urunler[$i]["id"]; ?>" class="minus-one btn btn-danger" style="font-size:15pt;margin:3px;width:40%;padding:5px;" >-</button>
                    </div>
                  
                      <div class="col-4">
                      Fiyat
                      <br><h4    data-id="<?php echo $urunler[$i]["id"]; ?>"  class="add"   >
                      <span><?php echo number_format($urunler[$i]["price"],'2'); ?></span>  TL</h4></div>
                  <div class="col-4">
                      Tutar:<h4  data-id="<?php echo $urunler[$i]["id"]; ?>"  class="add siparis-<?php echo  $urunler[$i]["id"]  ?>" ><span><?php echo number_format($urunler[$i]["price"],'2'); ?><span> TL</h4>
                  </div>
              </div>
              <br/>
              <div class="row">
              <div class="col-11" style="margin-left:1%"><b>Açıklama:</b></div>
              <br>
                      <div class="col-12" style="margin-left:1%;"><input type="text"  class="desc col-12" data-id="<?php echo $urunler[$i]["id"]; ?>" >
                  </div>
              </div>
          <br>
                            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
            <button type="button" data-dismiss="modal" data-id="<?php echo $urunler[$i]["id"]; ?>" class="btn btn-primary Ekle">Ekle</button>
          </div>
        </div>
      </div>
    </div>
    <?php

}
    }
    }
    ?>

 

        
                    </div>
             
<style>
    .Hide{
        display:none;
    }
    
  .product-delete:hover{
    background: rgba(1,1,1,.3);
    cursor:pointer;
}

    </style>
            </div>
           
            <div class="col-md-6" onload="x()">
            <div  id="printArea">
                <h2  valign="center" class="text-center print" ><?php echo $masalar[0]["table_name"]; ?> SİPARİŞLER</h2>
      
        <div class="table-responsive">
        <table class="table"  >
   <thead class="thead-dark">
   <tr>
   <th scope="col" class="urun-th">Ürün</th>
      <th scope="col">Adet</th>
      
      <th scope="col" class="no-print">Ekleyen</th>
    
      <th scope="col">Açıklama</th>
      <th scope="col" class="no-print">Total</th>
        <th scope="col" class="no-print">Durum</th>
    </tr>
     </thead>
     <tbody class="t-body">

     
     </tbody>

         </table>
        <hr>
        <h4 style="display:inline">Sipariş Toplam: <span class="geneltoplam"></span></h4>
        


        </div>
    
    
        </div>
        <?php 
if(isset($_SESSION["user_type"])&&$_SESSION["user_type"]!=3){
?>
<button  onclick="siparisOnayla()" style="display:inline-block;float:right;padding:5px 30px" class="btn btn-success"><i class="mdi mdi-check"> </i>Siparişleri Onayla</button>
<button   style="  display:inline-block;float:right;margin-right:5px;" class="d-none d-sm-block no-print-button btn btn-info "><i class="mdi mdi-printer"> </i>Yazdır</button>
<?php
}
?>
            </div>

            </div>
           
    <script src="<?php echo base_url(); ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>/assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>/assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="<?php echo base_url(); ?>/dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?php echo base_url(); ?>/assets/libs/flot/excanvas.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?php echo base_url(); ?>/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets//dist/js/pages/chart/chart-page-init.js"></script>
   
    <script>
   
    
    </script>

       <footer class="footer text-center">
              <a class="col-xs-12 col-12 float-right btn btn-success bg bg-success  d-sm-none d-lg-none "  href="<?php echo base_url(); ?>/Dashboard"><b>Masalar</b></a> 
            </footer>
           
  
    <script>


$(".urun").toggle();  

function Goster(id){
    $(".kategori-"+id).toggle();  
    $(".kategori-"+id+" h1 img").toggle();
}
  
   
        
    var masaid = $('.page-title .id').text();
   
    function DeleteShip(id){
        $.ajax({
            type:"post",
            url:"<?php echo base_url(); ?>Siparis/Sil",
            data:{id:id},
            success:function(data){
                if(data==1){
                    x();
                }
            }
        });
    }


        $('.Masa-open').click(function(){
            $(this).html('<div style="width:20px;height:20px;" class="spinner-border text-primary" role="status"></div>');
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>Siparis/SiparisizMasaDoldur",
                data:{id:masaid},
                success:function(data){

                    if(data==1){
                        setTimeout(function(){
                           
                            $('.Masa-open').text("<?php echo $masalar[0]["table_name"]; ?>"+" Açıldı");
                        

                            setTimeout(function(){
                           
                           $('.Masa-open').css('display','none');
                       },1000);
                        
                        },2000);
                       
                    }
                    else{
                        $('.Masa-open').text("<?php echo $masalar[0]["table_name"]; ?> "+" Açılmadı");
                    }
                  
                }
            });
           
        });



        $('.Masa-close').click(function(){
            
            $(this).html('<div style="width:20px;height:20px;" class="spinner-border text-dark" role="status"></div>');
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>Siparis/SiparisizMasaKapat",
                data:{id:masaid},
                success:function(data){
                    //
                    if(data==1){
                        setTimeout(function(){
                            $('.Masa-close').text("<?php echo $masalar[0]["table_name"]; ?>"+" Kapatıldı");
                            
                            setTimeout(function(){
                           
                           $('.Masa-close').css('display','none');
                       },1000);
                        
                        },2000);
                       
                    }else{
                        $$('.Masa-close').text("<?php echo $masalar[0]["table_name"]; ?>"+ "Kapatılamadı");
                    }
                  
                }
            });
           
        });
           $(".count").on("input",function(id){

            var data = $(this)[0].getAttribute("data-id");
             id = data;
            var price =  $(this)[0].getAttribute("data-price");
            var value =  $(this).val();
            
             if(value==0){
                
               
                value=1;
                            }
            $(".siparis-"+id).text(parseFloat(price*value)+"  TL");
             }); 



             $(".Ekle").on("click",function(){
            
                var data = $(this)[0].getAttribute("data-id");
             id = data;
            
            var count = $(".count[data-id="+id+"]").val();
            var _price = $(".siparis-"+id).val();
            var __price = _price.substr(0, 3);
                var price_last =   __price.replace(/\s+/g,"");
                var desci = $(".desc[data-id="+id+"]").val();
                   $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>Siparis/SiparisUrunEkle",
                    data:{masaid:masaid,urunsayi:count,urunid:id,desc:desci},
                    success:function(data){
                        $('.count').val(1);
                        $(".desc[data-id="+id+"]").val("");
                        
                    }


                   });

             });

             $('.add-one').click(function(id){
                var data = $(this)[0].getAttribute("data-id");
                id = data;
                var price =  $(this)[0].getAttribute("data-price");
                var value =Number($(".count[data-id="+id+"]").val());
                
                $(".count[data-id="+id+"]").val(Number(value += 1));
                $(".siparis-"+id).text(parseFloat(price*$(".count[data-id="+id+"]").val()).toFixed(2)+"  TL");
             });

             $('.minus-one').click(function(id){
                var data = $(this)[0].getAttribute("data-id");
                id = data;
                var price =  $(this)[0].getAttribute("data-price");
                var value =Number($(".count[data-id="+id+"]").val());

                $(".count[data-id="+id+"]").val(Number(value -=1));
                if($(".count[data-id="+id+"]").val() == 0){
                    console.log(value);
                    $(".count[data-id="+id+"]").val(1);
                }

                
                $(".siparis-"+id).text(Number(price*$(".count[data-id="+id+"]").val()).toFixed(2)+"  TL");
             });
            var x = function(){
               
                $.ajax({
                type:"POST",
                
                url:"<?php echo base_url(); ?>Siparis/SiparisUrunGetir",
                data:{id:masaid},
                success:function(data){
                    $('.t-body').html(data);
                    TotalHesap();
                }

             });
            }
            var siparisOnayla = function(){
               var price =  $('.geneltoplam').text();
               var __price = price.slice(0,-3);
               var price_last=   __price.replace(/\s+/g,"");
             
                $.ajax({
                type:"POST",
                
                url:"<?php echo base_url(); ?>Siparis/SiparisOnayla",
                data:{id:masaid},
                success:function(data){

   
                    $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>Siparis/UpdatePrice",
                data:{price:price_last,id:masaid,},
                success:function(){
                   
                }

                  });


                    $('.t-body').html(data);
                    TotalHesap();

                
                },
                error:function(data){
                    $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>Siparis/UpdatePrice",
                data:{price:__price,id:masaid,},
                success:function(){
                   
                }

                  });   
                }

             });
            }
            $('.no-print-button').click(function(){
        $('#printArea .no-print').css('opacity','0');
        $('#printArea .urun-th').css({'text-align':'left','margin':'20px 0px'});
        $('#printArea .urun').css({'margin-top':'20px','border-bottom':'1px solid black'});
        $('#printArea tr').css({'width':'50%'});
    printJS('printArea', 'html');
    $('#printArea .no-print').css('opacity','1');

    x();
    });
            function TotalHesap(){
               

               var total =  $('.total').length;
             var _total=0;
               for(var i = 0; i<total;i++){
                
            _total+=parseFloat($('.totals-'+i+'').text());   
            
        }
        $('.geneltoplam').text(parseFloat(_total).toFixed(2) + " TL");
         
               
                

            }
            x(); 
           
           setInterval(x,500);
             
             
             
             
                </script>

<script src="  https://printjs-4de6.kxcdn.com/print.min.js"></script>
