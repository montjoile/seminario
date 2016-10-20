<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Factura_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database(); 
        $this->load->library('table');
    }


    function getFacturasbyEmpresaID($empresaid){
    	$this->db->select('*');
    	$this->db->from('factura');
    	$this->db->where('empresa_id', $empresaid);
    	$query = $this->db->get();
		return $query->result();
    }



    function getDetallebyEmpleadoID($empleado, $facturas){
    	$this->db->select('*');
    	$this->db->from('detalle_factura');
    	//$this->db->where('factura_id', $factura_id);
    	$this->db->where('empleado_id', $empleado);
    	$this->db->where_in('factura_id', $facturas[0]->id);
    	$query = $this->db->get();
		return $query->result();
    }




  function insertFactura($info){
    $this->db->set('fecha', 'NOW()', FALSE);
    $result = $this->db->insert('factura', $info);
    $this->db->select('max(id) as id');
    $this->db->from('factura');
    $query=$this->db->get();
    return $query->result();
    //return $result;
  }



  function insertDetalle($info){
    $this->db->insert('detalle_factura', $info);
    //return $query->result();
    //return $result;
  }


  function calcularComision($salario){
  	$comision = $salario * 0.20;
  	return $comision;
  }


  function calcularIVA($total){
  	$iva = $total * 0.12;
  	return $iva;
  }


    function buildFactura($factura){
    	$factura = '
			</pre><div class="row">
			<div>
				<h1>SPO Guatemala</h1>
			<h1 style="font-size:14px; text-right">FACTURA</h1>
				<h1 style="font-size:13px">Serie '. $factura['serie']. '   '. $factura['numero'] .'</h1>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 style="font-size:12px">De: <a>Outsourcing de Guatemala S.A.</a></h4>
						</div>
						<div class="panel-body" style="font-size:12px">30 avenida 12-48 Zona 10, Guatemala<br/>
							Telefono: (502) 23314582 <br /> 
							Codigo postal: 05001
						</div>
					</div>
				<div class="col-xs-5 col-xs-offset-2 text-right">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 style="font-size:12px">Para : ' . $factura["empresa"] .'</h4>
						</div>
						<div class="panel-body">Dirección
							<h4 style="font-size:12px">'. $factura['empDir'] .'</h4>
						</div>
						<div class="panel-body">Telefono
							<h4 style="font-size:12px">'. $factura['empTel'] .'</h4>
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
							<h4>Empleado</h4>
						</th>
						<th>
							<h4>Mes</h4>
						</th>
						<th>
							<h4>Concepto</h4>
						</th>
						<th>
							<h4>Salario</h4>
						</th>
						<th>
							<h4>Comision</h4>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>'. $factura['empleado'].'</td>
						<td> '. $factura['mes'].'</td>
						<td class=" text-right ">'. $factura['concepto'].' -Contrato No.'. $factura['contrato'] .' de fecha '. $factura['fecha_contrato'] .'</td>
						<td class=" text-right "> Q.'. $factura['salario'].'</td>
						<td class=" text-right ">Q.'. $factura['comision'].'</td>
					</tr>
				</tbody>
			</table>

			<pre>
			</pre>
			<div class="row text-right">
				<div class="col-xs-3 col-xs-offset-7"><strong>
					Impuestos (IVA 12%):  </strong>Q.' . $factura['iva'] .'<br />
					 <strong>Sub Total: </strong>Q.'. $factura['total'] .'
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
						 SPO S.A.
						 Banco Agromercantil <br />
						 Número de cuenta: 12345678
					</div>
				</div>
			</div>';
		return $factura;
    }


}