<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesion_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database(); 
    }
    
    function getProfesion(){
        $query = $this->db->query('SELECT id, descripcion FROM profesion');
        $result = $query->result_array();
        return $result;
    }
}
?>