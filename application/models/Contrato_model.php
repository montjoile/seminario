<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contrato_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database(); 
        $this->load->library('table');
    }



    function getEmpleadobyEmpresa($empresaid){
		$this->db->select('*');
		$this->db->from('contrato');
		$this->db->where('empresa_id',$empresaid);
		//$this->db->limit(1);
		$query = $this->db->get();

		return $query->result();
    }





}