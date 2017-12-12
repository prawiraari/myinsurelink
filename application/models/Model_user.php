<?php
class Model_user extends CI_Model {

	function add($param) {
		$random = strtoupper(random_string('alpha', 20));
		$salt = openssl_random_pseudo_bytes(32);

		$query = array(
			"Password" => hash("sha256", $param["Password"].$salt),
			"Salt" => base64_encode($salt),
			"FailedAttemptCount" => 0,
			"PasswordResetCode" => $random,
			"PasswordResetCodeExp" => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s')." +1 day")),
			"Created" => date('Y-m-d H:i:s')
		);

		$this->db->insert('user', $query);
		$data["UserID"] = $this->db->insert_id();
		return $data;
	}

	function get($UserID) {
		$this->db->select("LastLoginSuccess, LastLoginSuccessIPAddress, LastLoginFailed, FailedAttemptCount, PasswordResetCode, PasswordResetCodeExp");
		$this->db->from("user");
		$this->db->where("UserID", $UserID);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			$row = $query->row(); 
   			return $row;
		} else {
			return false;
		}

		return $data;
	}

	function get_by_dynamic_code($dynamic_code) {
		$this->db->select("UserID");
		$this->db->from("user");
		$this->db->where("PasswordResetCode", $dynamic_code);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$row = $query->row(); 
   			return $row;
		} else {
			return false;
		}
	}

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

		$this->db->select("u.UserID, c.CustomerID, c.CustomerTypeID, c.Name, e.EmailAddress");
		$this->db->from("user u");
		$this->db->join("customer AS c", "c.UserID=u.UserID", "LEFT OUTER");
		$this->db->join("email AS e", "e.UserID=c.UserID", "LEFT OUTER");
		$this->db->where("e.EmailAddress", $param["EmailAddress"]);
		$this->db->where("c.CustomerTypeID", $param["CustomerTypeID"]);
		$this->db->where("u.Password", hash("sha256", $param["Password"].$salt));
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$row = $query->row(); 
			return $row;
		} else {
			return false;
		}
	}

	function update_last_login_failed($EmailAddress) {
		$this->db->set("FailedAttemptCount", "`FailedAttemptCount`+1", FALSE);
		$this->db->set("LastLoginFailed", date('Y-m-d H:i:s'));
		$this->db->where("UserID IN (SELECT UserID FROM email WHERE EmailAddress='".$EmailAddress."')");
		$this->db->update('user');
	}

	function update_last_login_success($EmailAddress) {
		$this->db->set("FailedAttemptCount", 0);
		$this->db->set("LastLoginSuccess", date('Y-m-d H:i:s'));
		$this->db->set("LastLoginSuccessIPAddress", "INET6_ATON('".$this->input->ip_address()."')", FALSE);
		$this->db->where("UserID IN (SELECT UserID FROM email WHERE EmailAddress='".$EmailAddress."')");
		$this->db->update('user');
	}

	function update_password($param) {
		$salt = openssl_random_pseudo_bytes(32);

		$this->db->set('Password', hash("sha256", $param["Password"].$salt));
		$this->db->set('Salt', base64_encode($salt));
		$this->db->where('UserID', $param["UserID"]);
		$this->db->update('user');
	}

}