<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Rooms extends CI_Controller{

		//CONSTRUCTOR DE LA CLASE
		public function __construct()
		{
			parent::__construct();
			$this->load->model('signin_model');
			$this->load->model('user_model');
			$this->load->model('rooms_model');
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
		public function newRoom()
		{
			if ($this->isSessionAdministrator())
			{
				$data['title'] = 'Backend - Crear habitación';
				$data['user'] = $this->getSessionUserData();
				$data['contenido_principal'] = $this->load->view('crearHabitacion', $data, true);
				$this->load->view('template/back/template', $data);
			}
			else
			{
				redirect('/');
			}
		}

		public function createNewRoom()
		{
			//DEFINIMOS REGLAS
			$this->form_validation->set_rules('number','Número de habitación','required|trim|is_unique[rooms.number]');
			$this->form_validation->set_rules('room_name','Nombre de la habitación','required|trim');
			$this->form_validation->set_rules('capacity','Capacidad','required|in_list[2,4,6]');

			//DEFINIMOS LOS MENSAJES
			$this->form_validation->set_message('required','El campo %s es requerido');
			$this->form_validation->set_message('is_unique','El número de habitación %s ya existe');
			$this->form_validation->set_message('in_list','Capacidad no válida');

			//DEFINIMOS EL ESTILO DE LOS MENSAJES
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

			if ($this->form_validation->run())
			{
				$room = array(
					'number' => $this->input->post('number'),
					'room_name' => $this->input->post('room_name'),
					'capacity' => $this->input->post('capacity')
				);
				$this->rooms_model->createNewRoom($room);
				$room_id = $this->rooms_model->getRoomIdByRoomNumber($room['number']);
				$this->rooms_model->addToAvailableRooms($room_id);
				redirect('backend/habitaciones/ver-habitaciones');
			}
			else
			{
				$data['title'] = 'Backend - Crear habitación';
				$data['user'] = $this->getSessionUserData();
				$data['contenido_principal'] = $this->load->view('crearHabitacion', $data, true);
				$this->load->view('template/back/template', $data);
			}
		}

		function getAllRooms()
		{
			return $this->rooms_model->getAllRooms();
		}

		function isAvailable($available_value)
		{
			return $this->rooms_model->isAvailable($available_value);
		}

		public function loadRooms()
		{
			$data['title'] = 'Backend - Ver habitaciones';
			$data['user'] = $this->getSessionUserData();
			$data['rooms'] = $this->getAllRooms();
			foreach ($data['rooms'] as $key => $value) 
			{
				if ($this->isAvailable($data['rooms'][$key]['id']))
				{
					$data['rooms'][$key]['available_value'] = 'Disponible';
				}
				else
				{
					$data['rooms'][$key]['available_value'] = 'Reservada';
				}
			}
			// die_pre($data);
			$data['contenido_principal'] = $this->load->view('verHabitaciones', $data, true);
			$this->load->view('template/back/template', $data);
		}

		function getRoomDataByRoomNumber($room_number)
		{
			return $this->rooms_model->getRoomDataByRoomNumber($room_number);
		}

		public function showRoom($room_number)
		{
			$data['title'] = 'Backend - Ver habitación'.$room_number;
			$data['user'] = $this->getSessionUserData();
			$data['room_info'] = $this->getRoomDataByRoomNumber($room_number);
			$data['room_info']['available_value'] = $this->isAvailable($data['room_info']['available']);
			// die_pre($data);
			$data['contenido_principal'] = $this->load->view('verUnaHabitacion', $data, true);
			$this->load->view('template/back/template', $data);
		}

		public function updateRoom($room_number)
		{
			if ($this->isSessionAdministrator())
			{
				$data['title'] = 'Backend - Modificar habitación'.$room_number;
				$data['user'] = $this->getSessionUserData();
				$data['room_info'] = $this->getRoomDataByRoomNumber($room_number);
				$data['room_info']['available_value'] = $this->isAvailable($data['room_info']['available']);
				// die_pre($data);
				$data['contenido_principal'] = $this->load->view('modificarHabitacion', $data, true);
				$this->load->view('template/back/template', $data);
			}
			else
			{
				redirect('/');
			}
		}

		public function updatingRoom()
		{
			//DEFINIMOS REGLAS
			$this->form_validation->set_rules('number','Número de habitación','required|trim');
			$this->form_validation->set_rules('room_name','Nombre de la habitación','required|trim');
			$this->form_validation->set_rules('capacity','Capacidad','required|trim|in_list[2,4,6]');
			$this->form_validation->set_rules('available','Disponibilidad','required');

			//DEFINIMOS LOS MENSAJES
			$this->form_validation->set_message('required','El campo %s es requerido');
			$this->form_validation->set_message('is_unique','El número de habitación %s ya existe');
			$this->form_validation->set_message('in_list','Capacidad no válida');

			//DEFINIMOS EL ESTILO DE LOS MENSAJES
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

			if ($this->form_validation->run())
			{
				$room = array (
					'number' => $this->input->post('number'),
					'room_name' => $this->input->post('room_name'),
					'capacity' => $this->input->post('capacity'),
					'available' => $this->input->post('available')
				);
				$room_number = $this->input->post('number');

				$this->rooms_model->updateRoom($room,$room_number);

				$this->session->set_flashdata('message','Habitación actualizado exitosamente.');

				redirect('backend/habitaciones/ver-habitaciones');
			}
			else
			{
				$room_number = $this->input->post('number');
				$data['title'] = 'Backend - Modificar habitación'.$room_number;
				$data['user'] = $this->getSessionUserData();
				$data['room_info'] = $this->getRoomDataByRoomNumber($room_number);
				$data['room_info']['available_value'] = $this->isAvailable($data['room_info']['available']);
				$data['contenido_principal'] = $this->load->view('modificarHabitacion', $data, true);
				$this->load->view('template/back/template', $data);
			}
		}

		public function deleteRoom($room_number)
		{
			if ($this->isSessionAdministrator())
			{
				$data['title'] = 'Backend - Habitación'.$room_number;
				$data['user'] = $this->getSessionUserData();
				$data['room_info'] = $this->getRoomDataByRoomNumber($room_number);
				$data['room_info']['available_value'] = $this->isAvailable($data['room_info']['available']);
				// die_pre($data);
				$data['contenido_principal'] = $this->load->view('borrarHabitacion', $data, true);
				$this->load->view('template/back/template', $data);
			}	
			else
			{
				redirect('/');
			}
		}

		public function deletingRoom($room_number)
		{
			$this->rooms_model->deleteRoom($room_number);
			$this->session->set_flashdata('message','Habitación eliminada exitosamente.');
			redirect('backend/habitaciones/ver-habitaciones');
		}
	}
