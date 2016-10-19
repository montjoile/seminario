<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	function __construct() {
		parent::__construct();
	    $this->load->helper(array('form','url','html'));
	    $this->load->library(array('session', 'form_validation'));
	    $this->load->database();
	    $this->load->model('Usuario_model');
	}

	
	function index(){


        // get form input
        $email = $this->input->post("demail");
        $password = $this->input->post("dpassword");

        // form validation
        $this->form_validation->set_rules("demail", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("dpassword", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE)
        {
            // validation fail
            $this->load->view('login_view');

        }
        else
        {
            $uresult = $this->Usuario_model->getUser($email, $password);
            if ($uresult != NULL){
                // set session
                $data['usuario'] = $uresult;
                $sess_data = array(
                    'login'     =>  TRUE, 
                    'nombre'    =>  $data['usuario'][0]->nombre,
                    'user'      =>  $data['usuario'][0]->id,
                    'apellidos' =>  $data['usuario'][0]->apellidos,
                    'rol'       =>  $data['usuario'][0]->rol_id
                );
                $this->session->set_userdata($sess_data);
                //redirect("profile/index");
                $this->load->view('head');
                $this->load->view('navbar');
                $this->load->view('menu');
                $this->load->view('profile_view');
                $this->load->view('js_plugins');
            }
            else
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Email or Password!</div>');
                redirect('login/index');
            }
            
        }
    }


}