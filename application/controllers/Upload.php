<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Upload extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
	}
 
	public function index(){
		$data = array(
					'title' => "Upload",
					'meta_desc' => "Upload",
					'meta_keyword' => "Upload",
					'error' => ""
					);
		$this->load->view('view_upload',$data);
	}

	public function aksi_upload(){
		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
 
		$this->upload->initialize($config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('view_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('view_upload_sukses', $data);
		}
	}
}