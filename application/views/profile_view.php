<?php
//echo "hola!";
//echo $this->session->flashdata('msg');  
?>

<?php 
//if ($this->session->userdata('login')){ 
//  echo $this->session->userdata('nombre') . " " . $this->session->userdata('apellidos'); 
//}
?>






        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            My Profile
                            <br />
                            <small>Hello</small>
                            <?php 
                                if ($this->session->userdata('login')){ 
                                    echo "<small>". $this->session->userdata('nombre') . " " . 
                                    $this->session->userdata('apellidos') . "!</small>";
                                }

                            ?>
                        </h1>
                        <?php echo $this->session->flashdata('aviso'); ?>                       
                    </div>
                </div>
                <!-- /.row -->


                <?php 

                    echo form_open("login/actualiza_perfil", "class='form-horizontal'");
                    echo '<div class="form-group">
                                <label class="col-sm-2 control-label">Seleccionar Genero</label>
                                    <div class="col-sm-10">';


                        foreach($genero as $row ){
                            $array[$row['id']] = $row['descripcion'];
                        }
                        echo form_dropdown('dgenero',  $array, 'class=form-control');
                        echo '<br /><br />';                


                        echo '</div></div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-2 control-label">Profesion</label>
                                <div class="col-sm-10">';
                        foreach($profesion as $row ){
                            $array[$row['id']] = $row['descripcion'];
                        }
                        echo form_dropdown('dprofesion',  $array, 'class=form-control');
                        echo '<br /><br />';


                        echo '</div></div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-2 control-label">Nivel de Estudios</label>
                                <div class="col-sm-10">';
                        foreach($nivel_estudios as $row ){
                            $array[$row['id']] = $row['descripcion'];
                        }
                        echo form_dropdown('destudios',  $array, 'class=form-control');
                        echo '<br /><br />';


                        echo '</div></div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-2 control-label">Pais de residencia</label>
                                <div class="col-sm-10">';
                        foreach($pais as $row ){
                            $array[$row['id']] = $row['descripcion'];
                        }
                        echo form_dropdown('dpais',  $array, 'class=form-control');
                        echo '<br /><br />';


                        echo '</div></div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-2 control-label">DPI</label>
                                <div class="col-sm-10">';

                        $atributes = array(        
                                            'name'      => 'ddpi',
                                            'id'        => 'ddpi',
                                            'value'     => $empleado[0]->DPI
                                            );
                        echo form_input($atributes);



                        echo '</div></div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-2 control-label">Pretension Salarial</label>
                                <div class="col-sm-10">';

                        $atributes = array(        
                                            'name'      => 'dpretension',
                                            'id'        => 'dpretension',
                                            'value'     => $empleado[0]->pretension_salarial
                                            );
                        echo form_input($atributes);


                        echo '</div></div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-2 control-label">Direccion</label>
                                <div class="col-sm-10">';

                        $atributes = array(        
                                            'name'      => 'ddireccion',
                                            'id'        => 'ddireccion',
                                            'value'     => $empleado[0]->direccion
                                            );
                        echo form_input($atributes);


                        echo '</div></div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-2 control-label">Telefono</label>
                                <div class="col-sm-10">';
                        

                        $atributes = array(        
                                            'name'      => 'dtelefono',
                                            'id'        => 'dtelefono',
                                            'value'     => $empleado[0]->telefono1
                                            );
                        echo form_input($atributes);

                        echo '</div></div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-2 control-label">Celular</label>
                                <div class="col-sm-10">';

                        $atributes = array(        
                                            'name'      => 'dcelular',
                                            'id'        => 'dcellular',
                                            'value'     => $empleado[0]->celular
                                            );
                        echo form_input($atributes);

                        echo '</div></div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">';


                        $atributes = array(        
                                            'name'      => 'demail',
                                            'id'        => 'demail',
                                            'value'     => $empleado[0]->email,
                                            'readonly'  => 'readonly'
                                            );
                        echo form_input($atributes);


                        echo form_submit(array('id' => 'submit', 'value' => 'Actualizar'));
                        echo form_close(); 



                ?>






                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>


    

                

