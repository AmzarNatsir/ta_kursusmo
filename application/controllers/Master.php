<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array("model_master"));
		date_default_timezone_set("Asia/Makassar");
	}
	function _init()
	{
		$this->output->set_template('index');
	}
    public function data_mobil()
	{
		$this->_init();
		$data['list_data'] = $this->model_master->ambil_data_mobil();
		$this->load->view('admin/data_master/mobil/index', $data);
	}
}