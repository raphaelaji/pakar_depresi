<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pakar extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function get_id_kategori ($id_faktor){
		$query = $this->db->get_where('tb_kategori', array('id_faktor' => $id_faktor));
		return $query->result();
    }

    public function get_id_gejala ($id_kategori){
		$query = $this->db->get_where('tb_gejala', array('id_kategori' => $id_kategori));
		return $query->result();
    }
	
	// Menampilkan data mahasiswa
	public function daftar_pakar($num,$offset) {
		$this->db->select('tb_pakar.id_pakar,tb_faktor.faktor,tb_kategori.kategori,tb_kategori.bobot_kat,tb_gejala.gejala,tb_gejala.bobot_gj');
  		$this->db->from('tb_pakar','tb_faktor','tb_gejala','tb_kategori');
  		$this->db->join('tb_faktor','tb_pakar.id_faktor = tb_faktor.id_faktor','left');
  		$this->db->join('tb_kategori','tb_pakar.id_kategori = tb_kategori.id_kategori','left');
  		$this->db->join('tb_gejala','tb_pakar.id_gejala = tb_gejala.id_gejala','left');
  		$this->db->order_by('id_pakar','asc');
  		$query = $this->db->get('',$num,$offset);
        return $query->result_array();	
	}

	// Model untuk menambah data kelas
	public function tambah($data_pakar) {
		$this->db->insert('tb_pakar', $data_pakar);
	}
	
	// Update data kelas
	public function edit($data_pakar) {
		$this->db->where('id_pakar', $data_pakar['id_pakar']);
		return $this->db->update('tb_pakar', $data_pakar);
	}
	
	// Hapus data siswa
	public function delete($id) {
		$this->db->where('id_pakar',$id);
		return $this->db->delete('tb_pakar');
	}

	public function get_cari_pakar($id) {
    $this->db->select('*');
    $this->db->where('id_pakar', $id);
    $query = $this->db->get('tb_pakar'); 
    	return $query->result_array();
	}

	public function get_pakar() {
   		$query = $this->db->get('tb_pakar');
		return $query->result_array();
	}

	public function get_faktor() {
		$this->db->select('*');
		$this->db->from('tb_faktor');
		$this->db->order_by('id_faktor', 'asc');
   		$query = $this->db->get('');
		return $query->result_array();
	}

	public function get_kategori() {
		$this->db->select('*');
		$this->db->from('tb_kategori','tb_faktor');
		$this->db->join('tb_faktor','tb_kategori.id_faktor = tb_faktor.id_faktor','left');
		$this->db->order_by('id_kategori', 'asc');
   		$query = $this->db->get('');
		return $query->result_array();
	}

	public function get_gejala() {
		$this->db->order_by('id_gejala', 'asc');
		$this->db->join('tb_kategori','tb_gejala.id_kategori = tb_kategori.id_kategori','left');
   		$query = $this->db->get('tb_gejala');
		return $query->result_array();
	}

    public function jumlah_pakar()
	{
		$this->db->select('*');
		$query = $this->db->get('tb_pakar'); 
		return $query->num_rows();
	}

	public function get_cari_sama($data_pakar) 
	{
   		$this->db->select('*');
      	$this->db->where('id_faktor', $data_pakar['id_faktor']);
      	$this->db->where('id_kategori', $data_pakar['id_kategori']);
      	$this->db->where('id_gejala', $data_pakar['id_gejala']);
      	$query = $this->db->get('tb_pakar');
    	return $query->num_rows();
	}
	
}
?>