<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller{

	//CONSTRUCTOR DE LA CLASE
	public function __construct()
	{
		parent::__construct();
		$this->load->model('signin_model');
		$this->load->model('user_model');
	}

	function isSession()
	{
		return $this->session->userdata('user_id');
	}

	public function index()
	{
		if($this->isSession())
		{
			$data['title'] = 'Backend - Home';
			$data['contenido_principal'] = $this->load->view('backend', $data, true);
			$this->load->view('template/back/template');
			//echo "Estamos en sesion";
			//echo "<a href='http://pascal/signin/logout'>Cerrar</a>";
		}
		else
		{
			$data['title'] = "Hotel Pascal - Login";
			$this->load->view('signin', $data);
		}
	}

	function verifySession()
	{
		$data = array(
			'user_name' => $this->input->post('user_name'),
			'pass' => sha1($this->input->post('pass'))
		);

		return $this->signin_model->verifySession($data);
	}

	public function logIn()
	{
		//echo "<pre>".print_r($_POST, true)."</pre>";
		//die();

		//DEFINING RULES
		$this->form_validation->set_rules('user_name', 'Nombre de usuario', 'required|trim');
		$this->form_validation->set_rules('pass','Contraseña', 'required|callback_verifySession');

		//DEFINIMOS LOS MENSAJES
		$this->form_validation->set_message('required', 'El campo %s es requerido.');
		$this->form_validation->set_message('verifySession','Usuario y/o contraseña incorrecto.');

		//DEFINIMOS EL ESTILO DEL MENSAJE DE ERROR
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

		// PROCEDEMOS A VALIDAR (T or F)
		if($this->form_validation->run())
		{
			$userData = $this->user_model->getUserDataByUserName($this->input->post('user_name'));
			$this->session->set_userdata('user_id', $userData->id);
			redirect('/');

			/*
			echo "Estamos en Backend";
			echo "<a href='http://pascal/signin/logout'>Cerrar</a>";
			echo "<pre>".print_r($this->session->all_userdata(), true)."</pre>";
			echo "<pre>".print_r($userData, true)."</pre>";
			*/
		}
		else
		{
			$data['title'] = "Hotel Pascal - Backend - Login";
			$this->load->view('signin', $data);
		}
	}

	public function logOut()
	{
		$this->session->sess_destroy();
		redirect("/");
	}
}
