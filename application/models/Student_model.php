<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

	public function allStudent(){

		$query = $this->db->get("tbl_student");

		return $query->result();

	}

	public function student_information($studentid,$year){

		$this->db->where("student_stuid", $studentid);
		$this->db->where("student_year", $year);
		$query = $this->db->get("tbl_student");

		return $query->result();

	}

}