<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diagnosa extends CI_Controller {
	
	public function __construct()	{
		parent::__construct();
		$this->load->library('session');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->model('back/M_pemeriksaan');
    $this->load->model('back/M_faktor');
    $this->load->model('back/M_gejala');
    $this->load->model('back/M_kategori');
	}

	// Menampilkan seluruh data
	
	public function hasil_diagnosa($offset=0)
	{
    $id_user = $this->session->userdata('id_user');
    $jml = $this->db->get('tb_diagnosa');

      //pengaturan pagination
      $config['base_url'] = base_url().'back/diagnosa/hasil_diagnosa';
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
      //print_r($data['config']);exit;
    $data['diagnosa'] = $this->M_pemeriksaan->getdiagnosauser($id_user,$config['per_page'], $offset);
		//print_r($data);exit;

		$this->load->view('back/temp/head');
	    $this->load->view('back/temp/sidebar');
	    $this->load->view('back/diagnosa/all_hasil_diagnosa',$data);
	    $this->load->view('back/temp/footer');
	}

  public function all_hasil_diagnosa($offset=0)
  {
    $jml = $this->db->get('tb_diagnosa');

      //pengaturan pagination
      $config['base_url'] = base_url().'back/diagnosa/all_hasil_diagnosa';
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
      //print_r($data['config']);exit;
    $data['diagnosa'] = $this->M_pemeriksaan->getalldiagnosa($config['per_page'], $offset);
    //print_r($data['diagnosa']);exit;

      $this->load->view('back/temp/head');
      $this->load->view('back/temp/sidebar');
      $this->load->view('back/diagnosa/all_hasil_diagnosa',$data);
      $this->load->view('back/temp/footer');
  }
	
	
}