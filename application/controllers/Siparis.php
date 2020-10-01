<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siparis extends CI_Controller {

    

    function __construct() {
        parent::__construct();
        $this->load->library('session');
       $this->load->model("Urun_Model");
       $this->load->model("Siparis_Model");
       $this->load->model("Masa_Model");
       $this->load->helper('date');
       date_default_timezone_set('Europe/Istanbul');
       $this->load->library("session");
       
       if (!isset($_SESSION["id"])) {
        redirect(base_url());
       }
    }

    function index(){
        $this->load->view("Layouts/Layout");
 
        $this->load->view("Layouts/Footer");
    }
    function SiparisEkle(){
        $this->load->view("Layouts/Layout");
        
        $data["urunler"] = $this->Urun_Model->Get_All_Urun();
        $data["kategoriler"] = $this->Urun_Model->Kategori_Getir();
        $id=  $this->uri->segment('3');
        $data["masalar"] = $this->Masa_Model->MasaGetir($id);
        $data["siparis"] = $this->Siparis_Model->Get_Where_Urun($id);
            
            if(isset($id) && $id != $data["masalar"][0]["id"]){
               redirect('../Dashboard');
            }
           
            
        
      
        
        $this->load->view("SiparisEkle",$data);
     
    }

     
    function SiparisGonder(){
        $masa_id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $user_id = $this->session->id;
    
      if(isset($masa_id) && isset($user_id)){
        
        $this->Siparis_Model->Get_Gonder_Urun($masa_id,$user_id);
        
    }
}
    
    function SiparisOnayla(){
        $masa_id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $user_id = $this->session->id;
    
      if(isset($masa_id) && isset($user_id)){
        
        $this->Siparis_Model->Get_Onayla_Urun($masa_id,$user_id);
        
    }

    }
    function SiparisizMasaDoldur(){
        $masaid = isset($_POST['id']) ? $_POST['id'] : NULL;
        if(isset($masaid)){
            print_r($this->Masa_Model->SiparisizMasaDoldur($masaid));
        }
    }

    function SiparisizMasaKapat(){
        $masaid = isset($_POST['id']) ? $_POST['id'] : NULL;
        if(isset($masaid)){
            print_r($this->Masa_Model->SiparisizMasaKapat($masaid));
        }
    }
    function MasaAktifEt()
    {
        $masaid = isset($_POST['id']) ? $_POST['id'] : NULL;
    if(isset($masaid))
     $this->Masa_Model->MasaAktif($masaid);
    }
function MasaKapat(){
    $masaid = isset($_POST['id']) ? $_POST['id'] : NULL;
    if(isset($masaid))
     $this->Masa_Model->MasaKapat($masaid);
       
}
    function UpdatePrice(){
        $uid = $this->session->id;
  
        $price = isset($_POST['price']) ? $_POST['price'] : NULL;
        print_r($price);
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        if(isset($id)){
         $this->Siparis_Model->Update_Price_Adisyon($price,$uid,$id);
       
        }
      }
  

      function Sil(){
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        
        if(isset($id)){
           echo $count = $this->Siparis_Model->Sil_Where_Urun($id);
        }
      }
    function SiparisUrunGetir(){
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $data["siparisler"] = $this->Siparis_Model->Get_Where_Urun($id);
        if(isset($id)){
       
        for($i=0;$i<count($data["siparisler"]);$i++){
            $total = $data["siparisler"][$i]["price"] * $data["siparisler"][$i]["count"];
            $durum = $data["siparisler"][$i]["is_check"];
           
            if ($durum==1) {
                $durumResim = "bekleyen.jpg";
            }
            if ($durum==3) {
                $durumResim = "hazirlandi.jpg";
            }
   echo '
    
     <tr style="border-top:2px solid black;" class="product-delete" onclick="DeleteShip('.$data["siparisler"][$i]["Shipid"].');">
     <td>'.$data["siparisler"][$i]["product_name"].'</td>
       <td>'.$data["siparisler"][$i]["count"].'</td>
      
       <td class="no-print">'.$data["siparisler"][$i]["username"].'</td>
     
       <td >'.$data["siparisler"][$i]["description"].'</td>
       <td style="width:50%" class="urun no-print">  <span class="no-print total totals-'.$i.'">'.number_format($total,'2').'₺</span></td>
       <td class="no-print"><img height="25" width="25" src="'.base_url("assets/images/").$durumResim.'"></td>
 
     
   
    
     </tr>

     ';
        }}
    }
    function SiparisUrunEkle(){
        $uid =$this->session->id;
        $masaid = isset($_POST['masaid']) ? $_POST['masaid'] : NULL;
        $urunid = isset($_POST['urunid']) ? $_POST['urunid'] : NULL;
        $desc = isset($_POST['desc']) ? $_POST['desc'] : NULL;
        $urunsayi = isset($_POST['urunsayi']) ? $_POST['urunsayi'] : NULL;
        if(isset($masaid)&& isset($uid)){
if($urunsayi<=0)
        $urunsayi = 1;
        
        $datestring = '%Y-%m-%d %H:%i:%s';
$time = time();

        $data = array("product_id"=>$urunid,"user_id"=>$uid,"count"=>$urunsayi,"table_id"=>$masaid,'date'=>mdate($datestring, $time),"description"=>$desc);
        $this->Siparis_Model->Insert_Urun($data);
        $durum = array("is_busy"=>3);
        $this->Masa_Model->Masa_Duzenle($durum,$masaid);
    }
    }
    
}
?>