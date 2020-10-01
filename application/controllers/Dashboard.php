<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
       $this->load->model("Masa_Model");
       $this->load->model("Adisyon_Model");

       $this->load->library("session");
       
       if (!isset($_SESSION["id"])) {
        redirect(base_url());
       }
      
     
    }

    function index(){
       $data["masa"] = $this->Masa_Model->Get_All_Masa();
      
        $this->load->view("Layouts/Layout");
        $this->load->view("Dashboard",$data);
        $this->load->view("Layouts/Footer");
        
    }
    function Get_Masalar(){
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        
        $data["masa"] = $this->Masa_Model->Get_All_Masa();
        for($i=0;$i<count($data["masa"]);$i++){
            @$data["invoces"] = $this->Adisyon_Model->Get_Invoces($data["masa"][$i]["Table_id"]);
            echo '<div class="col-6 col-md-6 col-lg-2 col-xlg-3">
            <a  href="'.base_url().'Siparis/SiparisEkle/'.$data["masa"][$i]["Table_id"].'"> <div  class="card card-hover">';

            if($data["masa"][$i]["type_name"]=="Boş")
            {
                echo '<div class="box text-center">
                <h1 class="font-light text-white"><img class="table-img" src="'.base_url("assets/images/").$data["masa"][$i]["type_path"].'"></h1>
                <h6 style="color:green;">'.$data["masa"][$i]["table_name"].'</h6>  </div>
               </a>';
            }
           
            else if($data["masa"][$i]["type_name"]=="Dolu")
            {
                echo '<div class="box text-center">
                <h1 class="font-light text-white"><img class="table-img" src="'.base_url("assets/images/").$data["masa"][$i]["type_path"].'"></h1>
                <h6 style="color:red;">'.$data["masa"][$i]["table_name"].'</h6>  </div>
                </a>';
            }
            else if($data["masa"][$i]["type_name"]=="Reserved")
            {
                echo '<div class="box text-center">
                <h1 class="font-light text-white"><img class="table-img" src="'.base_url("assets/images/").$data["masa"][$i]["type_path"].'"></h1>
                <h6 style="color:black;">'.$data["masa"][$i]["table_name"].'</h6>  </div>
                </a>';
            }
            
            if($data["masa"][$i]["type_name"]=="Dolu"&&$_SESSION["user_type"]!=3){

                if(@$data["invoces"][0]["table_id"] == $data["masa"][$i]["Table_id"]){
                echo '<input type="hidden" class="TotalPrice" value="0"><button style="color:white"  onclick="x('.$data["masa"][$i]["Table_id"].')"  data-target="#adisyon" data-toggle="modal" class="btn btn-info">Adisyon Göster</button>
                ';
            }
        }
        echo '</div> 
        </div>';  
        }

        
    }
}
?>