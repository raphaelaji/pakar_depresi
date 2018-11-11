<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dash extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('login_m');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	public function index()
	{
		$this->load->view('back/temp/head');
		$this->load->view('back/temp/sidebar');
		$this->load->view('back/temp/content');
		$this->load->view('back/temp/footer');
	}

}
?>

