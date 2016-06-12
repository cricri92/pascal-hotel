<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Reserves extends CI_Controller{

		//CONSTRUCTOR DE LA CLASE
		public function __construct()
		{
			parent::__construct();
			$this->load->model('signin_model');
			$this->load->model('user_model');
			$this->load->model('customer_model');
			$this->load->model('rooms_model');
			$this->load->model('reserves_model');
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

		public function verifyAvailability()
		{
			$data['title'] = 'Backend - Verificar disponibilidad de habitaciones';
			$data['user'] = $this->getSessionUserData();
			$data['contenido_principal'] = $this->load->view('verificarDisponibilidad', $data, true);
			$this->load->view('template/back/template', $data);
		}

		function verifyAvailabilityInDB($verifyingData)
		{
			$habs = $this->reserves_model->verifyAvailabilityInDB($verifyingData);
			return $habs;
		}

		public function verifyingAvailability()
		{
			//DEFINICION DE REGLAS
			$this->form_validation->set_rules('check_in','Fecha de entrada','required');
			$this->form_validation->set_rules('check_out','Fecha de salida','required');
			
			//DEFINICION DE MENSAJES
			$this->form_validation->set_message('required','El campo %s es requerido');
			
			//DEFINICION DEL ESTILO DE ERRORES
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

			if($this->form_validation->run())
			{
				$date_in = new DateTime($this->input->post('check_in'));
				$date_out = new DateTime($this->input->post('check_out'));
				$check_in = $date_in->format('Y-m-d');
				$check_out = $date_out->format('Y-m-d');

				$verificacion = array(
					'check_in' => $check_in,
					'check_out' => $check_out
					);

				$check_in = $date_in->format('d-m-Y');
				$check_out = $date_out->format('d-m-Y');

				$available_rooms = $this->verifyAvailabilityInDB($verificacion);
				
				// die_pre($available_rooms);
				if(!empty($available_rooms))
				{
					if($check_in != $check_out)
					{
						$data['title'] = 'Backend - Habitaciones disponibles entre '.$check_in.' y '.$check_out;
					}
					else
					{
						$data['title'] = 'Backend - Habitaciones disponibles para la fecha '.$check_in;
					}
					$data['user'] = $this->getSessionUserData();
					$data['available_rooms'] = $available_rooms;
					$data['check_in'] = $check_in;
					$data['check_out'] = $check_out;
					$data['contenido_principal'] = $this->load->view('verHabitacionesDisponibles', $data, true);
					$this->load->view('template/back/template', $data);
				}
				else
				{
					if($check_in != $check_out){
						$this->session->set_flashdata('message','No hay habitaciones disponibles para estas fechas.');
					}
					else{
						$this->session->set_flashdata('message','No hay habitaciones disponibles para esta fecha.');
					}
					redirect('backend/reservas/verificar-disponibilidad');
				}
			}
			else
			{
				$data['title'] = 'Verificar disponibilidad';
				$data['user'] = $this->getSessionUserData();
				$data['contenido_principal'] = $this->load->view('verificarDisponibilidad', $data, true);
				$this->load->view('template/back/template', $data);
			}

		}

		function getRoomDataByRoomNumber($number)
		{
			return $this->rooms_model->getRoomDataByRoomNumber($number);
		}

		public function createReserve($number,$check_in,$check_out)
		{
			$data['title'] = 'Backend - Informacion de la habitacion a reservar';
			$data['user'] = $this->getSessionUserData();
			$data['room_info'] = $this->getRoomDataByRoomNumber($number);
			$data['reserve_info'] = array('check_in' => $check_in, 'check_out' => $check_out);
			// die_pre($data);
			$data['contenido_principal'] = $this->load->view('verHabitacionAReservar', $data, true);
			$this->load->view('template/back/template', $data);
		}

		public function loadNewReserve($number,$check_in,$check_out)
		{
			$data['title'] = 'Backend - Crear reservacion';
			$data['user'] = $this->getSessionUserData();
			$data['room_info'] = $this->getRoomDataByRoomNumber($number);
			$data['reserve_info'] = array('check_in' => $check_in, 'check_out' => $check_out);
			// die_pre($data);
			$data['contenido_principal'] = $this->load->view('reservarHabitacion', $data, true);
			$this->load->view('template/back/template', $data);
		}

		function existCedula($cedula)
		{
			return $this->customer_model->existCedula($cedula);
		}

		function getCustomerIdByCustomerCedula($cedula)
		{
			return $this->customer_model->getCustomerIdByCustomerCedula($cedula);
		}

		function getRoomIdByRoomNumber($room_number)
		{
			return $this->rooms_model->getRoomIdByRoomNumber($room_number);
		}

		public function reservingRoom()
		{
			//DEFINICION DE REGLAS
			$this->form_validation->set_rules('name','Nombre','required|trim');
			$this->form_validation->set_rules('cedula','Cedula','required|trim|integer|callback_existCedula');
			$this->form_validation->set_rules('capacity_check','Capacidad','required');
			$this->form_validation->set_rules('capacity','Capacidad',"required|in_list[2,4,6]|matches[capacity_check]");

			if($this->input->post('capacity') == 2 )
			{
				$this->form_validation->set_rules('cantidad_p','Cantidad de personas','required|in_list[1,2]');
			}
			elseif ($this->input->post('capacity') == 4) 
			{
				$this->form_validation->set_rules('cantidad_p','Cantidad de personas','required|in_list[1,2,3,4]');
			}
			elseif ($this->input->post('capacity') == 6)
			{
				$this->form_validation->set_rules('cantidad_p','Cantidad de personas','required|in_list[1,2,3,4,5,6]');
			}
			else
			{
				$this->form_validation->set_rules('cantidad_p','Cantidad de personas','required|in_list[1,2,3,4,5,6]');
			}

			$this->form_validation->set_rules('check_in_check','Fecha de entrada','required');
			$this->form_validation->set_rules('check_out_check','Fecha de salida','required');
			$this->form_validation->set_rules('check_in','Fecha de entrada','required|matches[check_in_check]');
			$this->form_validation->set_rules('check_out','Fecha de salida','required|matches[check_out_check]');
			$this->form_validation->set_rules('room_number_check','Numero de habitacion','required|trim');
			$this->form_validation->set_rules('room_number','Numero de habitacion','required|matches[room_number_check]');

			//DEFINICION DE MENSAJES
			$this->form_validation->set_message('required','El campo %s es requerido');
			$this->form_validation->set_message('integer','El campo %s solo debe contener numeros.');
			$this->form_validation->set_message('in_list','El campo %s tiene un valor incorrecto');
			$this->form_validation->set_message('matches','Los campos no coinciden.');
			$this->form_validation->set_message('existCedula','La cedula no esta registrada.');
			$this->form_validation->set_message('is_unique','%s erroneo.');

			//ESTABLECIMIENTO DEL ESTILO DE LOS ERRORES
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

			if ($this->form_validation->run())
			{
				$customer_id = $this->getCustomerIdByCustomerCedula($this->input->post('cedula'));
				$room_id = $this->getRoomIdByRoomNumber($this->input->post('room_number'));

				$date_in = new DateTime($this->input->post('check_in'));
				$date_out = new DateTime($this->input->post('check_out'));
				$check_in = $date_in->format('Y-m-d');
				$check_out = $date_out->format('Y-m-d');

				//PREPARANDO DATOS PARA LA INSERCION
				$reserve_info = array(
					'room_id' => $room_id,
					'customer_id' => $customer_id,
					'check_in' => $check_in,
					'check_out' => $check_out,
					'cant_personas' => $this->input->post('cantidad_p')
					);

				//CREANDO RESERVACION
				$this->reserves_model->insertReservation($reserve_info);
				//PONIENDO EN HABITACIONES RESERVADAS
				$this->reserves_model->insertIntoReservedRooms($room_id);
				//QUITANDO DE LAS HABITACIONES DISPONIBLES
				$this->reserves_model->deleteFromAvailableRooms($room_id);

				$this->session->set_flashdata('message','Habitacion reservada exitosamente!');
				redirect('backend/reservas/ver-reservas');
			}
			else
			{
				$number = $this->input->post('room_number');
				$check_in = $this->input->post('check_in');
				$check_out = $this->input->post('check_out');
				$data['title'] = 'Backend - Crear reservacion';
				$data['user'] = $this->getSessionUserData();
				$data['room_info'] = $this->getRoomDataByRoomNumber($number);
				$data['reserve_info'] = array('check_in' => $check_in, 'check_out' => $check_out);
				// die_pre($data);
				$data['contenido_principal'] = $this->load->view('reservarHabitacion', $data, true);
				$this->load->view('template/back/template', $data);
			}
		}

		function getAllReserves()
		{
			return $this->reserves_model->getAllReserves();
		}

		function getCustomerInfoByCustomerId($customer_id)
		{
			return $this->customer_model->getCustomerInfoByCustomerId($customer_id);
		}

		function getRoomNumberByRoomId($room_id)
		{
			return $this->rooms_model->getRoomNumberByRoomId($room_id);
		}

		public function loadReserves()
		{
			$data['title'] = 'Backend - Ver reservaciones';
			$data['user'] = $this->getSessionUserData();
			$data['reserves'] = $this->getAllReserves();
			foreach ($data['reserves'] as $key => $value)
			{
				$date_in = new DateTime($data['reserves'][$key]['check_in']);
				$date_out = new DateTime($data['reserves'][$key]['check_out']);
				$check_in = $date_in->format('d-m-Y');
				$check_out = $date_out->format('d-m-Y');
				$data['reserves'][$key]['check_in'] = $check_in;
				$data['reserves'][$key]['check_out'] = $check_out;
				$data['reserves'][$key]['customerInfo'] = $this->getCustomerInfoByCustomerId($data['reserves'][$key]['customer_id']);
				$data['reserves'][$key]['roomNumber'] = $this->getRoomNumberByRoomId($data['reserves'][$key]['room_id']);
			}
			$data['contenido_principal'] = $this->load->view('verTodasLasReservas', $data, true);
			// die_pre($data);
			$this->load->view('template/back/template', $data);
		}

		function getAllTodayReserves($date)
		{
			return $this->reserves_model->getAllTodayReserves($date);
		}

		public function loadTodayReserves()
		{
			$data['title'] = 'Backend - Ver reservaciones de hoy';
			$data['user'] = $this->getSessionUserData();
			$date = date('Y-m-d');
			$data['reserves'] = $this->getAllTodayReserves($date);
			foreach ($data['reserves'] as $key => $value)
			{
				$date_in = new DateTime($data['reserves'][$key]['check_in']);
				$date_out = new DateTime($data['reserves'][$key]['check_out']);
				$check_in = $date_in->format('d-m-Y');
				$check_out = $date_out->format('d-m-Y');
				$data['reserves'][$key]['check_in'] = $check_in;
				$data['reserves'][$key]['check_out'] = $check_out;
				$data['reserves'][$key]['customerInfo'] = $this->getCustomerInfoByCustomerId($data['reserves'][$key]['customer_id']);
				$data['reserves'][$key]['roomNumber'] = $this->getRoomNumberByRoomId($data['reserves'][$key]['room_id']);
			}
			// die_pre($date);
			$data['contenido_principal'] = $this->load->view('verReservacionesDeHoy', $data, true);
			$this->load->view('template/back/template', $data);
		}

	}