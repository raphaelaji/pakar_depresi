<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kategori extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function buat_kode()   {    
  		$this->db->select('RIGHT(tb_kategori.id_kategori,3) as kode', FALSE);
  		$this->db->order_by('id_kategori','DESC');    
  		$this->db->limit(1);     
  		$query = $this->db->get('tb_kategori');      //cek dulu apakah ada sudah ada kode di tabel.    
  		if($query->num_rows() <> 0){       
   		//jika kode ternyata sudah ada.      
   			$data = $query->row();      
   			$kode = intval($data->kode) + 1;     
  		}
  		else{       
   		//jika kode belum ada      
   			$kode = 1;     
  		}
  		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);    
  		$kodejadi = "K".$kodemax;     
  		return $kodejadi;  
 	}

	public function get_id ($id){
		$query = $this->db->get_where('tb_kategori', array('id_kategori' => $id));
		return $query->result_array();
    }
	
	// Menampilkan data mahasiswa
	public function daftar_kategori($num,$offset) {
		$this->db->select('tb_kategori.id_kategori,tb_faktor.faktor,tb_kategori.kategori,tb_kategori.bobot_kat');
  		$this->db->from('tb_kategori','tb_faktor');
  		$this->db->join('tb_faktor','tb_kategori.id_faktor = tb_faktor.id_faktor','left');
  		$this->db->order_by('id_kategori','asc');
  		$query = $this->db->get('',$num,$offset);
        return $query->result_array();	
	}

	// Model untuk menambah data kelas
	public function tambah($data_kategori) {
		$this->db->insert('tb_kategori', $data_kategori);
	}
	
	// Update data kelas
	public function edit($data_kategori) {
		$this->db->where('id_kategori', $data_kategori['id_kategori']);
		return $this->db->update('tb_kategori', $data_kategori);
	}
	
	// Hapus data siswa
	public function delete($id) {
		$this->db->where('id_kategori',$id);
		return $this->db->delete('tb_kategori');
	}

	// public function get_kelompok()
	// {
 //    	$query = $this->db->get('tb_kelompok'); 
 //    	return $query->result();
	// }

	// public function get_pelajaran()
	// {
 //    	$query = $this->db->get('tb_pelajaran'); 
 //    	return $query->result();
	// }

	// public function get_anjing_user($id)
	// {
	// 	$this->db->where('id_user', $id);
 //    $query = $this->db->get('tb_anjing'); 
 //    	return $query-> result() ;
	// }

	public function get_cari_kategori($id) {
    $this->db->select('*');
    $this->db->where('id_kategori', $id);
    $query = $this->db->get('tb_kategori'); 
    	return $query->result_array();
	}

	public function get_faktor() {
   		$query = $this->db->get('tb_faktor');
		return $query->result_array();
	}

	public function get_kategori() {
   		$query = $this->db->get('tb_kategori');
		return $query->result_array();
	}

    public function jumlah_kategori()
	{
		$this->db->select('*');
		$query = $this->db->get('tb_kategori'); 
		return $query->num_rows();
	}

	public function get_cari_sama($data_kategori) 
	{
   		$this->db->select('*');
      	$this->db->where('id_kategori', $data_kategori['id_kategori']);
      	$query = $this->db->get('tb_kategori');
    	return $query->num_rows();
	}
	
}
?>