<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adisyon extends CI_Controller {

    function __construct() {
        parent::__construct();
  $this->load->Model("Adisyon_Model");
  $this->load->helper('date');
  date_default_timezone_set('Europe/Istanbul');
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
    function SonFiyatGetir(){
      $id = isset($_POST['id']) ? $_POST['id'] : NULL;
      if(isset($id)){
       $veri = $this->Adisyon_Model->SonFiyatGetir($id);
       print_r($veri[0]["price"]);
      }
    }
    function IskontoDus(){
      $id = $_POST["id"];
      $tutar = $_POST["tutar"];
      echo $this->Adisyon_Model->InvoceUpdate($id,$tutar);
    }
    function AdisyonOde(){
      $datestring = '%Y-%m-%d %H:%i:%s';
      $time = time();
      
      $uid = $this->session->id;
      $id = isset($_POST['id']) ? $_POST['id'] : NULL;
      $price = isset($_POST['price']) ? $_POST['price'] : NULL;
      $type = isset($_POST['type']) ? $_POST['type'] : NULL;
      $data = array(
        'table_id'=>$id,
        'user_id'=>$uid,
        'price'=>$price,
        'pay_type'=>$type,
        'date' =>mdate($datestring, $time)
      );
      $this->Adisyon_Model->AdisyonOde($data);
    }
    function GetPrice(){

      $id = isset($_POST['id']) ? $_POST['id'] : NULL;
      if(isset($id)){
      $data["price"] = $this->Adisyon_Model->Get_Price_Adisyon($id);
      $_total=0;
      for($i=0;$i<count($data["price"]);$i++){
        $_total += $data["price"][$i]["Total"];
       
      }
      print_r($_total);
      }
    }


    
   
    
    function AdisyonGetir(){
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $data["adisyon"] = $this->Adisyon_Model->Get_Where_Adisyon($id);
       

        for($i=0;$i<count($data["adisyon"]);$i++){
          $date =  substr($data["adisyon"][$i]["date"], 0, 16);  
          $date = str_replace("-",".",$date);
   print_r('
    
     <tr style="border-top:2px solid black;">
    
     
       <td>'.$data["adisyon"][$i]["product_name"].'</td> 
        <td>'.$data["adisyon"][$i]["Adet"].'</td>
       <td class="no-print">'.$data["adisyon"][$i]["username"].'</td>
       <td class="no-print">'.$date.'</td>
     
     
    
     <td > <span class="total totals-'.$i.'">'.number_format($data["adisyon"][$i]["Total"],'2').'</span>₺</td>
     </tr>

     ');
        }
    }

}
?>