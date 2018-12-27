<?php
class M_pemeriksaan extends CI_Model {

	public function __construct()	{
		$this->load->database();

	}

  //Fungsi menampilkan semua data
  	public function daftar_pemeriksaan() {
      $this->db->distinct();
      $this->db->select('tb_faktor.id_faktor,tb_faktor.faktor,tb_kategori.id_kategori,tb_kategori.kategori,tb_gejala.id_gejala,tb_gejala.gejala,tb_pakar.bobot_gj');
      $this->db->from('tb_pakar','tb_faktor','tb_kategori','tb_gejala');
      $this->db->join('tb_faktor', 'tb_pakar.id_faktor = tb_faktor.id_faktor','Left');
      $this->db->join('tb_kategori', 'tb_pakar.id_kategori = tb_kategori.id_kategori','Left');
      $this->db->join('tb_gejala', 'tb_pakar.id_gejala = tb_gejala.id_gejala','Left');
      
      $q = $this->db->get();
      return $q->result_array();
  	}

  	public function create_pemeriksaan($prk){
  		$this->db->insert('tb_pemeriksaan', $prk);
  		return $this->db->insert_id();
  	}

  	public function create_detail_pemeriksaan($data_detail){
  		$this->db->insert('tb_detail_pemeriksaan', $data_detail);
  		//return $this->db->insert_id();
  	}

  	public function tambah_faktor_pemeriksaan($data_faktor_pemeriksaan){
  		$this->db->insert('tb_faktor_pemeriksaan', $data_faktor_pemeriksaan);
  		//return $this->db->insert_id();
  	}

    public function get_kategori(){
    $query =$this->db->select('id_kategori')->distinct()->get('tb_gejala');
    return $query->result_array();

  	}

    public function get_(){
    $query =$this->db->get('tb_pertanyaan');
    return $query->result_array();
    }

    public function get_gejala(){
    $query =$this->db->get('tb_gejala');
    return $query->result_array();
    }

    public function get_classdep()
    {
    	$query =$this->db->get('tb_klasifikasi_depresi');
    	return $query->result_array();
    }
    public function getbatas()
    {
    	$this->db->select('*');
    	$this->db->from('tb_batas');
    	$this->db->join('tb_faktor', 'tb_faktor.id_faktor = tb_batas.id_faktor','Left');
    	$this->db->where('tb_batas.flag','1');
    	$query=$this->db->get('');
    	return $query->result_array();
    }

    public function getfakpmr($id_pemeriksaan)
    {
    	$this->db->select('*');
    	$this->db->from('tb_faktor_pemeriksaan');
    	$this->db->join('tb_faktor', 'tb_faktor.id_faktor = tb_faktor_pemeriksaan.id_faktor','Left');
    	$this->db->where('tb_faktor_pemeriksaan.id_pemeriksaan',$id_pemeriksaan);
    	$query = $this->db->get('');
    	return $query->result_array();
    }
  	//Fungsi hapus data tabel
  	public function hapus_tmpgejala(){
    	return $this->db->empty_table('tmp_gejala');
  	}

  	//Fungsi cek data di database
  	public function get_data(){
  		$this->db->select('*');
      $this->db->from('tb_aturan_pakar');
      $this->db->join('tb_obat', 'tb_obat.id_obat = tb_aturan_pakar.id_obat','Left');
      $this->db->join('tb_gejala', 'tb_gejala.id_gejala = tb_aturan_pakar.id_gejala','Left');
    	return $this->db->get();
  	}

  	public function get_diagnosa($id){
  		$this->db->select('tb_diagnosa.id_diagnosa,tb_diagnosa.gejala,tb_user.nama,tb_obat.nm_obat,tb_diagnosa.tgl,tb_diagnosa.hasil,tb_aturan_bayes.aturan_bayes');
      	$this->db->from('tb_diagnosa');
      	$this->db->join('tb_user', 'tb_user.id_user = tb_diagnosa.id_user','Left');
      	$this->db->join('tb_obat', 'tb_obat.id_obat = tb_diagnosa.id_obat','Left');
      	$this->db->join('tb_aturan_bayes', 'tb_aturan_bayes.id_aturan = tb_diagnosa.id_aturan','Left');
      	$this->db->where('tb_diagnosa.id_user',$id);
    	$query = $this->db->get('');
    	return $query->result_array();
  	}

  	public function val($id_gejala){
    	$this->db->select('*');
      	$this->db->from('tb_aturan_pakar');
      	$this->db->join('tb_obat', 'tb_obat.id_obat = tb_aturan_pakar.id_obat','Left');
      	$this->db->join('tb_gejala', 'tb_gejala.id_gejala = tb_aturan_pakar.id_gejala','Left');
      	$this->db->where('tb_aturan_pakar.id_gejala',$id_gejala);
    	return $this->db->get();
  	}
  	
  	public function simpantmp($data){
  		$this->db->insert('tmp_gejala',$data);
  	}

  	public function update_tmpgejala($id_pakar,$dt_tmp){
    	$this->db->where('id_pakar',$id_pakar);
    	$this->db->update('tmp_gejala',$dt_tmp);
  	}

  	public function hasil($id,$at){
    	$this->db->where('id_obat',$id);
    	$this->db->update('tmp_gejala',$at);
  	}

  	public function get_hasil(){
    	$this->db->select_max('hasil');
    	//$this->db->distinct("hasil");
      	$this->db->from('tmp_gejala');
      	//$this->db->where('id_obat');
    	$query = $this->db->get('');
    	return $query->result();

    	// $this->db->query("SELECT 'id_obat', MAX('hasil') AS 'hasil'");
    	// $this->db->from('tmp_gejala');
    	// $query = $this->db->get('',$id);
    	// return $query->result_array();
    	// $query =$this->db->select('id_obat')->distinct('hasil')->get('tmp_gejala');
		//return $query->result_array();
  	}

