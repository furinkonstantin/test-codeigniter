<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		session_start();
	}
	
	public function index() {
		if (isset($_SESSION["login"])) {
			redirect("cabinet");
		}
		$this->load->library("form_validation");
		$this->form_validation->set_rules("login", "Login", "required");
		$this->form_validation->set_rules("password", "Password", "required|min_length[4]");
		if ($this->form_validation->run() !== FALSE) {
			$this->load->model("admin_model");
			$res = $this
				->admin_model
				->verify_user(
					$this->input->post("login"), 
					$this->input->post("password")
			);
			if ($res !== FALSE) {
				$_SESSION["id"] = $res->id;
				$_SESSION["login"] = $this->input->post("login");
				redirect("cabinet");
			}
		}
		$ajaxRequest = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
		if(!$ajaxRequest) {
			$this->load->view('login_view');
		} else {
			$this->load->view('login/login_form');
		}
	}
	
			
	public function logout() {
		session_destroy();
		$this->load->view("login_view");
	}
}
