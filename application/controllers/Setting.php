<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("setting_model");

	}

	public function index(){

		redirect("home");

	}

	public function kira_grade(){

		$markah = $this->input->post("markah");

		$query = $this->setting_model->kira_grade($markah);

		echo $query;
		// echo $markah;

	}

	public function kira_cgpa(){

		$studentid = $this->input->post("studentid");

		$query = $this->setting_model->kira_cgpa($studentid);

		echo $query;

	}

}