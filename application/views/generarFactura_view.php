        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Generar Factura 
                        </h1>   









<?php //var_dump($factura_id);///echo form_open('Start/generar_factura'); ?>


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
















<?php //var_dump($empleados); //if (isset($empleados)){
    echo form_open("Start/generar_factura/", "class='form-inline'");

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

       

        //echo "<input type=submit value='Generar Factura' />";
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
