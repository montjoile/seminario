<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database(); 
        $this->load->library('table');
    }



    function getEmpresabyID($id){
        $this->db->select('id, nombre, direccion, telefono');
        $this->db->from('empresa');
        $this->db->where('id',$id);
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->result();
    }


}