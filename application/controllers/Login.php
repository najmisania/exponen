<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
public function index()
	{

		$this->load->view('login/index');
	}

public function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

public function cekLogin(){
		// echo "<pre>";
		// print_r($_POST);
		$nilai_array= array('npm' => $_POST['npm'] , 'password' => $_POST['password'] );
		$hasil=$this->db->get_where('user', $nilai_array)->result_array();
		if(isset ($hasil[0]['npm']))
		{

			$this->session->set_userdata($hasil[0]);
			// print_r($_SESSION);
			$this->load->view('template/dashboard');

		}
		else{
			$this->load->view('login/index');
		}
		// print_r($data);
	}
}