<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

	public function kira_grade($markah){

		$query = "SELECT grade_desc, plus, grade_point FROM tbl_grade WHERE $markah BETWEEN min_marks and max_marks";
		// echo $query;
		$results = $this->db->query($query);

		foreach($results->result() as $row){
			$grade = $row->grade_desc;
			$plus = $row->plus;
			$grade_point = $row->grade_point;

			if($plus==1){
				$plus = "+";
			} else {
				$plus = "";
			}

			return $grade.$plus."|".$grade_point;
		}

	}

	public function kira_cgpa($studentid){

		$this->db->select("SUM(credit_hour) as credit_hour, SUM(credit_point) as credit_point");
		$this->db->where("id_student", $studentid);
		$query = $this->db->get("tbl_student_gpa");
		// echo $this->db->last_query();exit;
		foreach($query->result() as $row){

			$credit_hour = $row->credit_hour;
			$credit_point = $row->credit_point;

			if($credit_hour<>""){
				return $credit_hour."|".$credit_point;
			} else {
				return 0;
			}

		}

	}

	public function simpan_markah($data){

		$output = array(
			"id_student" => $data["id_student"],
			"student_year" => $data["student_year"],
			"id_subject" => $data["id_subject"],
			"marks" => $data["marks"],
			"percent" => $data["percent"],
			"grade" => $data["grade"],
			"grade_point" => $data["grade_point"],
			"credit_hour" => $data["credit_hour"],
			"credit_point" => $data["credit_point"],

	 	);

		$query = $this->db->insert("tbl_marks", $output);
		// echo $this->db->last_query();exit;
		if($query){
			return 1;
		} else {
			return 0;
		}

	}

	public function simpan_gpa($data){

		$output = array(
			"id_student" => $data["id_student"],
			"student_year" => $data["student_year"],
			"credit_hour" => $data["credit_hour"],
			"credit_point" => $data["credit_point"],
			"gpa" => $data["gpa"],
			"cgpa" => $data["cgpa"]
		);

		$query = $this->db->insert("tbl_student_gpa", $output);
		// echo $this->db->last_query();exit;
		if($query){
			return 1;
		} else {
			return 0;
		}

	}

}