<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Puesto_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database(); 
        $this->load->library('table');
    }



    function getPuesto(){
		$query = $this->db->query('SELECT * FROM puesto');
        $result = $query->result_array();
        return $result;
    }

}