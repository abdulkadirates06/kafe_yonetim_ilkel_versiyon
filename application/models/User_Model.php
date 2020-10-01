<?php class User_Model extends CI_Model {

public function LoginUser($Username,$Password){
    return $query= $this->db->get_where("users",array("username"=>$Username,"password"=>$Password))->result_array();
}

}
?>