<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("subject_model");
		$this->load->model("student_model");

	}

	public function index(){
		
		$_SESSION['search'] = "";
		$search = $this->input->post("search_name");
                
                if($search<>""){
                	$_SESSION['search'] = $search;
                }

                
                echo $_SESSION['search'];

		$this->load->library('pagination');

		$config['base_url'] = base_url()."home/index";
		$config['total_rows'] = $this->student_model->count_all();
		$config['per_page'] = 10;
		
		$config['full_tag_open'] = '<ul class="pagination" role="navigation" aria-label="Pagination">';
	        $config['full_tag_close'] = '</ul>';
	        $config['first_link'] = '<li><a href="'.base_url().'home/index">First</a></li>';
	        $config['last_link'] = false;
	        $config['first_tag_open'] = '<li>';
	        $config['first_tag_close'] = '</li>';
	        $config['prev_link'] = 'Previous';
	        $config['prev_tag_open'] = '<li class="pagination-previous">';
	        $config['prev_tag_close'] = '</li>';
	        $config['next_link'] = 'Next';
	        $config['next_tag_open'] = '<li class="pagination-next">';
	        $config['next_tag_close'] = '</li>';
	        $config['last_tag_open'] = '<li>';
	        $config['last_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="current"><a href="#">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$data["title"] = "Student List";

		$data["student_list"] = $this->student_model->allStudent($_SESSION['search'], $config['per_page'], $this->uri->segment(3));

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
