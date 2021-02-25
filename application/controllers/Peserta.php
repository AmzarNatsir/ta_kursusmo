<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array("model_peserta", "model_master"));
		date_default_timezone_set("Asia/Makassar");
	}
    public function index()
    {
		$this->load->view('peserta/index');
    }
	public function proses_login()
	{
		$usr = $this->input->post("inp_email");
		$psw = MD5(trim($this->input->post("inp_passwd")));
		$this->db->where("email", $usr);
		$this->db->where("passwd", $psw);
		$this->db->where("status_aktif", 1);
		$result = $this->db->get('master_peserta')->row();
        if(!empty($result->id))
        {
            $sess = array(
                "idpeserta"=>$result->id,
                "nmpeserta"=>$result->nama_lengkap
            );
            $this->session->set_userdata($sess);
            redirect("peserta/utama");
        }
        else{
            $this->session->set_flashdata("konfirm_login", "Maaf, Nama Email atau Password yang anda masukkan salah.");
            redirect("peserta");
        }
	}
	public function utama()
	{
		$this->model_security->get_security_peseta();
		$id_peserta = $this->session->userdata("idpeserta");
		$data['profil'] = $this->model_peserta->get_profil_peserta($id_peserta);
		$data['data_paket'] = $this->model_master->ambil_data_paket();
		$data['data_pendaftaran'] = $this->model_peserta->get_data_pendaftaran($id_peserta);
		$this->load->view('peserta/utama', $data);
	}
	public function frm_dokumen()
	{
		$this->model_security->get_security_peseta();
		$id_peserta = $this->session->userdata("idpeserta");
		$data['profil'] = $this->model_peserta->get_profil_peserta($id_peserta);
		$this->load->view('peserta/frm_dokumen', $data);
	}
	public function simpan_data_dokumen()
	{
		$this->model_security->get_security_peseta();
		$id_peserta = $this->session->userdata("idpeserta");
		//file photo
		if(!empty($_FILES["inp_photo"]["name"]))
		{
			$nm_fl_1 = "photo-".time().date('dmY');
			$fl_1 = $this->upload_gambar($nm_fl_1, "inp_photo");
			if ($fl_1 != false) 
			{
				$smp_file_photo = $fl_1;
				$data['file_photo'] = $smp_file_photo;
				if(!empty($this->input->post("tmp_file_photo"))){
					$this->model_peserta->remove_file_peserta($id_peserta, "photo");
				}
				$this->model_peserta->update_data_peserta($id_peserta, $data);
			}
		}
		//file ktp
		if(!empty($_FILES["inp_ktp"]["name"]))
		{
			$nm_fl_2 = "ktp-".time().date('dmY');
			$fl_2 = $this->upload_gambar($nm_fl_2, "inp_ktp");
			if ($fl_2 != false) 
			{
				$smp_file_ktp = $fl_2;
				$data['file_ktp'] = $smp_file_ktp;
				if(!empty($this->input->post("tmp_file_ktp"))){
					$this->model_peserta->remove_file_peserta($id_peserta, "ktp");
				}
				$this->model_peserta->update_data_peserta($id_peserta, $data);
			}
		}
		//file sim
		if(!empty($_FILES["inp_sim"]["name"]))
		{
			$nm_fl_3 = "sim-".time().date('dmY');
			$fl_3 = $this->upload_gambar($nm_fl_3, "inp_sim");
			if ($fl_3 != false) 
			{
				$smp_file_sim = $fl_3;
				$data['file_sim'] = $smp_file_sim;
				if(!empty($this->input->post("tmp_file_sim"))){
					$this->model_peserta->remove_file_peserta($id_peserta, "sim");
				}
				$this->model_peserta->update_data_peserta($id_peserta, $data);
			}
		}
        redirect("peserta/utama");
	}
	public function upload_bukti_pembayaran()
	{
		$id_tabel = $this->input->post("id_daftar");
		if(!empty($_FILES["inp_invoice"]["name"]))
		{
			$nm_fl_inv = "bukti_pembayaran-".time().date('dmY');
			$fl = $this->upload_gambar($nm_fl_inv, "inp_invoice");
			if ($fl != false) 
			{
				$smp_file = $fl;
				$data['file_invoice'] = $smp_file;
				if(!empty($this->input->post("tmp_file_sim"))){
					$this->model_peserta->remove_file_pendaftaran($id_tabel);
				}
				$this->model_peserta->update_pendaftaran($id_tabel, $data);
			}
		}
        redirect("peserta/utama");
	}
	private function upload_gambar($nm_file, $inp_nama)
	{
		$config['upload_path'] = 'assets/upload/peserta/';
		$config['allowed_types'] = 'jpg|jpeg|jpg|png';
		$config['file_name'] = $nm_file;
		$config['remove_spaces'] = TRUE;
        $config['overwrite'] = TRUE;
	    $filename = $config['file_name'];

		$this->load->library('upload');
	    $this->upload->initialize($config);

	    if ( ! $this->upload->do_upload($inp_nama))
	    {
	        $error = array('error' => $this->upload->display_errors());
	        //print_r($error);
	        return false;
	    }
	    else
	    {
	        $data = array('upload_data' => $this->upload->data());
	       	return $filename.$data['upload_data']['file_ext'];
	    }
	}
	//Pilih Paket
	public function frm_pilih_paket()
	{
		$this->model_security->get_security_peseta();
		$id_peserta = $this->session->userdata("idpeserta");
		$id_paket = $this->uri->segment(3);
		$data['profil_paket'] = $this->model_master->get_profil_paket($id_paket);
		$this->load->view("peserta/frm_pilih_paket", $data);
	}
	public function simpan_pendaftaran()
	{
		$this->model_security->get_security_peseta();
		$id_peserta = $this->session->userdata("idpeserta");
		$id_paket = $this->input->post("id_paket");
		$no_daftar = rand(1000, 999999);
		$data['tgl_daftar'] = date("Y-m-d");
		$data['no_pendaftaran'] = $no_daftar;
		$data['id_peserta'] = $id_peserta;
		$data['id_paket'] = $id_paket;
		$data['biaya'] = $this->input->post("harga_paket");
		$data['jumlah_hari'] = $this->input->post("jumlah_hari");
		$data['status_daftar'] = 1; //1. Daftar, 2. Pendaftaran Disetujui, 3. Pendaftaran Dipending, 4. Pendaftaran Ditolak, 5. Telah Terjadwal
		$this->model_peserta->insert_pendaftaran($data);
		redirect("peserta/utama");
	}
	public function logout_peserta()
	{
		$this->session->sess_destroy();
		redirect("peserta");
	}
}