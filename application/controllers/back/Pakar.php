<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pakar extends CI_Controller {
	public function __construct()	{
		parent::__construct();
		$this->load->library('session');
		//$this->simple_login->cek_login();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('back/M_pakar');
		//$this->load->model('back/M_kategori');
	}

	public function index($offset=0)
	{
		$jml = $this->db->get('tb_pakar');

			//pengaturan pagination
			$config['base_url'] = base_url().'back/pakar/index';
			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = '8';
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
			$data['data_pakar'] = $this->M_pakar->daftar_pakar($config['per_page'], $offset);
			$data['gejala'] = $this->M_pakar->get_gejala();

			//print_r($data);exit;
			$this->load->view('back/temp/head');
			$this->load->view('back/temp/sidebar');
			$this->load->view('back/pakar/data_pakar',$data);
			$this->load->view('back/temp/footer');
	}

	public function tambah() {
		$data['kategori'] = $this->M_pakar->get_kategori();
		$data['gejala'] = $this->M_pakar->get_gejala();
		$data['faktor'] = $this->M_pakar->get_faktor();


		$this->load->view('back/temp/head');
		$this->load->view('back/temp/sidebar');
		$this->load->view('back/pakar/tambah_pakar',$data);
		$this->load->view('back/temp/footer');
	
	}

	public function tambah_aksi(){
		//print_r($_POST);exit;
		$data_pakar = array(
			'id_pakar' => $this->input->post('id_pakar'),
			'id_faktor' => $this->input->post('id_faktor'),
			'id_kategori' => $this->input->post('id_kategori'),
			'bobot_kat' => $this->input->post('bobot_kat'),
			'id_gejala' => $this->input->post('id_gejala'),
			'bobot_gj' => $this->input->post('bobot_gj')
			);

			//print_r($data_bobot);exit;
			//cek kesamaan data jika sama maka tidak di simpan
			$cek=$this->M_pakar->get_cari_sama($data_pakar);
			//print_r($cek);exit;
			if ($cek==0) {
		$this->M_pakar->tambah($data_pakar);
		$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Berhasil menambah data</div>");
		redirect('back/pakar');}
		else {
			$this->session->set_flashdata('sukses', "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"\"><strong>error!</strong><br></i> data sudah ada</div>");
			redirect('back/pakar/tambah');
		}
	}

	public function edit($id) {	
         $data['data_pakar'] = $this->M_pakar->get_cari_pakar($id);
         $data['pakar'] = $this->M_pakar->get_pakar();
         $data['kategori'] = $this->M_pakar->get_kategori();
         $data['gejala'] = $this->M_pakar->get_gejala();
         $data['faktor'] = $this->M_pakar->get_faktor();

        $this->load->view('back/temp/head');
		$this->load->view('back/temp/sidebar');
        $this->load->view('back/pakar/edit_pakar',$data);
       	$this->load->view('back/temp/footer');
		
        }

    public function edit_aksi()
	{
		//print_r($_POST);exit;
		$level= $this->session->userdata('level'); 
                                if($level== 'admin'){
		$this->form_validation->set_rules('id_pakar','id_pakar','required');
		$this->form_validation->set_rules('id_faktor','id_faktor','required');
		$this->form_validation->set_rules('id_kategori','id_kategori','required');
		$this->form_validation->set_rules('bobot_kat','bobot_kat','required');
		$this->form_validation->set_rules('id_gejala','pid_gejala','required');
		$this->form_validation->set_rules('bobot_gj','bobot_gj','required');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('sukses', "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"\"><strong>error!</strong><br></i> Gagal mengedit data</div>");
	redirect('back/pakar');
		}else{
	$data_pakar = array(
			'id_pakar' => $this->input->post('id_pakar'),
			'id_faktor' => $this->input->post('id_faktor'),
			'id_kategori' => $this->input->post('id_kategori'),
			'bobot_kat' => $this->input->post('bobot_kat'),
			'id_gejala' => $this->input->post('id_gejala'),
			'bobot_gj' => $this->input->post('bobot_gj')
			);
//print_r($data_user);exit;
	$this->M_pakar->edit($data_pakar);
	$this->session->set_flashdata('sukses', "<div class=\"alert alert-success\" id=\"alert\"><i class=\"\"></i> Data berhasil diubah</div>");
	redirect('back/pakar');}}
	else {
		$this->form_validation->set_rules('id_pakar','id_pakar','required');
		$this->form_validation->set_rules('id_faktor','id_faktor','required');
		$this->form_validation->set_rules('id_kategori','id_kategori','required');
		//$this->form_validation->set_rules('bobot_kat','bobot_kat','required');
		$this->form_validation->set_rules('id_gejala','pid_gejala','required');
		//$this->form_validation->set_rules('bobot_gj','bobot_gj','required');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('sukses', "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"\"><strong>error!</strong><br></i> Gagal mengedit data</div>");
	redirect('back/pakar/edit');
		}else{
			$id= $this->session->userdata('id'); 
	$data_pakar = array(
			'id_pakar' => $this->input->post('id_pakar'),
			'id_faktor' => $this->input->post('id_faktor'),
			'id_kategori' => $this->input->post('id_kategori'),
			'bobot_kat' => $this->input->post('bobot_kat'),
			'id_gejala' => $this->input->post('id_gejala'),
			'bobot_gj' => $this->input->post('bobot_gj')
			);
//print_r($data_user);exit;
	$this->M_pakar->edit($data_pakar);
	$this->session->set_flashdata('sukses', "<div class=\"alert alert-success\" id=\"alert\"><i class=\"\"></i> Edit User Berhasil</div>");
	redirect('back/pakar');}
	}
	}

	public function delete($id) {
		$level= $this->session->userdata('level'); 
                                if($level== 'admin'){
		$this->M_pakar->delete($id);
		$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
		redirect('back/pakar');
		}

  	}

  	public function get_kategori() {
		$id_faktor = $this->input->post('id_faktor');
		$kategori = $this->M_pakar->get_id_kategori($id_faktor);
		if(count($kategori)>0)
		{
			$pro_select_box = '';
			$pro_select_box .= '<option value="">--Pilih Kategori--</option>';
			foreach ($kategori as $kat){
				$pro_select_box .='<option value="'.$kat->id_kategori.'">'.$kat->kategori.'</option>';
			}
			echo json_encode($pro_select_box);
		}

  	}

  	public function get_gejala() {
		$id_kategori = $this->input->post('id_kategori');
		$gejala = $this->M_pakar->get_id_gejala($id_kategori);
		if(count($gejala)>0)
		{
			$pro_select_box = '';
			$pro_select_box .= '<option value="">--Pilih Gejala--</option>';
			foreach ($gejala as $gj){
				$pro_select_box .='<option value="'.$gj->id_gejala.'">'.$gj->gejala.'</option>';
			}
			echo json_encode($pro_select_box);
		}

  	}
}
