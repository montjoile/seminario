<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleador_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database(); 
        $this->load->library('table');
    }



    function getEmpresaId($usuario_id){
		$this->db->select('empresa_id');
		$this->db->from('empleador');
		$this->db->where('usuario_id',$usuario_id);
		$this->db->limit(1);
		$query = $this->db->get();

		return $query->result();
    }





}