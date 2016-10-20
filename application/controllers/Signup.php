<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('Usuario_model');
        $this->load->model('Empleador_model');
        $this->load->model('Empleados_model');
	}


 	function index(){
        // set form validation rules
        $this->form_validation->set_rules('dnombre', 'Nombre', 'trim|required|alpha|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('dapellidos', 'Apellidos', 'trim|required|alpha|min_length[3]|max_length[50]');
 //       $this->form_validation->set_rules('demail', 'Email ID', 'trim|required|valid_email|is_unique[usuario.email]');
 //       $this->form_validation->set_rules('dpassword', 'Password', 'trim|required|matches[dpassword2]|md5');
 //       $this->form_validation->set_rules('dpassword2', 'Confirm Password', 'trim|required');


$this->form_validation->set_rules('dpassword', 'Password', 'required');
$this->form_validation->set_rules('dpassword2', 'Password Confirmation', 'required|matches[dpassword]');
$this->form_validation->set_rules('demail', 'Email', 'required|valid_email|is_unique[usuario.email]');




        // submit
        if ($this->form_validation->run() == FALSE){
            // fails
            $this->load->view('signup_view');
        }
        else{
            //insert user details into db
            $data = array(
                'nombre' => $this->input->post('dnombre'),
                'apellidos' => $this->input->post('dapellidos'),
                'email' => $this->input->post('demail'),
                'password' => $this->input->post('dpassword'),
                'rol_id' => $this->input->post('drol'),
                'status_id' => 2
            );

            $result = $this->Usuario_model->insert_usuario($data);
            if ($result != NULL){//$this->Usuario_model->insert_usuario($data)){
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please login to access your Profile!</div>');

                $this->session->set_flashdata('nuevoUsuario','si');
                
                //graba a tabla empleado
                /*
                if ($data['rol_id'] == 1){
                    $this->Empleados_model->insert_empleado(array(
                        'nombre' => $this->input->post('dnombre'),
                        'apellidos' => $this->input->post('dapellidos'),
                        'email' => $this->input->post('demail')
                    ));
                }

                //graba a tabla empresa
                elseif ($data['rol_id'] == 2){
                    $this->Empleador_model->insert_empleador(array(
                        'nombre' => $this->input->post('dnombre'),
                        'apellidos' => $this->input->post('dapellidos'),
                        'email' => $this->input->post('demail')//,
                        //'usuario_id' => '24'//$usuario
                    ));
                }*/



                //redirect('signup/index');
                //redirect("profile/index");
                redirect("Login");
            }
            else{
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('signup/index');
            }
        }
    }


}