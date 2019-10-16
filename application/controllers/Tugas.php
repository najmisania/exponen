<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {
public function daftar_tugas()
	{
		$query = $this->db->select('*')
					  	  ->from('user')
					  	  ->join('tugas','tugas.npm=user.npm')
					  	  ->get()
					  	  ->result();
		// echo "<pre>";
		// print_r($query);
		// exit;
					  	  
		$data['data_tugas'] = $query;
		$this->load->view('tugas/index',$data);
	}
public function tambah_tugas()
	{
		$query = $this->db->get('tugas');
		$data['data_tugas'] = $query;
		$this->load->view('tugas/tambah',$data);
	}
public function simpan_tugas()
	{
		echo"<pre>";
        //$data['biodata']= $this->db->get('npm',$user);
 		$date =explode("-", $_POST['deadline']);
		$_POST['deadline'] = "$date[0]-$date[1]-$date[2]";
		$_POST['npm'] = $_SESSION['npm'];
		// print_r($_POST);
		// exit;
		$this->db->insert('tugas',$_POST);
		redirect('/tugas/daftar_tugas/','refresh');
	}
public function edit_tugas($id_tugas)
	{
		$data['data_tugas']= $this->db->where('id_tugas',$id_tugas)->get('tugas')->result();
        $pch_tgl = explode("-",  $data['data_tugas'][0]->deadline);
        $data['data_tugas'][0]->deadline= "$pch_tgl[2]-$pch_tgl[1]-$pch_tgl[0]";
        // echo "<pre>";
        // print_r($data);
        // exit;
        //$this->session->set_userdata('mhs','npm');
		$this->load->view('tugas/edit',$data);
	}
public function update_tugas()
	{
		$date = explode("-", $_POST['deadline']);
		$deadline = "$date[2]-$date[1]-$date[0]";
		$sql = "UPDATE tugas SET deadline = '$deadline', matkul='$_POST[matkul]',rincian='$_POST[rincian]' WHERE id_tugas = '$_POST[id_tugas]' ";
		
		// echo "<pre>";
		// print_r($sql);
		//exit;
		$this->db->query($sql);
		redirect('tugas/daftar_tugas','refresh');
	}
public function delete($id_tugas)
	{
		$this->db->where('id_tugas',$id_tugas)->delete('tugas');
        redirect('/tugas/daftar_tugas','refresh');
	} 
}