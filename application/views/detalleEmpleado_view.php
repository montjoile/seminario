        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Detalle de Empleado 
                        </h1>   
                        



<?php //echo $e;//echo form_open('Start/requerir_empleados'); ?>

<?php //var_dump($empleados); 
if (isset($msg)) { //echo $msg; ?>
<CENTER><h3 style="color:green;">Registro guardado con exito</h3></CENTER><br>
<?php } ?>



<?php //echo $id;?>


<?php if (isset($empleados)){?>
<?php	echo form_open("Empleados/contratar_empleado/");

    foreach($empleados as $empleado){
        $atributes = array(        
                            'name'      => 'dempleado',
                            'id'        => 'dempleado',
                            'value'     => $empleado['id'],
                            'readonly'  => 'readonly'
                            );
        echo form_input($atributes);

       
        $atributes = array(        
                            'name'      => 'dnombre',
                            'id'        => 'dnombre',
                            'value'     => $empleado['nombre'] .' ' . $empleado['apellidos'],
                            //'maxlength' => '30',
                            //'size'      => '30',
                            //'style'     => 'width:30%',
                            'readonly'  => 'readonly'
                            );
        echo form_input($atributes);


        $atributes = array(        
                            'name'      => 'dtelefono1',
                            'id'        => 'dtelefono1',
                            'value'     => $empleado['telefono1'],
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

?>




    <table>
    <tr><th>Nombre</th><th>Telefono</th><th>Celular</th><th>Email</th><th>Direccion</th><td>Pretension Salarial</td><td>Contratar</td><td></td></tr>
    
    <?php foreach($empleados as $item): ?>
    <tr>
    <td><?= $item['nombre'] . " " . $item['apellidos'] ?></td>

   
    <td><a href="<?php echo site_url('Empleados/detalle_empleado').'/'.$item['id'] ?>"><i class="fa fa-search-plus" aria-hidden="true" alt="Ver informacion del empleado"></i></a></td>
    </tr>
    <?php endforeach;?>
    </table>
<?php //} ?>




                      
                        
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
