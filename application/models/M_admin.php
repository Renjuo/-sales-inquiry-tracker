<?php 
 
class M_admin extends CI_Model{

	function tampil_data($kode_web){
        // Mengambil semua kolom dari your_table dan hanya nama_bidang_usaha dari your_table
        $this->db->select('your_table.*, your_table.nama_bidang_usaha');
        $this->db->from('your_table');
        
        // Melakukan LEFT JOIN berdasarkan ID bidang usaha
        $this->db->join('your_table', 'your_table.id_bidang_usaha = your_table.bidang_usaha', 'left');

        // Business Development bertugas mengecek semua data, sama seperti admin
        if ($_SESSION['level'] == "admin" || $_SESSION['level'] == "business development") {
            $year = date("y");
            $this->db->where('your_table.kode_website', "$kode_web"); // Ditambahkan prefix tabel agar tidak ambigu
            $this->db->like('your_table.bulan', "$year");
            $this->db->order_by('your_table.nomor_urut', 'desc');
            return $this->db->get();
        }
        else {
            $year = date("y");
            $this->db->where('your_table.kode_website', "$kode_web");
            $this->db->where('your_table.pic', $_SESSION['username']);
            $this->db->like('your_table.bulan', "$year");
            $this->db->order_by('your_table.nomor_urut', 'desc');
            return $this->db->get();
        }
    }

	function tampil_old_data(){
		//if ($_SESSION['username'] == "admin") {
			$year = date("y");
			$this->db->where('bulan !=',"$year");
			$this->db->order_by('nomor_urut','desc');
			return $this->db->get('your_table');
		//}
		/**else{
			$this->db->where('pic',"$_SESSION[username]");
			$this->db->order_by('nomor_urut','desc');
			$this->db->limit('1000');
			return $this->db->get('your_table');
		}*/
		
		
	}
	
	function tampil_history_data($kode_web, $tahun){
		//if ($_SESSION['username'] == "admin") {
			// bulan berformat MMYY: cocokkan 2 digit tahun di akhir
			$this->db->where('kode_website',"$kode_web");
			$this->db->where('RIGHT(bulan, 2) =', $tahun);
			$this->db->order_by('nomor_urut','desc');
			return $this->db->get('your_table');
		//}
		/**else{
			$this->db->where('pic',"$_SESSION[username]");
			$this->db->order_by('nomor_urut','desc');
			$this->db->limit('1000');
			return $this->db->get('your_table');
		}*/
		
		
	}

	function tampil_data_analytic(){
			$this->db->order_by('nomor_urut','desc');
			$this->db->limit('1000');
			return $this->db->get('your_table');
	}
	
	function tampil_data_2(){
		if ($_SESSION['username'] == "admin") {
			$this->db->order_by('id_surat','desc');
			$this->db->limit('1000');
			return $this->db->get('your_table');
		}
		else{
			$this->db->where('pic',"$_SESSION[username]");
			$this->db->order_by('id_surat','desc');
			$this->db->limit('1000');
			return $this->db->get('your_table');
		}
		
		
	}
    
    function tampil_data_website(){
		return $this->db->get('your_table');
	}
    
	function tampil_data_tsurat(){
		$this->db->order_by('nomor_urut','desc');
		$this->db->limit('1');
		return $this->db->get('your_table');
		$result = $your_table->result();
	}
	function tampil_data_tsurat_2(){
		$this->db->order_by('id_surat','desc');
		$this->db->limit('1');
		return $this->db->get('your_table');
		$result = $your_table->result();
	}

	function tampil_data_tjenis(){
		return $this->db->get('your_table');
	}

	function tampil_data_twebsite(){
		return $this->db->get('your_table');
	}

	function cek_data($table, $where){
		return $this->db->get_where($table,$where);
	}

