<?php

class Rooms_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function createNewRoom($room)
	{
		$this->db->insert('rooms',$room);
	}

	function getAllRooms()
	{
		$query = $this->db->get('rooms');
		return $query->result_array();
	}

	function getRoomIdByRoomNumber($number)
	{
		$query = $this->db->get_where('rooms',array('number' => $number));
		return $query->row()->id;
	}

	function getRoomDataByRoomNumber($room_number)
	{
		$query = $this->db->get_where('rooms',array('number' => $room_number));
		return $query->row_array();
	}

	function updateRoom($room,$room_number)
	{
		$this->db->where('number', $room_number);
		$this->db->update('rooms', $room);
	}

	function deleteRoom($room_number)
	{
		$this->db->delete('rooms',array('number' => $room_number));
	}

	function addToAvailableRooms($room_id)
	{
		$this->db->insert('available_rooms',array('avalaible_room_id' => $room_id));
	}

	function isAvailable($room_id)
	{
		$query = $this->db->get_where('available_rooms', array('available_room_id' => $room_id));
		return $query->num_rows() == 1;
	}

	function getRoomNumberByRoomId($room_id)
	{
		$query = $this->db->get_where('rooms',array('id' => $room_id));
		return $query->row()->number;
	}
}

