<?php class Urun_Model extends CI_Model {

public function Get_All_Urun(){
    return $query= $this->db->get("products")->result_array();
}
public function Delete_Where_Urun($id){
    return $this->db->delete("products",array("id"=>$id));
}

public function Update_Urun($data,$id){
  return  $this->db->update('products',$data,array('id'=>$id));
}
public function Insert_Urun($data){
    return $this->db->insert('products',$data);
}
public function Kategori_Getir(){
    return $this->db->get("product_type")->result_array();

}
}
?>