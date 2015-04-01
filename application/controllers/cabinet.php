<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabinet extends CI_Controller {
	
	public function __construct() {
		session_start();
		parent::__construct();
		if (!isset($_SESSION["login"])) {
			redirect("admin");
		}
	}
	
	public function index()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[4]|matches[repeat_password]|md5");
		$this->form_validation->set_rules("repeat_password", "Repeat password", "trim|required|min_length[4]");
		if ($this->form_validation->run() !== FALSE) {
			
			$this->load->model("admin_model");
			$res = $this
				->admin_model
				->change_password(
					$this->input->post("password"), 
					$this->input->post("repeat_password")
			);
			if ($res) {
				echo "Пароли успешно изменены";
			} else {
				echo "В ходе смены пароля произошла ошибка!";
			}
		}
		$this->load->view('cabinet_view');
	}
}
