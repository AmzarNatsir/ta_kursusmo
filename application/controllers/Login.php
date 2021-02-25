<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		//$this->load->model(array("model_registrasi"));
		date_default_timezone_set("Asia/Makassar");
	}

	public function index()
	{
		$this->load->view('login/index');
	}
}
