<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contrato_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database(); 
        $this->load->library('table');
    }




    function getContratobyEmpresa($empresaid){
		//obtiene todos los contratos de una empresa
        $this->db->select('e.direccion as empDireccion, e.nombre as Empresa, e.telefono as empTelefono, c.id as contrato, c.fecha_contrato as fecha_contrato, c.fecha_vigencia as fecha_vigencia, c.salario as salario, c.puesto as puesto, c.observaciones as observaciones, p.id as empleado_id, p.nombre as nombre, p.apellidos as apelllidos, p.dpi as dpi, p.direccion as direccion, p.edad as edad, p.email as email, p.fecha_nacimiento as fecha_nacimiento, i.descripcion as nacionalidad, p.telefono1 as telefono, g.descripcion as genero, s.descripcion as estado_civil, f.descripcion as profesion');
		$this->db->from('empresa e, contrato c, empleado p, genero g, estado_civil s, profesion f, pais i');
		$this->db->where('e.id = c.empresa_id');
        $this->db->where('p.id = c.empleado_id');
        $this->db->where('g.id = p.genero_id');
        $this->db->where('s.id = p.estado_civil');
        $this->db->where('f.id = p.profesion_id');
        $this->db->where('i.id = p.nacionalidad');
        $this->db->where('c.empresa_id', $empresaid);

		//$this->db->limit(1);
		$query = $this->db->get();

		return $query->result();
    }


    function getContratobyEmpleadoID($id, $empresaid){
        $this->db->select('id');
        $this->db->from('contrato');
        $this->db->where('empleado_id', $id);
        $this->db->where('empresa_id', $empresaid);
        $query = $this->db->get();
        return $query->result();
    }


    function getContratobyID($contrato){
        $this->db->select('*');
        $this->db->from('contrato');
        $this->db->where('id', $contrato[0]->id);
        $query = $this->db->get();
        return $query->result_array();
    }


}