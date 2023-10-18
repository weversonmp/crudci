<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {


	public function index()
	{

		$this->load->model("games_model");
		$data["games"] = $this->games_model->index();
		$data["title"] = 'Games - Codeigniter';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
		$this->load->view('pages/games', $data);
		
	}
}
