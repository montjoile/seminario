<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Genero_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database(); 
    }
    
    function getGenero()
    {
       /* $query = $this->db->get('genero');
        $result = $query->result();

        $genero_id = array('-CHOOSE-');
        $genero_descripcion = array('-CHOOSE-');
        
        for ($i = 0; $i < count($result); $i++)
        {
            array_push($genero_id, $result[$i]->id);
            array_push($genero_descripcion, $result[$i]->descripcion);
        }
        return array_combine($genero_id, $genero_descripcion);*/
        $query = $this->db->query('SELECT id, descripcion FROM genero');
$result = $query->result_array();

       return $result;

    }
}
?>