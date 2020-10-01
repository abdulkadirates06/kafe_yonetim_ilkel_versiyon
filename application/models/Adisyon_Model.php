<?php class Adisyon_Model extends CI_Model {


public function Get_Price_Adisyon($table_id){
    $this->db->select("(sum(count) * products.price ) as Total");
  
    $this->db->from("shippings");
    $this->db->group_by('shippings.product_id');
    $this->db->join("products","shippings.product_id =products.id");

 
    $this->db->where("shippings.table_id",$table_id);
    $this->db->where("shippings.is_check",3);
    $query = $this->db->get();
   return $query->result_array();
}

public function Get_Invoces($id){
    return $this->db->get_where('invoces',array('table_id'=>$id))->result_array();
}
public function InvoceUpdate($id,$tutar){
    
    return $this->db->update("invoces",array("price"=>$tutar),array("table_id"=>$id));

}

public function SonFiyatGetir($id){
    return $this->db->get_where('invoces',array('table_id'=>$id))->result_Array();
}

public function AdisyonOde($data){
    $this->db->insert('payments',$data);
   $totalprice =  $this->db->get_where('invoces',array('table_id'=>$data['table_id']))->result_array();

    $this->db->update('invoces',array('price'=>($totalprice[0]["price"] - $data["price"])),array('table_id'=>$data["table_id"]));
}
public function Get_Where_Adisyon($table_id){
    $this->db->select("*,sum(shippings.count) as Adet, (sum(count) * products.price ) as Total ");
  
    $this->db->from("invoces");
    $this->db->group_by('shippings.product_id');
    $this->db->join("shippings","invoces.table_id =$table_id");
    $this->db->join("users","invoces.user_id = users.id");
    $this->db->join("products","shippings.product_id =products.id");
 $this->db->join("tables","tables.id =$table_id");
 
    $this->db->where("shippings.table_id",$table_id);
    $this->db->where("shippings.is_check",3);
    $query = $this->db->get();
   return $query->result_array();
}

}
?>