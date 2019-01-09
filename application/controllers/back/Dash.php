<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dash extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('login_m');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('back/M_user');
		$this->load->model('back/M_faktor');
		$this->load->model('back/M_kategori');
		$this->load->model('back/M_gejala');
	}
	
	public function index()
	{
		$data['user']=$this->M_user->jumlah_user();
		$data['faktor']=$this->M_faktor->jumlah_faktor();
		$data['kategori']=$this->M_kategori->jumlah_kategori();
		$data['gejala']=$this->M_gejala->jumlah_gejala();

		$this->load->view('back/temp/head');
		$this->load->view('back/temp/sidebar');
		$this->load->view('back/temp/content',$data);
		$this->load->view('back/temp/footer');
	}

}
?>

