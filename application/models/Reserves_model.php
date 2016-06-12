<?php 

	class Reserves_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		function verifyAvailabilityInDB($verifyingData)
		{
			$query = $this->db->query("SELECT DISTINCT * FROM rooms AS RO JOIN reservationes AS RE ON RO.id != RE.room_id WHERE RE.check_in <= ? AND RE.check_out >= ?;", array($verifyingData['check_out'], $verifyingData['check_in']));
			return $query->result_array();
		}

		function insertReservation($reserve_info)
		{
			$this->db->insert('reservationes',$reserve_info);
		}

		function insertIntoReservedRooms($room_id)
		{
			$this->db->insert('reserved_rooms',array('reserved_room_id' => $room_id));
		}

		function deleteFromAvailableRooms($room_id)
		{
			$this->db->delete('available_rooms',array('available_room_id' => $room_id));
		}

		function getAllReserves()
		{
			$query = $this->db->get('reservationes');
			return $query->result_array();
		}

		function getAllTodayReserves($date)
		{
			$query = $this->db->query("SELECT DISTINCT * FROM rooms AS RO JOIN reservationes AS RE ON RO.id = RE.room_id WHERE RE.check_in = ?;", array($date));
			return $query->result_array();
		}
	}