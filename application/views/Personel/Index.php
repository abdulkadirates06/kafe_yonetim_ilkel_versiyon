
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
                                
                                <h5 class="card-title m-b-0">Personeller</h5>
                                <input style="max-width:30%;" class="form-control float-left" id="filter-table"  placeholder="Filtrele" >    <button class="btn btn-success float-right"  data-toggle="modal" data-target="#yeniPersonel" href="#">Yeni Personel Ekle</button> 
                            </div>

                         
                            <table  class="table ">
                                  <thead>
                                    <tr>
                                    <th > #</th>
                                      <th > Kullanıcı Adı</th>
                                      <th > Şifre</th>
                                      <th > Adı</th>
                                      <th >Soyadı</th>
                                      <th > Yetki</th>
                                 
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
                              for($i=0;$i<count($personel);$i++){
                                  ?>
                                 <tr id="tr-<?php echo $personel[$i]['pId']; ?>">
                                 <td id="td-<?php echo $personel[$i]['pId']; ?>"><?php echo $personel[$i]['pId']; ?></td>
                                      <td scope="row"><span style="display:none;"><?php echo $personel[$i]["username"]; ?></span><input class="input-<?php echo $personel[$i]["pId"] ?> input-off username-<?php echo $personel[$i]["pId"]; ?>" readonly type="text" value="<?php echo $personel[$i]["username"]; ?>"></td>
                                      <td scope="row"><span style="display:none;"><?php echo $personel[$i]["username"]; ?></span><input class="input-<?php echo $personel[$i]["pId"] ?> input-off password-<?php echo $personel[$i]["pId"]; ?>" readonly type="password" ?></td>
                                      <td scope="row"><span style="display:none;"><?php echo $personel[$i]["name"]; ?></span><input class="input-<?php echo $personel[$i]["pId"] ?> input-off name-<?php echo $personel[$i]["pId"]; ?>" readonly type="text" value="<?php echo $personel[$i]["name"]; ?>"></td>
                               
                                      <td><input class="input-<?php echo $personel[$i]["pId"] ?> input-off surname-<?php echo $personel[$i]["pId"]; ?>" readonly type="text"   value="<?php echo $personel[$i]["surname"]; ?>"></td>
                                
                                      <td> <select   class="form-control yetki-<?php echo $personel[$i]['pId']; ?>" >
                                           <?php
                                          
                                            for ($v=0; $v <count($tipler) ; $v++) { 
                                        ?>
                                          <option value=" <?php  echo $tipler[$v]["id"].'"';
                                          if ($tipler[$v]["id"]==$personel[$i]["user_type"]) {
                                            echo "selected";
                                          }
                                          ?>
                                        >
                                        <?php echo $tipler[$v]["type_name"]; ?>
                                        </option>
                                        <?php
                                            }
                                       
                                           ?>
                                          </select> 
                                        </td>
                                    
                                      <td><button onclick="Save(<?php echo $personel[$i]['pId']; ?>)" class="btnshow-<?php echo $personel[$i]["pId"]; ?> show btn btn-success"><i class="mdi mdi-check"> </i></button> <button onclick="Duzenle(<?php echo $personel[$i]['pId']; ?>)" class="edit btn btn-warning"><i class="mdi mdi-pencil"> </i></button> <button onclick="Sil('<?php echo $personel[$i]['pId'];  ?>')" class="btn btn-danger"><i class="mdi mdi-delete"> </i></button></td>
                                    </tr>
                              
                              <?php }
                                   
                                   ?>
                                  </tbody>
                            </table>
                            </div>
                        <div class="modal fade" id="yeniPersonel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="yeniUrunLabel">Yeni Personel Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
   <form  class="form-horizontal" action="<?php  echo base_url();?>/Personel/Personel_Ekle" 
     autocomplete="off"
     enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <div class="card-body">
                                    
                                    <div class="form-group row">
                                    
                                        <label for="username" class="col-sm-3  control-label col-form-label">Kullanıcı Adı </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="username" required>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                        <label for="password" class="col-sm-3  control-label col-form-label">Şifre</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                        <label for="Name" class="col-sm-3  control-label col-form-label">Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                        <label for="Surname" class="col-sm-3  control-label col-form-label">Soyadı</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="surname" required>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                        <label for="Surname" class="col-sm-3  control-label col-form-label">Yetki</label>
                                        <div class="col-sm-9">
                                           <select  class="form-control" name="yetki">
                                           <?php
                                            for ($i=0; $i <count($tipler) ; $i++) { 
                                           ?>
                                           <option value="<?php echo $tipler[$i]["id"] ?>"><?php echo $tipler[$i]["type_name"] ?></option>
                                           <?php
                                            }
                                       
                                           ?>
                                          </select>  
                                      </div>
                                        </div>
                                    
                               
                                
                                  
                                    
                                </div>
                                
                            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <input type="submit" class="btn btn-primary" value="Personel Ekle"></form>
      </div>
    </div>
  </div>
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
 
  var name = $('.name-'+id).val();
  var surname = $('.surname-'+id).val();
  var username = $('.username-'+id).val();
  var password = $('.password-'+id).val();
  var yetki = $('.yetki-'+id).val();
  $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>/Personel/Personel_Duzenle",
                data:{id:id,name:name,username:username,surname:surname,password:password,yetki:yetki},
                success:function(data){
                  console.log(data);
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

                        
                        }

                        var Sil = function(urunid){
                            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>/Personel/Sil",
                data:{id:urunid},
                success:function(data){
                  $('#tr-'+urunid).remove();
                   
                }
                
              });
                        }

                      
                        </script>
                        