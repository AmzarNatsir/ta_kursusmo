<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array("model_peserta", "model_master"));
		date_default_timezone_set("Asia/Makassar");
	}

	function _init()
	{
		$this->output->set_template('index');
	}
	//login
	public function index()
	{
		$this->load->view('admin/index');
	}
	public function proses_login()
	{
		$usr_dev = NMUSR;
        $pss_dev = PSUSR;
		$user_name = $this->input->post("inp_username");
		$user_passwd = $this->input->post("inp_passwd");
        if($usr_dev==$user_name && $pss_dev==$user_passwd)
        {
        	$sess = array("aktif_ses"=>"1", "user_ses"=>"Admin", "user_kat"=>"1");
            $this->session->set_userdata($sess);
            redirect("admin/utama");   
        }
        else
        {
            $this->session->set_flashdata("konfirm", "Maaf, Nama Pengguna atau Password Salah. Coba Lagi");
            redirect("admin");
        }
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("admin");
	}
	//halaman utama administrator
	public function utama()
	{
		$this->_init();
		$this->model_security->get_security_admin();
		$this->load->view('admin/utama');
	}
	//pendaftaran
	public function pendaftaran()
	{
		$this->_init();
		$this->model_security->get_security_admin();
		$data['data_pendaftar'] = $this->model_peserta->get_semua_data_pendaftaran_proses(); //1. Status Daftar
		$this->load->view('admin/pendaftaran/index', $data);
	}
	public function proses_pendaftaran()
	{
		$this->_init();
		$this->model_security->get_security_admin();
		$id_pendaftaran = $this->uri->segment(3);
		$data['res'] = $this->model_peserta->get_profil_pendaftaran($id_pendaftaran);
		$this->load->view('admin/pendaftaran/frm_acc', $data);

	}
	public function simpan_data_persetujuan()
	{
		$this->model_security->get_security_admin();
		$id_pendaftaran = $this->input->post("id_pendaftaran");
		$data['status_daftar'] = $this->input->post("pil_status");
		$data['keterangan'] = $this->input->post("inp_keterangan");
		$data['tgl_persetujuan'] = date("Y-m-d");
		$this->model_peserta->update_pendaftaran($id_pendaftaran, $data);
		$this->session->set_flashdata("konfirm", "Data persetujuan berhasil disimpan");
		redirect("admin/pendaftaran");
	}
	//Jadwal Kursus
	public function jadwal_kursus()
	{
		$this->_init();
		$this->model_security->get_security_admin();
		$data['data_peserta_acc'] = $this->model_peserta->get_semua_data_peserta_acc(); //1. Status Daftar
		$data['data_jadwal'] = $this->model_peserta->get_jadwal_peserta();
		$this->load->view('admin/jadwal_kursus/index', $data);
	}
	public function buat_jadwal_kursus()
	{
		$this->_init();
		$this->model_security->get_security_admin();
		$id_pendaftaran = $this->uri->segment(3);
		$data['res'] = $this->model_peserta->get_profil_pendaftaran($id_pendaftaran);
		$data['instrktur'] = $this->model_master->ambil_data_instruktur();
		$this->load->view('admin/jadwal_kursus/frm_buat_jadwal', $data);
	}
	public function simpan_data_jadwal()
	{
		$id_pendaftaran = $this->input->post("id_pendaftaran");
		$hari_pilihan = implode(",", $this->input->post("pil_hari"));
		$data['id_daftar'] = $id_pendaftaran;
		$data['jam'] = $this->input->post("pil_jam");
		$data['hari'] = $hari_pilihan;
		$data['id_instruktur'] = $this->input->post("pil_instruktur");
		$this->model_peserta->insert_jadwal($data);
		$update['status_daftar'] = 5; //Telah Terjadwal
		$this->model_peserta->update_pendaftaran($id_pendaftaran, $update);
		$this->session->set_flashdata("konfirm", "Data Jadwal berhasil disimpan");
		redirect("admin/jadwal_kursus");
	}
}
