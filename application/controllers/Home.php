<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("subject_model");
		$this->load->model("student_model");

	}

	public function index(){

		$search = $this->input->post("search_name");

		$this->load->library('pagination');

		$config['base_url'] = base_url()."home";
		$config['total_rows'] = $this->student_model->count_all();
		$config['per_page'] = 20;

		$this->pagination->initialize($config);

		$data["title"] = "Student List";
		$this->db->like("student_name", $search, "both");
		$data["student_list"] = $this->db->get("tbl_student", $config['per_page'], $this->uri->segment(2));

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

	public function view($studentid,$year){

		$data["title"] = "View Mark";
		$data["student_information"] = $this->student_model->student_information($studentid,$year);
		$data["student_marks"] = $this->subject_model->view_markah($studentid,$year,"top");
		$data["student_gpa"] = $this->subject_model->view_markah($studentid,$year,"bottom");
		$data["student_year"] = $year;

		$this->load->view("main/header", $data);
		$this->load->view("main/topbar");
		$this->load->view("dashboard/v_mark", $data);
		$this->load->view("main/footer");

	}

}
