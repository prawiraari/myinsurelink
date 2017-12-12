<?php
class Model_policy extends CI_Model {
	function add($param) {
		$insurance = [
			"ProductID" => $param["ProductID"],
			"InsuranceCode" => $param["InsuranceCode"],
			"ApprovalDate" => $param["ApprovalDate"],
			"ValidPeriod" => $param["ValidPeriod"],
			"Amount" => $param["Amount"]
		];

		$this->db->insert('insurance', $insurance);
		$InsuranceID = $this->db->insert_id();

		$travel = [
			"InsuranceID" => $InsuranceID
		];

		$this->db->insert('insurance_travel', $travel);

		$holder = [
			"InsuranceID" => $InsuranceID,
			"Name" => $param["Name"],
			"PhoneCode" => $param["PhoneCode"],
			"PhoneNumber" => $param["PhoneNumber"],
			"EmailAddress" => $param["EmailAddress"],
			"IDTypeID" => 3,
			"IDNumber" => $param["IDNumber"]
		];

		$this->db->insert('insurance_holder', $holder);

		$address = [
			"InsuranceID" => $InsuranceID,
			"Address1" => $param["Address1"],
			"Address2" => $param["Address2"],
			"PostalCode" => $param["PostalCode"],
			"City" => $param["City"],
			"StateProvince" => $param["StateProvince"]
		];

		$this->db->insert('insurance_address', $address);

		$passport = [
			"InsuranceID" => $InsuranceID,
			"ExpiryDate" => $param["ExpiryDate"]
		];

		$this->db->insert('insurance_passport', $passport);

		$nominee =[
			"InsuranceID" => $InsuranceID,
			"Name" => $param["NomineeName"],
			"Address1" => $param["NomineeAddress1"],
			"Address2" => $param["NomineeAddress2"],
			"PostalCode" => $param["NomineePostalCode"],
			"City" => $param["NomineeCity"],
			"StateProvince" => $param["NomineeStateProvince"],
			"PhoneCode" => $param["NomineePhoneCode"],
			"PhoneNumber" => $param["NomineePhoneNumber"],
			"Relationship" => $param["Relationship"],
			"SharePercentage" => $param["SharePercentage"]
		];

		$this->db->insert('insurance_nominee', $nominee);
		
		return $InsuranceID;
	}

	function get($InsuranceID) {
		$this->db->select('i.InsuranceID, i.InsuranceCode, i.Created, ih.Name, ih.EmailAddress, ih.PhoneCode, ih.PhoneNumber, ih.IDNumber, ip.ExpiryDate, i.ApprovalDate, i.ValidPeriod, ia.Address1, ia.Address2, ia.PostalCode, ia.City, ia.StateProvince, in.Name AS NomineeName, in.Address1 AS NomineeAddress1, in.Address2 AS NomineeAddress2, in.PostalCode AS NomineePostalCode, in.City AS NomineeCity, in.StateProvince AS NomineeStateProvince, in.PhoneCode AS NomineePhoneCode, in.PhoneNumber AS NomineePhoneNumber, in.Relationship, in.SharePercentage, i.Amount, i.ProductID');
		$this->db->from('insurance i');
		$this->db->join('insurance_holder AS ih', 'ih.InsuranceID = i.InsuranceID', 'LEFT');
		$this->db->join('insurance_travel AS it', 'it.InsuranceID = i.InsuranceID', 'LEFT');
		$this->db->join('insurance_address AS ia', 'ia.InsuranceID = i.InsuranceID', 'LEFT');
		$this->db->join('insurance_passport AS ip', 'ip.InsuranceID = i.InsuranceID', 'LEFT');
		$this->db->join('insurance_nominee AS in', 'in.InsuranceID = i.InsuranceID', 'LEFT');
		$this->db->where('i.InsuranceID', $InsuranceID);
		$query = $this->db->get();

		if($query->num_rows() == 1) return $query->row();
		else return false;
	}

	function listing() {
		$this->db->select('i.InsuranceID, i.InsuranceCode, i.Created, ih.Name, ih.EmailAddress, ih.PhoneCode, ih.PhoneNumber, ih.IDNumber, ip.ExpiryDate, i.ApprovalDate, i.ValidPeriod, ia.Address1, ia.Address2, ia.PostalCode, ia.City, ia.StateProvince, in.Name AS NomineeName, in.Address1 AS NomineeAddress1, in.Address2 AS NomineeAddress2, in.PostalCode AS NomineePostalCode, in.City AS NomineeCity, in.StateProvince AS NomineeStateProvince, in.PhoneCode AS NomineePhoneCode, in.PhoneNumber AS NomineePhoneNumber, in.Relationship, in.SharePercentage, i.Amount, i.ProductID');
		$this->db->from('insurance i');
		$this->db->join('insurance_holder AS ih', 'ih.InsuranceID = i.InsuranceID', 'LEFT');
		$this->db->join('insurance_travel AS it', 'it.InsuranceID = i.InsuranceID', 'LEFT');
		$this->db->join('insurance_address AS ia', 'ia.InsuranceID = i.InsuranceID', 'LEFT');
		$this->db->join('insurance_passport AS ip', 'ip.InsuranceID = i.InsuranceID', 'LEFT');
		$this->db->join('insurance_nominee AS in', 'in.InsuranceID = i.InsuranceID', 'LEFT');
		$query = $this->db->get();

		if($query->num_rows() > 0) return $query->result();
		else return false;
	}

	function check_exist($InsuranceCode) {
		$this->db->select('InsuranceID');
		$this->db->from('insurance');
		$this->db->where('InsuranceCode', $InsuranceCode);
		$query = $this->db->get();

		if($query->num_rows() > 0) return TRUE;
		else return FALSE;
	}
}