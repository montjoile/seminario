<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	function __construct() {
		parent::__construct();
	    $this->load->helper(array('form','url','html'));
	    $this->load->library(array('session', 'form_validation'));
	    $this->load->database();
	    $this->load->model('Usuario_model');
        $this->load->model('Empresa_model');
        $this->load->model('Empleador_model');
        $this->load->model('Empleados_model');
	}

	
	function index(){

        $this->load->model('Genero_model');
        $this->load->model('Profesion_model');
        $this->load->model('Pais_model');
        $this->load->model('NivelEstudios_model');


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

                //si se acaba de crear usuario, manda mensaje
                if ($this->session->flashdata('nuevoUsuario')){
                        $this->session->set_flashdata('aviso', '<div class="alert alert-success text-center">Debes ingresar tu informacion!</div>');
                    }

                //si usuario es Empleador
                if ($data['usuario'][0]->rol_id == 2){
                    $data['empresas']  = $this->Empresa_model->getEmpresas();
                    $data['empleador'] = $this->Empleador_model->getEmpleadorbyUser($data['usuario'][0]->id);

                    $this->load->view('head');
                    $this->load->view('navbar');
                    $this->load->view('menu');
                    $this->load->view('profileEmpleador_view', $data);
                    $this->load->view('js_plugins');
                }

                else{

                    $data['genero']         =  $this->Genero_model->getGenero();
                    $data['profesion']      =  $this->Profesion_model->getProfesion();
                    $data['pais']           =  $this->Pais_model->getPais();
                    $data['nivel_estudios'] =  $this->NivelEstudios_model->getNivelEstudios();
                    $data['empleado'] = $this->Empleados_model->getEmpleadobyUser($data['usuario'][0]->id);


                    $this->load->view('head');
                    $this->load->view('navbar');
                    $this->load->view('menu');
                    $this->load->view('profile_view', $data);
                    $this->load->view('js_plugins');
                }

            }
            else
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Email or Password!</div>');
                redirect('login/index');
            }
            
        }
    }





    function actualiza_perfil(){
        $this->load->helper(array('form','url','html'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
        $this->load->model('Usuario_model');
        $this->load->model('Empresa_model');
        $this->load->model('Empleador_model');
        $this->load->model('Genero_model');
        $this->load->model('Pais_model');
        $this->load->model('Profesion_model');
        $this->load->model('NivelEstudios_model');


        if($_SERVER['REQUEST_METHOD'] == "POST"){

            if ($this->session->userdata('rol') == 2){


                // get form input
                $empleador = array(
                    'empresa_id'    => $this->input->post("dempresa"),
                    'direccion'     =>  $this->input->post("ddireccion"),
                    'telefono'      =>  $this->input->post("dtelefono"),
                    'celular'       =>  $this->input->post("dcelular")
                );

                // form validation
                $this->form_validation->set_rules("dtelefono", "Telefono", "numeric|max_length[10]");
                $this->form_validation->set_rules("dcelular", "Celular", "numeric|max_length[10]");

                if ($this->form_validation->run() == FALSE){
                    // validation fail
                    $this->load->view('login_view');
                }
                
    /**/            else{
                    $user_id = $this->session->userdata('user');
                    $this->Empleador_model->update_empleador($user_id, $empleador);

                    $data['empresas']  = $this->Empresa_model->getEmpresas();
                    $data['empleador'] = $this->Empleador_model->getEmpleadorbyUser($user_id);

                            $this->load->view('head');
                            $this->load->view('navbar');
                            $this->load->view('menu');
                            $this->load->view('profileEmpleador_view', $data);
                            $this->load->view('js_plugins');
                    }

            }


            else{
                // get form input
                $empleado = array(
                    'DPI'                  =>  $this->input->post("ddpi"),
                    'direccion'            =>  $this->input->post("ddireccion"),
                    'telefono1'            =>  $this->input->post("dtelefono"),
                    'celular'              =>  $this->input->post("dcelular"),
                    'genero_id'            =>  $this->input->post("dgenero"),
                    'pais_residencia'      =>  $this->input->post("dpais"),
                    'profesion_id'         =>  $this->input->post("dprofesion"),
                    'nivel_estudio_max'    =>  $this->input->post("destudios"),
                    'pretension_salarial'  =>  $this->input->post("dpretension")
                );

                // form validation
                $this->form_validation->set_rules("dtelefono", "Telefono", "numeric|max_length[10]");
                $this->form_validation->set_rules("dcelular", "Celular", "numeric|max_length[10]");
                //$this->form_validation->set_rules("dpretension", "Pretension Salarial", "numeric|max_length[10]");

                if ($this->form_validation->run() == FALSE){
                    // validation fail
                    $this->load->view('login_view');
                }
                
                else{
                    $user_id = $this->session->userdata('user');
                    $this->Empleados_model->update_empleado($user_id, $empleado);

                    //$data['em']  = $this->Empresa_model->getEmpresas();
                    $data['empleado'] = $this->Empleados_model->getEmpleadobyUser($user_id);
                    $data['empleado']       =  $this->Empleados_model->getEmpleadobyUser($user_id);
                $data['genero']         =  $this->Genero_model->getGenero();
                $data['profesion']      =  $this->Profesion_model->getProfesion();
                $data['pais']           =  $this->Pais_model->getPais();
                $data['nivel_estudios'] =  $this->NivelEstudios_model->getNivelEstudios();

                            $this->load->view('head');
                            $this->load->view('navbar');
                            $this->load->view('menu');
                            $this->load->view('profile_view', $data);
                            $this->load->view('js_plugins');
                    }

            }
            

        }

        else{



            if ($this->session->userdata('rol') == 2){
                $user_id = $this->session->userdata('user');

                    $data['empresas']  = $this->Empresa_model->getEmpresas();
                    $data['empleador'] = $this->Empleador_model->getEmpleadorbyUser($user_id);

                            $this->load->view('head');
                            $this->load->view('navbar');
                            $this->load->view('menu');
                            $this->load->view('profileEmpleador_view', $data);
                            $this->load->view('js_plugins');
            }
            else{
                $user_id = $this->session->userdata('user');
                $data['empleado']       =  $this->Empleados_model->getEmpleadobyUser($user_id);
                $data['genero']         =  $this->Genero_model->getGenero();
                $data['profesion']      =  $this->Profesion_model->getProfesion();
                $data['pais']           =  $this->Pais_model->getPais();
                $data['nivel_estudios'] =  $this->NivelEstudios_model->getNivelEstudios();
                   

                            $this->load->view('head');
                            $this->load->view('navbar');
                            $this->load->view('menu');
                            $this->load->view('profile_view', $data);
                            $this->load->view('js_plugins');

            }

        }

    }




    function logout(){
        $this->session->sess_destroy();
        $this->load->view('head');
        $this->load->view('navbar');
        $this->load->view('menu');
        $this->load->view('start');
        $this->load->view('js_plugins');

    }



}

