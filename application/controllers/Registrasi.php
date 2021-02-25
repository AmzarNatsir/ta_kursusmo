<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model(array("model_registrasi"));
		date_default_timezone_set("Asia/Makassar");
	}

	public function index()
	{
		$this->load->view('registrasi/index');
	}
    public function simpan_data_reg()
    {
        $pass = MD5(trim($this->input->post("inp_passwd")));
        $data['no_identitas'] = $this->input->post("inp_no_identitas");
        $data['nama_lengkap'] = $this->input->post("inp_nama");
        $data['tempat_lahir'] = $this->input->post("inp_tmp_lahir");
        $data['tanggal_lahir'] = $this->input->post("inp_tgl_lahir");
        $data['email'] = $this->input->post("inp_email");
        $data['no_telepon'] = $this->input->post("inp_notel");
        $data['jenkel'] = $this->input->post("pil_jenkel");
        $data['alamat'] = $this->input->post("inp_alamat");
        $data['passwd'] = $pass;
        $data['tgl_registrasi'] = date("Y-m-d");
        $data['status_aktif'] = 1; //Aktif; 2: Tidak Aktif
        $this->model_registrasi->insert_registrasi($data);
        $this->session->set_flashdata("registrasi_info","Data anda berhasil disimpan. Silahkan login !");
        redirect("peserta");
    }
}
