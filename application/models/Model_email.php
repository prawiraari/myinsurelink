<?php
class Model_email extends CI_Model {

	function add($param) {
		$query = array(
			"UserID" => $param["UserID"],
			"EmailAddress" => $param["EmailAddress"],
			"Confirmed" => 0,
			"Active" => 1,
			"CreatedBy" => $param["CreatedBy"],
			"Created" => date('Y-m-d H:i:s')
		);

		$this->db->insert('email', $query);
		$data["EmailID"] = $this->db->insert_id();

		return $data;
	}

	function check($param) {
		$this->db->select("*");
		$this->db->from("email");
		$this->db->where("EmailAddress", $param["EmailAddress"]);
		$this->db->where("UserID !=", $param["UserID"]);
		$query = $this->db->get();

		if ($query->num_rows() >= 1) {
   			return true;
		} else {
			return false;
		}
	}

	function get($EmailID) {
		$this->db->select('EmailAddress');
		$this->db->from('email');
		$this->db->where('EmailID', $EmailID);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	function update_confirmed($param) {
		$query = $this->db->query("UPDATE email SET ".
			"Confirmed=1, ".
			"UpdatedBy = CreatedBy ".
			"WHERE EmailID=".$param["EmailID"]);
	}

	function update($param)
	{
		$query = $this->db->query("UPDATE email SET ".
			"EmailAddress='".$this->db->escape_str($param["EmailAddress"])."', ".
			"UpdatedBy = CreatedBy ".
			"WHERE UserID=".$param["UserID"]);
	}

	function update_by_id($param) {
		$this->db->set('EmailAddress', $param["EmailAddress"]);
		$this->db->set('UpdatedBy', $this->session->userdata('admin_user_id'));
		$this->db->where('EmailID', $param["EmailID"]);
		$this->db->update('email');
	}

	function update_log($param) {
		$this->db->set('CreatedBy', $param["CreatedBy"]);
		$this->db->set('UpdatedBy', $param["UpdatedBy"]);
		$this->db->where('UserID', $param["UserID"]);
		$this->db->update('email');
	}

}