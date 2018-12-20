<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_faktor extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function buat_kode()   {    
  		$this->db->select('RIGHT(tb_faktor.id_faktor,3) as kode', FALSE);
  		$this->db->order_by('id_faktor','DESC');    
  		$this->db->limit(1);     
  		$query = $this->db->get('tb_faktor');      //cek dulu apakah ada sudah ada kode di tabel.    
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
  		$kodejadi = "F".$kodemax;     
  		return $kodejadi;  
 	}

	public function get_id ($id){
		$query = $this->db->get_where('tb_faktor', array('id_faktor' => $id));
		return $query->result_array();
    }
	
	// Menampilkan data mahasiswa
	public function daftar_faktor($num,$offset) {
		$this->db->select('*');
  		$this->db->from('tb_faktor');
  		$this->db->order_by('id_faktor','asc');
  		$query = $this->db->get('',$num,$offset);
        return $query->result_array();	
	}

	// Model untuk menambah data kelas
	public function tambah($data_faktor) {
		$this->db->insert('tb_faktor', $data_faktor);
	}
	
	// Update data kelas
	public function edit($data_faktor) {
		$this->db->where('id_faktor', $data_faktor['id_faktor']);
		return $this->db->update('tb_faktor', $data_faktor);
	}
	
	// Hapus data siswa
	public function delete($id) {
		$this->db->where('id_faktor',$id);
		return $this->db->delete('tb_faktor');
	}

	public function get_cari_faktor($id) {
    $this->db->select('*');
    $this->db->where('id_faktor', $id);
    $query = $this->db->get('tb_faktor'); 
    	return $query->result_array();
	}

	public function get_faktor() {
		$this->db->select('*');
		//$this->db->where('flag','1');
   		$query = $this->db->get('tb_faktor');
		return $query->result_array();
	}

	public function getfaktorBygejala($id_gejala) {
		//return $id_gejala;
		$this->db->select('tb_faktor.id_faktor');
  		$this->db->from('tb_faktor','tb_kategori','tb_gejala');
  		$this->db->join('tb_kategori','tb_faktor.id_faktor = tb_kategori.id_faktor','left');
  		$this->db->join('tb_gejala','tb_kategori.id_kategori = tb_gejala.id_kategori','left');
  		$this->db->where('tb_gejala.id_gejala',$id_gejala);
  		$query = $this->db->get();
      	$result = $query->row();
    	return $result->id_faktor;
	}


    public function jumlah_faktor()
	{
		$this->db->select('*');
		$query = $this->db->get('tb_faktor'); 
		return $query->num_rows();
	}

	public function get_cari_sama($data_faktor) 
	{
   		$this->db->select('*');
      	$this->db->where('id_faktor', $data_faktor['id_faktor']);
      	$query = $this->db->get('tb_faktor');
    	return $query->num_rows();
	}
	
}
?>