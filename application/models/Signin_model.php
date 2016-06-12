<?php 

class Signin_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function verifySession($data)
	{
		// SELECT * from users where user_name=$user_name AND pass=$pass
		$query = $this->db->get_where('users', $data);
		return $query->num_rows() == 1;
	}
}

?>