  	public function get_id_obat($ido){
    $this->db->select('*');
    $this->db->from('tmp_gejala');
    $this->db->where('hasil',$ido);
    $query=$this->db->get('');
     if($query->num_rows() > 0) {
        $results = $query->result();
     return $results;}
     
  	}

  	public function get_obt($id_o){
    //$this->db->where('id_obat',$id_o);
    //$query=$this->db->get('tb_obat');
    //return $query->result_array();

      $this->db->select('*');
      $this->db->from('tb_obat');
      $this->db->join('tb_penyakit','tb_obat.id_penyakit=tb_penyakit.id_penyakit','Left');
      $this->db->where('id_obat',$id_o);
      $query = $this->db->get();
      return $query->result_array();
  	}

  	public function get_gejalaterpilih($cek){
  		$this->db->select('tmp_gejala.id_gejala,tmp_gejala.cek,tb_gejala.nm_gejala');
  		$this->db->distinct('id_gejala');
      	$this->db->from('tmp_gejala');
      	//$this->db->join('tb_obat', 'tb_obat.id_obat = tb_aturan_pakar.id_obat','Left');
      	$this->db->join('tb_gejala', 'tmp_gejala.id_gejala = tb_gejala.id_gejala','Left');
      	$this->db->where('cek',$cek);
  		$query = $this->db->get('');
  		return $query->result_array();
  	}

	
	public function get_obat(){
		$query =$this->db->select('id_obat')->distinct()->get('tb_aturan_pakar');
		return $query->result_array();

	}


  	public function get_gejala_terpilih($id){
  		$this->db->select('tmp_gejala.id_obat,tmp_gejala.id_gejala,tmp_gejala.bobot_tmp,tb_aturan_pakar.bobot');
  		$this->db->distinct('id_gejala');
  		$this->db->from('tmp_gejala');
  		$this->db->join('tb_aturan_pakar','tmp_gejala.id_gejala=tb_aturan_pakar.id_gejala','Left');
  		$this->db->where('tmp_gejala.id_obat',$id);
  		$query = $this->db->get('');
  		return $query->result_array();

      // $this->db->where('id_obat',$id);
      // $query = $this->db->get('tmp_gejala');
      // return $query->result_array();
  	}

  	public function get_nm_obat() {
		$query = $this->db->get("tb_obat");
		return $query->result_array();
	}

	public function get_nm_gejala() {
	$query = $this->db->get('tb_gejala');
	return $query->result_array();
	}

	public function get_aturan(){
  	return $this->db->get('tb_aturan_bayes');
  	}
	
	// Fungsi mengambil data id dari database
	public function get_id ($id){
		$query = $this->db->get_where('tb_aturan', array('id_aturan' => $id));
		return $query->result_array();
  	}

  	public function get_user ($id_user){
		$query = $this->db->get_where('tb_user', array('id_user' => $id_user));
		return $query->result_array();
  	}

  	public function simpan_hasil($diagnosa){
  		$this->db->insert('tb_diagnosa',$diagnosa);
  	}

    public function detail_diagnosa ($id){
      $this->db->select('*');
      $this->db->from('tb_diagnosa','tb_obat');
      $this->db->join('tb_user','tb_diagnosa.id_user=tb_user.id_user','Left');
      $this->db->join('tb_obat','tb_diagnosa.id_obat=tb_obat.id_obat','Left');
      $this->db->join('tb_penyakit','tb_obat.id_penyakit=tb_penyakit.id_penyakit','Left');
      $this->db->join('tb_aturan_bayes','tb_diagnosa.id_aturan=tb_aturan_bayes.id_aturan','Left');
      $this->db->where('id_diagnosa',$id);
      $query = $this->db->get();
      return $query->result_array();
    }

  	public function delete($id_diagnosa) {
		  $this->db->where('id_diagnosa',$id_diagnosa);
		  return $this->db->delete('tb_diagnosa');
	  }

    public function get_cari($id,$tgl_awal,$tgl_akhir) {
      $this->db->select('tb_diagnosa.id_diagnosa,tb_diagnosa.gejala,tb_user.nama,tb_obat.nm_obat,tb_diagnosa.tgl,tb_diagnosa.hasil,tb_aturan_bayes.aturan_bayes');
        $this->db->from('tb_diagnosa');
        $this->db->join('tb_user', 'tb_user.id_user = tb_diagnosa.id_user','Left');
        $this->db->join('tb_obat', 'tb_obat.id_obat = tb_diagnosa.id_obat','Left');
        $this->db->join('tb_aturan_bayes', 'tb_aturan_bayes.id_aturan = tb_diagnosa.id_aturan','Left');
        $this->db->where('tb_diagnosa.id_user',$id);
        //$this->db->where('tb_diagnosa.tgl >= date("'.$tgl_awal.'")');
        //$this->db->where('tb_diagnosa.tgl <= date("'.$tgl_akhir.'")');
        $this->db->or_where('tb_diagnosa.tgl BETWEEN "'. date('Y-m-d', strtotime($tgl_awal)). '" and "'. date('Y-m-d', strtotime($tgl_awal)).'"');
      $query = $this->db->get();
      return $query->result_array();
    }

    public function countByFaktor($id_pemeriksaan)
    {
    	$this->db->select('id_pemeriksaan,id_faktor');
    	$this->db->select_sum('total');
		$this->db->group_by('id_faktor'); 
		$this->db->where('id_pemeriksaan',$id_pemeriksaan); 
		//$this->db->order_by('total', 'desc'); 
		$query = $this->db->get('tb_detail_pemeriksaan');
		//$result = $query->row();
    	return $query->result_array();
    }
	

}