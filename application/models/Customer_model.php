<?php 

class Customer_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getCustomerDataByCustomerCedula($cedula)
	{
		$query = $this->db->get_where('customers', array('cedula' => $cedula));
		return $query->row_array();
	}

	function getSessionUserData($user_id)
	{
		$query = $this->db->get_where('customers', array('id' => $user_id));
		return $query->row();
	}

	function isSessionAdministrator($user_id)
	{
		$query = $this->db->get_where('customers', array('id' => $user_id));
		return $query->row()->user_role == 1;
	}

	function createCustomer($customer)
	{
		$this->db->insert('customers', $customer);
	}

	function getAllCustomers()
	{
		$query = $this->db->get('customers');
		return $query->result_array();
	}

	function getCustomerInfoByCustomerId($customer_id)
	{
		$query = $this->db->get_where('customers',array('id' => $customer_id));
		return $query->row_array();
	}

	function existCustomer($cedula)
	{
		$query = $this->db->get_where('customers',array('cedula' => $cedula));
		return $query->num_rows() == 1;
	}

	function deleteCustomer($cedula)
	{
		$this->db->delete('customers',array('cedula' => $cedula));
	}

	function updateCustomer($customer_id, $customerUpdate)
	{
		$this->db->where('cedula', $customer_id);
		$this->db->update('customers', $customerUpdate);
	}

	function existCedula($cedula)
	{
		$query = $this->db->get_where('customers',array('cedula' => $cedula));
		return $query->num_rows() == 1;
	}

	function getCustomerIdByCustomerCedula($cedula)
	{
		$query = $this->db->get_where('customers',array('cedula' => $cedula));
		return $query->row()->id;
	}
}

?>