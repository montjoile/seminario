        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Detalle de Empleado 
                        </h1>   
                        


<?php echo $this->session->flashdata('msg'); ?>    

<?php //var_dump($empresa); 
/*if (isset($msg)) { //echo $msg; 
echo '<CENTER><h3 style="color:green;">Registro guardado con exito</h3></CENTER><br>';
 }*/ ?>



<?php if (isset($empleados)){

    echo form_open("Empleados/contratar_empleado/", "class='form-horizontal'");

    foreach($empleados as $empleado){

        echo '<div class="form-group">
                <label class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-10">';

        $atributes = array(        
                            'name'      => 'dempleado',
                            'id'        => 'dempleado',
                            'value'     => $empleado['id'],
                            'readonly'  => 'readonly'
                            );
        echo form_input($atributes);


        echo '</div></div>';
        echo '<div class="form-group">';
        echo '<label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">';
        

        $atributes = array(        
                            'name'      => 'dnombre',
                            'id'        => 'dnombre',
                            'value'     => $empleado['nombre'] .' ' . $empleado['apellidos'],
                            'readonly'  => 'readonly'
                            );
        echo form_input($atributes);

        echo '</div></div>';
        echo '<div class="form-group">';
        echo '<label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-10">';

        $atributes = array(        
                            'name'      => 'dtelefono1',
                            'id'        => 'dtelefono1',
                            'value'     => $empleado['telefono1'],
                            'readonly'  => 'readonly'
                            );
        echo form_input($atributes);

        echo '</div></div>';
        echo '<div class="form-group">';
        echo '<div class="col-sm-offset-2 col-sm-10">';




    if (isset($contrato)){
        echo '
            </div></div>
            <div class="span7">
            <div class="panel panel-info" id="contratar_div">
            <div class="panel-heading">
            <h4> Contrato </h4>
            <div class=" panel-body ">


            <div class="form-group">
            <label class="col-sm-2 control-label">Fecha de Contrato</label>
                            <div class="col-sm-10">

            <input type="date" name="dfvigencia" id="dfvigencia" value='. $contrato[0]['fecha_contrato'] .'/>

            </div></div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Fecha de Vigencia</label>
                            <div class="col-sm-10">

            <input type="date" name="dfvigencia" id="dfvigencia" value='. $contrato[0]['fecha_vigencia'] .'/>

            </div></div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Puesto</label>
                            <div class="col-sm-10">

            <input type="text" name="dpuesto" id="dpuesto" value='. $contrato[0]['puesto'] .'/>

            </div></div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Salario</label>
                            <div class="col-sm-10">

            <input type="text" name="dsalario" id="dsalario" value='. $contrato[0]['salario'] .'/>

            </div></div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Observaciones</label>
                            <div class="col-sm-10">

            <textarea name="dobservaciones" id="dobservaciones" cols="40" rows="5">' . $contrato[0]['observaciones'] . '</textarea>


            </div>
            </div>
            </div>
            <input type=submit value="Imprimir Contrato" class="btn btn-default" />';
        
           // echo form_close();
    }

    else{


if (!isset($restringir)){
echo '<a href="#" id="c_contratar" onclick="toggle_visibility'."('contratar_div')".';">Contratar</a>

</div></div>
<div class="span7">
<div class="panel panel-info" id="contratar_div" style="display:none;">
<div class="panel-heading">
<h4> Contrato </h4>
<div class=" panel-body ">


<div class="form-group">
<label class="col-sm-2 control-label">Fecha de Vigencia</label>
                <div class="col-sm-10">

<input type="date" name="dfvigencia" id="dfvigencia" placeholder="YYYY-MM-DD" />

</div></div>
<div class="form-group">
<label class="col-sm-2 control-label">Puesto</label>
                <div class="col-sm-10">

<input type="text" name="dpuesto" id="dpuesto" />

</div></div>
<div class="form-group">
<label class="col-sm-2 control-label">Salario</label>
                <div class="col-sm-10">

<input type="text" name="dsalario" id="dsalario" />

</div></div>
<div class="form-group">
<label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-10">

<textarea name="dobservaciones" id="dobservaciones" cols="40" rows="5"></textarea>


</div>
</div>
</div>
<input type=submit value="Generar Contrato" class="btn btn-default" />';
}
}



    }
}

    echo form_close();

?>








                      
                        
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


<script type="text/javascript">
<!--
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       var f = document.getElementById('c_contratar')
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