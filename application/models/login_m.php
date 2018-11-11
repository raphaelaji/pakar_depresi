<?php  if (! defined ('BASEPATH')) exit('No direct script access allowed');

class Login_m extends CI_Model{

	public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

	public function cek_user($data){
	$query = $this->db->get_where('tb_user', $data);
			return $query;
	}

	public function register($data_regis){
	$query = $this->db->insert('tb_user', $data_regis);
			return $query;
	}



}
?>