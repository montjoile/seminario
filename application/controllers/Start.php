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
 		$this->load->library('form_validation');
 		$this->load->model('Empleados_model');
 		$this->load->model('Genero_model');
 		$this->load->model('Profesion_model');
 		$this->load->model('NivelEstudios_model');
 		$this->load->model('Pais_model');
 		$this->load->model('Puesto_model');


 		$data['genero'] = $this->Genero_model->getGenero();
 		$data['profesion'] = $this->Profesion_model->getProfesion();
 		$data['pais'] = $this->Pais_model->getPais();
 		$data['nivel_estudios'] = $this->NivelEstudios_model->getNivelEstudios();
 		$data['puesto'] = $this->Puesto_model->getPuesto();



		//if($this->input->post('submit')){
 		/*if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$req_empleado = array(
		'genero' => $this->input->post('dgenero'),
		'profesion' => $this->input->post('dprofesion'),
		'pais' => $this->input->post('dpais'),
		'nivel_estudios' => $this->input->post('destudios')//,
		//'puesto' => $this->input->post('dpuesto'),
		//'edad' => $this->input->post('drango'),
		);

$data['empleados'] = $req_empleado;//$this->Empleados_model->getEmpleadosbyReq($req_empleado);
		}*/
//$this->form_validation->set_rules('dgenero', 'Genero', 'callback_validate_dropdown');

$data['e'] =  $_SERVER['REQUEST_METHOD'];
		//load views:
 		

echo "METHOD>>>>>>" . $_SERVER['REQUEST_METHOD'];

//form submited:
if($_SERVER['REQUEST_METHOD'] == "POST")
{
//$data['req_empleados'] = array(
	$req_empleado = array(
		'genero' => $this->input->post('dgenero'),
		'profesion' => $this->input->post('dprofesion'),
		'pais' => $this->input->post('dresidencia'),
		'nivel_estudios' => $this->input->post('destudios')//,
		//'puesto' => $this->input->post('dpuesto'),
		//'edad' => $this->input->post('drango'),
		);//

//$data['empleados'] = $req_empleado;


$data['empleados'] = $this->Empleados_model->getEmpleadosbyReq($req_empleado);



$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('menu');
    	$this->load->view('reqEmpleados_view', $data);
    	$this->load->view('js_plugins');
} 


else {$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('menu');
    	$this->load->view('reqEmpleados_view', $data);
    	$this->load->view('js_plugins');}



/*if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submit']))
//if ( ! $this->validation->run() && $this->validation->error_string != '')
{
   //load views:
 		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('menu');
    	$this->load->view('reqEmpleados_view', $data);
    	$this->load->view('js_plugins');

}

//if ($this->validation->run())
else
{
   $req_empleado = array(
		'genero' => $this->input->post('dgenero'),
		'profesion' => $this->input->post('dprofesion'),
		'pais' => $this->input->post('dpais'),
		'nivel_estudios' => $this->input->post('destudios')//,
		//'puesto' => $this->input->post('dpuesto'),
		//'edad' => $this->input->post('drango'),
		);

$data['empleados'] = array(
		'genero' => $this->input->post('dgenero'),
		'profesion' => $this->input->post('dprofesion'),
		'pais' => $this->input->post('dpais'),
		'nivel_estudios' => $this->input->post('destudios')//,
		//'puesto' => $this->input->post('dpuesto'),
		//'edad' => $this->input->post('drango'),
		);//$req_empleado;
//}





 		//load views:
 		$this->load->view('head');
		$this->load->view('navbar');
		//$this->load->view('menu');
    	$this->load->view('reqEmpleados_view', $data);
    	$this->load->view('js_plugins');

 	}*/
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



 	function generar_factura(){
 		//empleador genera factura con recargo con servicio
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->library('Pdf');
 		$this->load->library('session');
 		$this->load->model('Empleador_model');
 		$this->load->model('Empleados_model');
 		$this->load->model('Contrato_model');

		//si se envio el formulario
		$mes = 0;
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$mes = $this->input->post('month');
		}


 		$usuario_id = $this->session->userdata('user');
 		$data['empresa'] = $this->Empleador_model->getEmpresaId($usuario_id);
		$empresaid = $data['empresa'][0]->empresa_id;
		$data['contratos'] = $this->Contrato_model->getEmpleadobyEmpresa($empresaid);

		$empleados = array();
		foreach ($data['contratos'] as $item) {
			$empleados[] = $item->empleado_id;
		}
		$data['empleados'] = $this->Empleados_model->getEmpleadofromEmpresabyNombre($empleados);
		//getEmpleadosbyID($empleados);

/*
 // create new PDF document
    $pdf = new pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
 
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Sistema de Outsourcing de Personal');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
 
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
 
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
 
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
 
    // ---------------------------------------------------------    
 
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);   
 
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 14, '', true);   
 
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage(); 
 
    // set text shadow effect
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
 
    // Set some content to print
    $html = <<<EOD
    <h1>Wjjjjjelcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
    <i>This is the first example of TCPDF library.</i>
    <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
    <p>Please check the source code documentation and other examples for further information.</p>
    <p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;
 
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
 
    // ---------------------------------------------------------    
 
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    //$pdf->Output('example_001.pdf', 'I');    
 */



 		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('menu');
		$this->load->view('generarFactura_view', $data);
		$this->load->view('js_plugins');

 	}


 	function imprimir_factura(){
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->library('Pdf');
 		$this->load->library('session');
 		$this->load->model('Empleador_model');
 		$this->load->model('Empleados_model');
 		$this->load->model('Contrato_model');
 		$this->load->model('Factura_model');

		//si se envio el formulario
		$mes = 0;
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$mes = $this->input->post('month');
			
		}

		$empleado = array(
		'nombre' => $this->input->post('dnombre')
		);

		//$factura = $this->Factura_model->buildFactura($empleado);





 // create new PDF document
    $pdf = new pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
 
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Sistema de Outsourcing de Personal');
    $pdf->SetTitle('Factura');
 //   $pdf->SetSubject('TCPDF Tutorial');
 //   $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
 
    // set default header data
  //  $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
//    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
 
    // set header and footer fonts
 //   $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
 //   $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
 
    // set default monospaced font
//    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
 
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
 
    // ---------------------------------------------------------    
 
    // set default font subsetting mode
//    $pdf->setFontSubsetting(true);   
 
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
 //   $pdf->SetFont('dejavusans', '', 8, '', true);   
 
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage(); 
 
    // set text shadow effect
 //   $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
 
    // Set some content to print
    $html = '<style>'.file_get_contents(base_url('assets/css/bootstrap.min.css')).'</style>';
    $html .= '<style>'.file_get_contents(base_url('assets/css/sb-admin.css')).'</style>';
    $html .= '<style>'.file_get_contents(base_url('assets/font-awesome/css/font-awesome.min.css')).'</style>';
    $html .= $this->Factura_model->buildFactura($empleado);
    /*$html = <<<EOD
    <h1>Wjjjjjelcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
    <i>This is the first example of TCPDF library.</i>
    <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
    <p>Please check the source code documentation and other examples for further information.</p>
    <p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;*/
 
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
 
    // ---------------------------------------------------------    
 
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output('example_001.pdf', 'I');    
 
 







 	}


}
