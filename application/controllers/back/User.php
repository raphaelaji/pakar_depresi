<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()	{
		parent::__construct();
		$this->load->library('session');
		//$this->load->library('encrypt');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('back/M_user');
		
	}

	public function index($offset=0)
	{
		$jml = $this->db->get('tb_user');

			//pengaturan pagination
			$config['base_url'] = base_url().'back/user/index';
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
			$data['data_user'] = $this->M_user->daftar_user($config['per_page'], $offset);

			//print_r($data);exit;
			$this->load->view('back/temp/head');
			$this->load->view('back/temp/sidebar');
			$this->load->view('back/user/data_user',$data);
			$this->load->view('back/temp/footer');
	}

	public function tambah() {
		//$data['id_user'] = $this->M_user->buat_kode();
		//$data['kategori'] = $this->M_user->get_kategori();


		$this->load->view('back/temp/head');
		$this->load->view('back/temp/sidebar');
		$this->load->view('back/user/tambah_user');
		$this->load->view('back/temp/footer');
	
	}

	public function tambah_aksi(){
		//print_r($_POST);exit;
		$data_user = array(
			'id_user' => $this->input->post('id_user'),
			'username' => $this->input->post('username'),
			'password' =>md5($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'usia' => $this->input->post('usia'),
			'gender' => $this->input->post('gender'),
			'level' => $this->input->post('level')
			);

			//print_r($data_bobot);exit;
			//cek kesamaan data jika sama maka tidak di simpan
			$cek=$this->M_user->get_cari_sama($data_user);
			//print_r($cek);exit;
			if ($cek==0) {
		$this->M_user->tambah($data_user);
		$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Berhasil menambah data</div>");
		redirect('back/user');}
		else {
			$this->session->set_flashdata('sukses', "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"\"><strong>error!</strong><br></i> data sudah ada</div>");
			redirect('back/user/tambah');
		}
	}

	public function edit($id) {	
         $data['data_user'] = $this->M_user->get_cari_user($id);
         //$data['user'] = $this->M_user->get_user();
         //$data['kategori'] = $this->M_user->get_kategori();

        $this->load->view('back/temp/head');
		$this->load->view('back/temp/sidebar');
        $this->load->view('back/user/edit_user',$data);
       	$this->load->view('back/temp/footer');
		
        }

    public function edit_aksi()
	{
		//print_r($_POST);exit;
		$level= $this->session->userdata('level'); 
                                if($level== 'admin'){
		$this->form_validation->set_rules('id_user','id_user','required');
		$this->form_validation->set_rules('username','username','required');
		//$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		$this->form_validation->set_rules('usia','usia','required');
		$this->form_validation->set_rules('gender','gender','required');
		$this->form_validation->set_rules('level','level','required');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('sukses', "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"\"><strong>error!</strong><br></i> Gagal mengedit data</div>");
	redirect('back/user');
		}else{
	$data_user = array(
			'id_user' => $this->input->post('id_user'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'usia' => $this->input->post('usia'),
			'gender' => $this->input->post('gender'),
			'level' => $this->input->post('level')
			);
//print_r($data_user);exit;
	$this->M_user->edit($data_user);
	$this->session->set_flashdata('sukses', "<div class=\"alert alert-success\" id=\"alert\"><i class=\"\"></i> Data berhasil diubah</div>");
	redirect('back/user');}}
	else {
		$this->form_validation->set_rules('id_user','id_user','required');
		$this->form_validation->set_rules('username','username','required');
		//$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		$this->form_validation->set_rules('usia','usia','required');
		$this->form_validation->set_rules('gender','gender','required');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('sukses', "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"\"><strong>error!</strong><br></i> Gagal mengedit data</div>");
	redirect('back/user/edit');
		}else{
			$id= $this->session->userdata('id'); 
	$data_user = array(
			'id_user' => $this->input->post('id_user'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'usia' => $this->input->post('usia'),
			'gender' => $this->input->post('gender'),
			'level' => $this->input->post('level')
			);
//print_r($data_user);exit;
	$this->M_user->edit($data_user);
	$this->session->set_flashdata('sukses', "<div class=\"alert alert-success\" id=\"alert\"><i class=\"\"></i> Edit User Berhasil</div>");
	redirect('back/user');}
	}
	}

	public function delete($id) {
		$level= $this->session->userdata('level'); 
                                if($level== 'admin'){
		$this->M_user->delete($id);
		$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
		redirect('back/user');
		}

  	}

  	public function lihat_profile($id) {	
        $data['data_user'] = $this->M_user->get_id($id);
        $data['username'] = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id_user');

        $this->load->view('back/temp/head');
		$this->load->view('back/temp/sidebar');
        $this->load->view('back/user/data_profile',$data);
       	$this->load->view('back/temp/footer');
    }

    public function edit_profile() {
    	$id= $this->session->userdata('id_user');
    	$this->form_validation->set_rules('id_user','id_user','required');
		$this->form_validation->set_rules('username','username','required');
		//$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		$this->form_validation->set_rules('usia','usia','required');
		$this->form_validation->set_rules('gender','gender','required');
		$this->form_validation->set_rules('level','level','required');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('sukses', "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"\"><strong>error!</strong><br></i> Gagal mengedit data</div>");
	redirect(base_url()."back/user/lihat_profile/".$id);
		}else{
	$data_user = array(
			'id_user' => $this->input->post('id_user'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'usia' => $this->input->post('usia'),
			'gender' => $this->input->post('gender'),
			'level' => $this->input->post('level')
			);
//print_r($data_user);exit;
	$this->M_user->edit($data_user);
	$this->session->set_flashdata('sukses', "<div class=\"alert alert-success\" id=\"alert\"><i class=\"\"></i> Data berhasil diubah</div>");
	redirect(base_url()."back/user/lihat_profile/".$id);}


    }

     public function edit_pass() {
    	$id= $this->session->userdata('id_user');
    	$this->form_validation->set_rules('id_user','id_user','required');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		$this->form_validation->set_rules('usia','usia','required');
		$this->form_validation->set_rules('gender','gender','required');
		$this->form_validation->set_rules('level','level','required');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('sukses', "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"\"><strong>error!</strong><br></i> Gagal mengedit data</div>");
	redirect(base_url()."back/user/lihat_profile/".$id);
		}else{
	$data_user = array(
			'id_user' => $this->input->post('id_user'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'usia' => $this->input->post('usia'),
			'gender' => $this->input->post('gender'),
			'level' => $this->input->post('level')
			);
//print_r($data_user);exit;
	$this->M_user->edit($data_user);
	$this->session->set_flashdata('sukses', "<div class=\"alert alert-success\" id=\"alert\"><i class=\"\"></i> Data berhasil diubah</div>");
	redirect(base_url()."back/user/lihat_profile/".$id);}


    }
}
