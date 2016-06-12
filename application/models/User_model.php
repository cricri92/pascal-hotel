<?php 

class User_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getUserDataByUserName($user_name)
	{
		$query = $this->db->get_where('users', array('user_name' => $user_name));
		return $query->row();
	}

	function getSessionUserData($user_id)
	{
		$query = $this->db->get_where('users', array('id' => $user_id));
		return $query->row();
	}

	function isSessionAdministrator($user_id)
	{
		$query = $this->db->get_where('users', array('id' => $user_id));
		return $query->row()->user_role == 1;
	}

	function createUser($user)
	{
		$this->db->insert('users', $user);
	}

	function getAllUsers()
	{
		$query = $this->db->get('users');
		return $query->result_array();
	}

	function getUserDataByUserId($user_id)
	{
		$query = $this->db->get_where('users',array('id' => $user_id));
		return $query->row_array();
	}

	function existUser($user_id)
	{
		$query = $this->db->get_where('users',array('id' => $user_id));
		return $query->num_rows() == 1;
	}

	function deleteUser($user_id)
	{
		$this->db->delete('users',array('id' => $user_id));
	}

	function updateUser($user_id, $userUpdate)
	{
		$this->db->where('id', $user_id);
		$this->db->update('users', $userUpdate);
	}
}

?>