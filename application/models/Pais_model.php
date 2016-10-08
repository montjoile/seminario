<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pais_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database(); 
    }
    
    function getPais(){
        $query = $this->db->query('SELECT id, descripcion FROM pais');
        $result = $query->result_array();
        return $result;
    }
}
?>