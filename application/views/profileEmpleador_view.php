<?php
//echo "hola!";
//echo $this->session->flashdata('msg');  
?>

<?php 
//if ($this->session->userdata('login')){ 
//	echo $this->session->userdata('nombre') . " " . $this->session->userdata('apellidos'); 
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
                                <label class="col-sm-2 control-label">Seleccionar Empresa</label>
                                    <div class="col-sm-10">';


                    // echo form_label('Empresa') . '<br />';
                        foreach($empresas as $row ){
                            $array[$row['id']] = $row['nombre'];
                        }
                        echo form_dropdown('dempresa',  $array, 'class=form-control');
                        echo '<br /><br />';                


                        echo '</div></div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-2 control-label">Direccion</label>
                                <div class="col-sm-10">';

                        $atributes = array(        
                                            'name'      => 'ddireccion',
                                            'id'        => 'ddireccion',
                                            'value'     => $empleador[0]->direccion
                                            );
                        echo form_input($atributes);


                        echo '</div></div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-2 control-label">Telefono</label>
                                <div class="col-sm-10">';
                        

                        $atributes = array(        
                                            'name'      => 'dtelefono',
                                            'id'        => 'dtelefono',
                                            'value'     => $empleador[0]->telefono
                                            );
                        echo form_input($atributes);

                        echo '</div></div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-2 control-label">Celular</label>
                                <div class="col-sm-10">';

                        $atributes = array(        
                                            'name'      => 'dcelular',
                                            'id'        => 'dcellular',
                                            'value'     => $empleador[0]->celular
                                            );
                        echo form_input($atributes);

                        echo '</div></div>';
                        echo '<div class="form-group">';
                        echo '<label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">';


                        $atributes = array(        
                                            'name'      => 'demail',
                                            'id'        => 'demail',
                                            'value'     => $empleador[0]->email,
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


	

				

