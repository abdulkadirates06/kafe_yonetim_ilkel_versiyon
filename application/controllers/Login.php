<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
        parent::__construct();
       $this->load->model("User_Model");
	$this->load->library("session");
	}
	public function index()
	{
		
		
		$this->load->view('Login/Login');
	}
	public function Logout(){
		$_SESSION["id"]= NULL;
		$_SESSION["type"]  = NULL;
		redirect(base_url()."Dashboard");

	}
	public function AdminLogin(){
	
		
		$config['global_xss_filtering'] = TRUE;
	
		$Username = isset($_POST['Username']) ? $_POST['Username'] : NULL;
		$Password = isset($_POST['Password']) ? $_POST['Password'] : NULL;
		
		
		$data["users"] = $this->User_Model->LoginUser($Username,md5($Password));
        if($data["users"]==NULL){
			redirect("Login");
		}
		else{

		$_SESSION["id"] = $data["users"][0]["id"];
		$_SESSION["user_type"] = $data["users"][0]["user_type"];
		$_SESSION["name"] = $data["users"][0]["name"];
		redirect("Dashboard");
 
 	
		}
	
	}
}
