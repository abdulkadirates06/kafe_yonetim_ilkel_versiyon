<?php class Siparis_Model extends CI_Model {

public function Get_Where_Urun($id){
  
    $this->db->select(" *,shippings.id as Shipid");
    $this->db->from("shippings");
    
    $this->db->join("products","products.id = shippings.product_id");
    $this->db->join("users","users.id = shippings.user_id");
    $this->db->join("check_type","shippings.is_check = check_type.id");
    $this->db->order_by('date','desc');
    $this->db->where_not_in("shippings.is_check",4);
    $this->db->where("shippings.table_id",$id);
    
    
    $query = $this->db->get();
    return $query->result_array();
    
}

public function Sil_Where_Urun($id){
    $this->db->where('id',$id);
    return $this->db->delete("shippings");
}
public function Update_Price_Adisyon($price,$user_id,$table_id){
    $data = array(
        'price'=>$price,
        'user_id'=>$user_id
    );
        $this->db->update('invoces',$data,array('table_id'=>$table_id));
    }


public function Insert_Urun($data){
    $this->db->insert('shippings',$data);

}
public function Get_Onayla_Urun($masaid,$userid){
    $this->db->update("tables",array('is_busy'=>2),array('id'=>$masaid));
    $data = array(
        'is_check'  => 3,
        );
    $this->db->where_not_in("is_check",4);
    $this->db->update('shippings', $data,array("table_id"=>$masaid));
    $data_in = array(
    'user_id'=>$userid,
    'table_id'=>$masaid,
    'price'=>0,

);
$this->db->insert('invoces',$data_in);
    

  
  
}
}
?>