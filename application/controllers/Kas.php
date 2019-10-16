<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas extends CI_Controller {
public function daftar_kas()
	{
		$query = $this->db->select('*')
					  	  ->from('mhs')
					  	  ->join('kas','kas.npm=mhs.npm')
					  	  ->get()
						  ->result();
		$query2 = $this->db->get('mhs')->result();
		$data['data_kas'] = $query;
		$data['biodata'] = $query2; 
		// echo "<pre>";
		// print_r($data);
		// exit;
		$this->load->view('kas/index',$data);
	}
public function tambah_kas()
	{
		$query = $this->db->get('mhs')->result();
		$data['data_kas'] = $query;
		// echo "<pre>";
		// print_r($data);
		// exit;
		$this->load->view('kas/tambah',$data);
	}
public function simpan_kas()
	{
	echo"<pre>";
        //$data['biodata']= $this->db->get('npm',$user);
 		$date =explode("-", $_POST['tanggal']);
		$_POST['tanggal'] = "$date[0]-$date[1]-$date[2]";
		// $_POST['npm'] = $_SESSION['npm'];
		// print_r($_POST);
		// exit;
		$this->db->insert('kas',$_POST);
		redirect('/kas/daftar_kas/'.$_POST['npm'],'refresh');
	}
public function edit_kas($id_trans)
	{
        $data['biodata']= $this->db->where('id_trans',$id_trans)->get('kas')->result();
        $pch_tgl = explode("-",  $data['biodata'][0]->tanggal);
        $data['biodata'][0]->tanggal= "$pch_tgl[2]/$pch_tgl[1]/$pch_tgl[0]";
        // echo "<pre>";
        // print_r($data);
        
        //$this->session->set_userdata('mhs','npm');
		$this->load->view('kas/edit',$data);
	}
public function update_kas()
	{
		$date = explode("/", $_POST['tanggal']);
		$tanggal = "$date[2]-$date[1]-$date[0]";
		// print_r($_POST);
		// exit;
		$sql = "UPDATE `kas` SET tanggal = '$tanggal', jenis_transaksi='$_POST[jenis_transaksi]',nominal='$_POST[nominal]', ket='$_POST[ket]' WHERE id_trans = '$_POST[id_trans]' ";
		$this->db->query($sql);
		redirect('kas/daftar_kas','refresh');
	}
public function delete($id_trans)
	{
		$this->db->where('id_trans',$id_trans)->delete('kas');
        redirect('/kas/daftar_kas','refresh');
	}
}