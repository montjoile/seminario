        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Generar Factura 
                        </h1>   









<?php var_dump($empleados);///echo form_open('Start/generar_factura'); ?>


<?php //$search = array('name'=>'search','id'=>'search','value'=>'', 'placeholder' => 'Ingrese nombre de empleado ');?>



<?php $months = array(
        ''    => '',
        '1'   => 'Enero',
        '2'   => 'Febrero',
        '3'   => 'Marzo',
        '4'   => 'Abril',
        '5'   => 'Mayo',
        '6'   => 'Junio',
        '7'   => 'Julio',
        '8'   => 'Agosto',
        '9'   => 'Septiembre',
        '10'  => 'Octubre',
        '11'  => 'Noviembre',
        '12'  => 'Diciembre',
)?>

<!--<input type=submit value='Generar Factura' /></p>-->
















<?php var_dump($empleados); //if (isset($empleados)){
    echo form_open("Empleados/generar_factura/", "class='form-inline'");

    foreach($empleados as $empleado){

        echo '<div>';
        echo '<div class="form-group">
                <label>ID</label>';

        $atributes = array(        
                            'name'      => 'dempleado',
                            'id'        => 'dempleado',
                            'value'     => $empleado->id,
                            'size'     => '3',
                            'readonly'  => 'readonly'
                            );
        echo form_input($atributes);


        echo '</div>';
        echo '<div class="form-group">';
        echo '<label>Nombre</label>';
        

        $atributes = array(        
                            'name'      => 'dnombre',
                            'id'        => 'dnombre',
                            'value'     => $empleado->nombre .' ' . $empleado->apellidos,
                            'readonly'  => 'readonly'
                            );
        echo form_input($atributes);


        echo '</div>';
        echo '<div class="form-group">';
        echo '<label>No. Contrato</label>';
        

        $atributes = array(        
                            'name'      => 'dcontrato',
                            'id'        => 'dcontrato',
                            'value'     => $empleado->contrato,
                            'size'     => '3',
                            'readonly'  => 'readonly'
                            );
        echo form_input($atributes);

        echo '</div>';
        echo '<div class="form-group">';
        echo '<label>Profesion</label>';

        $atributes = array(        
                            'name'      => 'dprofesion',
                            'id'        => 'dprofesion',
                            'value'     => $empleado->profesion,
                            'readonly'  => 'readonly'
                            );
        echo form_input($atributes);

        echo '</div>';
        echo '<div class="form-group">';
        echo '<label>Salario</label>';

        $atributes = array(        
                            'name'      => 'dsalario',
                            'id'        => 'dsalario',
                            'value'     => $empleado->salario,
                            'size'      => '7',
                            'readonly'  => 'readonly'
                            );
        echo form_input($atributes);

       

        echo "<input type=submit value='Generar Factura' />";
        echo '</div>';

        echo '<a href="#" id="c_facturar" onclick="toggle_visibility();"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

    }


    

    echo '<div>
            <div class="span7">
            <div class="panel panel-info" id="factura_div" style="display:none;">
            <div class="panel-heading">
            <h4> Generar Factura</h4> 
            <div class=" panel-body ">


            <div class="form-group-horizontal">
                <label ">Mes</label>
                     <select name="dmes" id="dmes">
                          <option value=""></option>
                          <option value="1">Enero</option>
                          <option value="2">Febrero</option>
                          <option value="3">Marzo</option>
                          <option value="4">Abril</option>
                          <option value="5">Mayo</option>
                          <option value="6">Junio</option>
                          <option value="7">Julio</option>
                          <option value="8">Agosto</option>
                          <option value="9">Septiembre</option>
                          <option value="10">Octubre</option>
                          <option value="11">Noviembre</option>
                          <option value="12">Diciembre</option>
                        </select> 

                </div>




            <div class="form-group-horizontal">
                <label ">Concepto</label>
                <input type="text" name="dconcepto" id="dconcepto" />

            </div>

            <label>Observaciones</label>
                <textarea name="dobservaciones" id="dobservaciones" cols="40" rows="5"></textarea>

            </div>
            <div class="form-group">
                <div>
                  <input type=submit value="Generar Factura" class="btn btn-info" />';
             echo form_reset('Cancelar', 'Cancelar', 'class="btn btn-danger"');
             echo'   </div>
              </div>
            </div>
            ';


?>



<script type="text/javascript">
<!--
    function toggle_visibility(id) {
       var e = document.getElementById('factura_div');
       var f = document.getElementById('c_facturar');
       if(e.style.display == 'block'){
            e.style.display = 'none';
            f.style.display = 'none';
        }
       else{
          e.style.display = 'block';
          f.style.display = 'none';
       }
    }
//-->
</script>
























</pre>
<div class="col-xs-6">
<h1><a href=" "><img alt="" src="logo.png" /> SPO Guatemala</a></h1>
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
Codigo postal: 05001</div>
</div>
</div>
<div class="col-xs-5 col-xs-offset-2 text-right">
<div class="panel panel-default">
<div class="panel-heading">
<h4>Para : <a href="#">Nombre del Cliente</a></h4>
</div>
<div class="panel-body">Dirección
detalles
más detalles</div>
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
</strong></div>
<div class="col-xs-2"><strong>
1,200.00 €
252.00 €
1,452.00 €
</strong></div>
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
 IBAN: ------</div>
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
</div>













<h3>
    Sistema de Outsourcing de Personal
</h3>
<h5>
    <p>30 avenida 12-78 Zona 10, Guatemala<br />
    Telefono: 5124789541 456322510<br />
    Codigo postal: 05001</p>
</h5>

<h4>
    Factura

</h4>


<h1>Wjjjjjelcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
    <i>This is the first example of TCPDF library.</i>
    <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
    <p>Please check the source code documentation and other examples for further information.</p>
    <p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>





                      
                        
                    </div>
                </div>
                <!-- /.row -->

               
                <!-- /.row -->

                
               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>
