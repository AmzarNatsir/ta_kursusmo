<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function _init()
	{
		$this->output->set_template('index');
	}

	public function index()
	{
		$this->_init();
		$this->load->view('admin/index');
	}
}
