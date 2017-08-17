<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("subject_model");
		$this->load->model("student_model");

	}

	public function index(){

		redirect("home");

	}

	public function item($search){

		$this->load->library('pagination');

		$data["search"] = $search;
		$data["count_search"] = $this->student_model->count_search($search);

		$config['base_url'] = base_url()."search/item/".$search;
		$config['total_rows'] = $this->student_model->count_search($search);
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

		$data["student_list"] = $this->student_model->allStudent($search, $config['per_page'], $this->uri->segment(4));

		$this->load->view("main/header", $data);
		$this->load->view("main/topbar");
		$this->load->view("dashboard/v_search", $data);
		$this->load->view("main/footer");

	}

}