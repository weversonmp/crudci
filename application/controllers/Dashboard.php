<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		permission();
		$this->load->model("games_model");
	}


	public function index()
	{

		$this->load->model("games_model");
		$data["games"] = $this->games_model->index();
		$data["title"] = 'Dashboard - Codeigniter';


		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
		$this->load->view('pages/dashboard', $data);
	}
}
