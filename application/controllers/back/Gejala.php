<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gejala extends CI_Controller {
	public function __construct()	{
		parent::__construct();
		$this->load->library('session');
		//$this->simple_login->cek_login();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('back/M_gejala');
		$this->load->model('back/M_faktor');
		$this->load->model('back/M_kategori');
	}

	public function index($offset=0)
	{
		
		$jml = $this->db->get('tb_gejala');

			//pengaturan pagination
			$config['base_url'] = base_url().'back/gejala/index';
			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = '5';
			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		    $config['full_tag_close']   = '</ul></nav></div>';
		    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		    $config['num_tag_close']    = '</span></li>';
		    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		    $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
		    // $config['next_tag_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		    $config['prev_tag_close']  = '</span></li>';
		    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		    $config['first_tag_close'] = '</span></li>';
		    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		    $config['last_tag_close']  = '</span></li>';

			 $this->pagination->initialize($config);
			 $this->uri->segment(3) ? $this->uri->segment(3) : 0;

			//inisialisasi config
			 $this->pagination->initialize($config);

			//buat pagination
			 $data['halaman'] = $this->pagination->create_links();

			//tamplikan data
			 
			$data['offset'] = $offset;
			$data['data_gejala'] = $this->M_gejala->daftar_gejala($config['per_page'], $offset);

			//print_r($data);exit;
			$this->load->view('back/temp/head');
			$this->load->view('back/temp/sidebar');
			$this->load->view('back/gejala/data_gejala',$data);
			$this->load->view('back/temp/footer');
	}

	public function tambah() {
		if($this->input->get('id_kategori')!=null){
			$data['cat']= $this->input->get('id_kategori');
		}
		$data['id_gejala'] = $this->M_gejala->buat_kode();
		$data['kategori'] = $this->M_gejala->get_kategori();


		$this->load->view('back/temp/head');
		$this->load->view('back/temp/sidebar');
		$this->load->view('back/gejala/tambah_gejala',$data);
		$this->load->view('back/temp/footer');
	
	}

	public function tambah_aksi(){
		//print_r($_POST);exit;
		$data_gejala = array(
			'id_gejala' => $this->input->post('id_gejala'),
			'gejala' => $this->input->post('gejala'),
			'bobot_gj' => $this->input->post('bobot_gj'),
			'id_kategori' => $this->input->post('id_kategori')
			);

			//print_r($data_bobot);exit;
			//cek kesamaan data jika sama maka tidak di simpan
			$cek=$this->M_gejala->get_cari_sama($data_gejala);
			//print_r($cek);exit;
			if ($cek==0) {
		$this->M_gejala->tambah($data_gejala);
		//==============================================================
		$id_gejala = $this->input->post('id_gejala');
		$id_faktor = $this->M_faktor->getfaktorBygejala($id_gejala);
		$cat = $this->M_kategori->getcatByfaktor($id_faktor);
		$max_cat = 0;
		$min_cat = 0;
		foreach ($cat as $key => $value) {
		 	//var_dump($max_cat);
		 	$bobot_kat = $value['bobot_kat'];
		 	$id_kategori = $value['id_kategori'];
		 	$gejala = $this->M_gejala->getgejalaBycat($id_kategori);
		 	$bobot_max_gj = 0;
		 	$bobot_min_gj = 0;
		 	$max_gj = 0;
		 	$min_gj = 0;
		 	//var_dump($bobot_kat);
		 	$bobot_gj =[];
		 	$a=0;
		 	foreach ($gejala as $key => $value) {
		 		//var_dump($bobot_max_gj);
		 		$bobot_gj[$a] = $value['bobot_gj'];
		 		//var_dump($bobot_gj);
		 		if($bobot_gj > $max_gj){
		 			$max_gj = $bobot_gj[$a];
		 			
		 			$bobot_max_gj_1 = $bobot_kat * $bobot_gj[$a];
			 		if($bobot_max_gj_1 > $bobot_max_gj){
			 			$bobot_max_gj = $bobot_max_gj_1;
			 		}
		 		}
		 		if($bobot_gj < $min_gj){
		 			$min_gj = $bobot_gj[$a];
		 			
		 			$min_gj_1 = $bobot_kat * $bobot_gj[$a];
			 		if($min_gj_1 < $bobot_min_gj){
			 			$bobot_min_gj = $min_gj_1;
			 		}
		 		}
		 		
		 		$a++;
		 	}
		 	$max_cat = $max_cat + $bobot_max_gj;
		 	$min_cat = $min_cat + $bobot_min_gj;
		 	//var_dump($bobot_max_gj);
		 	
		 }//var_dump($max_cat);
		 //var_dump($min_cat);
	 	$data = array(
	 		'id_faktor'=>$id_faktor,
	 		'bts_bwh'=>$min_cat,
	 		'bts_ats'=>$max_cat,
	 		'flag'=>'1'
	 	);
	 	//var_dump($data);
	 	$cekdetail = $this->M_gejala->get_detail_sama($data);
	 	//print_r($cekdetail);exit;
	 	if(empty($cekdetail)){
	 		$this->M_gejala->tambah_batas($data);
	 	}
	 	else{
	 		$cekdetail->flag = '1';
	 		$this->M_gejala->edit_batas($cekdetail);
	 	}
	 	//===============================================================================================
		$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Berhasil menambah data</div>");
		redirect('back/gejala');}
		else {
			$this->session->set_flashdata('sukses', "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"\"><strong>error!</strong><br></i> data sudah ada</div>");
			redirect('back/gejala/tambah');
		}
	}

	public function edit($id) {	
         $data['data_gejala'] = $this->M_gejala->get_cari_gejala($id);
         $data['gejala'] = $this->M_gejala->get_gejala();
         $data['kategori'] = $this->M_gejala->get_kategori();

        $this->load->view('back/temp/head');
		$this->load->view('back/temp/sidebar');
        $this->load->view('back/gejala/edit_gejala',$data);
       	$this->load->view('back/temp/footer');
		
        }

    public function edit_aksi()
	{
		//print_r($_POST);exit;
		$level= $this->session->userdata('level'); 
                                if($level== 'admin'){
		$this->form_validation->set_rules('id_gejala','id_gejala','required');
		$this->form_validation->set_rules('gejala','gejala','required');
		$this->form_validation->set_rules('bobot_gj','bobot_gj','required');
		$this->form_validation->set_rules('id_kategori','id_kategori','required');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('sukses', "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"\"><strong>error!</strong><br></i> Gagal mengedit data</div>");
	redirect('back/gejala');
		}else{
	$data_gejala = array(
			'id_gejala' => $this->input->post('id_gejala'),
			'gejala' => $this->input->post('gejala'),
			'bobot_gj' => $this->input->post('bobot_gj'),
			'id_kategori' => $this->input->post('id_kategori')
			);
//print_r($data_user);exit;
	$this->M_gejala->edit($data_gejala);
	$this->session->set_flashdata('sukses', "<div class=\"alert alert-success\" id=\"alert\"><i class=\"\"></i> Data berhasil diubah</div>");
	redirect('back/gejala');}}
	else {
		$this->form_validation->set_rules('id_gejala','id_gejala','required');
		$this->form_validation->set_rules('gejala','gejala','required');
		$this->form_validation->set_rules('bobot_gj','bobot_gj','required');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('sukses', "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"\"><strong>error!</strong><br></i> Gagal mengedit data</div>");
	redirect('back/gejala/edit');
		}else{
			$id= $this->session->userdata('id'); 
	$data_gejala = array(
			'id_gejala' => $this->input->post('id_gejala'),
			'gejala' => $this->input->post('gejala'),
			'bobot_gj' => $this->input->post('bobot_gj'),
			'id_kategori' => $this->input->post('id_kategori')
			);
//print_r($data_user);exit;
	$this->M_gejala->edit($data_gejala);
	//==============================================================
		$id_gejala = $this->input->post('id_gejala');
		$id_faktor = $this->M_faktor->getfaktorBygejala($id_gejala);
		$cat = $this->M_kategori->getcatByfaktor($id_faktor);
		$max_cat = 0;
		$min_cat = 0;
		foreach ($cat as $key => $value) {
		 	//var_dump($max_cat);
		 	$bobot_kat = $value['bobot_kat'];
		 	$id_kategori = $value['id_kategori'];
		 	$gejala = $this->M_gejala->getgejalaBycat($id_kategori);
		 	$bobot_max_gj = 0;
		 	$bobot_min_gj = 0;
		 	$max_gj = 0;
		 	$min_gj = 0;
		 	//var_dump($bobot_kat);
		 	$bobot_gj =[];
		 	$a=0;
		 	foreach ($gejala as $key => $value) {
		 		//var_dump($bobot_max_gj);
		 		$bobot_gj[$a] = $value['bobot_gj'];
		 		//var_dump($bobot_gj);
		 		if($bobot_gj > $max_gj){
		 			$max_gj = $bobot_gj[$a];
		 			
		 			$bobot_max_gj_1 = $bobot_kat * $bobot_gj[$a];
			 		if($bobot_max_gj_1 > $bobot_max_gj){
			 			$bobot_max_gj = $bobot_max_gj_1;
			 		}
		 		}
		 		if($bobot_gj < $min_gj){
		 			$min_gj = $bobot_gj[$a];
		 			
		 			$min_gj_1 = $bobot_kat * $bobot_gj[$a];
			 		if($min_gj_1 < $bobot_min_gj){
			 			$bobot_min_gj = $min_gj_1;
			 		}
		 		}
		 		
		 		$a++;
		 	}
		 	$max_cat = $max_cat + $bobot_max_gj;
		 	$min_cat = $min_cat + $bobot_min_gj;
		 	//var_dump($bobot_max_gj);
		 	
		 }//var_dump($max_cat);
		 //var_dump($min_cat);
	 	$data = array(
	 		'id_faktor'=>$id_faktor,
	 		'bts_bwh'=>$min_cat,
	 		'bts_ats'=>$max_cat,
	 		'flag'=>'1'
	 	);
	 	//var_dump($data);
	 	$cekdetail = $this->M_gejala->get_detail_sama($data);
	 	//print_r($cekdetail);exit;
	 	if(empty($cekdetail)){
	 		$this->M_gejala->tambah_batas($data);
	 	}
	 	else{
	 		$cekdetail->flag = '1';
	 		$this->M_gejala->edit_batas($cekdetail);
	 	}
	 	//===============================================================================================
	$this->session->set_flashdata('sukses', "<div class=\"alert alert-success\" id=\"alert\"><i class=\"\"></i> Edit User Berhasil</div>");
	redirect('back/gejala');}
	}
	}

	public function delete($id) {
		$data=$this->M_gejala->get_cari_gejala($id);
		foreach ($data as $key => $value) {
			$id_gejala= $value['id_gejala'];
		}

		$level= $this->session->userdata('level'); 
        if($level== 'admin'){
			$this->M_gejala->delete($id);
			//=================================================================
			$id_faktor = $this->M_faktor->getfaktorBygejala($id_gejala);
			$cat = $this->M_kategori->getcatByfaktor($id_faktor);
			$max_cat = 0;
			$min_cat = 0;
			foreach ($cat as $key => $value) {
			 	//var_dump($max_cat);
			 	$bobot_kat = $value['bobot_kat'];
			 	$id_kategori = $value['id_kategori'];
			 	$gejala = $this->M_gejala->getgejalaBycat($id_kategori);
			 	$bobot_max_gj = 0;
			 	$bobot_min_gj = 0;
			 	$max_gj = 0;
			 	$min_gj = 0;
			 	//var_dump($bobot_kat);
			 	$bobot_gj =[];
			 	$a=0;
			 	foreach ($gejala as $key => $value) {
			 		//var_dump($bobot_max_gj);
			 		$bobot_gj[$a] = $value['bobot_gj'];
			 		//var_dump($bobot_gj);
			 		if($bobot_gj > $max_gj){
			 			$max_gj = $bobot_gj[$a];
			 			
			 			$bobot_max_gj_1 = $bobot_kat * $bobot_gj[$a];
				 		if($bobot_max_gj_1 > $bobot_max_gj){
				 			$bobot_max_gj = $bobot_max_gj_1;
				 		}
			 		}
			 		if($bobot_gj < $min_gj){
			 			$min_gj = $bobot_gj[$a];
			 			
			 			$min_gj_1 = $bobot_kat * $bobot_gj[$a];
				 		if($min_gj_1 < $bobot_min_gj){
				 			$bobot_min_gj = $min_gj_1;
				 		}
			 		}
			 		
			 		$a++;
			 	}
			 	$max_cat = $max_cat + $bobot_max_gj;
			 	$min_cat = $min_cat + $bobot_min_gj;
			 	//var_dump($bobot_max_gj);
			 	
			 }//var_dump($max_cat);
			 //var_dump($min_cat);
		 	$data = array(
		 		'id_faktor'=>$id_faktor,
		 		'bts_bwh'=>$min_cat,
		 		'bts_ats'=>$max_cat,
		 		'flag'=>'1'
		 	);
		 	//var_dump($data);
		 	$cekdetail = $this->M_gejala->get_detail_sama($data);
		 	//print_r($cekdetail);exit;
		 	if(empty($cekdetail)){
		 		$this->M_gejala->tambah_batas($data);
		 	}
		 	else{
		 		$cekdetail->flag = '1';
		 		$this->M_gejala->edit_batas($cekdetail);
		 	}
		 	//==============================================================
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
			redirect('back/gejala');
		}
	}
}
