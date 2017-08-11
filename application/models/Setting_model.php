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
		$this->db->where("student_id", $studentid);
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

}