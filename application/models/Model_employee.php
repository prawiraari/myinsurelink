<?php
class Model_employee extends CI_Model {

	function login($param) {
		$this->db->select('u.Salt');
		$this->db->from('user u');
		$this->db->join("email AS e", "e.UserID=u.UserID", "LEFT OUTER");
		$this->db->where("e.EmailAddress", $param["EmailAddress"]);
		$salt_query = $this->db->get();

		if ($salt_query->num_rows() == 1) {
			$row = $salt_query->row(); 
   			$salt = base64_decode($row->Salt);
		} else {
			$salt = "";
		}
		
		$this->db->select("em.EmployeeID, em.UserID, em.Name, e.EmailAddress, em.Active");
		$this->db->from("employee em");
		$this->db->join("user AS u", "em.UserID=u.UserID", "LEFT OUTER");
		$this->db->join("email AS e", "em.UserID=e.UserID", "LEFT OUTER");
		$this->db->where("e.EmailAddress", $param["EmailAddress"]);
		$this->db->where("em.Active", 1);
		$this->db->where("u.Password", hash("sha256", $param["Password"].$salt));
		
		$query = $this->db->get();

		if ($query->num_rows() == 1){
			$row = $query->row(); 
			return $row;
		} else {
			return false;
		}
	}
	
	function add($param) {
		$query = array(
			"UserID" => $param["UserID"],
			"Name" => $param["FirstName"]." ".$param["LastName"],
			"FirstName" => $param["FirstName"],
			"LastName" => $param["LastName"],
			"Active" => ($param["Status"]=="1" ? 1 : 0 ),
			"Created" => date('Y-m-d H:i:s')
		);
		
		$this->db->insert('employee', $query);
		$data["EmployeeID"] = $this->db->insert_id();
		return $data;
	}

	function check($email) {
		$this->db->select("*");
		$this->db->from("employee em");
		$this->db->join("email AS e", "e.UserID=em.UserID", "LEFT OUTER");
		$this->db->where("e.EmailAddress", $email);
		$query = $this->db->get();

		if ($query->num_rows() >= 1) {
   			return true;
		} else {
			return false;
		}
	}

	function get($employee_id) {
		$this->db->select("em.EmployeeID, em.UserID, e.EmailID, e.EmailAddress, em.FirstName, em.LastName, em.Active, u.PasswordResetCode");
		$this->db->from("employee em");
		$this->db->join("user AS u", "em.UserID=u.UserID", "LEFT OUTER");
		$this->db->join("email AS e", "e.UserID=u.UserID", "LEFT OUTER");
		$this->db->where("em.EmployeeID", $employee_id);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			$row = $query->row(); 
   			return $row;
		} else {
			return false;
		}
	}

	function get_by_email($email) {
		$this->db->select("em.FirstName, em.LastName");
		$this->db->from("employee em");
		$this->db->join("user AS u", "em.UserID=u.UserID", "LEFT OUTER");
		$this->db->join("email AS e", "e.UserID=u.UserID", "LEFT OUTER");
		$this->db->where("e.EmailAddress", $email);
		$query = $this->db->get();

		if ($query->num_rows() == 1) return $query->row();
		else return false;
	}

	function get_by_user_id($user_id_id) {
		$this->db->select("em.EmployeeID, e.EmailID, e.EmailAddress, em.FirstName, em.LastName, em.Active");
		$this->db->from("employee em");
		$this->db->join("user AS u", "em.UserID=u.UserID", "LEFT OUTER");
		$this->db->join("email AS e", "e.UserID=u.UserID", "LEFT OUTER");
		$this->db->where("em.UserID", $user_id_id);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$row = $query->row(); 
   			return $row;
		} else {
			return false;
		}
	}

	function listing($param) {
		$this->db->select("em.EmployeeID, e.EmailAddress, em.FirstName, em.LastName, em.Active, 
			em.Created, em.Updated");
		$this->db->from("employee em");
		$this->db->join("user AS u", "em.UserID=u.UserID", "LEFT OUTER");
		$this->db->join("email AS e", "em.UserID=e.UserID", "LEFT OUTER");
		if ($param["Active"] != "-1") {
			$this->db->where("em.Active", $param["Active"]);
		}
		
		$query = $this->db->get();

		return $query->result();
	}

	function update($param) {
		$this->db->set('Name', $param["FirstName"]." ".$param["LastName"]);
		$this->db->set('FirstName', $param["FirstName"]);
		$this->db->set('LastName', $param["LastName"]);
		$this->db->set('Active', $param["Status"]);
		$this->db->set('Updated', date('Y-m-d H:i:s'));
		$this->db->where('EmployeeID', $param["EmployeeID"]);
		$this->db->update('employee');
	}

}