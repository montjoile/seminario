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



    function insert_empleador($data){
        //$usuario_id = $usuario;
       // $email = $email;
        //$nombre=$this->input->post('nombre');
        //$apellidos=$this->input->post('apellidos');
        $this->db->insert('empleador', $data);
    }


    function update_empleador($id, $empleador){
        $this->db->where('usuario_id', $id);
        $this->db->update('empleador', $empleador); 
    }


    function getEmpleadorbyUser($usuario_id){
        $this->db->select('*');
        $this->db->from('empleador');
        $this->db->where('usuario_id',$usuario_id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }



}