<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_peserta extends CI_Model {
	
	public function __construct(){
		$this->load->database();		
    }
	function get_profil_peserta($id_peserta) {
		return $this->db->where("id", $id_peserta)->get("master_peserta")->row();
	}
	public function update_data_peserta($id_peserta, $data)
	{
		$this->db->where("id", $id_peserta)->update("master_peserta", $data);
	}
	function remove_file_peserta($id_peserta, $jenis)
	{
		$this->db->where('id', $id_peserta);
		$img = $this->db->get("master_peserta")->row();
		if($jenis=="photo") {
			
			if(!empty($img->file_photo))
			{
				unlink(FCPATH.'assets/upload/peserta/'.$img->file_photo);
			}
		}
		if($jenis=="ktp") {
			
			if(!empty($img->file_ktp))
			{
				unlink(FCPATH.'assets/upload/peserta/'.$img->file_ktp);
			}
		}
		if($jenis=="sim") {
			
			if(!empty($img->file_sim))
			{
				unlink(FCPATH.'assets/upload/peserta/'.$img->file_sim);
			}
		}
	}
	function remove_file_pendaftaran($id)
	{
		$this->db->where('id', $id);
		$img = $this->db->get("tabel_peserta")->row();
		if(!empty($img->file_invoice))
			{
				unlink(FCPATH.'assets/upload/peserta/'.$img->file_invoice);
			}
	}
	//pendaftaran
	function insert_pendaftaran($data)
	{
		$this->db->insert("tabel_daftar", $data);
	}
	function update_pendaftaran($id, $data)
	{
		$this->db->where("id", $id)->update("tabel_daftar", $data);
	}
	function get_data_pendaftaran($id_peserta)
	{
		return $this->db->select("a.*, b.nama_paket, c.nama_mobil")
			->from("tabel_daftar a")
			->from("master_paket b")
			->from("master_mobil c")
			->where("a.id_paket=b.id")
			->where("b.id_mobil=c.id")
			->where("a.id_peserta", $id_peserta)
			->where_in("a.status_daftar", [1, 2, 3, 5])->get()->result_array();
	}
	function get_semua_data_pendaftaran_proses()
	{
		return $this->db->select("a.*, b.nama_paket, c.nama_mobil, d.nama_lengkap")
			->from("tabel_daftar a")
			->from("master_paket b")
			->from("master_mobil c")
			->from("master_peserta d")
			->where("a.id_paket=b.id")
			->where("b.id_mobil=c.id")
			->where("a.id_peserta=d.id")
			->where_in("a.status_daftar", [1, 3])->get()->result_array();
	}
	function get_profil_pendaftaran($id)
	{
		return $this->db->select("a.*, b.nama_paket, c.nama_mobil, d.nama_lengkap, d.jenkel, d.tempat_lahir, d.tanggal_lahir, d.no_identitas, d.alamat, d.no_telepon, d.file_ktp, d.file_photo, d.file_sim")
			->from("tabel_daftar a")
			->from("master_paket b")
			->from("master_mobil c")
			->from("master_peserta d")
			->where("a.id_paket=b.id")
			->where("b.id_mobil=c.id")
			->where("a.id_peserta=d.id")
			->where("a.id", $id)->get()->row();
	}
	//jadwal
	function get_semua_data_peserta_acc()
	{
		return $this->db->select("a.*, b.nama_paket, c.nama_mobil, d.nama_lengkap, d.jenkel, d.tempat_lahir, d.tanggal_lahir, d.no_identitas, d.alamat, d.no_telepon, d.file_ktp, d.file_photo, d.file_sim")
			->from("tabel_daftar a")
			->from("master_paket b")
			->from("master_mobil c")
			->from("master_peserta d")
			->where("a.id_paket=b.id")
			->where("b.id_mobil=c.id")
			->where("a.id_peserta=d.id")
			->where("a.status_daftar", 2)->get()->result_array();
	}
	function insert_jadwal($data)
	{
		$this->db->insert("tabel_jadwal", $data);
	}
	function get_jadwal_peserta()
	{
		return $this->db->select("a.*, e.nama_paket, f.nama_mobil, c.nama_lengkap, d.nama_instruktur")
			->from("tabel_jadwal a")
			->from("tabel_daftar b")
			->from("master_peserta c")
			->from("master_instruktur d")
			->from("master_paket e")
			->from("master_mobil f")
			->where("a.id_daftar=b.id")
			->where("b.id_paket=e.id")
			->where("e.id_mobil=f.id")
			->where("b.id_peserta=c.id")
			->where("a.id_instruktur=d.id")->get()->result_array();
	}
	function get_jadwal_peserta_per_peserta($id_daftar)
	{
		return $this->db->select("a.*, e.nama_paket, f.nama_mobil, c.nama_lengkap, d.nama_instruktur")
			->from("tabel_jadwal a")
			->from("tabel_daftar b")
			->from("master_peserta c")
			->from("master_instruktur d")
			->from("master_paket e")
			->from("master_mobil f")
			->where("a.id_daftar=b.id")
			->where("b.id_paket=e.id")
			->where("e.id_mobil=f.id")
			->where("b.id_peserta=c.id")
			->where("a.id_instruktur=d.id")
			->where("a.status IS NULL")
			->where("a.id_daftar", $id_daftar)
			->get()->row();
	}
}