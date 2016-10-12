<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*	$query = $this->db->query("select nombre, apellidos from empleado");

	foreach ($query->result() as $row)
	{
	        echo $row->nombre;
	        echo $row->apellidos;
	}

*/


class Empleados_model extends CI_Model {





    function __construct(){
        parent::__construct();
        $this->load->database(); 
        $this->load->library('table');
    }


 public function getEmpleados(){
    $empleados = array();

    //$empleados = $this->db->get('empleado');
    //$maxrows = $query->num_rows();
    //$randNum = rand(0,$maxrows - 1);

   /* $query = $this->db->query("select nombre, apellidos from empleado");//get_where('questions', array('id' => $randNum));
    foreach ($query->result() as $row) {
        $empleados[1] = $row->nombre;
        $empleados[2] = $row->apellidos;
    }
    //return $empleados;
    return $query->row_array();*/
    //return $this->db->query("select nombre, apellidos from empleado");
    $query = $this->db->query("select nombre, apellidos from empleado");
    //return $query->row();
    $result = $query->result_array();
	return $result;
}


public function get_table1()
{
   $query = $this->db->query('select nombre, apellidos from empleado');


$template = array(
        'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table table-bordered table-hover table-condensed table-responsive">'
);

$this->table->set_template($template);



   return $this->table->generate($query);
}





public function get_table(){
	$query = $this->db->query('select id, nombre, apellidos from empleado');
$this->table->set_heading('Nombre', 'Apellidos' , 'Links'); //set your headings

foreach($query->result() as $row) {
  $links  = anchor('admin/edit/'.$row->id ,'Edit');
  $links .= anchor('admin/delete/'.$row->id , 'Delete');


$this->table->add_row(
    //$row->nombre,
    anchor("work/fill_form/$row->nombre", $row->nombre),
    $row->apellidos,
    $links
    );
}


$template = array(
        'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table table-bordered table-hover table-condensed table-responsive">'
);

$this->table->set_template($template);

return $this->table->generate();
}




function get_search() {
  $match = $this->input->post('searchd');
  $this->db->like('nombre',$match);
  $this->db->or_like('apellidos',$match);
  //$this->db->or_like(‘characters’,$match);
  //$this->db->or_like(‘synopsis’,$match);
  $query = $this->db->get('empleado');
  return $query->result();
}

function insert_empleado($data){
// Inserting in Table(students) of Database(college)
$nombre=$this->input->post('nombre');
$apellidos=$this->input->post('apellidos');






$this->db->insert('empleado', $data);
}




function getEmpleadobyEmpresa($empresaid){

}





  function listEmpleadosbyEmpresa($empresaid){
    $this->db->select('id, nombre, apellidos, status_id, profesion_id');
    $this->db->from('empleado');
    $this->db->where('empresa',$empresaid);
    //$this->db->limit(1);
    $query = $this->db->get();

    return $query->result();
  }


  function getEmpleadosbyID($empleados){
    //$this->db->select('e.nombre, e.apellidos, p.descripcion, c.fecha_contrato, c.fecha_vigencia,c.salario from empleado e, profesion p, contrato c
     // where e.profesion_id = p.id and 
     // c.empleado_id = e.id');

    $this->db->select('e.nombre as nombre, e.apellidos as apellidos, p.descripcion as profesion, c.fecha_contrato as fecha_contrato, c.fecha_vigencia as fecha_vigencia, c.salario as salario');
    $this->db->from('empleado e, profesion p, contrato c');
    $this->db->where('e.profesion_id = p.id');
    $this->db->where('c.empleado_id = e.id');
    $this->db->where_in('e.id', $empleados);
    $query = $this->db->get();
    return $query->result();
  }



}



