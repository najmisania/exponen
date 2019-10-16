<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
public function daftar_dosen()
	{
		$query = $this->db->get('dosen')->result();
		$data['data_dosen'] = $query;
		// echo "<pre>";
		// print_r($data);
		// exit;
		$this->load->view('dosen/index',$data);

	}
public function tambah_dosen()
	{
		$query = $this->db->get('dosen');
		$data['data_dosen'] = $query;
		$this->load->view('dosen/tambah',$data);
	}
public function simpan_dosen()
	{
		$dataTambah = array (	
						'nama_dosen'=>$_POST['nama_dosen'],
						'matkul'=>$_POST['matkul'],
						'no_tlp'=>$_POST['no_tlp'],
						'email'=>$_POST['email'],
						'linkstaff'=>$_POST['linkstaff'],
						'foto'=>$_POST['fileToUpload']
						);
		$this->db->insert('dosen',$dataTambah);
		redirect('dosen/daftar_dosen','refrest');
	}
}