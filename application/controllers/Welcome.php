<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public $tabelUser = 'user';

	public function __construct()
    {
				parent::__construct();
				$this->load->model('crud_m');
    }

	public function index()
	{
		$this->load->view('login_v');
	}

public function login()
{
	$tbl='user';
	$username = $this->input->post('username');
	$password = $this->input->post('password');	
	$where = array(
		'username' => $username,
		'password' => $password
		);

	$hsl=$this->crud_m->ceklogin($tbl,$where);
	$cek = $this->db->get_where('user',array('username' => $username, 'password' => $password))->row();
	$valid=false;

	foreach($hsl->result() as $h){
		$this->session->set_userdata('id',$h->id);
		$this->session->set_userdata('username',$h->username);
		$this->session->set_userdata('nama',$h->nama);
		$this->session->set_userdata('id_divisi',$h->id_divisi);
		$divreal;
		if ($h->id_divisi == 1)
			$divreal = "BPH";
		else if($h->id_divisi == 2)
			$divreal = "Badan Internal";
		else if($h->id_divisi == 3)
			$divreal = "Ekonomi Bisnis";
		else
			$divreal = "PSDM";

		$this->session->set_userdata('divisi',$divreal);

		$valid=true;
	}
	if($valid){
		if($cek->level == 1){
			redirect('Eksekutif/index');
		}else if($cek->level == 2){
			redirect('Manajer/index');
		}else if($cek->level == 3){
			redirect('Welcome/fungsional_index');
		}
	}else{
		$this->load->view('login_v');
		echo "<div style='padding-top:1cm;color:red;'><b><center>Password/Username salah</center></b></div>";
	}
}

	public function eksekutif_index(){
					redirect('Eksekutif/index');
	}

	public function manajer_index(){
					redirect('Manajer/index');
	}

	public function fungsional_index(){
					redirect('Fungsional/index');
	}

	public function logout(){
		$this->load->view('login_v');
	}

}
