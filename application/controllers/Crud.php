<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Crud extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_data');
	}
 
	public function index(){
		$data['user'] = $this->M_data->ambil_data()->result();
		$this->load->view('view_tampil',$data);
	}

	public function tambah(){
		$this->load->view('view_tambah');
	}

 	public function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan') ;
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		$this->M_data->input_data($data,'user');
		redirect('crud/index');
	}

	function hapus($id){
		$where = array('id' => $id);
		$this->M_data->hapus_data($where,'user');
		redirect('crud/index');
	}

	function edit($id){
		$where = array('id' => $id);
		$data['user'] = $this->M_data->edit_data($where,'user')->result();
		$this->load->view('view_edit',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
	 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
		);
	 
		$where = array(
			'id' => $id
		);
	 
		$this->M_data->update_data($where,$data,'user');
		redirect('crud/index');
	}
}