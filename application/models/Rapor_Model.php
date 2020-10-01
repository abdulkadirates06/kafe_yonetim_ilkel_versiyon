<?php class Rapor_Model extends CI_Model {


//ÖZEL
public function Siparis_Aralik($today,$lastweek){
    $this->db->select("SUM(count) as SiparisToplam");
    $this->db->from("shippings");
    $this->db->where("date(date) >=",$lastweek);
    $this->db->where("date(date) <=" ,$today);
    return $this->db->get()->result_array();
}

public function Aralik_Kazanc_Total($today,$lastweek){
    $this->db->select("SUM(price) as KazancTotal");
    $this->db->from("payments");
    $this->db->where("date(date) >=",$lastweek);
    $this->db->where("date(date) <=" ,$today);
    return $this->db->get()->result_array();
}

public function Aralik_Masa_Total($today,$lastweek){
    $this->db->select("table_id,count(id)as MasaTotal");
    $this->db->from("shippings");
    $this->db->group_by("table_id");
    $this->db->order_by("id","asc");
    $this->db->where("date(date) >=",$lastweek);
    $this->db->where("date(date) <=" ,$today);
    return $this->db->get()->result_array();
   }

public function Aralik_Best_Product($today,$lastweek){
    $this->db->select("product_name,product_id, SUM(count)as Total");
    $this->db->from("shippings");
    $this->db->join("products","shippings.product_id =products.id");
    $this->db->where("date(date) >=",$lastweek);
    $this->db->where("date(date) <=" ,$today);
    $this->db->order_by("Total","desc");
    $this->db->group_by("shippings.product_id");
    $this->db->limit(1);
    return $this->db->get()->result_array();
    }

    public function Aralik_Cash_Total($today,$lastweek){
        $this->db->select("SUM(price) as CashTotal");
        $this->db->from("payments");
        $this->db->where("date(date) >=",$lastweek);
    $this->db->where("date(date) <=" ,$today);
        $this->db->where("pay_type",1);
        
        return $this->db->get()->result_array();
        }
        public function Aralik_Card_Total($today,$lastweek){
            $this->db->select("SUM(price) as CardTotal");
            $this->db->from("payments");
            $this->db->where("date(date) >=",$lastweek);
    $this->db->where("date(date) <=" ,$today);
            $this->db->where("pay_type",2);
            
            return $this->db->get()->result_array();
            }




//GÜNLÜK//
    public function Siparis_Total($date){
        $this->db->select("SUM(count) as SiparisToplam");
        $this->db->from("shippings");
        $this->db->like("date",$date,"both");
        return $this->db->get()->result_array();
    }

public function Kazanc_Total($date){
    $this->db->select("SUM(price) as KazancTotal");
    $this->db->from("payments");
    $this->db->like("date",$date,"both");
    return $this->db->get()->result_array();
}
public function Masa_Total($date){
 $this->db->select("table_id,count(id)as MasaTotal");
 $this->db->from("shippings");
 $this->db->group_by("table_id");
 $this->db->order_by("id","asc");
 $this->db->like("date",$date,"both");
 return $this->db->get()->result_array();
}
public function Best_Product($date){
$this->db->select("product_name,product_id, SUM(count)as Total");
$this->db->from("shippings");
$this->db->join("products","shippings.product_id =products.id");
$this->db->like("date",$date,"both");
$this->db->order_by("Total","desc");
$this->db->group_by("shippings.product_id");
$this->db->limit(1);
return $this->db->get()->result_array();
}
public function Cash_Total($date){
$this->db->select("SUM(price) as CashTotal");
$this->db->from("payments");
$this->db->like('date',$date,'both');
$this->db->where("pay_type",1);

return $this->db->get()->result_array();
}
public function Card_Total($date){
    $this->db->select("SUM(price) as CardTotal");
    $this->db->from("payments");
    $this->db->like('date',$date,'both');
    $this->db->where("pay_type",2);
    
    return $this->db->get()->result_array();
    }
}
?>