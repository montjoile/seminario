<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database(); 
        $this->load->library('table');
    }

    function getUser($email, $password){
 //   	$query = $this->db->get('usuario');
  //  	$this->db->where('email', $email);
//		$this->db->where('password', md5($password));
		//$query = $this->db->query('SELECT email, password FROM usuario');

        
//		return $query->result();

$this->db->select('id, nombre, apellidos, email, password');
$this->db->from('usuario');
$this->db->where('email',$email);
$this->db->where('password', $password);
$this->db->limit(1);
$query = $this->db->get();

/*if ($query->num_rows() == 1) {
return true;
} else {
return false;
}*/
return $query->result();

/*$condition = "email ="  . "'" . $email . "'" . " AND password =" . "'" . $password . "'";
$this->db->select('email, password');
$this->db->from('usuario');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}*/






	}
	
	// get user
	function get_user_by_id($id)
	{
		//$this->db->where('id', $id);
        //$query = $this->db->get('usuario');
        $query = $this->db->query('SELECT nombre, apellidos, email FROM usuario');
		return $query->result();
	}
	
	// insert
	function insert_usuario($data)
    {
		return $this->db->insert('usuario', $data);
	}

}