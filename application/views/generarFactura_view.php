        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Generar Factura 
                           </h1>   



<?php echo form_open('Factura/generar_factura'); ?>
<?php if (isset($message)) { ?>
<CENTER><h3 style="color:green;">Registro guardado con exito</h3></CENTER><br>
<?php } ?>

<?php echo form_label('Nombre'); ?> 
<?php echo form_error('dname'); ?><br />
<?php echo '<div class="col-sm-5">'?>
<?php echo form_input(array('id' => 'dname', 'name' => 'dname', 'class'=> 'form-control')); ?><br />
<?php '</div>'?>
<?php '</div><div class="form-group">'?>

<?php echo form_label('Apellidos'); ?> <?php echo form_error('dapellidos'); ?><br />
<?php echo form_input(array('id' => 'dapellidos', 'name' => 'dapellidos', 'class'=> 'form-control')); ?><br />


<?php
    echo form_label('Genero') . '<br />';
    foreach($genero as $row ){
        $array[$row['id']] = $row['descripcion'];
    }
    echo form_dropdown('dgenero',  $array, 'class=form-control');
    echo '<br /><br />';
?>


<?php
    echo form_label('Genero') . '<br />';
    foreach($genero as $row ){
        $array[$row['id']] = $row['descripcion'];
    }
    echo form_dropdown('dgenero',  $array, 'class=form-control');
    echo '<br /><br />';
?>


            <?php 
            /*foreach($groups as $row){ 
              echo '<option value="'.$row['id'].'">'.$row['descripcion'].'</option>';
            }*/
            ?>

<?php echo form_label('Direccion'); ?> <?php echo form_error('ddireccion'); ?><br />
<?php echo form_input(array('id' => 'ddireccion', 'name' => 'ddireccion', 'class'=> 'form-control')); ?><br />

<?php echo form_label('Telefono'); ?> <?php echo form_error('dtelefono1'); ?><br />
<?php echo form_input(array('id' => 'dtelefono1', 'name' => 'dtelefono1', 'class'=> 'form-control')); ?><br />

<?php echo form_label('Telefono secundario'); ?> <?php echo form_error('dtelefono2'); ?><br />
<?php echo form_input(array('id' => 'dtelefono2', 'name' => 'dtelefono2', 'class'=> 'form-control')); ?><br />

<?php echo form_label('Celular'); ?> <?php echo form_error('dcelular'); ?><br />
<?php echo form_input(array('id' => 'dcelular', 'name' => 'dcelular', 'class'=> 'form-control')); ?><br />

<?php echo form_label('Email'); ?> <?php echo form_error('demail'); ?><br />
<?php echo form_input(array('id' => 'demail', 'name' => 'demail', 'class'=> 'form-control')); ?><br />

<?php echo form_label('Email Secundario'); ?> <?php echo form_error('demail2'); ?><br />
<?php echo form_input(array('id' => 'demail2', 'name' => 'demail2', 'class'=> 'form-control')); ?><br />

<?php echo form_label('NIT'); ?> <?php echo form_error('dnit'); ?><br />
<?php echo form_input(array('id' => 'dnit', 'name' => 'dnit', 'class'=> 'form-control')); ?><br />

<?php echo form_label('Fecha de Nacimiento'); ?> <?php echo form_error('dnacimiento'); ?><br />
<?php echo form_input(array('id' => 'dnacimiento', 'name' => 'dnacimiento', 'class'=> 'form-control')); ?><br />

<?php echo form_label('Edad'); ?> <?php echo form_error('dedad'); ?><br />
<?php echo form_input(array('id' => 'dedad', 'name' => 'dedad', 'class'=> 'form-control')); ?><br />

<?php
    echo form_label('Pais de Residencia') . '<br />';
    foreach($pais as $row ){
        $array[$row['id']] = $row['descripcion'];
    }
    echo form_dropdown('dresidencia',  $array, 'class=form-control');
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





<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>
<?php echo form_close(); ?><br/>

</div>



                      
                        
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
