<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->helper(array('url','html'));
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Usuario_model');
	}



	function index(){
        $details = $this->Usuario_model->get_user_by_id($this->session->userdata('uid'));
        $data['uname'] = $details[0]->nombre . " " . $details[0]->apellidos;
        $data['uemail'] = $details[0]->email;



        $this->load->view('profile_view', $data);
       // $this->load->view('profile_view');
    }



}