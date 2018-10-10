<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	// Login
	public function login($username, $password) {
		// Query untuk pencocokan data
		$query = $this->CI->db->get_where('admin', array(
										'username' => $username, 
										'password' => sha1($password)
										));
										
		// Jika ada hasilnya
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT * FROM admin WHERE username = "'.$username.'"');
			$user 	= $row->row();
			$id 	= $user->id_admin;
			$name	= $user->username;
			$level	= $user->level;
			// $_SESSION['username'] = $username;
			$this->CI->session->set_userdata('username', $username); 
			$this->CI->session->set_userdata('level', $level); 
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('id', $id);
			// Kalau benar di redirect

			redirect(base_url().'admin/dashboard');
		
		}else{
			$this->CI->session->set_flashdata('sukses','Oopss.. Username/password salah');
			redirect(base_url().'login');
		}
		return false;
	}
}