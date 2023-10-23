<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


	public function index()
	{
		// print_r('<pre>');
		// print_r($_SESSION);
		// exit();

		if (isset($_SESSION['logged_user'])) {
			redirect('dashboard');
		}

		$data["title"] = 'Login - Codeigniter';

		$this->load->view('pages/login', $data);
	}

	public function store()
	{
		$this->load->model('login_model');

		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$user = $this->login_model->store($email, $password);

		if ($user) {
			$this->session->set_userdata("logged_user", $user);
			redirect("dashboard");
		} else {
			redirect("login");
		}
	}

	public function logout()
	{

		$this->session->unset_userdata("logged_user");
		redirect('login');
	}
}
