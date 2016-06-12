<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

	//CONSTRUCTOR DE LA CLASE
	public function __construct()
	{
		parent::__construct();
		$this->load->model('signin_model');
		$this->load->model('user_model');
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

	public function createUser()
	{
		if($this->isSessionAdministrator())
		{
			$data['title'] = 'Backend - Nuevo usuario';
			$data['user'] = $this->getSessionUserData();
			$data['contenido_principal'] = $this->load->view('crearUsuario', $data, true);
			$this->load->view('template/back/template', $data);
		}
		else
		{
			redirect('/');
		}
	}


	public function newUser()
	{
		//DEFINIMOS LAS REGLAS
		$this->form_validation->set_rules('name', 'Nombre', 'required|trim');
		$this->form_validation->set_rules('user_name', 'Nombre de usuario', 'required|trim|is_unique[users.user_name]');
		$this->form_validation->set_rules('pass', 'Contraseña', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('user_role_id', 'Cargo', 'required|trim|in_list[1,2,3]');

		$this->form_validation->set_message('required', '%s es requerido.');
		$this->form_validation->set_message('is_unique','%s ya existe.');
		$this->form_validation->set_message('min_length','%s debe tener minimo 6 caracteres.');
		$this->form_validation->set_message('in_list', '%s incorrecto.');

		//DEFINIMOS EL ESTILO DEL MENSAJE DE ERROR
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

		if($this->form_validation->run())
		{
			$user = array(
				'name' => $this->input->post('name'),
				'user_name' => $this->input->post('user_name'),
				'user_role' => $this->input->post('user_role_id'),
				'pass' => sha1($this->input->post('pass'))
			);

			$this->user_model->createUser($user);

			$this->session->set_flashdata('message','Usuario creado exitosamente.');

			redirect('backend/usuarios/ver-usuarios');
		}
		else
		{
			$data['title'] = 'Backend - Crear nuevo usuario';
			$data['user'] = $this->getSessionUserData();
			$data['contenido_principal'] = $this->load->view('crearUsuario', $data, true);
			$this->load->view('template/back/template', $data);
		}

	}

	function getRoleNameByRoleId($role_id)
	{
		$role_name = '';
		if ($role_id == 1)
		{
			$role_name = 'Administrador';
		}
		if ($role_id == 2)
		{
			$role_name = 'Recepcionista';
		}
		if ($role_id == 3)
		{
			$role_name = 'Gerente';
		}
		return $role_name;
	}

	public function loadUsers()
	{
		if($this->isSessionAdministrator())
		{
			$data['users'] = $this->user_model->getAllUsers();
			foreach ($data['users'] as $key => $value) 
			{
				$data['users'][$key]['privilege_name'] = $this->getRoleNameByRoleId($data['users'][$key]['user_role']);
			}
			$data['title'] = 'Backend - Ver usuarios';
			$data['user'] = $this->getSessionUserData();
			$data['contenido_principal'] = $this->load->view('verUsuarios', $data, true);
			// die_pre($data);
			$this->load->view('template/back/template', $data);
		}
		else
		{
			redirect('/');
		}
	}
	
	public function getUserDataByUserId($user_id)
	{
		$user_data = $this->user_model->getUserDataByUserId($user_id);
		return $user_data;
	}

	public function showUser($user_id)
	{
		if($this->isSessionAdministrator())
		{
			$data['user_info'] = $this->getUserDataByUserId($user_id);
			$data['user_info']['privilege_name'] = $this->getRoleNameByRoleId($data['user_info']['user_role']); 
			$data['title'] = 'Backend - '.$data['user_info']['name'];
			$data['user'] = $this->getSessionUserData();
			$data['contenido_principal'] = $this->load->view('verUnUsuario', $data, true);
			$this->load->view('template/back/template', $data);
		}
		else
		{
			redirect('/');
		}
	}
	
	function existUser($user_id)
	{
		return $this->user_model->existUser($user_id);
	}

	function isSessionUserId($user_id)
	{
		$user_data = $this->getSessionUserData();
		return $user_id != $user_data->id;
	}

	public function deleteUser($user_id)
	{
		if($this->isSessionAdministrator() && $this->existUser($user_id) && $this->isSessionUserId($user_id))
		{	
			$data['user_info'] = $this->getUserDataByUserId($user_id);
			$data['user_info']['privilege_name'] = $this->getRoleNameByRoleId($data['user_info']['user_role']); 
			$data['title'] = 'Backend - '.$data['user_info']['name'];
			$data['user'] = $this->getSessionUserData();
			$data['contenido_principal'] = $this->load->view('borrarUsuario', $data, true);
			$this->load->view('template/back/template', $data);
		}
		else
		{
			redirect('/');
		}
	}

	public function deleteUserAction($user_id)
	{
		$this->user_model->deleteUser($user_id);
		$this->session->set_flashdata('message','Usuario eliminado exitosamente.');
		redirect('backend/usuarios/ver-usuarios');
	}

	public function updateUser($user_id)
	{
		if($this->isSessionAdministrator() && $this->existUser($user_id))
		{	
			$data['user_info'] = $this->getUserDataByUserId($user_id);
			$data['user_info']['privilege_name'] = $this->getRoleNameByRoleId($data['user_info']['user_role']); 
			$data['title'] = 'Backend - '.$data['user_info']['name'];
			$data['user'] = $this->getSessionUserData();
			//die_pre($data);
			$data['contenido_principal'] = $this->load->view('modificarUsuario', $data, true);
			$this->load->view('template/back/template', $data);
		}
		else
		{
			redirect('/');
		}
	}

	public function updatingUser()
	{
		//die_pre($_POST);

		//DEFINIMOS LAS REGLAS
		$this->form_validation->set_rules('user_id', 'Id de usuario', 'required');
		$this->form_validation->set_rules('name', 'Nombre', 'required|trim');
		$this->form_validation->set_rules('user_name', 'Nombre de usuario', 'required|trim');

		if(!empty($this->input->post('pass')) || !empty($this->input->post('repass')))
		{
			$this->form_validation->set_rules('pass', 'Contraseña', 'required|min_length[6]|trim');
			$this->form_validation->set_rules('repass', 'Repetir contraseña', 'required|trim|min_length[6]|matches[pass]');
		}

		$this->form_validation->set_rules('user_role_id', 'Cargo', 'required|in_list[1,2,3]');

		//DEFINIR LOS MENSAJES
		$this->form_validation->set_message('required', '%s es requerido.');
		$this->form_validation->set_message('matches', 'Las contraseñas no coinciden.');
		$this->form_validation->set_message('min_length', 'Campo %s es muy corta.');
		$this->form_validation->set_message('in_list', 'Cargo incorrecto.');

		//DEFINIMOS EL ESTILO DEL MENSAJE DE ERROR
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

		if($this->form_validation->run())
		{
			$userUpdate = array(
				'name' => $this->input->post('name'),
				'user_name' => $this->input->post('user_name'),
				'user_role' => $this->input->post('user_role_id')
			);

			if(!empty($this->input->post('repass')))
				$userUpdate['pass'] = sha1($this->input->post('pass'));

			$user_id = $this->input->post('user_id');

			$this->user_model->updateUser($user_id, $userUpdate);

			$this->session->set_flashdata('message','Usuario actualizado exitosamente.');

			redirect('backend/usuarios/ver-usuarios');
		}
		else
		{
			$user_id = $this->input->post('user_id');
			$data['user_info'] = $this->getUserDataByUserId($user_id);
			$data['user_info']['privilege_name'] = $this->getRoleNameByRoleId($data['user_info']['user_role']); 
			$data['title'] = 'Backend - '.$data['user_info']['name'];
			$data['user'] = $this->getSessionUserData();
			//die_pre($data);
			$data['contenido_principal'] = $this->load->view('modificarUsuario', $data, true);
			$this->load->view('template/back/template', $data);
		}

	}
}
