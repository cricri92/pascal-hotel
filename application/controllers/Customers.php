<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller{

	//CONSTRUCTOR DE LA CLASE
	public function __construct()
	{
		parent::__construct();
		$this->load->model('signin_model');
		$this->load->model('user_model');
		$this->load->model('customer_model');
	}

	function getSessionUserData()
	{
		$user_id = $this->session->userdata('user_id');
		return $this->user_model->getSessionUserData($user_id);
	}

	function isSession()
	{
		return $this->session->userdata('user_id');
	}

	function isSessionAdministrator()
	{
		$user_id = $this->session->userdata('user_id');
		return $this->user_model->isSessionAdministrator($user_id);
	}

	public function createCustomer()
	{
		if($this->isSessionAdministrator())
		{
			$data['title'] = 'Backend - Nuevo cliente';
			$data['user'] = $this->getSessionUserData();
			$data['contenido_principal'] = $this->load->view('crearCliente', $data, true);
			$this->load->view('template/back/template', $data);
		}
		else
		{
			redirect('/');
		}
	}


	public function newCustomer()
	{
		//DEFINIMOS LAS REGLAS
		$this->form_validation->set_rules('name', 'Nombre', 'required|trim');
		$this->form_validation->set_rules('cedula', 'Cedula', 'required|trim|is_unique[customers.cedula]');
		$this->form_validation->set_rules('direccion', 'Direccion', 'required|trim|max_length[500]');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|trim');

		$this->form_validation->set_message('required', '%s es requerido.');
		$this->form_validation->set_message('is_unique','%s ya existe.');
		$this->form_validation->set_message('max_length','Longitud del campo %s excedida');

		//DEFINIMOS EL ESTILO DEL MENSAJE DE ERROR
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

		if($this->form_validation->run())
		{
			$customer = array(
				'name' => $this->input->post('name'),
				'cedula' => $this->input->post('cedula'),
				'direccion' => $this->input->post('direccion'),
				'telefono' => $this->input->post('telefono')			
				);

			$this->customer_model->createCustomer($customer);

			$this->session->set_flashdata('message','Cliente creado exitosamente.');

			redirect('backend/clientes/ver-clientes');
		}
		else
		{
			$data['title'] = 'Backend - Nuevo cliente';
			$data['user'] = $this->getSessionUserData();
			$data['contenido_principal'] = $this->load->view('crearCliente', $data, true);
			$this->load->view('template/back/template', $data);
		}

	}

	public function loadCustomers()
	{
		$data['title'] = 'Backend - Ver clientes';
		$data['user'] = $this->getSessionUserData();
		$data['customers'] = $this->customer_model->getAllCustomers();
		$data['contenido_principal'] = $this->load->view('verClientes', $data, true);
		// die_pre($data);
		$this->load->view('template/back/template', $data);
		
	}
	
	public function getCustomerDataByCustomerCedula($cedula)
	{
		$customer_data = $this->customer_model->getCustomerDataByCustomerCedula($cedula);
		return $customer_data;
	}

	public function showCustomer($cedula)
	{		
		$data['customer_info'] = $this->getCustomerDataByCustomerCedula($cedula);
		$data['title'] = 'Backend - '.$data['customer_info']['name'];
		$data['user'] = $this->getSessionUserData();
		$data['contenido_principal'] = $this->load->view('verUnCliente', $data, true);
		// die_pre($data);
		$this->load->view('template/back/template', $data);
		
	}
	
	function existCustomer($cedula)
	{
		return $this->customer_model->existCustomer($cedula);
	}

	public function deleteCustomer($cedula)
	{
		if($this->existCustomer($cedula))
		{	
			$data['customer_info'] = $this->getCustomerDataByCustomerCedula($cedula);
			$data['title'] = 'Backend - '.$data['customer_info']['name'];
			$data['user'] = $this->getSessionUserData();
			$data['contenido_principal'] = $this->load->view('borrarCliente', $data, true);
			// die_pre($data);
			$this->load->view('template/back/template', $data);
		}
		else
		{
			redirect('/');
		}
	}

	public function deleteCustomerAction($cedula)
	{
		$this->customer_model->deleteCustomer($cedula);
		redirect('backend/clientes/ver-clientes');
	}

	public function updateCustomer($cedula)
	{
		if($this->existCustomer($cedula))
		{	
			$data['customer_info'] = $this->getCustomerDataByCustomerCedula($cedula);
			$data['title'] = 'Backend - Modificar cliente '.$data['customer_info']['name'];
			$data['user'] = $this->getSessionUserData();
			$data['contenido_principal'] = $this->load->view('modificarCliente', $data, true);
			// die_pre($data);
			$this->load->view('template/back/template', $data);
		}
		else
		{
			redirect('/');
		}
	}

	public function updatingCustomer()
	{
		//die_pre($_POST);

		//DEFINIMOS LAS REGLAS
		$this->form_validation->set_rules('customer_id', 'Id de cliente', 'required');
		$this->form_validation->set_rules('name', 'Nombre', 'required|trim');
		$this->form_validation->set_rules('cedula', 'Cedula', 'required|trim');
		$this->form_validation->set_rules('direccion', 'Direccion', 'required|max_length[500]|trim');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|trim');
		
		//DEFINIR LOS MENSAJES
		$this->form_validation->set_message('required', '%s es requerido.');
		$this->form_validation->set_message('max_length', 'Exceso de caracteres del campo %s.');

		//DEFINIMOS EL ESTILO DEL MENSAJE DE ERROR
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

		if($this->form_validation->run())
		{
			$customerUpdate = array(
				'name' => $this->input->post('name'),
				'cedula' => $this->input->post('cedula'),
				'direccion' => $this->input->post('direccion'),
				'telefono' => $this->input->post('telefono')
			);

			$customer_id = $this->input->post('cedula');

			$this->customer_model->updateCustomer($customer_id, $customerUpdate);

			$this->session->set_flashdata('message','Cliente actualizado exitosamente.');

			redirect('backend/clientes/ver-clientes');
		}
		else
		{
			$data['customer_info'] = $this->getCustomerDataByCustomerCedula($cedula);
			$data['title'] = 'Backend - Modificar cliente '.$data['customer_info']['name'];
			$data['user'] = $this->getSessionUserData();
			$data['contenido_principal'] = $this->load->view('modificarCliente', $data, true);
			// die_pre($data);
			$this->load->view('template/back/template', $data);
		}

	}
}
