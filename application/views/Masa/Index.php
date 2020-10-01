
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
                                
                                <h5 class="card-title m-b-0">Masalar</h5>
                                <input style="max-width:30%;" class="form-control float-left" id="filter-table"  placeholder="Filtrele" >    <button class="btn btn-success float-right"  data-toggle="modal" data-target="#yeniMasa" href="#">Yeni Masa Ekle</button> <button style="margin-right:1em;" class="btn btn-warning float-right"  data-toggle="modal" data-target="#masaOlustur" href="#">Masa Oluşturucu</button>
                            </div>


                           
                            <table  class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Masa Adı</th>
                                      <th scope="col">Durumu</th>
                                
                                   
                                      <th scope="col">İşlemler</th>
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
                              for($i=0;$i<count($masalar);$i++){
                                  ?>
                                 <tr id="tr-<?php echo $masalar[$i]['Table_id']; ?>">
                                      <th scope="row"><?php echo $masalar[$i]["Table_id"]; ?></th>
                                      <td scope="row"><span style="display:none;"><?php echo $masalar[$i]["table_name"]; ?></span><input class="input-<?php echo $masalar[$i]["Table_id"] ?> input-off name-<?php echo $masalar[$i]["Table_id"]; ?>" readonly type="text" value="<?php echo $masalar[$i]["table_name"]; ?>"></td>
                               
                                      <td><input class="input-<?php echo $masalar[$i]["Table_id"] ?> input-off price-<?php echo $masalar[$i]["Table_id"]; ?>" readonly type="text" disabled  value="<?php echo $masalar[$i]["type_name"]; ?>"></td>
                                   
                                 
                                      <td><button onclick="Save(<?php echo $masalar[$i]['Table_id']; ?>)" class="btnshow-<?php echo $masalar[$i]["Table_id"]; ?> show btn btn-success"><i class="mdi mdi-check"> </i></button> <button onclick="Duzenle(<?php echo $masalar[$i]['Table_id']; ?>)" class="edit btn btn-warning"><i class="mdi mdi-pencil"> </i></button> <button onclick="Sil('<?php echo $masalar[$i]['Table_id'];  ?>')" class="btn btn-danger"><i class="mdi mdi-delete"> </i></button></td>
                                    </tr>
                              
                              <?php }
                                   
                                   ?>
                                  </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="yeniMasa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="yeniUrunLabel">Yeni Masa Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
   <form  class="form-horizontal" action="<?php  echo base_url();?>/Masa/Masa_Ekle" 
     autocomplete="off"
     enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <div class="card-body">
                                    
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Masa Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tname" required>
                                        </div>
                                    </div>
                                 
                                    
                               
                                
                                  
                                    
                                </div>
                                
                            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <input type="submit" class="btn btn-primary" value="Masayı Ekle"></form>
      </div>
    </div>
  </div>
</div>


<!-- 1.MODELİN SONU -->
                   
<div class="modal fade" id="masaOlustur" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="yeniUrunLabel">Yeni Masa Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
   <form  class="form-horizontal" action="<?php  echo base_url();?>/Masa/Masa_Olustur"  autocomplete="off"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
    
   
   
                                <div class="card-body">
                                <div class="form-group row">
                                        <label for="tname" class="col-sm-3 text-right control-label col-form-label">Masa Ön Eki:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control tnameTop"  name="tnameTop" required>
                                        </div>
                                    </div>
                                <div class="form-group row">
                                        <label for="tval" class="col-sm-3 text-right control-label col-form-label">Masa Sayısı:</label>
                                        <div class="col-sm-9">
                                            <input type="number" min="1" max="100" value="10" class="form-control tCount"  name="tCount" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tval" class="col-sm-3 text-right control-label col-form-label">Çıktı :</label>
                                        <div class="col-sm-9">
                                            <textarea rows="10" type="text" readonly class="form-control tResult" name="tResult" required></textarea>
                                        </div>
                                    </div>
                         
                                </div>
    
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <input type="submit" class="btn btn-primary" value="Masa Oluştur"></form>
      </div>
    </div>
  </div>
</div>


  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
                        <script>

    
$("#filter-table").on("input", function() {
    var value = $(this).val().toLowerCase();
    $("#table-product tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  
  

var Save = function(id){
  var price = $('.price-'+id).val();
  var name = $('.name-'+id).val();
  $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>/Masa/Masa_Duzenle",
                data:{id:id,tname:name},
                success:function(data){
                  Duzenle(id);
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

                         
                        }

                        var Sil = function(urunid){
                            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>/Masa/Masa_Sil",
                data:{id:urunid},
                success:function(data){
                  $('#tr-'+urunid).remove();
                   
                }
                
              });
                        }

                      
                        </script>
                        <script>
     
       
    
   
     $(".tnameTop").on('input',function(){
      var nameTop =  $(".tnameTop").val();
      var count =  $(".tCount").val();
       var tResult = $(".tResult").val();
     $(".tResult").val(nameTop+"-"+count);
     $(".tResult").val("");
     if(nameTop!=""){
       for(var i=1;i<=Number(count);i++){

     $(".tResult").val($(".tResult").val()+nameTop+"-"+i+"\n");
    }
  }
     });
     $(".tCount").on('input',function(){
      var nameTop =  $(".tnameTop").val();
      var count =  $(".tCount").val();
       var tResult = $(".tResult").val();
       $(".tResult").val("");
       if(nameTop!=""){
       for(var i=1;i<=Number(count);i++){

     $(".tResult").val($(".tResult").val()+nameTop+"-"+i+"\n");
    }
  }
  if(Number(count)<0){
    $(".tCount").val(1);
  }
     });

      </script>