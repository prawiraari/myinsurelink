<?php
class Model_product extends CI_Model {

	function get_by_key($ProductKey) {
		$this->db->select("ProductID");
		$this->db->from("product");
		$this->db->where("ProductKey", $ProductKey);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$row = $query->row(); 
   			return $row;
		} else {
			return false;
		}
	}

	function get_travel($ProductID, $ValidPeriod) {
		$this->db->select("pt.Type, ptr.Rate");
		$this->db->from("product_travel pt");
		$this->db->join("product_travel_rate AS ptr", "pt.ProductTravelID=ptr.ProductTravelID", "LEFT OUTER");
		$this->db->where("pt.ProductID", $ProductID);
		if($ValidPeriod == '15')
		{
			$this->db->where('ptr.MinDay >=', 1);
			$this->db->where('ptr.MaxDay <=', 15);
		}
		else
		{
			$this->db->where('ptr.MinDay >=', 15);
			$this->db->where('ptr.MaxDay <=', 30);
		}
		
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$row = $query->row(); 
   			return $row;
		} else {
			return false;
		}
	}
}