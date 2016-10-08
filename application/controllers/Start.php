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
}
