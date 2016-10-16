<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Factura_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database(); 
        $this->load->library('table');
    }


    function buildFactura($empleado){
    	$e = '<h1>huehuehue</h1>';
    	$factura = 
    		'
USAR TABLAS EN LUGAR DE DIVs!!!!

			</pre><div class="row">
			<div class="col-xs-6" style="position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;float: left;width: 50%;border:1">
				<h1 style="">SPO Guatemala</h1>
			</div>
			<div class="col-xs-6 text-right">
				<h1>FACTURA</h1>
				<h1><small>Serie A 001</small></h1>
			</div>
 			<hr />
 
			<pre></pre>
			<div class="row">
				<div class="col-xs-5">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>De: <a href="#">Outsourcing de Guatemala S.A.</a></h4>
						</div>
						<div class="panel-body">30 avenida 12-48 Zona 10, Guatemala<br/>
							Telefono: (502) 23314582 <br /> 
							Codigo postal: 05001
						</div>
					</div>
				</div>
				<div class="col-xs-5 col-xs-offset-2 text-right">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Para : ' . $empleado["nombre"] .'</h4>
						</div>
						<div class="panel-body">Dirección
							detalles
							más detalles
						</div>
					</div>
				</div>
			</div>
		
			<pre><!-- / fin de sección de datos del Cliente  -->
			</pre>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>
							<h4>Servicio</h4>
						</th>
						<th>
							<h4>Descripción</h4>
						</th>
						<th>
							<h4>Hrs / Cantidad</h4>
						</th>
						<th>
							<h4>Tarifa / Precio</h4>
						</th>
						<th>
							<h4>Sub-Total</h4>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Artículo</td>
						<td><a href="#"> Título de su artículo aquí </a></td>
						<td class=" text-right ">-</td>
						<td class=" text-right ">200.00 €</td>
						<td class=" text-right ">200.00 €</td>
					</tr>
					<tr>
						<td>Plantilla de diseño</td>
						<td><a href="#"> Detalles del proyecto aquí </a></td>
						<td class="text-right">10</td>
						<td class="text-right ">75.00 €</td>
						<td class="text-right ">750.00 €</td>
					</tr>
					<tr>
						<td>Desarrollo</td>
						<td><a href="#"> Plugin WordPress </a></td>
						<td class="text-right ">5</td>
						<td class="text-right">50.00 €</td>
						<td class="text-right">250.00 €</td>
					</tr>
				</tbody>
			</table>
			<pre>
			</pre>
			<div class="row text-right">
				<div class="col-xs-3 col-xs-offset-7"><strong>
					Sub Total:
					Impuestos (IVA 21%):
					Total:
					</strong>
				</div>
				<div class="col-xs-2"><strong>
					1,200.00 €
					252.00 €
					1,452.00 €
					</strong>
				</div>
			</div>
			<pre>
			</pre>

			</ div>
			<div class="row">
				<div class = "col-xs-5">

					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>Datos bancarios</h4>
						</div>
					<div class="panel-body">
						 Su nombre
						 Nombre del banco
						 SWIFT: -------
						 Número de cuenta: 12345678
						 IBAN: ------
					</div>
				</div>
			</div>




			<div class="col-xs-7">
				<div class="span7">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4> Datos de contacto </h4>
							<div class=" panel-body ">
								 Email: usted@ejemplo.com
								 Móvil: +92123456789
								 Twitter: <a href="https://twitter.com/suTwitter">@suTwitter</a> |Suweb: <a href="http://www.suweb.com/author/usted"> http: //www. suweb.com/author/usted / </a>
								<h4><small> El pago debe ser por transferencia bancaria </h4>
							</div>
						</div>
					</div>
				</div>
			</div>';
		return $factura;
    }





    /*function generarFactura($empleados){
    	//recibe empresa_id, empleado_id, mes
    	$this->load->model('Empleados_model');
    	$empInfo = $this->Empleados_model->getEmpleadofromEmpresabyNombre($empleados);


    }*/

}