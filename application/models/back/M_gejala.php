<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_gejala extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function buat_kode()   {    
  		$this->db->select('RIGHT(tb_gejala.id_gejala,3) as kode', FALSE);
  		$this->db->order_by('id_gejala','DESC');    
  		$this->db->limit(1);     
  		$query = $this->db->get('tb_gejala');      //cek dulu apakah ada sudah ada kode di tabel.    
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
  		$kodejadi = "G".$kodemax;     
  		return $kodejadi;  
 	}

	public function get_id ($id){
		$query = $this->db->get_where('tb_gejala', array('id_gejala' => $id));
		return $query->result_array();
    }
	
	// Menampilkan data mahasiswa
	public function daftar_gejala($num,$offset) {
		$this->db->select('tb_gejala.id_gejala,tb_gejala.gejala,tb_gejala.bobot_gj,tb_kategori.kategori');
  		$this->db->from('tb_gejala','tb_kategori');
  		$this->db->join('tb_kategori','tb_gejala.id_kategori = tb_kategori.id_kategori','left');
  		$this->db->order_by('id_gejala','asc');
  		$query = $this->db->get('',$num,$offset);
        return $query->result_array();	
	}

	// Model untuk menambah data kelas
	public function tambah($data_gejala) {
		$this->db->insert('tb_gejala', $data_gejala);
	}
	
	// Update data kelas
	public function edit($data_gejala) {
		$this->db->where('id_gejala', $data_gejala['id_gejala']);
		return $this->db->update('tb_gejala', $data_gejala);
	}
	
	// Hapus data siswa
	public function delete($id) {
		$this->db->where('id_gejala',$id);
		return $this->db->delete('tb_gejala');
	}

	public function get_cari_gejala($id) {
    $this->db->select('*');
    $this->db->where('id_gejala', $id);
    $query = $this->db->get('tb_gejala'); 
    	return $query->result_array();
	}

	public function get_gejala() {
   		$query = $this->db->get('tb_gejala');
		return $query->result_array();
	}
	public function get_gejalaByCat($kategori) {
		$this->db->select('*');
		$this->db->where('id_kategori', $kategori);
   		$query = $this->db->get('tb_gejala');
		return $query->result_array();
	}

	public function get_kategori() {
   		$query = $this->db->get('tb_kategori');
		return $query->result_array();
	}

    public function jumlah_gejala()
	{
		$this->db->select('*');
		$query = $this->db->get('tb_gejala'); 
		return $query->num_rows();
	}

	public function get_cari_sama($data_gejala) 
	{
   		$this->db->select('*');
      	$this->db->where('id_gejala', $data_gejala['id_gejala']);
      	$query = $this->db->get('tb_gejala');
    	return $query->num_rows();
	}

	public function getbobotBygejala($id_gejala){
		//return $data;
		$this->db->select('bobot_gj');
      	$this->db->where('id_gejala', $id_gejala);
      	$query = $this->db->get('tb_gejala');
      	$result = $query->row();
    	return $result->bobot_gj;
	}
	
}
?>