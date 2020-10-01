<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapor extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model("Rapor_Model");
        $this->load->helper('date');
        date_default_timezone_set('Europe/Istanbul');
        $this->load->library("session");
       
       if (!isset($_SESSION["id"])) {
        redirect(base_url());
       }

    }
  
    public function index(){
       
      
    
      
   
        $day = date('Y-m-d', strtotime("today"));
    
        $data["SiparisToplam"] = $this->Rapor_Model->Siparis_Total($day);
        $data["KazancTotal"] = $this->Rapor_Model->Kazanc_Total($day);
        $data["MasaTotal"] = $this->Rapor_Model->Masa_Total($day);
        $data["BestProduct"] = $this->Rapor_Model->Best_Product($day);
        $data["CashTotal"] = $this->Rapor_Model->Cash_Total($day);
        $data["CardTotal"] = $this->Rapor_Model->Card_Total($day);
        $this->load->view("Layouts/Layout");
        $this->load->view("Raporlar/Index",$data);
        $this->load->view("Layouts/Footer");
    }


     function GetDate(){
        $dataday = $this->input->post("day");
        if(isset($dataday)){
            $day = date('Y-m-d',strtotime($dataday));
            
            
        }
        else {
            $day = date('Y-m-d',strtotime("today"));

     }
     $data["SiparisToplam"] = $this->Rapor_Model->Siparis_Total($day);
     $data["KazancTotal"] = $this->Rapor_Model->Kazanc_Total($day);
     $data["MasaTotal"] = $this->Rapor_Model->Masa_Total($day);
     $data["BestProduct"] = $this->Rapor_Model->Best_Product($day);
     $data["CashTotal"] = $this->Rapor_Model->Cash_Total($day);
     $data["CardTotal"] = $this->Rapor_Model->Card_Total($day);

     if(isset($dataday)){
     @$datajson = array('SiparisToplam'=>$data["SiparisToplam"][0]["SiparisToplam"] ? $data["SiparisToplam"][0]["SiparisToplam"] : 0 ,
     'KazancTotal'=>number_format($data["KazancTotal"][0]["KazancTotal"],'2') ? number_format($data["KazancTotal"][0]["KazancTotal"],'2') : 0,
     'MasaTotal'=>count($data["MasaTotal"]) ?  count($data["MasaTotal"]) : 0,
     'BestProduct'=>$data["BestProduct"][0]["product_name"] ? $data["BestProduct"][0]["product_name"] : "",
     'CashTotal'=>number_format($data["CashTotal"][0]["CashTotal"],'2') ? number_format($data["CashTotal"][0]["CashTotal"],'2') : 0,
     'CardTotal'=>number_format($data["CardTotal"][0]["CardTotal"],'2') ? number_format($data["CardTotal"][0]["CardTotal"],'2') : 0
    );
    echo json_encode($datajson);
}
    } 
    

    function GetDateAralik(){
        $dataday = $this->input->post("day");
        if(isset($dataday)){
            $day = date('Y-m-d',strtotime($dataday));
            
            
        }
        else {
            $day = date('Y-m-d',strtotime("-1 day"));

     }
     $data["SiparisToplam"] = $this->Rapor_Model->Siparis_Aralik(date("Y-m-d", strtotime("today")),$day);
     $data["KazancTotal"] = $this->Rapor_Model->Aralik_Kazanc_Total(date("Y-m-d", strtotime("today")),$day);
     $data["MasaTotal"] = $this->Rapor_Model->Aralik_Masa_Total(date("Y-m-d", strtotime("today")),$day);
     $data["BestProduct"] = $this->Rapor_Model->Aralik_Best_Product(date("Y-m-d", strtotime("today")),$day);
     $data["CashTotal"] = $this->Rapor_Model->Aralik_Cash_Total(date("Y-m-d", strtotime("today")),$day);
     $data["CardTotal"] = $this->Rapor_Model->Aralik_Card_Total(date("Y-m-d", strtotime("today")),$day);

     


     if(isset($dataday)){
     @$datajson = array('SiparisToplam'=>$data["SiparisToplam"][0]["SiparisToplam"] ? $data["SiparisToplam"][0]["SiparisToplam"] : 0 ,
     'KazancTotal'=>number_format($data["KazancTotal"][0]["KazancTotal"],'2') ? number_format($data["KazancTotal"][0]["KazancTotal"],'2') : 0,
     'MasaTotal'=>count($data["MasaTotal"]) ?  count($data["MasaTotal"]) : 0,
     'BestProduct'=>$data["BestProduct"][0]["product_name"] ? $data["BestProduct"][0]["product_name"] : "",
     'CashTotal'=>number_format($data["CashTotal"][0]["CashTotal"],'2') ? number_format($data["CashTotal"][0]["CashTotal"],'2') : 0,
     'CardTotal'=>number_format($data["CardTotal"][0]["CardTotal"],'2') ? number_format($data["CardTotal"][0]["CardTotal"],'2') : 0
    );
    echo json_encode($datajson);
}
    } 
    

}
