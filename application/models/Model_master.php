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
    public function ambil_data_mobil_aktif()
    {
        return $this->db->where("status", 1)->get("master_mobil")->result_array();
    }
    public function insert_data_mobil($data)
    {
        $this->db->insert("master_mobil", $data);
    }
    public function profil_data_mobil($id)
    {
        return $this->db->where("id", $id)->get("master_mobil")->row();
    }
    public function update_data_mobil($id, $data)
    {
        $this->db->where("id", $id)
            ->update("master_mobil", $data);
    }
    public function hapus_data_mobil($id)
    {
        $this->db->where("id", $id)
            ->delete("master_mobil");
    }
    //data instruktur
    public function ambil_data_instruktur()
    {
        return $this->db->get("master_instruktur")->result_array();
    }
    public function insert_data_instruktur($data)
    {
        $this->db->insert("master_instruktur", $data);
    }
    public function profil_data_instruktur($id)
    {
        return $this->db->where("id", $id)->get("master_instruktur")->row();
    }
    public function update_data_instruktur($id, $data)
    {
        $this->db->where("id", $id)
            ->update("master_instruktur", $data);
    }
    public function delete_data_instruktur($id)
    {
        $this->db->where("id", $id)
            ->delete("master_instruktur");
    }
    function remove_gambar_instruktur($key)
    {
        $this->db->select("photo");
        $this->db->from("master_instruktur");
        $this->db->where('id', $key);
        $res = $this->db->get();
        $img = $res->row();
        if(!empty($img->photo))
        {
            unlink(FCPATH.'assets/upload/instruktur/'.$img->photo);
        }
    }
    //master paket
    function ambil_data_paket()
    {
        $this->db->select("a.*, b.nopol, b.nama_mobil")
                ->from("master_paket a")
                ->from("master_mobil b")
                ->where("a.id_mobil=b.id")
                ->order_by("a.tgl_posting", "desc");
        return $this->db->get()->result_array();
    }
    function insert_data_paket($data)
    {
        $this->db->insert("master_paket", $data);
    }
    function get_profil_paket($id_paket)
    {
        return $this->db->where("id", $id_paket)->get("master_paket")->row();
    }
    public function update_data_paket($id, $data)
    {
        $this->db->where("id", $id)
            ->update("master_paket", $data);
    }
    public function hapus_data_paket($id)
    {
        $this->db->where("id", $id)
            ->delete("master_paket");
    }
}