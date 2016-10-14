<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NivelEstudios_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database(); 
        $this->load->library('table');
    }



    function getNivelEstudios(){
		$query = $this->db->query('SELECT * FROM nivel_estudios');
        $result = $query->result_array();
        return $result;
    }

}