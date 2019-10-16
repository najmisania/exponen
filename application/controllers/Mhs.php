<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs extends CI_Controller {
public function daftar_mhs()
	{
		$query = $this->db->get('mhs')->result();
		$data['data_mhs'] = $query;
		$this->load->view('mhs/index',$data);
	}
public function tambah_mhs()
	{
		$this->load->view('mhs/tambah');
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
		redirect('mhs/daftar_mhs','refresh');
		// $this->load->view('mhs/tambah');
	}
public function edit_mhs($npm)
	{
        $data['biodata_mhs']= $this->db->where('npm',$npm)->get('mhs')->result();
        //print_r($data);
        // echo "<pre>";
        //$this->session->set_userdata('mhs','npm');
		$this->load->view('mhs/edit',$data);
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
		redirect('/mhs/daftar_mhs','refresh');
	}
public function delete($npm)
	{
        $this->db->where('npm',$npm)->delete('mhs');
        redirect('/mhs/daftar_mhs','refresh');
	}
}