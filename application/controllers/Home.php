<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("subject_model");
		$this->load->model("student_model");

	}

	public function index(){

		$data["title"] = "Student List";

		$data["student_list"] = $this->student_model->allStudent();

		$this->load->view("main/header", $data);
		$this->load->view("main/topbar");
		$this->load->view("dashboard/v_student", $data);
		$this->load->view("main/footer");

	}

	public function mark($studentid,$year){

		$data["title"] = "Calculation";
		$data["student_information"] = $this->student_model->student_information($studentid,$year);
		$data['year1'] = $this->subject_model->senarai_subject($year);
		$data["student_year"] = $year;

		$this->load->view("main/header", $data);
		$this->load->view("main/topbar");
		$this->load->view("dashboard/v_dashboard", $data);
		$this->load->view("main/footer");

	}

}