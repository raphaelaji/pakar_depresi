<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function get_id ($id){
		$query = $this->db->get_where('tb_user', array('id_user' => $id));
		return $query->result_array();
    }
	
	// Menampilkan data mahasiswa
	public function daftar_user($num,$offset) {
		$this->db->select('*');
  		$this->db->from('tb_user');
  		$this->db->order_by('id_user','asc');
  		$query = $this->db->get('',$num,$offset);
        return $query->result_array();	
	}

	// Model untuk menambah data kelas
	public function tambah($data_user) {
		$this->db->insert('tb_user', $data_user);
	}
	
	// Update data kelas
	public function edit($data_user) {
		$this->db->where('id_user', $data_user['id_user']);
		return $this->db->update('tb_user', $data_user);
	}
	
	// Hapus data siswa
	public function delete($id) {
		$this->db->where('id_user',$id);
		return $this->db->delete('tb_user');
	}

	public function get_cari_user($id) {
    $this->db->select('*');
    $this->db->where('id_user', $id);
    $query = $this->db->get('tb_user'); 
    	return $query->result_array();
	}

    public function jumlah_user()
	{
		$this->db->select('*');
		$query = $this->db->get('tb_user'); 
		return $query->num_rows();
	}

	public function get_cari_sama($data_user) 
	{
   		$this->db->select('*');
      	$this->db->where('id_user', $data_user['id_user']);
      	$query = $this->db->get('tb_user');
    	return $query->num_rows();
	}
	
}
?>