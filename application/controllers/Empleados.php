<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {


function __construct() {
parent::__construct();
$this->load->helper('url');
}
	
	public function index(){
		$this->load->helper('url');

		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('menu');
		$this->load->view('start');
		$this->load->view('js_plugins');
	}

	function add_empleados(){
		$this->load->model('Empleados_model');
		$this->load->model('Genero_model');
		$this->load->model('Profesion_model');
		$this->load->model('Pais_model');
 
$data['groups'] = $this->Genero_model->getGenero();
$data['profesion'] = $this->Profesion_model->getProfesion();
$data['pais'] = $this->Pais_model->getPais();
	//	$this->load->helper('url');
	//	$this->load->helper('form');
		//$this->load->library('table');
	//	$this->load->model('Empleados_model');

		/*$empleados = $this->Empleados_model->getEmpleados();
		$data['nombre'] = $empleados['nombre'];
    	$data['apellidos'] = $empleados['apellidos'];*/
    	////$data['empleados'] = $this->Empleados_model->getEmpleados();
		//$data['empleados'] = $this->Empleados_model->get_table();
//$data['query'] = $this->Empleados_model->get_search();


       // $this->load->view('empleados', $data);

/*		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('menu');
    	$this->load->view('addEmpleados_view', $data);
    	$this->load->view('js_plugins');*/


//Including validation library
$this->load->library('form_validation');

//$this->form_validation->set_rules('genero', 'Genero', 'callback_validate_dropdown');

$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

//Validating Name Field
$this->form_validation->set_rules('dname', 'Username', 'required|min_length[1]|max_length[15]');

//Validating Email Field
//$this->form_validation->set_rules('demail', 'Email', 'required|valid_email');

//Validating Mobile no. Field
//$this->form_validation->set_rules('dmobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');

//Validating Address Field
//$this->form_validation->set_rules('daddress', 'Address', 'required|min_length[10]|max_length[50]');

if ($this->form_validation->run() == FALSE) {
		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('menu');
    	$this->load->view('addEmpleados_view', $data);
    	$this->load->view('js_plugins');
} else {
//Setting values for table columns
$data = array(
'nombre' => $this->input->post('dname'),
'apellidos' => $this->input->post('dapellidos'),
'direccion' => $this->input->post('ddireccion'),
'telefono1' => $this->input->post('dtelefono1'),
'telefono2' => $this->input->post('dtelefono2'),
'celular' => $this->input->post('dcelular'),
'email' => $this->input->post('demail'),
'email2' => $this->input->post('demail2'),
'nit' => $this->input->post('dnit'),
'fecha_nacimiento' => $this->input->post('dnacimiento'),
'edad' => $this->input->post('dedad'),
'pais_residencia' => $this->input->post('dresidencia'),
'genero_id' => $this->input->post('dgenero'),
'profesion_id' => $this->input->post('dprofesion')
//'Student_Address' => $this->input->post('daddress')
);
//Transfering data to Model
//$this->Empleados_model->insert_empleado($data);


$this->Empleados_model->insert_empleado($data);
$data['message'] = 'Data Inserted Successfully';
//Loading View
		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('menu');
    	$this->load->view('addEmpleados_view', $data);
    	$this->load->view('js_plugins');
}




function validate_dropdown($str)
    {
        if ($str == '-CHOOSE-')
        {
            $this->form_validation->set_message('validate_dropdown', 'Please choose a valid %s');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }




 	}
}
