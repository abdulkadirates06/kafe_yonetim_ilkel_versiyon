
   <style>
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
       </style>
<style>
  
                             .paytype { 
                              
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
.paytype + img {
  cursor: pointer;
  margin-left:20px;
  
}

.table-img{
  width:100px;
  height:100px;
}
/* CHECKED STYLES */
.paytype:checked + img {
  
  outline: 2px solid #f00;
}</style>

          <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Masalar</h4>
                        <div class="ml-auto text-right">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row Masa-doldur">
                    <!-- Column -->
                 
                    <!-- Column -->
                </div>
              
                  </div>
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
         
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
  

 
    <div  class="modal" id="adisyon" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div  class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="printArea">
      <div id="area">
        <div class="table-responsive">
        <table class="table table-bordered">
   <thead class="thead-dark">
   <tr>
      
      <th scope="col">Ürün</th>
      <th scope="col">Sayısı</th>
      <th scope="col" class="no-print">Kasiyer</th>
      <th scope="col" class="no-print">Tarih</th>
      <th scope="col" class="no-print">Tutar</th>
    </tr>
     </thead>
     <tbody class="t-body">

     
     </tbody>

         </table>
         <h4 style="display:block">Genel Toplam: <span class="geneltopla"></span></h4></div>
        <hr>
        </div>
        <div class="no-print">
        <h4>ÖDEME TİPİ:</h4>
        <label>
  <input type="radio" class="paytype" name="payMethod" value="1" checked>
  <img style="width:50px;height:50px;" src="<?php echo base_url("assets/images/"); ?>nakit.jpg">
</label>

<label>
  <input type="radio" class="paytype"  name="payMethod" value="2" checked>
  <img style="width:50px;height:50px;" src="<?php echo base_url("assets/images/"); ?>kredikart.jpg">
</label>
<br>
</div>

<hr>
<h4>İSKONTO:</h4>
  <input type="radio" name="iskonto" class="iskn"  value="0" checked> 0% 


 <input type="radio"  name="iskonto" class="iskn" value="5"> 5%

 <input type="radio"   name="iskonto" class="iskn" value="10"> 10%
 
 <input type="radio"   name="iskonto"  class="iskn" value="20"> 20%

        <br>
        <hr>
                              </div>
                             
            <div class="row">
         <div class="col-md-12">
             <div class="form-group">
            
             

             <span style="float:left;">Fiyattan düş</span><br>
             <input class="form-control down-p" min="0.5" max="0" type="number" style="border-radius:0px;width:70%;float:left;" type="text">
             <button disabled style="border-radius:0px;width:30%" class="ode btn btn-primary">Öde</button>
           
             <div class="form-group">
             <br>
             <h4 style="display:inline">Ödenecek Tutar: <span class="geneltoplam"></span><input type="hidden" value="0" class="GenelToplam"></h4>
       
             </div>
            </div>
            </div>
        
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" style="margin-right:15em;" onclick="printPageArea('area')" class="btn btn-success print float-left"><i class="mdi mdi-printer"></i> Yazdır</button>
        <button type="button" disabled  class="btn btn-primary close-table">Masayı Kapat</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>

<script>

 


   function printPageArea(areaID){
    var printContent = document.getElementById(areaID);
    var WinPrint = window.open('', '', 'width=900,height=650');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
}
  
  var MasaGetir = function(){
    $.ajax({
      type:"POST",
      url:"<?php  echo base_url(); ?>/Dashboard/Get_Masalar",
      success:function(data){
        $('.Masa-doldur').html(data);
      }
    })
  }
 
  setInterval(MasaGetir,1000);
                                
            var x = function(masaid){
              
              $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>Adisyon/GetPrice",
                data:{id:masaid},
                success:function(data){

                  


                }
                
              });
              
              $.ajax({
                type:"POST",
                
                url:"<?php echo base_url(); ?>Adisyon/AdisyonGetir",
                data:{id:masaid},
                success:function(data){
                   $('.modal-title').text('ADİSYON');
                    $('.t-body').html(data);
                    FiyatGetir();
                    TotalHesap();
                }

             });
             
             $('.ode').click(function(){
              var odeprice = $('.down-p').val();
              var tip = $(".paytype:checked").val();

              $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>Adisyon/AdisyonOde",
                data:{id:masaid,price:odeprice,type:tip},
                success:function(){
                 MasaGetir();
                  FiyatGetir();
                  $('.down-p').val("");
                  $(".ode").attr("disabled",true);
                }

              });

             });
             
             $('.down-p').on("input",function(evt){
              if($(this).val() !=""){
              $(".ode").removeAttr("disabled");
              }
              else{
                $(".ode").attr("disabled",true);
              }
              if($(this).val() <0){
        $(this).val(1);
      }
      if($(this).val() > parseFloat($(this).attr("max")) ){
     
        $(this).val($(this).attr("max"));
      }
      
   });
   
  $('input:radio[name=iskonto]').click(function(){
    var deger = $(this).val();
    var toplam = $('.GenelToplam').val();
    console.log(toplam);
    var last_toplam = (toplam * deger) / 100;  
    var __toplam =  toplam - last_toplam;
    $('.down-p').val("");
    if(deger > 0){
      
      $('.genelToplam').text(parseFloat(__toplam).toFixed(2)+ ' TL');
      $('.down-p').attr("max",__toplam.toFixed(2));
      var sonTutar = __toplam.toFixed(2);
      $.ajax({
        type:"POST",
        url:"<?php  echo base_url(); ?>Adisyon/IskontoDus",
        data:{id:masaid,tutar:sonTutar},
        success:function(data){
          console.log(data);
        }
      });
    }
    if(deger == 0){
     
      $('.genelToplam').text(toplam+' TL');
      $('.down-p').attr("max",toplam);
    }


   });

   var FiyatGetir = function(){
      $.ajax({
        type:"POST",
        url:"<?php  echo base_url(); ?>Adisyon/SonFiyatGetir",
        data:{id:masaid},
        success:function(data){
          $('.geneltoplam').text(parseFloat(data).toFixed(2) + " TL");
          $('.down-p').attr("max",parseFloat(data).toFixed(2));
          $('.GenelToplam').val(data);
          if(data==0){
            $('.close-table').removeAttr("disabled");

            $('.close-table').click(function(){
              $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>Siparis/MasaKapat",
                data:{id:masaid},
                success:function(){

                  $('.modal-backdrop').removeClass('show');
                        $('.modal').removeClass('show');
                        $('.modal').css({'display':'none','padding-right':'0'});
                        $('.modal-backdrop').css({'z-index':'-55','display':'none'});

                  $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>/Siparis/MasaAktifEt",
                    data:{id:masaid},
                    success:function(){
                     
                    }
                  });
                 

                }
              });
            });
          }
          
          
        },
        error:function(er){
          alert(er);
        }

      });

    }
            }
           
            function TotalHesap(){
               

               var total =  $('.total').length;
             var _total=0;
               for(var i = 0; i<total;i++){
                
            _total+=Number($('.totals-'+i+'').text());   
            
        }
        $('.geneltopla').text(_total + " TL");
        $('.down-p').attr("max",_total);
               
                

            }
            FiyatGetir();
            x(); 
           
             
             
             setInterval(x,500);
             
                </script>
