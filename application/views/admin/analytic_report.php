<?php
$t=date('Y');
$b=date('m');
//ALL
$query = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ'");
$query_sudah_quote = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and progress_status = 'Sudah Quote'");
$query_belum_quote = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and progress_status = 'Belum Quote'");
$query_po = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and progress_status = 'Sudah PO'");
$query_close = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and progress_status = 'close/gagal'");
//THIS MONTH
$query_m = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)='$b' and year(tanggal_input)='$t'");
$query_sudah_quote_m = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)='$b' and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_m = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)='$b' and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_m = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)='$b' and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$query_close_m = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)='$b' and year(tanggal_input)='$t' and progress_status = 'close/gagal'");
//ALL YEAR
$query_y_1 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and year(tanggal_input)='2018'");
$query_y_2 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and year(tanggal_input)='2019'");
$query_y_3 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and year(tanggal_input)='2020'");
$query_y_4 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and year(tanggal_input)='2021'");



//JANUARI
$query_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t'");
$query_sudah_quote_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=01 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$query_quote_01 = $query_belum_quote_01->num_rows();
//Fajar
$query_Fajar_01 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t'");
$query_sudah_quote_Fajar_01 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_Fajar_01 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_Fajar_01 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_update)=01 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$query_quote_Fajar_01 =  $query_belum_quote_Fajar_01->num_rows();
//Faoji
$query_Faoji_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and pic='Faoji'");
$query_sudah_quote_Faoji_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$query_belum_quote_Faoji_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$query_po_Faoji_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=01 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$query_quote_Faoji_01 =  $query_belum_quote_Faoji_01->num_rows();
//Mashudy
$query_Mashudy_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and pic='Mashudy'");
$query_sudah_quote_Mashudy_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$query_belum_quote_Mashudy_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$query_po_Mashudy_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=01 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$query_quote_Mashudy_01 =  $query_belum_quote_Mashudy_01->num_rows();
//Okta
$query_Okta_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and pic='Okta'");
$query_sudah_quote_Okta_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$query_belum_quote_Okta_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$query_po_Okta_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=01 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$query_quote_Okta_01 =  $query_belum_quote_Okta_01->num_rows();
//Zulfikri
$query_Zulfikri_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and pic='Zulfikri'");
$query_sudah_quote_Zulfikri_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$query_belum_quote_Zulfikri_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$query_po_Zulfikri_01 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=01 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$query_quote_Zulfikri_01 =  $query_belum_quote_Zulfikri_01->num_rows();
//others
// $query_others_01 = $query_01->num_rows() - $query_Fajar_01->num_rows() - $query_Faoji_01->num_rows() - $query_Mashudy_01->num_rows() - $query_Okta_01->num_rows();
// $query_sudah_quote_others_01 = $query_sudah_quote_01->num_rows() - $query_sudah_quote_Fajar_01->num_rows() - $query_sudah_quote_Faoji_01->num_rows() - $query_sudah_quote_Mashudy_01->num_rows() - $query_sudah_quote_Okta_01->num_rows();
// $query_belum_quote_others_01->num_rows() = $query_belum_quote_01->num_rows() - $query_belum_quote_Fajar_01->num_rows() - $query_belum_quote_Faoji_01->num_rows() - $query_belum_quote_Mashudy_01->num_rows() - $query_belum_quote_Okta_01->num_rows();
// $query_po_others_01 = $query_po_01->num_rows() - $query_po_Fajar_01->num_rows() - $query_po_Faoji_01->num_rows() - $query_po_Mashudy_01->num_rows() - $query_po_Okta_01->num_rows();
// $query_quote_others_01 = $query_sudah_quote_others_01->num_rows() + $query_belum_quote_others_01->num_rows();
//FEBRUARI
$query_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t'");
$query_sudah_quote_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=02 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$query_quote_02 = $query_sudah_quote_02->num_rows() + $query_belum_quote_02->num_rows();
//Fajar
$query_Fajar_02 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t'");
$query_sudah_quote_Fajar_02 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_Fajar_02 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_Fajar_02 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_update)=02 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$query_quote_Fajar_02 = $query_belum_quote_Fajar_01->num_rows() + $query_belum_quote_Fajar_02->num_rows();
//Faoji
$query_Faoji_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and pic='Faoji'");
$query_sudah_quote_Faoji_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$query_belum_quote_Faoji_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$query_po_Faoji_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=02 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$query_quote_Faoji_02 = $query_belum_quote_Faoji_01->num_rows() +  $query_belum_quote_Faoji_02->num_rows();
//Mashudy
$query_Mashudy_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and pic='Mashudy'");
$query_sudah_quote_Mashudy_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$query_belum_quote_Mashudy_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$query_po_Mashudy_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=02 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$query_quote_Mashudy_02 = $query_belum_quote_Mashudy_01->num_rows() + $query_belum_quote_Mashudy_02->num_rows();
//Okta
$query_Okta_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and pic='Okta'");
$query_sudah_quote_Okta_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$query_belum_quote_Okta_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$query_po_Okta_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=02 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$query_quote_Okta_02 = $query_belum_quote_Okta_01->num_rows() + $query_belum_quote_Okta_02->num_rows();
//Zulfikri
$query_Zulfikri_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and pic='Zulfikri'");
$query_sudah_quote_Zulfikri_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$query_belum_quote_Zulfikri_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$query_po_Zulfikri_02 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=02 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$query_quote_Zulfikri_02 = $query_belum_quote_Zulfikri_01->num_rows() + $query_belum_quote_Zulfikri_02->num_rows();
//others
// $query_others_02 = $query_02->num_rows() - $query_Fajar_02->num_rows() - $query_Faoji_02->num_rows() - $query_Mashudy_02->num_rows() - $query_Okta_02->num_rows();
// $query_sudah_quote_others_02 = $query_sudah_quote_02->num_rows() - $query_sudah_quote_Fajar_02->num_rows() - $query_sudah_quote_Faoji_02->num_rows() - $query_sudah_quote_Mashudy_02->num_rows() - $query_sudah_quote_Okta_02->num_rows();
// $query_belum_quote_others_02->num_rows() = $query_belum_quote_02->num_rows() - $query_belum_quote_Fajar_02->num_rows() - $query_belum_quote_Faoji_02->num_rows() - $query_belum_quote_Mashudy_02->num_rows() - $query_belum_quote_Okta_02->num_rows();
// $query_po_others_02 = $query_po_02->num_rows() - $query_po_Fajar_02->num_rows() - $query_po_Faoji_02->num_rows() - $query_po_Mashudy_02->num_rows() - $query_po_Okta_02->num_rows();
// $query_quote_others_02 = $query_sudah_quote_others_02->num_rows() + $query_belum_quote_others_02->num_rows();
//MARET
$query_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t'");
$query_sudah_quote_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=03 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$query_quote_03 = $query_sudah_quote_03->num_rows() + $query_belum_quote_03->num_rows();
//Fajar
$query_Fajar_03 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t'");
$query_sudah_quote_Fajar_03 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_Fajar_03 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_Fajar_03 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_update)=03 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$query_quote_Fajar_03 = $query_belum_quote_Fajar_01->num_rows() +$query_belum_quote_Fajar_02->num_rows() + $query_belum_quote_Fajar_03->num_rows();
//Faoji
$query_Faoji_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and pic='Faoji'");
$query_sudah_quote_Faoji_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$query_belum_quote_Faoji_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$query_po_Faoji_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=03 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$query_quote_Faoji_03 = $query_belum_quote_Faoji_01->num_rows() + $query_belum_quote_Faoji_02->num_rows() +  $query_belum_quote_Faoji_03->num_rows();
//Mashudy
$query_Mashudy_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and pic='Mashudy'");
$query_sudah_quote_Mashudy_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$query_belum_quote_Mashudy_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$query_po_Mashudy_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=03 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$query_quote_Mashudy_03 = $query_belum_quote_Mashudy_01->num_rows() + $query_belum_quote_Mashudy_02->num_rows() + $query_belum_quote_Mashudy_03->num_rows();
//Okta
$query_Okta_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and pic='Okta'");
$query_sudah_quote_Okta_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$query_belum_quote_Okta_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$query_po_Okta_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=03 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$query_quote_Okta_03 = $query_belum_quote_Okta_01->num_rows() + $query_belum_quote_Okta_02->num_rows() + $query_belum_quote_Okta_03->num_rows();
//Zulfikri
$query_Zulfikri_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and pic='Zulfikri'");
$query_sudah_quote_Zulfikri_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$query_belum_quote_Zulfikri_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$query_po_Zulfikri_03 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=03 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$query_quote_Zulfikri_03 = $query_belum_quote_Zulfikri_01->num_rows() + $query_belum_quote_Zulfikri_02->num_rows() + $query_belum_quote_Zulfikri_03->num_rows();
//others
// $query_others_03 = $query_03->num_rows() - $query_Fajar_03->num_rows() - $query_Faoji_03->num_rows() - $query_Mashudy_03->num_rows() - $query_Okta_03->num_rows();
// $query_sudah_quote_others_03 = $query_sudah_quote_03->num_rows() - $query_sudah_quote_Fajar_03->num_rows() - $query_sudah_quote_Faoji_03->num_rows() - $query_sudah_quote_Mashudy_03->num_rows() - $query_sudah_quote_Okta_03->num_rows();
// $query_belum_quote_others_03->num_rows() = $query_belum_quote_03->num_rows() - $query_belum_quote_Fajar_03->num_rows() - $query_belum_quote_Faoji_03->num_rows() - $query_belum_quote_Mashudy_03->num_rows() - $query_belum_quote_Okta_03->num_rows();
// $query_po_others_03 = $query_po_03->num_rows() - $query_po_Fajar_03->num_rows() - $query_po_Faoji_03->num_rows() - $query_po_Mashudy_03->num_rows() - $query_po_Okta_03->num_rows();
// $query_quote_others_03 = $query_sudah_quote_others_03->num_rows() + $query_belum_quote_others_03->num_rows();
//APRIL
$query_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t'");
$query_sudah_quote_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=04 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$query_quote_04 = $query_sudah_quote_04->num_rows() + $query_belum_quote_04->num_rows();
//Fajar
$query_Fajar_04 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t'");
$query_sudah_quote_Fajar_04 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_Fajar_04 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_Fajar_04 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_update)=04 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$query_quote_Fajar_04 = $query_belum_quote_Fajar_01->num_rows() + $query_belum_quote_Fajar_02->num_rows() + $query_belum_quote_Fajar_03->num_rows() + $query_belum_quote_Fajar_04->num_rows();
//Faoji
$query_Faoji_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and pic='Faoji'");
$query_sudah_quote_Faoji_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$query_belum_quote_Faoji_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$query_po_Faoji_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=04 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$query_quote_Faoji_04 = $query_belum_quote_Faoji_01->num_rows() + $query_belum_quote_Faoji_02->num_rows() + $query_belum_quote_Faoji_03->num_rows() +  $query_belum_quote_Faoji_04->num_rows();
//Mashudy
$query_Mashudy_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and pic='Mashudy'");
$query_sudah_quote_Mashudy_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$query_belum_quote_Mashudy_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$query_po_Mashudy_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=04 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$query_quote_Mashudy_04 = $query_belum_quote_Mashudy_01->num_rows() + $query_belum_quote_Mashudy_02->num_rows() + $query_belum_quote_Mashudy_03->num_rows() + $query_belum_quote_Mashudy_04->num_rows();
//Okta
$query_Okta_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and pic='Okta'");
$query_sudah_quote_Okta_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$query_belum_quote_Okta_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$query_po_Okta_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=04 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$query_quote_Okta_04 = $query_belum_quote_Okta_01->num_rows() + $query_belum_quote_Okta_02->num_rows() + $query_belum_quote_Okta_03->num_rows() + $query_belum_quote_Okta_04->num_rows();
//Zulfikri
$query_Zulfikri_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and pic='Zulfikri'");
$query_sudah_quote_Zulfikri_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$query_belum_quote_Zulfikri_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$query_po_Zulfikri_04 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=04 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$query_quote_Zulfikri_04 = $query_belum_quote_Zulfikri_01->num_rows() + $query_belum_quote_Zulfikri_02->num_rows() + $query_belum_quote_Zulfikri_03->num_rows() + $query_belum_quote_Zulfikri_04->num_rows();
//others
// $query_others_04 = $query_04->num_rows() - $query_Fajar_04->num_rows() - $query_Faoji_04->num_rows() - $query_Mashudy_04->num_rows() - $query_Okta_04->num_rows();
// $query_sudah_quote_others_04 = $query_sudah_quote_04->num_rows() - $query_sudah_quote_Fajar_04->num_rows() - $query_sudah_quote_Faoji_04->num_rows() - $query_sudah_quote_Mashudy_04->num_rows() - $query_sudah_quote_Okta_04->num_rows();
// $query_belum_quote_others_04->num_rows() = $query_belum_quote_04->num_rows() - $query_belum_quote_Fajar_04->num_rows() - $query_belum_quote_Faoji_04->num_rows() - $query_belum_quote_Mashudy_04->num_rows() - $query_belum_quote_Okta_04->num_rows();
// $query_po_others_04 = $query_po_04->num_rows() - $query_po_Fajar_04->num_rows() - $query_po_Faoji_04->num_rows() - $query_po_Mashudy_04->num_rows() - $query_po_Okta_04->num_rows();
// $query_quote_others_04 = $query_sudah_quote_others_04->num_rows() + $query_belum_quote_others_04->num_rows();
//MEI
$query_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t'");
$query_sudah_quote_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=05 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$query_quote_05 = $query_sudah_quote_05->num_rows() + $query_belum_quote_05->num_rows();
//Fajar
$query_Fajar_05 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t'");
$query_sudah_quote_Fajar_05 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_Fajar_05 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_Fajar_05 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_update)=05 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$query_quote_Fajar_05 = $query_belum_quote_Fajar_01->num_rows() + $query_belum_quote_Fajar_02->num_rows() + $query_belum_quote_Fajar_03->num_rows() + $query_belum_quote_Fajar_04->num_rows() + $query_belum_quote_Fajar_05->num_rows();
//Faoji
$query_Faoji_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and pic='Faoji'");
$query_sudah_quote_Faoji_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$query_belum_quote_Faoji_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$query_po_Faoji_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=05 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$query_quote_Faoji_05 = $query_belum_quote_Faoji_01->num_rows() + $query_belum_quote_Faoji_02->num_rows() + $query_belum_quote_Faoji_03->num_rows() + $query_belum_quote_Faoji_04->num_rows() +  $query_belum_quote_Faoji_05->num_rows();
//Mashudy
$query_Mashudy_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and pic='Mashudy'");
$query_sudah_quote_Mashudy_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$query_belum_quote_Mashudy_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$query_po_Mashudy_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=05 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$query_quote_Mashudy_05 = $query_belum_quote_Mashudy_01->num_rows() + $query_belum_quote_Mashudy_02->num_rows() + $query_belum_quote_Mashudy_03->num_rows() + $query_belum_quote_Mashudy_04->num_rows() + $query_belum_quote_Mashudy_05->num_rows();
//Okta
$query_Okta_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and pic='Okta'");
$query_sudah_quote_Okta_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$query_belum_quote_Okta_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$query_po_Okta_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=05 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$query_quote_Okta_05 = $query_belum_quote_Okta_01->num_rows() + $query_belum_quote_Okta_02->num_rows() + $query_belum_quote_Okta_03->num_rows() + $query_sudah_quote_Okta_04->num_rows() + $query_belum_quote_Okta_05->num_rows();
//Zulfikri
$query_Zulfikri_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and pic='Zulfikri'");
$query_sudah_quote_Zulfikri_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$query_belum_quote_Zulfikri_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$query_po_Zulfikri_05 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=05 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$query_quote_Zulfikri_05 = $query_belum_quote_Zulfikri_01->num_rows() + $query_belum_quote_Zulfikri_02->num_rows() + $query_belum_quote_Zulfikri_03->num_rows() + $query_belum_quote_Zulfikri_04->num_rows() + $query_belum_quote_Zulfikri_05->num_rows();
//others
// $query_others_05 = $query_05->num_rows() - $query_Fajar_05->num_rows() - $query_Faoji_05->num_rows() - $query_Mashudy_05->num_rows() - $query_Okta_05->num_rows();
// $query_sudah_quote_others_05 = $query_sudah_quote_05->num_rows() - $query_sudah_quote_Fajar_05->num_rows() - $query_sudah_quote_Faoji_05->num_rows() - $query_sudah_quote_Mashudy_05->num_rows() - $query_sudah_quote_Okta_05->num_rows();
// $query_belum_quote_others_05->num_rows() = $query_belum_quote_05->num_rows() - $query_belum_quote_Fajar_05->num_rows() - $query_belum_quote_Faoji_05->num_rows() - $query_belum_quote_Mashudy_05->num_rows() - $query_belum_quote_Okta_05->num_rows();
// $query_po_others_05 = $query_po_05->num_rows() - $query_po_Fajar_05->num_rows() - $query_po_Faoji_05->num_rows() - $query_po_Mashudy_05->num_rows() - $query_po_Okta_05->num_rows();
// $query_quote_others_05 = $query_sudah_quote_others_05->num_rows() + $query_belum_quote_others_05->num_rows();
//JUNI
$query_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t'");
$query_sudah_quote_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=06 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$query_quote_06 = $query_sudah_quote_06->num_rows() + $query_belum_quote_06->num_rows();
//Fajar
$query_Fajar_06 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t'");
$query_sudah_quote_Fajar_06 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_Fajar_06 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_Fajar_06 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_update)=06 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$query_quote_Fajar_06 = $query_belum_quote_Fajar_01->num_rows() + $query_belum_quote_Fajar_02->num_rows() + $query_belum_quote_Fajar_03->num_rows() + $query_belum_quote_Fajar_04->num_rows() + $query_belum_quote_Fajar_05->num_rows() + $query_belum_quote_Fajar_06->num_rows();
//Faoji
$query_Faoji_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and pic='Faoji'");
$query_sudah_quote_Faoji_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$query_belum_quote_Faoji_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$query_po_Faoji_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=06 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$query_quote_Faoji_06 = $query_belum_quote_Faoji_01->num_rows() + $query_belum_quote_Faoji_02->num_rows() + $query_belum_quote_Faoji_03->num_rows() + $query_belum_quote_Faoji_04->num_rows() + $query_belum_quote_Faoji_05->num_rows() +  $query_belum_quote_Faoji_06->num_rows();
//Mashudy
$query_Mashudy_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and pic='Mashudy'");
$query_sudah_quote_Mashudy_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$query_belum_quote_Mashudy_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$query_po_Mashudy_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=06 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$query_quote_Mashudy_06 = $query_belum_quote_Mashudy_01->num_rows() + $query_belum_quote_Mashudy_02->num_rows() + $query_belum_quote_Mashudy_03->num_rows() + $query_belum_quote_Mashudy_04->num_rows() + $query_belum_quote_Mashudy_05->num_rows() + $query_belum_quote_Mashudy_06->num_rows();
//Okta
$query_Okta_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and pic='Okta'");
$query_sudah_quote_Okta_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$query_belum_quote_Okta_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$query_po_Okta_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=06 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$query_quote_Okta_06 = $query_belum_quote_Okta_01->num_rows() + $query_belum_quote_Okta_02->num_rows() + $query_belum_quote_Okta_03->num_rows() + $query_belum_quote_Okta_04->num_rows() + $query_belum_quote_Okta_05->num_rows() + $query_belum_quote_Okta_06->num_rows();
//Zulfikri
$query_Zulfikri_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and pic='Zulfikri'");
$query_sudah_quote_Zulfikri_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$query_belum_quote_Zulfikri_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$query_po_Zulfikri_06 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=06 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$query_quote_Zulfikri_06 = $query_belum_quote_Zulfikri_01->num_rows() + $query_belum_quote_Zulfikri_02->num_rows() + $query_belum_quote_Zulfikri_03->num_rows() + $query_belum_quote_Zulfikri_04->num_rows() + $query_belum_quote_Zulfikri_05->num_rows() + $query_belum_quote_Zulfikri_06->num_rows();
//others
// $query_others_06 = $query_06->num_rows() - $query_Fajar_06->num_rows() - $query_Faoji_06->num_rows() - $query_Mashudy_06->num_rows() - $query_Okta_06->num_rows();
// $query_sudah_quote_others_06 = $query_sudah_quote_06->num_rows() - $query_sudah_quote_Fajar_06->num_rows() - $query_sudah_quote_Faoji_06->num_rows() - $query_sudah_quote_Mashudy_06->num_rows() - $query_sudah_quote_Okta_06->num_rows();
// $query_belum_quote_others_06->num_rows() = $query_belum_quote_06->num_rows() - $query_belum_quote_Fajar_06->num_rows() - $query_belum_quote_Faoji_06->num_rows() - $query_belum_quote_Mashudy_06->num_rows() - $query_belum_quote_Okta_06->num_rows();
// $query_po_others_06 = $query_po_06->num_rows() - $query_po_Fajar_06->num_rows() - $query_po_Faoji_06->num_rows() - $query_po_Mashudy_06->num_rows() - $query_po_Okta_06->num_rows();
// $query_quote_others_06 = $query_sudah_quote_others_06->num_rows() + $query_belum_quote_others_06->num_rows();
//JULI
$query_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t'");
$query_sudah_quote_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$query_quote_07 = $query_sudah_quote_07->num_rows() + $query_belum_quote_07->num_rows();
//Fajar
$query_Fajar_07 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t'");
$query_sudah_quote_Fajar_07 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_Fajar_07 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_Fajar_07 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$query_quote_Fajar_07 = $query_belum_quote_Fajar_01->num_rows() + $query_belum_quote_Fajar_02->num_rows() + $query_belum_quote_Fajar_03->num_rows() + $query_belum_quote_Fajar_04->num_rows() + $query_belum_quote_Fajar_05->num_rows() + $query_belum_quote_Fajar_06->num_rows() + $query_belum_quote_Fajar_07->num_rows();
//Faoji
$query_Faoji_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and pic='Faoji'");
$query_sudah_quote_Faoji_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$query_belum_quote_Faoji_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$query_po_Faoji_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$query_quote_Faoji_07 = $query_belum_quote_Faoji_01->num_rows() + $query_belum_quote_Faoji_02->num_rows() + $query_belum_quote_Faoji_03->num_rows() + $query_belum_quote_Faoji_04->num_rows() + $query_belum_quote_Faoji_05->num_rows() +  $query_belum_quote_Faoji_06->num_rows() +  $query_belum_quote_Faoji_07->num_rows();
//Mashudy
$query_Mashudy_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and pic='Mashudy'");
$query_sudah_quote_Mashudy_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$query_belum_quote_Mashudy_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$query_po_Mashudy_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$query_quote_Mashudy_07 = $query_belum_quote_Mashudy_01->num_rows() + $query_belum_quote_Mashudy_02->num_rows() + $query_belum_quote_Mashudy_03->num_rows() + $query_belum_quote_Mashudy_04->num_rows() + $query_belum_quote_Mashudy_05->num_rows() + $query_belum_quote_Mashudy_06->num_rows() + $query_belum_quote_Mashudy_07->num_rows();
//Okta
$query_Okta_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and pic='Okta'");
$query_sudah_quote_Okta_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$query_belum_quote_Okta_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$query_po_Okta_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$query_quote_Okta_07 = $query_belum_quote_Okta_01->num_rows() + $query_belum_quote_Okta_02->num_rows() + $query_belum_quote_Okta_03->num_rows() + $query_belum_quote_Okta_04->num_rows() + $query_belum_quote_Okta_05->num_rows() + $query_belum_quote_Okta_06->num_rows() + $query_belum_quote_Okta_07->num_rows();
//Zulfikri
$query_Zulfikri_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and pic='Zulfikri'");
$query_sudah_quote_Zulfikri_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$query_belum_quote_Zulfikri_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$query_po_Zulfikri_07 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=07 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$query_quote_Zulfikri_07 = $query_belum_quote_Zulfikri_01->num_rows() + $query_belum_quote_Zulfikri_02->num_rows() + $query_belum_quote_Zulfikri_03->num_rows() + $query_belum_quote_Zulfikri_04->num_rows() + $query_belum_quote_Zulfikri_05->num_rows() + $query_belum_quote_Zulfikri_06->num_rows() + $query_belum_quote_Zulfikri_07->num_rows();
//others
// $query_others_07 = $query_07->num_rows() - $query_Fajar_07->num_rows() - $query_Faoji_07->num_rows() - $query_Mashudy_07->num_rows() - $query_Okta_07->num_rows();
// $query_sudah_quote_others_07 = $query_sudah_quote_07->num_rows() - $query_sudah_quote_Fajar_07->num_rows() - $query_sudah_quote_Faoji_07->num_rows() - $query_sudah_quote_Mashudy_07->num_rows() - $query_sudah_quote_Okta_07->num_rows();
// $query_belum_quote_others_07->num_rows() = $query_belum_quote_07->num_rows() - $query_belum_quote_Fajar_07->num_rows() - $query_belum_quote_Faoji_07->num_rows() - $query_belum_quote_Mashudy_07->num_rows() - $query_belum_quote_Okta_07->num_rows();
// $query_po_others_07 = $query_po_07->num_rows() - $query_po_Fajar_07->num_rows() - $query_po_Faoji_07->num_rows() - $query_po_Mashudy_07->num_rows() - $query_po_Okta_07->num_rows();
// $query_quote_others_07 = $query_sudah_quote_others_07->num_rows() + $query_belum_quote_others_07->num_rows();
//AGUSTUS
$query_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t'");
$query_sudah_quote_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$query_quote_08 = $query_sudah_quote_08->num_rows() + $query_belum_quote_08->num_rows();
//Fajar
$query_Fajar_08 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t'");
$query_sudah_quote_Fajar_08 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_Fajar_08 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_Fajar_08 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$query_quote_Fajar_08 = $query_sudah_quote_Fajar_08->num_rows() + $query_belum_quote_Fajar_08->num_rows();
//Faoji
$query_Faoji_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and pic='Faoji'");
$query_sudah_quote_Faoji_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$query_belum_quote_Faoji_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$query_po_Faoji_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$query_quote_Faoji_08 = $query_sudah_quote_Faoji_08->num_rows() +  $query_belum_quote_Faoji_08->num_rows();
//Mashudy
$query_Mashudy_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and pic='Mashudy'");
$query_sudah_quote_Mashudy_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$query_belum_quote_Mashudy_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$query_po_Mashudy_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$query_quote_Mashudy_08 = $query_sudah_quote_Mashudy_08->num_rows() + $query_belum_quote_Mashudy_08->num_rows();
//Okta
$query_Okta_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and pic='Okta'");
$query_sudah_quote_Okta_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$query_belum_quote_Okta_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$query_po_Okta_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$query_quote_Okta_08 = $query_sudah_quote_Okta_08->num_rows() + $query_belum_quote_Okta_08->num_rows();
//Zulfikri
$query_Zulfikri_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and pic='Zulfikri'");
$query_sudah_quote_Zulfikri_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$query_belum_quote_Zulfikri_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$query_po_Zulfikri_08 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=08 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$query_quote_Zulfikri_08 = $query_sudah_quote_Zulfikri_08->num_rows() + $query_belum_quote_Zulfikri_08->num_rows();
//others
// $query_others_08 = $query_08->num_rows() - $query_Fajar_08->num_rows() - $query_Faoji_08->num_rows() - $query_Mashudy_08->num_rows() - $query_Okta_08->num_rows();
// $query_sudah_quote_others_08 = $query_sudah_quote_08->num_rows() - $query_sudah_quote_Fajar_08->num_rows() - $query_sudah_quote_Faoji_08->num_rows() - $query_sudah_quote_Mashudy_08->num_rows() - $query_sudah_quote_Okta_08->num_rows();
// $query_belum_quote_others_08->num_rows() = $query_belum_quote_08->num_rows() - $query_belum_quote_Fajar_08->num_rows() - $query_belum_quote_Faoji_08->num_rows() - $query_belum_quote_Mashudy_08->num_rows() - $query_belum_quote_Okta_08->num_rows();
// $query_po_others_08 = $query_po_08->num_rows() - $query_po_Fajar_08->num_rows() - $query_po_Faoji_08->num_rows() - $query_po_Mashudy_08->num_rows() - $query_po_Okta_08->num_rows();
// $query_quote_others_08 = $query_sudah_quote_others_08->num_rows() + $query_belum_quote_others_08->num_rows();
//SEPTEMBER
$query_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t'");
$query_sudah_quote_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$query_quote_09 = $query_sudah_quote_09->num_rows() + $query_belum_quote_09->num_rows();
//Fajar
$query_Fajar_09 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t'");
$query_sudah_quote_Fajar_09 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_Fajar_09 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_Fajar_09 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$query_quote_Fajar_09 = $query_sudah_quote_Fajar_09->num_rows() + $query_belum_quote_Fajar_09->num_rows();
//Faoji
$query_Faoji_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and pic='Faoji'");
$query_sudah_quote_Faoji_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$query_belum_quote_Faoji_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$query_po_Faoji_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$query_quote_Faoji_09 = $query_sudah_quote_Faoji_09->num_rows() +  $query_belum_quote_Faoji_09->num_rows();
//Mashudy
$query_Mashudy_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and pic='Mashudy'");
$query_sudah_quote_Mashudy_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$query_belum_quote_Mashudy_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$query_po_Mashudy_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$query_quote_Mashudy_09 = $query_sudah_quote_Mashudy_09->num_rows() + $query_belum_quote_Mashudy_09->num_rows();
//Okta
$query_Okta_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and pic='Okta'");
$query_sudah_quote_Okta_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$query_belum_quote_Okta_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$query_po_Okta_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$query_quote_Okta_09 = $query_sudah_quote_Okta_09->num_rows() + $query_belum_quote_Okta_09->num_rows();
//Zulfikri
$query_Zulfikri_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and pic='Zulfikri'");
$query_sudah_quote_Zulfikri_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$query_belum_quote_Zulfikri_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$query_po_Zulfikri_09 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=09 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$query_quote_Zulfikri_09 = $query_sudah_quote_Zulfikri_09->num_rows() + $query_belum_quote_Zulfikri_09->num_rows();
//others
// $query_others_09 = $query_09->num_rows() - $query_Fajar_09->num_rows() - $query_Faoji_09->num_rows() - $query_Mashudy_09->num_rows() - $query_Okta_09->num_rows();
// $query_sudah_quote_others_09 = $query_sudah_quote_09->num_rows() - $query_sudah_quote_Fajar_09->num_rows() - $query_sudah_quote_Faoji_09->num_rows() - $query_sudah_quote_Mashudy_09->num_rows() - $query_sudah_quote_Okta_09->num_rows();
// $query_belum_quote_others_09->num_rows() = $query_belum_quote_09->num_rows() - $query_belum_quote_Fajar_09->num_rows() - $query_belum_quote_Faoji_09->num_rows() - $query_belum_quote_Mashudy_09->num_rows() - $query_belum_quote_Okta_09->num_rows();
// $query_po_others_09 = $query_po_09->num_rows() - $query_po_Fajar_09->num_rows() - $query_po_Faoji_09->num_rows() - $query_po_Mashudy_09->num_rows() - $query_po_Okta_09->num_rows();
// $query_quote_others_09 = $query_sudah_quote_others_09->num_rows() + $query_belum_quote_others_09->num_rows();
//OKTOBER
$query_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t'");
$query_sudah_quote_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$query_quote_10 = $query_sudah_quote_10->num_rows() + $query_belum_quote_10->num_rows();
//Fajar
$query_Fajar_10 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t'");
$query_sudah_quote_Fajar_10 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_Fajar_10 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_Fajar_10 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$query_quote_Fajar_10 = $query_sudah_quote_Fajar_10->num_rows() + $query_belum_quote_Fajar_10->num_rows();
//Faoji
$query_Faoji_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and pic='Faoji'");
$query_sudah_quote_Faoji_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$query_belum_quote_Faoji_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$query_po_Faoji_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$query_quote_Faoji_10 = $query_sudah_quote_Faoji_10->num_rows() +  $query_belum_quote_Faoji_10->num_rows();
//Mashudy
$query_Mashudy_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and pic='Mashudy'");
$query_sudah_quote_Mashudy_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$query_belum_quote_Mashudy_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$query_po_Mashudy_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$query_quote_Mashudy_10 = $query_sudah_quote_Mashudy_10->num_rows() + $query_belum_quote_Mashudy_10->num_rows();
//Okta
$query_Okta_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and pic='Okta'");
$query_sudah_quote_Okta_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$query_belum_quote_Okta_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$query_po_Okta_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$query_quote_Okta_10 = $query_sudah_quote_Okta_10->num_rows() + $query_belum_quote_Okta_10->num_rows();
//Zulfikri
$query_Zulfikri_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and pic='Zulfikri'");
$query_sudah_quote_Zulfikri_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$query_belum_quote_Zulfikri_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$query_po_Zulfikri_10 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=10 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$query_quote_Zulfikri_10 = $query_sudah_quote_Zulfikri_10->num_rows() + $query_belum_quote_Zulfikri_10->num_rows();
//others
// $query_others_10 = $query_10->num_rows() - $query_Fajar_10->num_rows() - $query_Faoji_10->num_rows() - $query_Mashudy_10->num_rows() - $query_Okta_10->num_rows();
// $query_sudah_quote_others_10 = $query_sudah_quote_10->num_rows() - $query_sudah_quote_Fajar_10->num_rows() - $query_sudah_quote_Faoji_10->num_rows() - $query_sudah_quote_Mashudy_10->num_rows() - $query_sudah_quote_Okta_10->num_rows();
// $query_belum_quote_others_10->num_rows() = $query_belum_quote_10->num_rows() - $query_belum_quote_Fajar_10->num_rows() - $query_belum_quote_Faoji_10->num_rows() - $query_belum_quote_Mashudy_10->num_rows() - $query_belum_quote_Okta_10->num_rows();
// $query_po_others_10 = $query_po_10->num_rows() - $query_po_Fajar_10->num_rows() - $query_po_Faoji_10->num_rows() - $query_po_Mashudy_10->num_rows() - $query_po_Okta_10->num_rows();
// $query_quote_others_10 = $query_sudah_quote_others_10->num_rows() + $query_belum_quote_others_10->num_rows();
//NOVEMBER
$query_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t'");
$query_sudah_quote_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$query_quote_11 = $query_sudah_quote_11->num_rows() + $query_belum_quote_11->num_rows();
//Fajar
$query_Fajar_11 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t'");
$query_sudah_quote_Fajar_11 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_Fajar_11 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_Fajar_11 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$query_quote_Fajar_11 = $query_sudah_quote_Fajar_11->num_rows() + $query_belum_quote_Fajar_11->num_rows();
//Faoji
$query_Faoji_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and pic='Faoji'");
$query_sudah_quote_Faoji_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$query_belum_quote_Faoji_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$query_po_Faoji_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$query_quote_Faoji_11 = $query_sudah_quote_Faoji_11->num_rows() +  $query_belum_quote_Faoji_11->num_rows();
//Mashudy
$query_Mashudy_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and pic='Mashudy'");
$query_sudah_quote_Mashudy_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$query_belum_quote_Mashudy_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$query_po_Mashudy_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$query_quote_Mashudy_11 = $query_sudah_quote_Mashudy_11->num_rows() + $query_belum_quote_Mashudy_11->num_rows();
//Okta
$query_Okta_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and pic='Okta'");
$query_sudah_quote_Okta_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$query_belum_quote_Okta_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$query_po_Okta_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$query_quote_Okta_11 = $query_sudah_quote_Okta_11->num_rows() + $query_belum_quote_Okta_11->num_rows();
//Zulfikri
$query_Zulfikri_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and pic='Zulfikri'");
$query_sudah_quote_Zulfikri_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$query_belum_quote_Zulfikri_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$query_po_Zulfikri_11 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=11 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$query_quote_Zulfikri_11 = $query_sudah_quote_Zulfikri_11->num_rows() + $query_belum_quote_Zulfikri_11->num_rows();
//others
// $query_others_11 = $query_11->num_rows() - $query_Fajar_11->num_rows() - $query_Faoji_11->num_rows() - $query_Mashudy_11->num_rows() - $query_Okta_11->num_rows();
// $query_sudah_quote_others_11 = $query_sudah_quote_11->num_rows() - $query_sudah_quote_Fajar_11->num_rows() - $query_sudah_quote_Faoji_11->num_rows() - $query_sudah_quote_Mashudy_11->num_rows() - $query_sudah_quote_Okta_11->num_rows();
// $query_belum_quote_others_11->num_rows() = $query_belum_quote_11->num_rows() - $query_belum_quote_Fajar_11->num_rows() - $query_belum_quote_Faoji_11->num_rows() - $query_belum_quote_Mashudy_11->num_rows() - $query_belum_quote_Okta_11->num_rows();
// $query_po_others_11 = $query_po_11->num_rows() - $query_po_Fajar_11->num_rows() - $query_po_Faoji_11->num_rows() - $query_po_Mashudy_11->num_rows() - $query_po_Okta_11->num_rows();
// $query_quote_others_11 = $query_sudah_quote_others_11->num_rows() + $query_belum_quote_others_11->num_rows();
//DESEMBER
$query_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t'");
$query_sudah_quote_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$query_quote_12 = $query_sudah_quote_12->num_rows() + $query_belum_quote_12->num_rows();
//Fajar
$query_Fajar_12 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t'");
$query_sudah_quote_Fajar_12 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$query_belum_quote_Fajar_12 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$query_po_Fajar_12 = $this->db->query("SELECT * FROM tsurat where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$query_quote_Fajar_12 = $query_sudah_quote_Fajar_12->num_rows() + $query_belum_quote_Fajar_12->num_rows();
//Faoji
$query_Faoji_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and pic='Faoji'");
$query_sudah_quote_Faoji_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$query_belum_quote_Faoji_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$query_po_Faoji_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$query_quote_Faoji_12 = $query_sudah_quote_Faoji_12->num_rows() +  $query_belum_quote_Faoji_12->num_rows();
//Mashudy
$query_Mashudy_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and pic='Mashudy'");
$query_sudah_quote_Mashudy_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$query_belum_quote_Mashudy_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$query_po_Mashudy_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$query_quote_Mashudy_12 = $query_sudah_quote_Mashudy_12->num_rows() + $query_belum_quote_Mashudy_12->num_rows();
//Okta
$query_Okta_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and pic='Okta'");
$query_sudah_quote_Okta_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$query_belum_quote_Okta_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$query_po_Okta_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$query_quote_Okta_12 = $query_sudah_quote_Okta_12->num_rows() + $query_belum_quote_Okta_12->num_rows();
//Zulfikri
$query_Zulfikri_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and pic='Zulfikri'");
$query_sudah_quote_Zulfikri_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$query_belum_quote_Zulfikri_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$query_po_Zulfikri_12 = $this->db->query("SELECT * FROM tsurat where kode_jenis = 'INQ' and month(tanggal_update)=12 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$query_quote_Zulfikri_12 = $query_sudah_quote_Zulfikri_12->num_rows() + $query_belum_quote_Zulfikri_12->num_rows();
//others
// $query_others_12 = $query_12->num_rows() - $query_Fajar_12->num_rows() - $query_Faoji_12->num_rows() - $query_Mashudy_12->num_rows() - $query_Okta_12->num_rows();
// $query_sudah_quote_others_12 = $query_sudah_quote_12->num_rows() - $query_sudah_quote_Fajar_12->num_rows() - $query_sudah_quote_Faoji_12->num_rows() - $query_sudah_quote_Mashudy_12->num_rows() - $query_sudah_quote_Okta_12->num_rows();
// $query_belum_quote_others_12->num_rows() = $query_belum_quote_12->num_rows() - $query_belum_quote_Fajar_12->num_rows() - $query_belum_quote_Faoji_12->num_rows() - $query_belum_quote_Mashudy_12->num_rows() - $query_belum_quote_Okta_12->num_rows();
// $query_po_others_12 = $query_po_12->num_rows() - $query_po_Fajar_12->num_rows() - $query_po_Faoji_12->num_rows() - $query_po_Mashudy_12->num_rows() - $query_po_Okta_12->num_rows();
// $query_quote_others_12 = $query_sudah_quote_others_12->num_rows() + $query_belum_quote_others_12->num_rows();
?>