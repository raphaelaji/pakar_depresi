<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_m');
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	public function index()
	{
		$this->load->view('front/temp/head');
		$this->load->view('front/temp/body');
		$this->load->view('front/temp/footer');
	}

	public function cek_login()
	{

	 	$data = array('username' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE))
			);
		$hasil=$this->login_m->cek_user($data);
		//$hasil = count($ceklogin);
		//echo $hasil;
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['id_user'] = $sess->id_user;
				$sess_data['username'] = $sess->username;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			
				redirect('back/dash');
			}	
		}
		else {
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Username atau Password yang anda masukkan salah!</div>");
        redirect('home', 'refresh');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('home', 'refresh');
	}

	public function proses_regis(){
		$data_regis = array(
			'id_user' => $this->input->post('id_user'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'level' => $this->input->post('level'),
			'nama' => $this->input->post('nama'),
			'gender' => $this->input->post('gender'),
			'usia' => $this->input->post('usia'),
			'alamat' => $this->input->post('alamat')
			);
		$this->login_m->register($data_regis);
		$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Registrasi berhasil!. Silahkan login, untuk masuk ke dalam aplikasi!!!</div>");
		redirect('home');
	} 

}
?>

