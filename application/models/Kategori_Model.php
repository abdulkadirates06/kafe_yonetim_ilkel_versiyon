<?php 
class Kategori_Model extends CI_Model {

public function Get_All_Kategori(){
  return  $this->db->get("product_type")->result_array();
}
public function Add_Category($catName){
     return $this->db->insert("product_type",array("product_name"=>$catName));
}
public function Edit_Category($data,$id){
    return $this->db->update("product_type",$data,array('id'=>$id));
}
public function Delete_Category($data){
    return $this->db->delete('product_type',$data);
}

}