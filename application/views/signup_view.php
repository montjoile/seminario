<DOCTYPE HTML>

 <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">


    <div class="container">
        <div class="card card-container">

            <?php $attributes = array("name" => "signupform", "class=form-signin");
            echo form_open("signup/index", $attributes);?>
            
                <!--<span id="reauth-email" class="reauth-email"></span>-->
                <?php //echo form_label("Nombre"); ?>
                <?php echo form_input(
                    array(
                        'type'=>'text', 
                        'id' => 'dnombre', 
                        'name' => 'dnombre', 
                        'class'=> 'form-control', 
                        'placeholder'=>'Nombre', 
                        'required' => 'required', 
                        'autofocus' => 'autofocus'
                    )); 
                ?>
                <span class="text-danger"><?php echo form_error('dnombre'); ?></span><br />

    
    			<?php //echo form_label("Apellidos"); ?>
                <!--<span id="reauth-email2" class="reauth-email"></span>-->
                <?php echo form_input(
                    array(
                        'type'=>'text', 
                        'id' => 'dapellidos', 
                        'name' => 'dapellidos', 
                        'class'=> 'form-control',
                        'placeholder'=>'Apellidos' 
                        //'required' => 'required', 
                        //'autofocus' => 'autofocus'
                    )); 
                ?>
                <span class="text-danger"><?php echo form_error('dapellidos'); ?></span><br />


				<?php //echo form_label("Email"); ?>
                <!--span id="reauth-email" class="reauth-email"></span>-->
                <?php echo form_input(
                    array(
                        'type'=>'email', 
                        'id' => 'demail', 
                        'name' => 'demail', 
                        'class'=> 'form-control', 
                        'placeholder'=>'Email address',
                        'rules'   => 'trim|required|matches[password]',
                        'required' => 'required'
                        //'autofocus' => 'autofocus'
                    )); 
                ?>
                <span class="text-danger"><?php echo form_error('demail'); ?></span><br />

               
                <?php //echo form_label("Password"); ?>
                <?php echo form_input(
                    array(
                        'type'=>'password', 
                        'id' => 'dpassword', 
                        'name' => 'dpassword', 
                        'class'=> 'form-control', 
                        'placeholder'=>'Password', 
                        'required' => 'required',
                        'rules'   => 'trim|required'
                    )); 
                ?>
                <span class="text-danger"><?php echo form_error('dpassword'); ?></span><br />


				<?php //echo form_label("Confirmar Password"); ?>
                <?php echo form_input(
                    array(
                        'type'=>'password', 
                        'id' => 'dpassword2', 
                        'name' => 'dpassword2', 
                        'class'=> 'form-control', 
                        'placeholder'=>'Confirm Password', 
                        'required' => 'required'
                    )); 
                ?>
                <span class="text-danger"><?php echo form_error('dpassword2'); ?></span><br />

				<div class="radio">
					<label>
				    <?php echo form_radio(
				    	array(
				            'id' => 'drol1', 
				            'name' => 'drol',  
				            //'required' => 'required',
				            'checked' => TRUE,
				            'value' => '1'
				        )); 
				    ?>
				 	Deseo encontrar empleo            
				    </label>
				</div>
				<div class="radio">
				  <label>
				    <?php echo form_radio(
				    	array(
				            'id' => 'drol2', 
				            'name' => 'drol',  
				            //'required' => 'required',
				            'value' => '2'
				        )); 
				    ?>
				    Deseo contratar personal
				  </label>
				</div>
				<span class="text-danger"><?php echo form_error('drol'); ?></span><br />


                <!--<div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>-->


                <?php echo form_submit(
                    array(
                    'id'    => 'submit', 
                    'value' => 'Sign up',
                    'class' => 'btn btn-lg btn-primary btn-block btn-signin'
                    )); ?>

                
                <?php echo form_reset(
                    array(
                    'id'    => 'cancel', 
                    'value' => 'Cancel',
                    'class' => 'btn btn-lg btn-block btn-cancel btn-danger'
                    )); ?>


                <?php echo $this->session->flashdata('msg'); ?>    
                <?php echo form_close(); ?>


             
                <a href="<?php echo base_url(); ?>index.php/login"> Iniciar sesion</a>
            
        </div><!-- /card-container -->
    </div><!-- /container -->
