<?php class Masa_Model extends CI_Model {

public function Get_All_Masa(){
    
    $this->db->select("*,tables.id as Table_id");
    $this->db->from("tables");
    $this->db->join("table_type","tables.is_busy = table_type.id");
    $this->db->order_by("table_name","asc");
    $query =  $this->db->get();
    return $query->result_array();
}

public function MasaAktif($id){
    $this->db->update('tables',array('is_busy'=>1),array('id'=>$id));

}

public function SiparisizMasaKapat($id){
    return $this->db->update('tables',array('is_busy'=>1),array('id'=>$id));
}
public function SiparisizMasaDoldur($id){
    return $this->db->update('tables',array('is_busy'=>2),array('id'=>$id));
}
public function MasaGetir($id){
    return $this->db->get_where('tables',array('id'=>$id))->result_array();
}

public function MasaKapat($id){
    $this->db->update('shippings',array('is_check'=>4),array('table_id'=>$id));
} 
public function Masa_Ekle($data){
    return $this->db->insert('tables',$data);
} 
public function Masa_Sil($data){
    return $this->db->delete('tables',$data);
}
public function Masa_Duzenle($data,$id){
    return $this->db->update("tables",$data,array('id'=>$id));
}
public function Masa_Generator($tnameTop,$tCount){
   
    for($i=1;$i<=$tCount;$i++){
      
     
         $this->db->insert('tables',array("table_name"=>$tnameTop.$i,"is_busy"=>1));
      
    }
}
}
?>