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
	//data mobil
    public function data_mobil()
	{
		$this->_init();
		$data['list_data'] = $this->model_master->ambil_data_mobil();
		$this->load->view('admin/data_master/mobil/index', $data);
	}
	public function simpan_data_mobil()
	{
		$data['nopol'] = $this->input->post("inp_nopol");
		$data['nama_mobil'] = $this->input->post("inp_nama_mobil");
		$data['warna'] = $this->input->post("inp_warna");
		$data['tahun'] = $this->input->post("inp_tahun");
		$data['status'] = $this->input->post("pil_kondisi");
		$this->model_master->insert_data_mobil($data);
		$this->session->set_flashdata("konfirm", "Data berhasil disimpan");
		redirect("master/data_mobil");
	}
	public function edit_data_mobil()
	{
		$id_tabel = $this->uri->segment(3);
		$data['res'] = $this->model_master->profil_data_mobil($id_tabel);
		$this->load->view("admin/data_master/mobil/edit", $data);
	}
	public function rubah_data_mobil()
	{
		$id_data = $this->input->post("id_tabel");
		$update['nopol'] = $this->input->post("inp_nopol");
		$update['nama_mobil'] = $this->input->post("inp_nama_mobil");
		$update['warna'] = $this->input->post("inp_warna");
		$update['tahun'] = $this->input->post("inp_tahun");
		$update['status'] = $this->input->post("pil_kondisi");
		$this->model_master->update_data_mobil($id_data, $update);
		$this->session->set_flashdata("konfirm", "Data berhasil disimpan");
		redirect("master/data_mobil");
	}
	public function hapus_data_mobil()
	{
		$id_data = $this->input->post("id_data");
		$this->model_master->hapus_data_mobil($id_data);
		echo "Data berhasil di hapus";
	}
	//instruktur
	public function data_instruktur()
	{
		$this->_init();
		$data['list_data'] = $this->model_master->ambil_data_instruktur();
		$this->load->view('admin/data_master/instruktur/index', $data);
	}
	public function simpan_data_instruktur()
	{
		if(!empty($_FILES["inp_gambar"]["name"]))
		{
			$nm_fl = time().date('dmY');
			$fl_1 = $this->upload_gambar($nm_fl);
			if ($fl_1 != false) 
			{
				$smp_file = $fl_1;
				$data['nama_instruktur'] = trim($this->input->post("inp_nama"));
				$data['tempat_lahir'] = trim($this->input->post("inp_tempat_lahir"));
				$data['tanggal_lahir'] = trim($this->input->post("inp_tanggal_lahir"));
				$data['jenkel'] = trim($this->input->post("pil_jenkel"));
				$data['no_identitas'] = trim($this->input->post("inp_no_identitas"));
				$data['alamat'] = trim($this->input->post("inp_alamat"));
				$data['no_telepon'] = trim($this->input->post("inp_notel"));
				$data['status_aktif'] = trim($this->input->post("pil_status"));
				$data['photo'] = $smp_file;
				$this->model_master->insert_data_instruktur($data);
				$pesan = "Data berhasil disimpan";
			} else {
				$pesan = "Data gagal disimpan. Periksa tipe file yang anda upload";
			}
			$this->session->set_flashdata("konfirm", $pesan);
			redirect("master/data_instruktur");
		}
	}
	public function edit_data_instruktur()
	{
		$id_tabel = $this->uri->segment(3);
		$data['res'] = $this->model_master->profil_data_instruktur($id_tabel);
		$this->load->view("admin/data_master/instruktur/edit", $data);
	}
	public function rubah_data_instruktur()
	{
		$id_data = $this->input->post("id_tabel");
		if(!empty($_FILES["inp_gambar"]["name"]))
		{
			$nm_fl = time().date('dmY');
			$fl_1 = $this->upload_gambar($nm_fl);
			if ($fl_1 != false) 
			{
				$smp_file = $fl_1;
				$data['nama_instruktur'] = trim($this->input->post("inp_nama"));
				$data['tempat_lahir'] = trim($this->input->post("inp_tempat_lahir"));
				$data['tanggal_lahir'] = trim($this->input->post("inp_tanggal_lahir"));
				$data['jenkel'] = trim($this->input->post("pil_jenkel"));
				$data['no_identitas'] = trim($this->input->post("inp_no_identitas"));
				$data['alamat'] = trim($this->input->post("inp_alamat"));
				$data['no_telepon'] = trim($this->input->post("inp_notel"));
				$data['status_aktif'] = trim($this->input->post("pil_status"));
				$data['photo'] = $smp_file;
				$this->model_master->remove_gambar_instruktur($id_data);
				$this->model_master->update_data_instruktur($id_data, $data);
				$pesan = "Data berhasil disimpan";
			} else {
				$pesan = "Data gagal disimpan. Periksa tipe file yang anda upload";
			}
		} else {
			$data['nama_instruktur'] = trim($this->input->post("inp_nama"));
			$data['tempat_lahir'] = trim($this->input->post("inp_tempat_lahir"));
			$data['tanggal_lahir'] = trim($this->input->post("inp_tanggal_lahir"));
			$data['jenkel'] = trim($this->input->post("pil_jenkel"));
			$data['no_identitas'] = trim($this->input->post("inp_no_identitas"));
			$data['alamat'] = trim($this->input->post("inp_alamat"));
			$data['no_telepon'] = trim($this->input->post("inp_notel"));
			$data['status_aktif'] = trim($this->input->post("pil_status"));
			$this->model_master->update_data_instruktur($id_data, $data);
			$pesan = "Data berhasil disimpan";
		}
		$this->session->set_flashdata("konfirm", $pesan);
		redirect("master/data_instruktur");
	}
	public function hapus_data_instruktur()
	{
		$id_data = $this->input->post("id_data");
		$this->model_master->remove_gambar_instruktur($id_data);
		$this->model_master->delete_data_instruktur($id_data);
		echo "Data berhasil di hapus";
	}
	//upload file
	private function upload_gambar($nm_file)
	{
		$config['upload_path'] = 'assets/upload/instruktur/';
		$config['allowed_types'] = 'jpg|jpeg|jpg|png';
		$config['file_name'] = $nm_file;
		$config['remove_spaces'] = TRUE;
        $config['overwrite'] = TRUE;
	    $filename = $config['file_name'];

		$this->load->library('upload');
	    $this->upload->initialize($config);

	    if ( ! $this->upload->do_upload('inp_gambar'))
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
}