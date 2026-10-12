<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Download extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('download');
	}
 
	public function index(){
		$this->load->view('view_download');
	}

	public function aksi_download(){
		force_download('gambar/logo-sensorindo-white.png');
	}
}