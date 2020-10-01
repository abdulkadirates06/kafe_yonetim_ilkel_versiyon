<?php

class Personel_Model extends CI_Model {

     
public function Add_Personel($data){
    $this->db->insert("users",$data);
    redirect(htmlspecialchars($_SERVER['HTTP_REFERER']));
}
public function Edit_Personel($data){

     return $this->db->update("users",$data,array("id"=>$data["id"]));
}
public function Delete_Personel($id){
 $this->db->where(array("id"=>$id));
 return $this->db->delete("users");
}
public function Get_All_Personel(){
  $this->db->select("*,users.id as pId");
  $this->db->from("users");
  $this->db->join("usertype","usertype.id=users.user_type");
  return $this->db->get()->result_array();
}
public function Get_All_Type(){
    return $this->db->get("usertype")->result_array();
}

public function Get_Where_Personel($data){
    return $this->db->get_where("users",array($data))->result_array();
}
}