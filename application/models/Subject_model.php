<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_model extends CI_Model {

	public function senarai_subject($year){

		$this->db->select("subject_desc, credit_hour, subject_code, id_subject");
		$this->db->where("subject_year", $year);
		$query = $this->db->get("tbl_subject");

		return $query->result();

	}

}