	function masukan_data($where, $table){
		return $this->db->insert($table,$where);
	}

	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function upload_gambar($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function upload_gambar_user($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function tampil_data_sudah_po(){
		if ($_SESSION['username'] == "admin") {
			$this->db->where('status','sudah po');
			$this->db->order_by('nomor_urut','desc');
			return $this->db->get('your_table');
		}
		else{
			$this->db->where('pic',"$_SESSION[username]");
			$this->db->where('status','sudah po');
			$this->db->order_by('nomor_urut','desc');
			return $this->db->get('your_table');
		}
	}

	function tampil_data_sudah_quote(){
		if ($_SESSION['username'] == "admin") {
			$this->db->where('status','sudah quote');
			$this->db->order_by('nomor_urut','desc');
			return $this->db->get('your_table');
		}
		else{
			$this->db->where('pic',"$_SESSION[username]");
			$this->db->where('status','sudah quote');
			$this->db->order_by('nomor_urut','desc');
			return $this->db->get('your_table');
		}
	}

	function tampil_data_belum_quote(){
		if ($_SESSION['username'] == "admin") {
			$this->db->where('status','belum quote');
			$this->db->order_by('nomor_urut','desc');
			return $this->db->get('your_table');
		}
		else{
			$this->db->where('pic',"$_SESSION[username]");
			$this->db->where('status','belum quote');
			$this->db->order_by('nomor_urut','desc');
			return $this->db->get('your_table');
		}
	}

	function tampil_data_close(){
		if ($_SESSION['username'] == "admin") {
			$this->db->where('status','close/gagal');
			$this->db->order_by('nomor_urut','desc');
			return $this->db->get('your_table');
		}
		else{
			$this->db->where('pic',"$_SESSION[username]");
			$this->db->where('status','close/gagal');
			$this->db->order_by('nomor_urut','desc');
			return $this->db->get('your_table');
		}
	}

	function tampil_data_date(){
		if ($_SESSION['username'] == "admin") {
			$a = $this->input->post('dat');
			$b = $this->input->post('dat2');
			$this->db->where('tanggal_input BETWEEN "'. date('Y-m-d', strtotime($a)). '" and "'. date('Y-m-d', strtotime($b)).'"');
			return $this->db->get('your_table');
		}
		else{
			$a = $this->input->post('dat');
			$b = $this->input->post('dat2');
			$this->db->where('pic',"$_SESSION[username]");
			$this->db->where('tanggal_input BETWEEN "'. date('Y-m-d', strtotime($a)). '" and "'. date('Y-m-d', strtotime($b)).'"');
			return $this->db->get('your_table');
		}
	}

	function tampil_data_advanced2(){
	    if($_POST['prog_stat'] == "Semua"){
	        $a = $this->input->post('dat');
			$b = $this->input->post('dat2');
			$d = $this->input->post('pics'); 
			$this->db->where('tanggal_input BETWEEN "'. date('Y-m-d', strtotime($a)). '" and "'. date('Y-m-d', strtotime($b)).'"');
			$this->db->where('pic',$this->input->post('pics'));
			return $this->db->get('your_table');
	    
	    }
	    else{
			$a = $this->input->post('dat');
			$b = $this->input->post('dat2');
			$c = $this->input->post('prog_stat');
			$d = $this->input->post('pics'); 
			$this->db->where('tanggal_input BETWEEN "'. date('Y-m-d', strtotime($a)). '" and "'. date('Y-m-d', strtotime($b)).'"');
			$this->db->where('progress_status', $this->input->post('prog_stat'));
			$this->db->where('pic',$this->input->post('pics'));
			return $this->db->get('your_table');
	    }
	}

	function tampil_data_advanced(){
    $a = $this->input->post('dat');
    $b = $this->input->post('dat2');
    $prog_stat = $this->input->post('prog_stat');
    $pics = $this->input->post('pics');

    // 1. FILTER PROGRESS STATUS
    if ($prog_stat !== "Semua" && !empty($prog_stat)){
        $this->db->where('status', $prog_stat);
    }

    // 2. FILTER SALES / PIC
    if ($pics !== "Semua" && !empty($pics)){
        if ($pics == "Tim A" || $pics == "Tim B"){
            $tim = explode(" ", $pics); 
            $this->db->where('team', $tim[1]); 
        } else {
            $this->db->where('pic', $pics);
        }
    }

    // 3. FILTER TANGGAL (HANYA AKTIF JIKA USER MENGISI TANGGAL DI FORM)
    // Ini perbaikan utama agar query tidak crash saat tanggal dikosongkan
    if (!empty($a) && !empty($b)){
        $date_from = date('Y-m-d', strtotime($a));
        $date_to   = date('Y-m-d', strtotime($b));
        $this->db->where("tanggal_input BETWEEN '$date_from' AND '$date_to'");
    }

    // Eksekusi query ke tabel your_table
    return $this->db->get('your_table');
}
	
	function tampil_data_report_graph(){
			return $this->db->get('your_table');
	}
	
	function tampil_data_report_sales(){
			return $this->db->get('your_table');
	}

	
}