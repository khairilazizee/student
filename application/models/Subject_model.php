<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_model extends CI_Model {

	public function senarai_subject($year){

		$this->db->select("subject_desc, credit_hour, subject_code, id_subject");
		$this->db->where("subject_year", $year);
		$query = $this->db->get("tbl_subject");

		return $query->result();

	}

	public function view_markah($studentid,$year,$cond){

		if($cond=="top"){
			$this->db->where("tbl_marks.student_year", $year);
			$this->db->where("tbl_marks.id_student", $studentid);
			$this->db->from("tbl_marks");
			$this->db->join("tbl_subject","tbl_subject.subject_code=tbl_marks.id_subject","LEFT");
			$query = $this->db->get();
		} elseif($cond=="bottom"){
			$this->db->where("id_student", $studentid);
			$query = $this->db->get("tbl_student_gpa");
		}

		return $query->result();

	}

}