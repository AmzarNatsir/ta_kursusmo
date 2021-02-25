<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_registrasi extends CI_Model {
	
	public function __construct(){
		$this->load->database();		
    }
    function insert_registrasi($data)
    {
        $this->db->insert("master_peserta", $data);
    }
}