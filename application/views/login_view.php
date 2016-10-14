 <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">


    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>

            <?php $attributes = array("name" => "loginform", "class=form-signin");
            echo form_open("login", $attributes);?>
            
                <span id="reauth-email" class="reauth-email"></span>
                <?php echo form_input(
                    array(
                        'type'=>'email', 
                        'id' => 'demail', 
                        'name' => 'demail', 
                        'class'=> 'form-control', 
                        'placeholder'=>'Email address', 
                        'required' => 'required', 
                        'autofocus' => 'autofocus'
                    )); 
                ?>
                <span class="text-danger"><?php echo form_error('demail'); ?></span><br />

               
                <span id="reauth-password" class="reauth-password"></span>
                <?php echo form_input(
                    array(
                        'type'=>'password', 
                        'id' => 'dpassword', 
                        'name' => 'dpassword', 
                        'class'=> 'form-control', 
                        'placeholder'=>'Password', 
                        'required' => 'required'
                    )); 
                ?>
                <span class="text-danger"><?php echo form_error('dpassword'); ?></span>


                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>


                <?php echo form_submit(
                    array(
                    'id'    => 'submit', 
                    'value' => 'Sign in',
                    'class' => 'btn btn-lg btn-primary btn-block btn-signin'
                    )); ?>

                <?php echo $this->session->flashdata('msg'); ?>    
                <?php echo form_close(); ?><br/>


            
            <a href="<?php echo site_url('Signup')?>" class="forgot-password">
                Registrarse
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
