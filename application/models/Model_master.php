<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_master extends CI_Model {
	
	public function __construct(){
		$this->load->database();		
    }
    //Mobil
    public function ambil_data_mobil()
    {
        return $this->db->get("master_mobil")->result_array();
    }
}