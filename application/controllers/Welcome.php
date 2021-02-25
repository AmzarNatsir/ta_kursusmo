<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array("model_master"));
		date_default_timezone_set("Asia/Makassar");
	}

	public function index()
	{
		$data['data_paket'] = $this->model_master->ambil_data_paket();
		$data['data_instruktur'] = $this->model_master->ambil_data_instruktur();
		$this->load->view('home/index', $data);
	}
}
