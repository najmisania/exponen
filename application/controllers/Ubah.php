<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah extends CI_Controller {
public function daftar_ubah()
	{
		$data['biodata_mhs']= $this->db->where('npm',$_SESSION['npm'])->get('mhs')->row();
		//print_r($data);
		$this->load->view('ubah/index',$data);
	}
public function simpan_mhs()
	{
		// print_r($_POST);
		$dataTambah = array (	
						'npm'=>$_POST['npm'],
						'nama'=>$_POST['nama'],
						'no_tlp'=>$_POST['no_tlp'],
						'alamat'=>$_POST['alamat']
						);
		$dataPassword = array (	
						'npm'=>$_POST['npm'],
						'password'=>$_POST['password'],
						);
		$this->db->insert('mhs',$dataTambah);
		$this->db->insert('user',$dataPassword);
		redirect('ubah/daftar_ubah','refresh');
		// $this->load->view('mhs/tambah');
	}
public function update_mhs()
	{
		// echo "<pre>";
		// print_r($_POST);
		$passwordBaru = $_POST['password'];
		$daftarUpdate = array('nama'=>$_POST['nama'],'npm'=>$_POST['npm'],'no_tlp'=>$_POST['no_tlp'],'alamat'=>$_POST['alamat']);
		$this->db
			  ->where('npm',$_POST['npm_asli'])
			  ->update('mhs',$daftarUpdate);
		if($passwordBaru!=""){
			$this->db
			  ->where('npm',$_POST['npm_asli'])
			  ->update('password',$passwordBaru);
		}
		redirect('/ubah/daftar_ubah','refresh');
	}
}