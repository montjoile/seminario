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
		$this->load->library('session');

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
		$this->load->library('session');
		$this->load->model('Empleados_model');


 		$user_rol = $this->session->userdata('rol');
 		//restringir vista a usuario empleador:
 		if ($user_rol == 3){
			$this->load->view('head');
			$this->load->view('navbar');
			$this->load->view('menu');
			$this->load->view('start');
			$this->load->view('js_plugins');
 		}

 		else{
			/*$empleados = $this->Empleados_model->getEmpleados();
			$data['nombre'] = $empleados['nombre'];
	    	$data['apellidos'] = $empleados['apellidos'];*/
	    	////$data['empleados'] = $this->Empleados_model->getEmpleados();
			//$data['empleados'] = $this->Empleados_model->get_table();
			$data['query'] = $this->Empleados_model->get_search();

			$this->load->view('head');
			$this->load->view('navbar');
			$this->load->view('menu');
	    	$this->load->view('empleados', $data);
	    	$this->load->view('js_plugins');
    	}
 	}


 	function requerir_empleados(){
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->library('form_validation');
 		$this->load->library('session');
 		$this->load->model('Empleados_model');
 		$this->load->model('Genero_model');
 		$this->load->model('Profesion_model');
 		$this->load->model('NivelEstudios_model');
 		$this->load->model('Pais_model');
 		$this->load->model('Puesto_model');

 		$user_rol = $this->session->userdata('rol');
 		//restringir vista a usuario empleador:
 		if ($user_rol == 1 or $user_rol == NULL){
			$this->load->view('head');
			$this->load->view('navbar');
			$this->load->view('menu');
			$this->load->view('start');
			$this->load->view('js_plugins');
 		}

 		else{
	 		$data['genero']         =  $this->Genero_model->getGenero();
	 		$data['profesion']      =  $this->Profesion_model->getProfesion();
	 		$data['pais']           =  $this->Pais_model->getPais();
	 		$data['nivel_estudios'] =  $this->NivelEstudios_model->getNivelEstudios();
	 		$data['puesto']         =  $this->Puesto_model->getPuesto();


			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$req_empleado = array(
					'genero' => $this->input->post('dgenero'),
					'profesion' => $this->input->post('dprofesion'),
					'pais' => $this->input->post('dresidencia'),
					'nivel_estudios' => $this->input->post('destudios')//,
					//'puesto' => $this->input->post('dpuesto'),
					//'edad' => $this->input->post('drango'),
				);

				$data['empleados'] = $this->Empleados_model->getEmpleadosbyReq($req_empleado);

				$this->load->view('head');
				$this->load->view('navbar');
				$this->load->view('menu');
				$this->load->view('reqEmpleados_view', $data);
				$this->load->view('js_plugins');
			} 


			else {
				$this->load->view('head');
				$this->load->view('navbar');
				$this->load->view('menu');
		    	$this->load->view('reqEmpleados_view', $data);
		    	$this->load->view('js_plugins');
		    }
	    }

	}






 	function gestionar_empleados(){
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->library('session');
 		$this->load->model('Empleador_model');
 		$this->load->model('Empleados_model');
 		$this->load->model('Contrato_model');


 		$user_rol = $this->session->userdata('rol');
 		//restringir vista a usuario empleado:
 		if ($user_rol == 1 or $user_rol == NULL){
			$this->load->view('head');
			$this->load->view('navbar');
			$this->load->view('menu');
			$this->load->view('start');
			$this->load->view('js_plugins');
 		}

 		else{
	 		$usuario_id = $this->session->userdata('user');
	 		$data['empresa'] = $this->Empleador_model->getEmpresaId($usuario_id);
			$empresaid = $data['empresa'][0]->empresa_id;
			$data['contratos'] = $this->Contrato_model->getContratobyEmpresa($empresaid);

			//si no hay empleados contratados por empleador
			if ($data['contratos'] == null or $data['contratos'] == 0){
				$this->load->view('head');
				$this->load->view('navbar');
				$this->load->view('menu');
				$this->load->view('start');
				$this->load->view('js_plugins');
			}

			else{

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
 	}



 	function generar_factura(){
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->library('session');
 		$this->load->model('Empleador_model');
 		$this->load->model('Empleados_model');
 		$this->load->model('Contrato_model');
 		$this->load->model('Factura_model');
 		$this->load->model('Empresa_model');


 		$user_rol = $this->session->userdata('rol');
 		//restringir vista a usuario empleador:
 		if ($user_rol == 1 or $user_rol == NULL){
			$this->load->view('head');
			$this->load->view('navbar');
			$this->load->view('menu');
			$this->load->view('start');
			$this->load->view('js_plugins');
 		}

 		else{


 			$usuario_id = $this->session->userdata('user');
	 		$data['empresa'] = $this->Empleador_model->getEmpresaId($usuario_id);
			$empresaid = $data['empresa'][0]->empresa_id;
			$data['contratos'] = $this->Contrato_model->getContratobyEmpresa($empresaid);

			//si no hay empleados contratados:
			if ($data['contratos']== null or $data['contratos'] == 0){
				$this->load->view('head');
				$this->load->view('navbar');
				$this->load->view('menu');
				$this->load->view('start');
				$this->load->view('js_plugins');
			}


			else {
				$empleados = array();
				foreach ($data['contratos'] as $item) {
					$empleados[] = $item->empleado_id;
				}
				$data['empleados'] = $this->Empleados_model->getEmpleadosbyID($empleados);


				$empresa = $this->Empresa_model->getEmpresabyID($empresaid);


	 			if($_SERVER['REQUEST_METHOD'] == "POST"){

	 				//calcular comision de factura:
	 				$salario = $this->input->post('dsalario');
	 				$comision = $this->Factura_model->calcularComision($salario);
	 				$subtotal = $salario + $comision;
	 				$iva = $this->Factura_model->calcularIVA($subtotal);
	 				$total = $subtotal + $iva;


	 				$facturadb = array(
	 					'serie'  => 'A',
	 					'total'  => $this->input->post('dsalario'),
	 					'empresa_id' => $empresaid,
	 					'total'  => $total
	 				);	


	 				$factura_id = $this->Factura_model->insertFactura($facturadb);
	 				
	 				$detalle_factura = array(
	 					'factura_id' => $factura_id[0]->id,
	 					'empleado_id' => $this->input->post('dempleado'),
		 				'mes' => $this->input->post('dmes'),
		 				'concepto' => $this->input->post('dconcepto'),
		 				'contrato_id' => $this->input->post('dcontrato'),
		 				'salario' => $this->input->post('dsalario'),
		 				'comision' => $comision,
		 				'iva' => $iva,
		 				'subtotal' => $total
		 			);


	 				$this->Factura_model->insertDetalle($detalle_factura);


	 				$factura = array(
	 					'serie'  => 'A',
	 					'numero' => $factura_id[0]->id,
	 					'total'  => $this->input->post('dsalario'),
	 					'empresa' => $empresa[0]->nombre,
						'empDir' => $empresa[0]->direccion,
						'empTel' => $empresa[0]->telefono,
	 					'total'  => $total,
	 					'mes' => $this->input->post('dmes'),
		 				'concepto' => $this->input->post('dconcepto'),
		 				'contrato' => $this->input->post('dcontrato'),
		 				'salario' => $this->input->post('dsalario'),
		 				'comision' => $comision,
		 				'iva' => $iva,
		 				'empleado' => $this->input->post('dnombre'),
		 				'fecha_contrato' => $data['empleados'][0]->fecha_contrato
	 				);



	 				$contentPDF = $this->Factura_model->buildFactura($factura);
	 				$this->imprimir_factura($contentPDF);


	 				/*if ($result){

	 				}*/
	//calcular iva y comision
	 				//grabar factura y detalle factura
	 				//mandar a funcion de generacion de pdf
		 	/*	$this->load->view('head');
				$this->load->view('navbar');
				$this->load->view('menu');
		    	$this->load->view('generarFactura_view', $factura_id);
		    	$this->load->view('js_plugins');*/ //var_dump($factura);

	 			}


				


		 		/*$usuario_id = $this->session->userdata('user');
		 		$data['empresa'] = $this->Empleador_model->getEmpresaId($usuario_id);
				$empresaid = $data['empresa'][0]->empresa_id;
				$data['contratos'] = $this->Contrato_model->getContratobyEmpresa($empresaid);

				$empleados = array();
				foreach ($data['contratos'] as $item) {
					$empleados[] = $item->empleado_id;
				}
				$data['empleados'] = $this->Empleados_model->getEmpleadosbyID($empleados);*/
				else{

			 		$this->load->view('head');
					$this->load->view('navbar');
					$this->load->view('menu');
			    	$this->load->view('generarFactura_view', $data);
			    	$this->load->view('js_plugins');
		    	}
		    }
	    }
 	}



	function imprimir_factura($contentPDF){
 		$this->load->library('Pdf');

 	//create new PDF document
    $pdf = new pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
 
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Sistema de Outsourcing de Personal');
    $pdf->SetTitle('Factura');
 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
 
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
 
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
 

    $pdf->AddPage(); 
 
    $html = '<style>'.file_get_contents(base_url('assets/css/bootstrap.min.css')).'</style>';
    $html .= '<style>'.file_get_contents(base_url('assets/css/sb-admin.css')).'</style>';
    $html .= '<style>'.file_get_contents(base_url('assets/font-awesome/css/font-awesome.min.css')).'</style>';
    $html .= $contentPDF;
    
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
 
    $pdf->Output('example_001.pdf', 'I');    
 

 	}




















}
