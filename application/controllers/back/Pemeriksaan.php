<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller {
	
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
	public function index(){
    $data['kategori'] = $this->M_pemeriksaan->get_kategori();
    $data['faktor'] = $this->M_faktor->get_faktor();
	$data['pertanyaan'] = $this->M_kategori->get_kategori();
	$data['username'] = $this->session->userdata('username');
	$data['id_user'] = $this->session->userdata('id_user');
	//print_r($data);exit;
	$this->load->view('back/temp/head');
    $this->load->view('back/temp/sidebar');
    $this->load->view('back/pemeriksaan/input_pemeriksaan',$data);
    $this->load->view('back/temp/footer');
		
	}

	public function tambah_aksi(){

		$prk['user_id'] = $this->session->userdata('id_user');
		$prk['creation_date'] = date("Y-m-d H:i:s");
		$id_pemeriksaan = $this->M_pemeriksaan->create_pemeriksaan($prk);
		
		$i=1;
		while(isset($_POST['kategori'.$i]))
    	{
	        $id_kategori = $_POST['kategori'.$i];
	        $id_faktor =  $this->M_kategori->getfaktorBycat($id_kategori);
	        $id_gejala = isset($_POST['gejala-kategori'.$i]) ? $_POST['gejala-kategori'.$i] : null;
	        // ==============================================================
	        $bobot_kat = $this->M_kategori->getbobotBycat($id_kategori);
	        if($id_gejala != null)
	        {
	         	$bobot_gejala = $this->M_gejala->getbobotByGejala($id_gejala);
	     	}
	     	else{
	     		$bobot_gejala = 0;
	     	}
	     	// ============================================================== 
	     	$total = $bobot_kat * $bobot_gejala;
        	// ==============================================================
			$data_detail = array(
				'id_pemeriksaan'=>$id_pemeriksaan,
				'id_faktor'=>$id_faktor,
				'id_kategori' => $id_kategori,
				'id_gejala' => $id_gejala,	
				'total' => $total);//print_r($data_gejala);
			$this->M_pemeriksaan->create_detail_pemeriksaan($data_detail);
         $i++;
         
    	}
    	$data = $this->M_pemeriksaan->countByFaktor($id_pemeriksaan);
    	foreach ($data as $key => $value) {
    		$data_faktor_pemeriksaan = array(
    			'id_pemeriksaan'=>$value['id_pemeriksaan'],
    			'id_faktor'=>$value['id_faktor'],
    			'total'=>$value['total']
    		);
    		$this->M_pemeriksaan->tambah_faktor_pemeriksaan($data_faktor_pemeriksaan);
    	}
  //   	================ id pemeriksaan ===========
     	$data['id_pemeriksaan'] = $id_pemeriksaan ; //sementara
    	//============= batas =================
    	//=================== user id ===============
    	$data['user_id'] = $this->session->userdata('id_user');
    	//===============================
    	$data['batas'] = $this->M_pemeriksaan->getbatas();
    	//=====================================
    	
    	//============= input =================
    	//$id_pemeriksaan = 1;
		$data['input'] = $this->M_pemeriksaan->getfakpmr($id_pemeriksaan);
    	//=====================================
    	$data['classdep'] = $this->M_pemeriksaan->get_classdep();
    	//=====================================

	    $this->load->view('back/temp/head');
	    $this->load->view('back/temp/sidebar');
	    $this->load->view('back/pemeriksaan/proses',$data);
	    $this->load->view('back/temp/footer');
	}
	
	public function simpan_gejala(){
		$this->diagnosa_m->hapus_tmpgejala();
  
  		$val = $this->diagnosa_m->get_data();
  		foreach ($val->result() as $row) {
  		$cek[$row->id_gejala] = 0;
  		if(in_array($row->id_gejala, $_POST['nm_gejala'])){
  		$cek[$row->id_gejala] = 1;
  		}

  		$data = array(
  		'id_pakar'=>$row->id_pakar,
      	'id_obat'=>$row->id_obat,
      	'id_gejala'=>$row->id_gejala,
      	'cek' => $cek[$row->id_gejala]
      	);

    	$this->diagnosa_m->simpantmp($data);
		}
    
		$data = $this->input->post('nm_gejala');
  		$jumlah= count($data);

  		for ($sum=0; $sum<$jumlah ; $sum++){
    	$id_gejala=$data[$sum];
    	$ambilgejala=$this->diagnosa_m->val($id_gejala);
    	foreach ($ambilgejala->result() as $row ) 
    		{

    		echo $id_pakar=$row->id_pakar;
        	echo $id_obat=$row->id_obat;
        	echo $id_gejala=$row->id_gejala;
        	echo $bobot=$row->bobot;
       
      		$dt_tmp=array(
      		'bobot_tmp'=>$bobot
      		);
      	$this->diagnosa_m->update_tmpgejala($id_pakar,$dt_tmp); 
    	}
    
  		}
	  	redirect('admin/diagnosa/hasil_diagnosa');
	}

	public function hasil_diagnosa(){
		$data['id_user'] = $this->session->userdata('id_user');
		$data['username'] = $this->session->userdata('username');
		$data['obat'] = $this->diagnosa_m->get_nm_obat();
		$data['id_obat'] = $this->diagnosa_m->get_nm_obat();
		
		$this->load->view('header', $data);
		$this->load->view('navbar');
		$this->load->view('body');
		$this->load->view('admin/diagnosa/hasil_diagnosa', $data);
		$this->load->view('footer');
	}

	public function simpan_diagnosa(){
		$data['id_user'] = $this->session->userdata('id_user');
		$data['username'] = $this->session->userdata('username');

		$diagnosa=array(
            'id_diagnosa'=>$this->input->post('id_diagnosa'),
            'id_user'=>$this->input->post('id_user'),
            'gejala'=>$this->input->post('gejala'),
            'id_obat'=>$this->input->post('id_obat'),
            'tgl'=>$this->input->post('tgl'),
            'hasil'=>$this->input->post('hasil'),
            'id_aturan'=>$this->input->post('id_aturan')
            );
        $this->diagnosa_m->simpan_hasil($diagnosa);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data hasil diagnosa berhasil disimpan!</div>");
        redirect('admin/diagnosa/hasil_diagnosa'); 
	}

	public function lihat_hasil($id,$offset=0) {	

		if (isset($_POST['q'])) {
			$data['diagnosa'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_dianosa', $data['diagnosa']);
		}
		else {
			$data['diagnosa'] = $this->session->userdata('sess_diagnosa');
		}

		$jml = $this->db->get('tb_diagnosa');

		$config['base_url'] = base_url().'/admin/diagnosa/index';
   		$config['total_rows'] = $jml->num_rows();
   		$config['per_page'] = 10;
   		$config['uri_segment'] = 4;
		$config['full_tag_open'] = '<ul class="pagination pagination-sm" style="position:relative; top:-25px;">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Prev';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

   		$this->pagination->initialize($config);
   		$this->uri->segment(4) ? $this->uri->segment(4) : 0;

   		$data['halaman'] = $this->pagination->create_links();
   		$data['offset'] = $offset;
        $data['data_user'] = $this->diagnosa_m->get_user($id);
        $data['hasil'] = $this->diagnosa_m->get_diagnosa($id, $config['per_page'], $offset);
        $data['username'] = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id_user');

        $this->load->view('header',$data);
		$this->load->view('navbar');
		$this->load->view('body');
		$this->load->view('admin/user/lihat_diagnosa',$data);
		$this->load->view('footer');
    }

    public function detail($id) {	
        $data['data_user'] = $this->diagnosa_m->get_user($id);
        $data['hasil'] = $this->diagnosa_m->detail_diagnosa($id);
        $data['username'] = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id_user');

        $this->load->view('header',$data);
		$this->load->view('navbar');
		$this->load->view('body');
		$this->load->view('admin/user/detail_hasil',$data);
		$this->load->view('footer');
    }

    public function delete($id_diagnosa) {
    	$data['id_user'] = $this->session->userdata('id_user');
		$this->diagnosa_m->delete($id_diagnosa);
		redirect('admin/diagnosa/lihat_hasil/'.$data['id_user']);
	}

	public function cari() {
		$data['username'] = $this->session->userdata('username');
		$data['id_user'] = $this->session->userdata('id_user');
		$id=$data['id_user'];
		$tgl_awal = $this->input->post('tgl_awal;');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$data['search'] = $this->diagnosa_m->get_cari($id,$tgl_awal,$tgl_akhir);
       	if($data['search']==null) {
       		echo $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data yang dicari tidak ditemukan</div>");
       		redirect('admin/diagnosa/cari/'.$data['id_user']);
       	}
       	else
       	{
       	$this->load->view('header',$data);
		$this->load->view('navbar');
		$this->load->view('body');
		$this->load->view('admin/diagnosa/cari_diagnosa',$data);
		$this->load->view('footer');
       	} 
	}




}