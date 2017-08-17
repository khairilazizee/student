<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

	public function count_all(){

		$query = $this->db->get("tbl_student");

		return $query->num_rows();

	}

	public function allStudent($search = "", $per_page, $uri){

		if($search<>""){
			$this->db->like("student_name", $search, "both");
		}

		$query = $this->db->get("tbl_student", $per_page, $uri);
		// echo $this->db->last_query();exit;
		return $query->result();

	}

	public function student_information($studentid,$year){

		$this->db->where("student_stuid", $studentid);
		$this->db->where("student_year", $year);
		$query = $this->db->get("tbl_student");

		return $query->result();

	}

}
