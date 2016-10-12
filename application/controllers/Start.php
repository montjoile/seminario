<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$this->load->helper('url');

		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('menu');
		$this->load->view('start');
		$this->load->view('js_plugins');
	}

	function empleados(){
		$this->load->helper('url');
		$this->load->helper('form');
		//$this->load->library('table');
		$this->load->model('Empleados_model');

		/*$empleados = $this->Empleados_model->getEmpleados();
		$data['nombre'] = $empleados['nombre'];
    	$data['apellidos'] = $empleados['apellidos'];*/
    	////$data['empleados'] = $this->Empleados_model->getEmpleados();
		//$data['empleados'] = $this->Empleados_model->get_table();
$data['query'] = $this->Empleados_model->get_search();


       // $this->load->view('empleados', $data);

		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('menu');
    	$this->load->view('empleados', $data);
    	$this->load->view('js_plugins');
 	}


 	function requerir_empleados(){
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->model('Empleados_model');
 		$this->load->model('Genero_model');
 		$this->load->model('Profesion_model');
 		$this->load->model('Pais_model');


 		$data['genero'] = $this->Genero_model->getGenero();
 		$data['profesion'] = $this->Profesion_model->getProfesion();
 		$data['pais'] = $this->Pais_model->getPais();


 		//load views:
 		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('menu');
    	$this->load->view('reqEmpleados_view', $data);
    	$this->load->view('js_plugins');

 	}



 	function gestionar_empleados(){
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->library('session');
 		$this->load->model('Empleador_model');
 		$this->load->model('Empleados_model');
 		$this->load->model('Contrato_model');


 		$usuario_id = $this->session->userdata('user');
 		$data['empresa'] = $this->Empleador_model->getEmpresaId($usuario_id);
		$empresaid = $data['empresa'][0]->empresa_id;
		$data['contratos'] = $this->Contrato_model->getEmpleadobyEmpresa($empresaid);

		$empleados = array();
		foreach ($data['contratos'] as $item) {
			$empleados[] = $item->empleado_id;
		}
		$data['empleados'] = $this->Empleados_model->getEmpleadosbyID($empleados);

 		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('menu');
    	$this->load->view('gestionarEmpleados_view', $data);
    	$this->load->view('js_plugins');



 	}


}
