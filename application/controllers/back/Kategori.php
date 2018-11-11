<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()	{
		parent::__construct();
		$this->load->library('session');
		//$this->simple_login->cek_login();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('back/M_kategori');
		//$this->load->model('M_mahasiswa');
	}

	public function index($offset=0)
	{
		$jml = $this->db->get('tb_kategori');

			//pengaturan pagination
			$config['base_url'] = base_url().'back/kategori/index';
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
			$data['data_kategori'] = $this->M_kategori->daftar_kategori($config['per_page'], $offset);

			//print_r($data);exit;
			$this->load->view('back/temp/head');
			$this->load->view('back/temp/sidebar');
			$this->load->view('back/kategori/data_kategori',$data);
			$this->load->view('back/temp/footer');
	}

	public function tambah() {
		//$data['data_user'] = $this->M_user->get_user();
		$data['id_kategori'] = $this->M_kategori->buat_kode();
		$data['faktor'] = $this->M_kategori->get_faktor();

		$this->load->view('back/temp/head');
		$this->load->view('back/temp/sidebar');
		$this->load->view('back/kategori/tambah_kategori',$data);
		$this->load->view('back/temp/footer');
	
	}

	public function tambah_aksi(){
		//print_r($_POST);exit;
		$data_kategori = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'id_faktor' => $this->input->post('id_faktor'),
			'kategori' => $this->input->post('kategori'),
			'bobot_kat' => $this->input->post('bobot_kat')
			);

			//print_r($data_bobot);exit;
			//cek kesamaan data jika sama maka tidak di simpan
			$cek=$this->M_kategori->get_cari_sama($data_kategori);
			//print_r($cek);exit;
			if ($cek==0) {
		$this->M_kategori->tambah($data_kategori);
		$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Berhasil menambah data</div>");
		redirect('back/kategori');}
		else {
			$this->session->set_flashdata('sukses', "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"\"><strong>error!</strong><br></i> data sudah ada</div>");
			redirect('back/kategori/tambah');
		}
	}

	public function edit($id) {	
         $data['data_kategori'] = $this->M_kategori->get_cari_kategori($id);
         $data['faktor'] = $this->M_kategori->get_faktor();
         //$data['pelajaran'] = $this->M_mahasiswa->get_pelajaran();

        $this->load->view('back/temp/head');
		$this->load->view('back/temp/sidebar');
        $this->load->view('back/kategori/edit_kategori',$data);
       	$this->load->view('back/temp/footer');
		
        }

    public function edit_aksi()
	{
		//print_r($_POST);exit;
		$level= $this->session->userdata('level'); 
                                if($level== 'admin'){
		$this->form_validation->set_rules('id_kategori','id_kategori','required');
		$this->form_validation->set_rules('id_faktor','id_faktor','required');
		$this->form_validation->set_rules('kategori','kategori','required');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('sukses', "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"\"><strong>error!</strong><br></i> Gagal mengedit data</div>");
	redirect('back/kategori');
		}else{
	$data_kategori = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'id_faktor' => $this->input->post('id_faktor'),
			'kategori' => $this->input->post('kategori'),
			'bobot_kat' => $this->input->post('bobot_kat')
			);
//print_r($data_user);exit;
	$this->M_kategori->edit($data_kategori);
	$this->session->set_flashdata('sukses', "<div class=\"alert alert-success\" id=\"alert\"><i class=\"\"></i> Data berhasil diubah</div>");
	redirect('back/kategori');}}
	else {
		$this->form_validation->set_rules('id_kategori','id_kategori','required');
		$this->form_validation->set_rules('id_faktor','id_faktor','required');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('sukses', "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"\"><strong>error!</strong><br></i> Gagal mengedit data</div>");
	redirect('back/kategori/edit');
		}else{
			$id= $this->session->userdata('id'); 
	$data_kategori = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'id_faktor' => $this->input->post('id_faktor'),
			'kategori' => $this->input->post('kategori'),
			'bobot_kat' => $this->input->post('bobot_kat')
			);
//print_r($data_user);exit;
	$this->M_kategori->edit($data_kategori);
	$this->session->set_flashdata('sukses', "<div class=\"alert alert-success\" id=\"alert\"><i class=\"\"></i> Edit User Berhasil</div>");
	redirect('back/kategori');}
	}
	}

	public function delete($id) {
		$level= $this->session->userdata('level'); 
                                if($level== 'admin'){
		$this->M_kategori->delete($id);
		$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
		redirect('back/kategori');
	}

	// public function get_kelompok(){
	// 	$id=$this->input->post('id');
	
	// 	$data=$this->M_kategori->get_kelompok1($id);
	// 	//print_r($data);exit;
	// 	echo json_encode($data);
	 }
}
