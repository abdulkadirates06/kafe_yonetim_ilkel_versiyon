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
<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="row">
                                <div class="col-4"><label style="display:block">Gün getir (1 gün verisi)</label>
                                    <input type="date" id="GetDate" style="max-width:70%;border-top-right-radius:0px;border-bottom-right-radius:0;float:left;" value="<?php echo date("Y-m-d", strtotime("today")); ?>" max="<?php echo date("Y-m-d", strtotime("today")); ?>"  class="form-control">
                                <button class="btn btn-warning GetDateBtn" style="border-top-left-radius:0px;border-bottom-left-radius:0;max-width:30%;float:left;padding-bottom:8px;">Günü Getir</button>
                                </div>
                                <div class="col-4"><label style="display:block">Aralıklı getir (Bugün ile seçilen tarihin  verileri)</label>
                                    <input type="date" id="GetAralikDate" style="max-width:70%;border-top-right-radius:0px;border-bottom-right-radius:0;float:left;" value="<?php echo date("Y-m-d", strtotime("-1 day")); ?>" max="<?php echo date("Y-m-d", strtotime("-1 day")); ?>"  class="form-control">
                                <button class="btn btn-warning GetAralikDate" style="border-top-left-radius:0px;border-bottom-left-radius:0;max-width:30%;float:left;padding-bottom:8px;">Günü Getir</button>
                                </div>
                            </div><br>
                            <h5 class="card-title">GÜNLÜK RAPORLAR <small><?php  echo date("d-m-Y", strtotime("today"));?></small>
                            
                           
                        </h5>
                                <div class="row">
                                    <!-- Column -->
                                   
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                                <h3 class="text-white siparis"><b><?php print_r($SiparisToplam[0]["SiparisToplam"]) ?></b></h3>
                                                <h6 class="text-white">Toplam Sipariş</h6>
                                             
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white"><i class="mdi mdi-cash"></i></h1>
                                                <h3 class="text-white kazanc"><b><?php print_r(number_format($KazancTotal[0]["KazancTotal"],'2')); ?></b>₺</h3>
                                                <h6 class="text-white">Total Kazanç</h6>
                                             
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-danger text-center">
                                                <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                                                <h3 class="text-white masa"><b><?php echo count($MasaTotal); ?></b> </h3>
                                                <h6 class="text-white">Masa</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><i class="mdi mdi-arrow-all"></i></h1>
                                                
                                                <h3 class="text-white urun"><b><?php if(isset($BestProduct[0]))print_r($BestProduct[0]["product_name"]) ?></b></h3>
                                                <h6 class="text-white">En Çok Satan Ürün</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-danger text-center">
                                                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                                <h3 class="text-white cash"><b><?php print_r(number_format($CashTotal[0]["CashTotal"],'2')); ?></b>₺</h3>
                                                <h6 class="text-white">Nakit Kazanç </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><i class="mdi mdi-relative-scale"></i></h1>
                                                <h3 class="text-white Credi"><b><?php print_r(number_format($CardTotal[0]["CardTotal"],'2')); ?></b>₺</h3>
                                                <h6 class="text-white">K.Kart Kazanç </h6>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                        </div>


                        
                        </div>

                        


                    </div>
                </div>
                <script src="<?php echo base_url(); ?>/assets/libs/jquery/dist/jquery.min.js"></script>

                <script>
                    $('#GetDate').on("input",function(){
                        if($(this).val() > $(this).attr("max")){
                            $(this).val("<?php  echo date("Y-m-d", strtotime("today"));?>");
                        }
                       
                    });

                    $('#GetAralikDate').on("input",function(){
                        if($(this).val() > $(this).attr("max")){
                            $(this).val("<?php  echo date("Y-m-d", strtotime("-1 day"));?>");
                        }
                       
                    });

                    $('.GetDateBtn').click(function(){
                        var day =$('#GetDate').val();
                        
                        $.ajax({
                            type:"post",
                            data:{day:day},
                            url:"<?php echo base_url();  ?>Rapor/GetDate",
                            success:function(data){
                              
                                var DataDay = JSON.parse(data);
                               
                                Duzenle(DataDay,'SiparisToplam','.siparis');
                                Duzenle(DataDay,'KazancTotal','.kazanc');
                                Duzenle(DataDay,'MasaTotal','.masa');
                                Duzenle(DataDay,'BestProduct','.urun');
                                Duzenle(DataDay,'CashTotal','.cash');
                                Duzenle(DataDay,'CardTotal','.Credi');
                                $('.card-title small').text(day);
                            }

                        });

                    });



                    $('.GetAralikDate').click(function(){
                        var day= $('#GetAralikDate').val();
                        $.ajax({
                            type:"post",
                            data:{day:day},
                            url:"<?php echo base_url() ?>Rapor/GetDateAralik",
                            success:function(data){
                                var DataDay = JSON.parse(data);
                                console.log(DataDay);
                                Duzenle(DataDay,'SiparisToplam','.siparis');
                                Duzenle(DataDay,'KazancTotal','.kazanc');
                                Duzenle(DataDay,'MasaTotal','.masa');
                                Duzenle(DataDay,'BestProduct','.urun');
                                Duzenle(DataDay,'CashTotal','.cash');
                                Duzenle(DataDay,'CardTotal','.Credi');
                                $('.card-title small').text("");
                                $('.card-title small').text("<?php echo date("Y-m-d", strtotime("today"));  ?>"+ " / " + day);
                            }

                        });

                    });

                    var Duzenle = function(DataJson,JsonData,Edit){
                        $(Edit+" b").text("");
                                $(Edit+' b').text(DataJson[JsonData]);

                    }
                    </script>