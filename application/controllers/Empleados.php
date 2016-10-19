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

		
 

 
$data['genero'] = $this->Genero_model->getGenero();
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
$data_bd = array(
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


$this->Empleados_model->insert_empleado($data_db);
$data['message'] = 'Data Inserted Successfully';
//Loading View
		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('menu');
    	$this->load->view('addEmpleados_view', $data);
    	$this->load->view('js_plugins');
}




 	}







 	function requerir_empleados(){
 		$this->load->model('Empleados_model');
		$this->load->model('Genero_model');
		$this->load->model('Profesion_model');
		$this->load->model('Pais_model');
		$this->load->model('Puesto_model');

		/*$data_bd = array(
'nombre' => $this->input->post('dname'),
'apellidos' => $this->input->post('dapellidos'),*/

 	}




 	function detalle_empleado($id = 0){
 		$this->load->library(array('session', 'form_validation'));
 		$this->load->helper('form');
 		$this->load->model('Empleados_model');
 		$this->load->model('Contrato_model');

		$id =  $this->uri->segment(3);

		//traer toda la info del empleado + contrato
		//boton para generar factura por empleado
		//contrato


		$empleados = $this->Empleados_model->getEmpleadobyID($id);
		$data['empleados'] = $empleados;


 		//verificar si ya tiene contrato>
 		  //buscar id contrato por empleado
 		  //traer datos de contrato
 		$contrato = $this->Contrato_model->getContratobyEmpleadoID($id);
 		if ($contrato){
 			$datos = $this->Contrato_model->getContratobyID($contrato);
 			$data['contrato'] = $datos;
 		}




		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('menu');
    	$this->load->view('detalleEmpleado_view', $data);
    	$this->load->view('js_plugins');
 	}



 	function contratar_empleado(){
 		$this->load->library(array('session', 'form_validation'));
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->model('Empleados_model');
 		$this->load->model('Empleador_model');
 		$this->load->model('Contrato_model');

 		//obtener id de empresa relacionado al usuario empleador 
 		//obtener fecha actual
 		//trigger para actualizar status de empleado a contratado

 		$usuario_id        =  $this->session->userdata('user');
 		$data['empresa']   =  $this->Empleador_model->getEmpresaId($usuario_id);
		$empresaid         =  $data['empresa'][0]->empresa_id;
		$empleado_id       =  $this->input->post('dempleado');


 		$info = array(
 			'empleado_id'    =>  $this->input->post('dempleado'),
 			'empresa_id'     =>  $empresaid,
 			//'fecha_contrato' =>  'CURDATE()',
 			'fecha_vigencia' =>  $this->input->post('dfvigencia'),
 			'salario'        =>  $this->input->post('dsalario'),
 			'puesto'         =>  $this->input->post('dpuesto'),
 			'observaciones'  =>  $this->input->post('dobservaciones')  
 		);


 		$result = $this->Empleados_model->contratarEmpleado($info);

 		if ($result != NULL){
            $msg = '<div class="alert alert-success text-center">You are Successfully Registered! Please login to access your Profile!</div>';
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please login to access your Profile!</div>');

            redirect('Empleados/detalle_empleado/'.$empleado_id);
	 		/*$this->load->view('head');
			$this->load->view('navbar');
			$this->load->view('menu');
	    	$this->load->view('detalleEmpleado_view', $msg);
	    	$this->load->view('js_plugins');*/
	    }
	    else{
	    	$msg = '<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>';
	    	$this->session->set_flashdata('msg', $msg);
	 		redirect('Empleados/detalle_empleado/'.$empleado_id);
	 		/*$this->load->view('head');
			$this->load->view('navbar');
			$this->load->view('menu');
	    	$this->load->view('detalleEmpleado_view', $msg);
	    	$this->load->view('js_plugins');*/
	    }

 	}





	/*function verDetalle_empleado(){
		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->library('form_validation');

		//if($_SERVER['REQUEST_METHOD'] == "POST"){
			$data['empleados'] = array(
				'id' => $this->input->post('dempleado')
				);
			
		//data['empleados'] = $this->Empleados_model->getEmpleadosbyReq($req_empleado);
			//$data['empleados'] = $empleado;

		$this->load->view('head');
				$this->load->view('navbar');
				$this->load->view('menu');
		    	$this->load->view('detalleEmpleado_view', $data);
		    	$this->load->view('js_plugins');
		//} 

	}*/






}
