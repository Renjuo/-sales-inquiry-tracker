<?php 
 
class M_login extends CI_Model{
	
	function cek_data_login($table, $where){
		return $this->db->get_where($table,$where);
	}

	function tambah_data($where, $table){
		return $this->db->insert($table,$where);
	}

	function tampil_data(){
		return $this->db->get('tuser');
	}
}