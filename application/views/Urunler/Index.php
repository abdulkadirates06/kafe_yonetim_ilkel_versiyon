
                        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                               
                                 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="card">
    
                            <div class="card-body">
                                
                                <h5 class="card-title m-b-0">Ürünler</h5>
                                <input style="max-width:30%;" class="form-control float-left" id="filter-table"  placeholder="Filtrele" >    <button class="btn btn-success float-right"  data-toggle="modal" data-target="#yeniUrun" href="#">Yeni Ürün Ekle</button>
                            </div>


                            <div class="modal fade" id="yeniUrun" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="yeniUrunLabel">Yeni Ürün Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
   <form  class="form-horizontal" action="<?php  echo base_url();?>/Urunler/urun_Ekle" 
     autocomplete="off"
     enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <div class="card-body">
                                    
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Ürün Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="uname" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Ürün Fiyatı</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="uprice" min="0.00" max="10000.00" step="0.01" required >
                                        </div>
                                    </div>
                                    
                                <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Ürün Kategori</label>
                                    <div class="col-md-9">
                                        <select class="select2 form-control custom-select" name="utype" style="width: 100%; height:36px;">
                                            

                                              <?php 
                                                for($i=0;$i<count($kategoriler);$i++){
                                                  ?>

<option value="<?php echo $kategoriler[$i]["id"]; ?>"><?php echo $kategoriler[$i]["product_name"]; ?></option>
<?php
                                                }
                                              ?>
                                           
                                          
                                           
                                         
                                            
                                        </select>
                                    </div>
                                </div>
                                
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Ürün Resmi</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="userfile" >
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <input type="submit" class="btn btn-primary" value="Ürünü Ekle"></form>
      </div>
    </div>
  </div>
</div>
                            <table  class="table">
                                  <thead>
                                    <tr>
                                      <th >#</th>
                                      <th >Ürün Adı</th>
                                      <th >Fiyatı</th>
                                      <th >Para Birimi</th>
                                      <th >Resim</th>
                                      <th >İşlemler</th>
                                    </tr>
                                  </thead>
                                  <tbody id="table-product">
                                    <style>
                                    
                                    .input-off{
                                      width:auto;
                                      border:0px;
                                      max-width:auto;
                                    }
                                    .input-on{
                                      
                                      
                                      border:1px solid gray;
                                    }
                                    .input-off:hover{cursor:default;}
                                    .show{
display:none;

                                    }

                                    .modal-open .modal{
                                      background:rgba(1,1,1,.7);
                                    }
                                    </style>
                                   <?php
                              for($i=0;$i<count($urunler);$i++){
                                  ?>
                                 <tr id="tr-<?php echo $urunler[$i]['id']; ?>">
                                      <td ><?php echo $urunler[$i]["id"]; ?></td>
                                      <td scope="row"><span style="display:none;"><?php echo $urunler[$i]["product_name"]; ?></span><input class="input-<?php echo $urunler[$i]["id"] ?> input-off name-<?php echo $urunler[$i]["id"]; ?>" readonly type="text" value="<?php echo $urunler[$i]["product_name"]; ?>"></td>
                               
                                      <td><input class="input-<?php echo $urunler[$i]["id"] ?> input-off price-<?php echo $urunler[$i]["id"]; ?>" readonly type="number"  min="1" step="0.01" value="<?php echo $urunler[$i]["price"]; ?>"></td>
                                      <td>₺</td>
                                      <td><img width="30" src="<?php echo base_url("assets/images/").$urunler[$i]["product_image"]; ?>"></td>
                                      <td><button onclick="Save(<?php echo $urunler[$i]['id']; ?>)" class="btnshow-<?php echo $urunler[$i]["id"]; ?> show btn btn-success"><i class="mdi mdi-check"> </i></button> <button onclick="Duzenle(<?php echo $urunler[$i]['id']; ?>)" class="edit btn btn-warning"><i class="mdi mdi-pencil"> </i></button> <button onclick="Sil('<?php echo $urunler[$i]['id'];  ?>')" class="btn btn-danger"><i class="mdi mdi-delete"> </i></button></td>
                                    </tr>
                              
                              <?php }
                                   
                                   ?>
                                  </tbody>
                            </table>
                        </div>
                        
                        
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
                        <script>

    
$("#filter-table").on("input", function() {
    var value = $(this).val().toLowerCase();
    
    $("#table-product > tr ").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  
  

var Save = function(id){
  var price = $('.price-'+id).val();
  var name = $('.name-'+id).val();
  $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>/Urunler/urun_Guncelle",
                data:{id:id,un:name,pr:price},
                success:function(data){
                    if(data == 1){
                       Duzenle(id);
                    }
                }
                
              });
}




                        var Duzenle = function(id){
                        
                          $('.input-'+id).toggleClass('input-on form-control');
                          
                        
                          
                          $('.input-'+id).toggleClass('input-off');
                          $('.btnshow-'+id).toggleClass('show');
                         if($('.input-'+id).attr('readonly')){
                          $('.input-'+id).removeAttr('readonly');

                         }
                         
                         else {
                          $('.input-'+id).prop('readonly',true);
                         }

                         $('.price-'+id).on("input",function(){
                          if($(this).val()<0){
                            $(this).val(0.1);
                          }
                         });
                        }

                        var Sil = function(urunid){
                            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>/Urunler/Sil",
                data:{id:urunid},
                success:function(data){
                  $('#tr-'+urunid).remove();
                   
                }
                
              });
                        }

                      
                        </script>