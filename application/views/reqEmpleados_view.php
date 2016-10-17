        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Requisicion de Personal 
                        </h1>   
                        



<?php //echo $e;//echo form_open('Start/requerir_empleados'); ?>
<form method="post" accept-charset="utf-8" action='requerir_empleados'>
<?php if (isset($message)) { ?>
<CENTER><h3 style="color:green;">Registro guardado con exito</h3></CENTER><br>
<?php } ?>


<?php
    /*echo form_label('Puesto a requerir') . '<br />';
    foreach($puesto as $row ){
        $array[$row['id']] = $row['nombre'];
    }
    echo form_dropdown('dpuesto',  $array, 'class=form-control');
    echo '<br /><br />';*/
?>


<?php
    /*echo form_label('Rango de edad') . '<br />';
    $rango = array("Sin especificar", "18 a 25", "26 a 35", "36 a 65");
    echo form_dropdown('drango',  $rango, 'class=form-control');
    echo '<br /><br />';*/
?>


<?php
    echo form_label('Sexo') . '<br />';
    foreach($genero as $row ){
        $array[$row['id']] = $row['descripcion'];
    }
    echo form_dropdown('dgenero',  $array, 'class=form-control');
    echo '<br /><br />';
?>


<?php
    echo form_label('Nivel de Estudios') . '<br />';
    foreach($nivel_estudios as $row ){
        $array[$row['id']] = $row['descripcion'];
    }
    echo form_dropdown('destudios',  $array, 'class=form-control');
    echo '<br /><br />';
?>


<?php
    echo form_label('Profesion') . '<br />';
    foreach($profesion as $row ){
        $array[$row['id']] = $row['descripcion'];
    }
    echo form_dropdown('dprofesion',  $array, 'class=form-control');
    echo '<br /><br />';
?>



<?php
    echo form_label('Pais de Residencia') . '<br />';
    foreach($pais as $row ){
        $array[$row['id']] = $row['descripcion'];
    }
    echo form_dropdown('dresidencia',  $array, 'class=form-control');
    echo '<br /><br />';
?>



<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>
<?php echo form_close(); ?><br/>

</div>



<?php 
       /* if (isset($empleados)){
            echo "ffff";
            echo $empleados['genero'];
            echo $empleados['profesion']; }


             <td><input type="checkbox" value="$item->id"></td>
        */?>

<?php if (isset($empleados)){ ?>
    <table>
    <tr><th>Nombre</th><th>Telefono</th><th>Celular</th><th>Email</th><th>Direccion</th><td>Pretension Salarial</td><td>Contratar</td><td></td></tr>
    <?php foreach($empleados as $item): ?>
    <tr>
    <td><?= $item->nombre . " " . $item->apellidos ?></td>
    <td><?= $item->telefono1 ?></td>
    <td><?= $item->celular ?></td>
    <td><?= $item->email ?></td>
    <td><?= $item->direccion ?></td>
    <td><?= $item->pretension_salarial ?></td>
   
    <td><a href="<?php echo site_url('Empleados/detalle_empleado').'/'.$item->id ?>"><i class="fa fa-search-plus" aria-hidden="true" alt="Ver informacion del empleado"></i></a></td>
    </tr>
    <?php endforeach;?>
    </table>

<?php } ?>







<?php /*
if (isset($empleados)){ 
    echo form_open("Empleados/detalle_empleado/"$emplea);

    foreach($empleados as $empleado){
        $atributes = array(        
                            'name'      => 'dempleado',
                            'id'        => 'dempleado',
                            'value'     => $empleado->id,
                            'readonly'  => 'readonly'
                            );
        echo form_hidden($atributes);

        $atributes = array(        
                            'name'      => 'dnombre',
                            'id'        => 'dnombre',
                            'value'     => $empleado->nombre .' ' . $empleado->apellidos,
                            //'maxlength' => '30',
                            //'size'      => '30',
                            //'style'     => 'width:30%',
                            'readonly'  => 'readonly'
                            );
        echo form_input($atributes);
       
        echo "<input type=submit value='Contratar' />";
    }
}

    echo form_close();

*/
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
