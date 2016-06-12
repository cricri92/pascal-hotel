<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller{

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

	function getSessionUserData()
	{
		$user_id = $this->session->userdata('user_id');
		return $this->user_model->getSessionUserData($user_id);
	}

	public function index()
	{
		if($this->isSession())
		{
			$data['title'] = 'Backend - Home';
			$data['user'] = $this->getSessionUserData();
			$data['contenido_principal'] = $this->load->view('verReservacionesDeHoy', $data, true);
			//die_pre($data);
			$this->load->view('template/back/template', $data);
		}
		else
		{
			redirect('backend/login');
		}
	}
}
