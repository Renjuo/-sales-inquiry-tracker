<?php
$t=date('Y');
$b=date('m');
//ALL
$querys = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ'");
$querys_sudah_quote = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and progress_status = 'Sudah Quote'");
$querys_belum_quote = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and progress_status = 'Belum Quote'");
$querys_po = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and progress_status = 'Sudah PO'");
$querys_close = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and progress_status = 'close/gagal'");
//THIS MONTH
$querys_m = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)='$b' and year(tanggal_input)='$t'");
$querys_sudah_quote_m = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)='$b' and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_m = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)='$b' and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_m = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)='$b' and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$querys_close_m = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)='$b' and year(tanggal_input)='$t' and progress_status = 'close/gagal'");
//ALL YEAR
$querys_y_1 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and year(tanggal_input)='2018'");
$querys_y_2 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and year(tanggal_input)='2019'");
$querys_y_3 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and year(tanggal_input)='2020'");
$querys_y_4 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and year(tanggal_input)='2021'");



//JANUARI
$querys_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t'");
$querys_sudah_quote_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=01 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$querys_quote_01 = $querys_belum_quote_01->num_rows();
//Fajar
$querys_Fajar_01 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t'");
$querys_sudah_quote_Fajar_01 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_Fajar_01 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_Fajar_01 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_update)=01 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$querys_quote_Fajar_01 =  $querys_belum_quote_Fajar_01->num_rows();
//Faoji
$querys_Faoji_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and pic='Faoji'");
$querys_sudah_quote_Faoji_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$querys_belum_quote_Faoji_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$querys_po_Faoji_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=01 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$querys_quote_Faoji_01 =  $querys_belum_quote_Faoji_01->num_rows();
//Mashudy
$querys_Mashudy_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and pic='Mashudy'");
$querys_sudah_quote_Mashudy_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$querys_belum_quote_Mashudy_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$querys_po_Mashudy_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=01 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$querys_quote_Mashudy_01 =  $querys_belum_quote_Mashudy_01->num_rows();
//Okta
$querys_Okta_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and pic='Okta'");
$querys_sudah_quote_Okta_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$querys_belum_quote_Okta_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$querys_po_Okta_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=01 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$querys_quote_Okta_01 =  $querys_belum_quote_Okta_01->num_rows();
//Zulfikri
$querys_Zulfikri_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and pic='Zulfikri'");
$querys_sudah_quote_Zulfikri_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$querys_belum_quote_Zulfikri_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=01 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$querys_po_Zulfikri_01 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=01 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$querys_quote_Zulfikri_01 =  $querys_belum_quote_Zulfikri_01->num_rows();
//others
// $querys_others_01 = $querys_01->num_rows() - $querys_Fajar_01->num_rows() - $querys_Faoji_01->num_rows() - $querys_Mashudy_01->num_rows() - $querys_Okta_01->num_rows();
// $querys_sudah_quote_others_01 = $querys_sudah_quote_01->num_rows() - $querys_sudah_quote_Fajar_01->num_rows() - $querys_sudah_quote_Faoji_01->num_rows() - $querys_sudah_quote_Mashudy_01->num_rows() - $querys_sudah_quote_Okta_01->num_rows();
// $querys_belum_quote_others_01->num_rows() = $querys_belum_quote_01->num_rows() - $querys_belum_quote_Fajar_01->num_rows() - $querys_belum_quote_Faoji_01->num_rows() - $querys_belum_quote_Mashudy_01->num_rows() - $querys_belum_quote_Okta_01->num_rows();
// $querys_po_others_01 = $querys_po_01->num_rows() - $querys_po_Fajar_01->num_rows() - $querys_po_Faoji_01->num_rows() - $querys_po_Mashudy_01->num_rows() - $querys_po_Okta_01->num_rows();
// $querys_quote_others_01 = $querys_sudah_quote_others_01->num_rows() + $querys_belum_quote_others_01->num_rows();
//FEBRUARI
$querys_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t'");
$querys_sudah_quote_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=02 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$querys_quote_02 = $querys_sudah_quote_02->num_rows() + $querys_belum_quote_02->num_rows();
//Fajar
$querys_Fajar_02 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t'");
$querys_sudah_quote_Fajar_02 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_Fajar_02 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_Fajar_02 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_update)=02 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$querys_quote_Fajar_02 = $querys_belum_quote_Fajar_01->num_rows() + $querys_belum_quote_Fajar_02->num_rows();
//Faoji
$querys_Faoji_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and pic='Faoji'");
$querys_sudah_quote_Faoji_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$querys_belum_quote_Faoji_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$querys_po_Faoji_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=02 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$querys_quote_Faoji_02 = $querys_belum_quote_Faoji_01->num_rows() +  $querys_belum_quote_Faoji_02->num_rows();
//Mashudy
$querys_Mashudy_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and pic='Mashudy'");
$querys_sudah_quote_Mashudy_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$querys_belum_quote_Mashudy_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$querys_po_Mashudy_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=02 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$querys_quote_Mashudy_02 = $querys_belum_quote_Mashudy_01->num_rows() + $querys_belum_quote_Mashudy_02->num_rows();
//Okta
$querys_Okta_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and pic='Okta'");
$querys_sudah_quote_Okta_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$querys_belum_quote_Okta_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$querys_po_Okta_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=02 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$querys_quote_Okta_02 = $querys_belum_quote_Okta_01->num_rows() + $querys_belum_quote_Okta_02->num_rows();
//Zulfikri
$querys_Zulfikri_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and pic='Zulfikri'");
$querys_sudah_quote_Zulfikri_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$querys_belum_quote_Zulfikri_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=02 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$querys_po_Zulfikri_02 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=02 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$querys_quote_Zulfikri_02 = $querys_belum_quote_Zulfikri_01->num_rows() + $querys_belum_quote_Zulfikri_02->num_rows();
//others
// $querys_others_02 = $querys_02->num_rows() - $querys_Fajar_02->num_rows() - $querys_Faoji_02->num_rows() - $querys_Mashudy_02->num_rows() - $querys_Okta_02->num_rows();
// $querys_sudah_quote_others_02 = $querys_sudah_quote_02->num_rows() - $querys_sudah_quote_Fajar_02->num_rows() - $querys_sudah_quote_Faoji_02->num_rows() - $querys_sudah_quote_Mashudy_02->num_rows() - $querys_sudah_quote_Okta_02->num_rows();
// $querys_belum_quote_others_02->num_rows() = $querys_belum_quote_02->num_rows() - $querys_belum_quote_Fajar_02->num_rows() - $querys_belum_quote_Faoji_02->num_rows() - $querys_belum_quote_Mashudy_02->num_rows() - $querys_belum_quote_Okta_02->num_rows();
// $querys_po_others_02 = $querys_po_02->num_rows() - $querys_po_Fajar_02->num_rows() - $querys_po_Faoji_02->num_rows() - $querys_po_Mashudy_02->num_rows() - $querys_po_Okta_02->num_rows();
// $querys_quote_others_02 = $querys_sudah_quote_others_02->num_rows() + $querys_belum_quote_others_02->num_rows();
//MARET
$querys_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t'");
$querys_sudah_quote_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=03 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$querys_quote_03 = $querys_sudah_quote_03->num_rows() + $querys_belum_quote_03->num_rows();
//Fajar
$querys_Fajar_03 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t'");
$querys_sudah_quote_Fajar_03 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_Fajar_03 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_Fajar_03 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_update)=03 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$querys_quote_Fajar_03 = $querys_belum_quote_Fajar_01->num_rows() +$querys_belum_quote_Fajar_02->num_rows() + $querys_belum_quote_Fajar_03->num_rows();
//Faoji
$querys_Faoji_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and pic='Faoji'");
$querys_sudah_quote_Faoji_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$querys_belum_quote_Faoji_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$querys_po_Faoji_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=03 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$querys_quote_Faoji_03 = $querys_belum_quote_Faoji_01->num_rows() + $querys_belum_quote_Faoji_02->num_rows() +  $querys_belum_quote_Faoji_03->num_rows();
//Mashudy
$querys_Mashudy_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and pic='Mashudy'");
$querys_sudah_quote_Mashudy_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$querys_belum_quote_Mashudy_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$querys_po_Mashudy_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=03 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$querys_quote_Mashudy_03 = $querys_belum_quote_Mashudy_01->num_rows() + $querys_belum_quote_Mashudy_02->num_rows() + $querys_belum_quote_Mashudy_03->num_rows();
//Okta
$querys_Okta_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and pic='Okta'");
$querys_sudah_quote_Okta_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$querys_belum_quote_Okta_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$querys_po_Okta_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=03 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$querys_quote_Okta_03 = $querys_belum_quote_Okta_01->num_rows() + $querys_belum_quote_Okta_02->num_rows() + $querys_belum_quote_Okta_03->num_rows();
//Zulfikri
$querys_Zulfikri_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and pic='Zulfikri'");
$querys_sudah_quote_Zulfikri_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$querys_belum_quote_Zulfikri_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=03 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$querys_po_Zulfikri_03 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=03 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$querys_quote_Zulfikri_03 = $querys_belum_quote_Zulfikri_01->num_rows() + $querys_belum_quote_Zulfikri_02->num_rows() + $querys_belum_quote_Zulfikri_03->num_rows();
//others
// $querys_others_03 = $querys_03->num_rows() - $querys_Fajar_03->num_rows() - $querys_Faoji_03->num_rows() - $querys_Mashudy_03->num_rows() - $querys_Okta_03->num_rows();
// $querys_sudah_quote_others_03 = $querys_sudah_quote_03->num_rows() - $querys_sudah_quote_Fajar_03->num_rows() - $querys_sudah_quote_Faoji_03->num_rows() - $querys_sudah_quote_Mashudy_03->num_rows() - $querys_sudah_quote_Okta_03->num_rows();
// $querys_belum_quote_others_03->num_rows() = $querys_belum_quote_03->num_rows() - $querys_belum_quote_Fajar_03->num_rows() - $querys_belum_quote_Faoji_03->num_rows() - $querys_belum_quote_Mashudy_03->num_rows() - $querys_belum_quote_Okta_03->num_rows();
// $querys_po_others_03 = $querys_po_03->num_rows() - $querys_po_Fajar_03->num_rows() - $querys_po_Faoji_03->num_rows() - $querys_po_Mashudy_03->num_rows() - $querys_po_Okta_03->num_rows();
// $querys_quote_others_03 = $querys_sudah_quote_others_03->num_rows() + $querys_belum_quote_others_03->num_rows();
//APRIL
$querys_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t'");
$querys_sudah_quote_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=04 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$querys_quote_04 = $querys_sudah_quote_04->num_rows() + $querys_belum_quote_04->num_rows();
//Fajar
$querys_Fajar_04 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t'");
$querys_sudah_quote_Fajar_04 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_Fajar_04 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_Fajar_04 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_update)=04 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$querys_quote_Fajar_04 = $querys_belum_quote_Fajar_01->num_rows() + $querys_belum_quote_Fajar_02->num_rows() + $querys_belum_quote_Fajar_03->num_rows() + $querys_belum_quote_Fajar_04->num_rows();
//Faoji
$querys_Faoji_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and pic='Faoji'");
$querys_sudah_quote_Faoji_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$querys_belum_quote_Faoji_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$querys_po_Faoji_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=04 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$querys_quote_Faoji_04 = $querys_belum_quote_Faoji_01->num_rows() + $querys_belum_quote_Faoji_02->num_rows() + $querys_belum_quote_Faoji_03->num_rows() +  $querys_belum_quote_Faoji_04->num_rows();
//Mashudy
$querys_Mashudy_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and pic='Mashudy'");
$querys_sudah_quote_Mashudy_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$querys_belum_quote_Mashudy_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$querys_po_Mashudy_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=04 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$querys_quote_Mashudy_04 = $querys_belum_quote_Mashudy_01->num_rows() + $querys_belum_quote_Mashudy_02->num_rows() + $querys_belum_quote_Mashudy_03->num_rows() + $querys_belum_quote_Mashudy_04->num_rows();
//Okta
$querys_Okta_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and pic='Okta'");
$querys_sudah_quote_Okta_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$querys_belum_quote_Okta_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$querys_po_Okta_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=04 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$querys_quote_Okta_04 = $querys_belum_quote_Okta_01->num_rows() + $querys_belum_quote_Okta_02->num_rows() + $querys_belum_quote_Okta_03->num_rows() + $querys_belum_quote_Okta_04->num_rows();
//Zulfikri
$querys_Zulfikri_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and pic='Zulfikri'");
$querys_sudah_quote_Zulfikri_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$querys_belum_quote_Zulfikri_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=04 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$querys_po_Zulfikri_04 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=04 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$querys_quote_Zulfikri_04 = $querys_belum_quote_Zulfikri_01->num_rows() + $querys_belum_quote_Zulfikri_02->num_rows() + $querys_belum_quote_Zulfikri_03->num_rows() + $querys_belum_quote_Zulfikri_04->num_rows();
//others
// $querys_others_04 = $querys_04->num_rows() - $querys_Fajar_04->num_rows() - $querys_Faoji_04->num_rows() - $querys_Mashudy_04->num_rows() - $querys_Okta_04->num_rows();
// $querys_sudah_quote_others_04 = $querys_sudah_quote_04->num_rows() - $querys_sudah_quote_Fajar_04->num_rows() - $querys_sudah_quote_Faoji_04->num_rows() - $querys_sudah_quote_Mashudy_04->num_rows() - $querys_sudah_quote_Okta_04->num_rows();
// $querys_belum_quote_others_04->num_rows() = $querys_belum_quote_04->num_rows() - $querys_belum_quote_Fajar_04->num_rows() - $querys_belum_quote_Faoji_04->num_rows() - $querys_belum_quote_Mashudy_04->num_rows() - $querys_belum_quote_Okta_04->num_rows();
// $querys_po_others_04 = $querys_po_04->num_rows() - $querys_po_Fajar_04->num_rows() - $querys_po_Faoji_04->num_rows() - $querys_po_Mashudy_04->num_rows() - $querys_po_Okta_04->num_rows();
// $querys_quote_others_04 = $querys_sudah_quote_others_04->num_rows() + $querys_belum_quote_others_04->num_rows();
//MEI
$querys_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t'");
$querys_sudah_quote_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=05 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$querys_quote_05 = $querys_sudah_quote_05->num_rows() + $querys_belum_quote_05->num_rows();
//Fajar
$querys_Fajar_05 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t'");
$querys_sudah_quote_Fajar_05 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_Fajar_05 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_Fajar_05 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_update)=05 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$querys_quote_Fajar_05 = $querys_belum_quote_Fajar_01->num_rows() + $querys_belum_quote_Fajar_02->num_rows() + $querys_belum_quote_Fajar_03->num_rows() + $querys_belum_quote_Fajar_04->num_rows() + $querys_belum_quote_Fajar_05->num_rows();
//Faoji
$querys_Faoji_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and pic='Faoji'");
$querys_sudah_quote_Faoji_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$querys_belum_quote_Faoji_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$querys_po_Faoji_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=05 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$querys_quote_Faoji_05 = $querys_belum_quote_Faoji_01->num_rows() + $querys_belum_quote_Faoji_02->num_rows() + $querys_belum_quote_Faoji_03->num_rows() + $querys_belum_quote_Faoji_04->num_rows() +  $querys_belum_quote_Faoji_05->num_rows();
//Mashudy
$querys_Mashudy_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and pic='Mashudy'");
$querys_sudah_quote_Mashudy_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$querys_belum_quote_Mashudy_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$querys_po_Mashudy_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=05 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$querys_quote_Mashudy_05 = $querys_belum_quote_Mashudy_01->num_rows() + $querys_belum_quote_Mashudy_02->num_rows() + $querys_belum_quote_Mashudy_03->num_rows() + $querys_belum_quote_Mashudy_04->num_rows() + $querys_belum_quote_Mashudy_05->num_rows();
//Okta
$querys_Okta_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and pic='Okta'");
$querys_sudah_quote_Okta_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$querys_belum_quote_Okta_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$querys_po_Okta_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=05 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$querys_quote_Okta_05 = $querys_belum_quote_Okta_01->num_rows() + $querys_belum_quote_Okta_02->num_rows() + $querys_belum_quote_Okta_03->num_rows() + $querys_sudah_quote_Okta_04->num_rows() + $querys_belum_quote_Okta_05->num_rows();
//Zulfikri
$querys_Zulfikri_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and pic='Zulfikri'");
$querys_sudah_quote_Zulfikri_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$querys_belum_quote_Zulfikri_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=05 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$querys_po_Zulfikri_05 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=05 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$querys_quote_Zulfikri_05 = $querys_belum_quote_Zulfikri_01->num_rows() + $querys_belum_quote_Zulfikri_02->num_rows() + $querys_belum_quote_Zulfikri_03->num_rows() + $querys_belum_quote_Zulfikri_04->num_rows() + $querys_belum_quote_Zulfikri_05->num_rows();
//others
// $querys_others_05 = $querys_05->num_rows() - $querys_Fajar_05->num_rows() - $querys_Faoji_05->num_rows() - $querys_Mashudy_05->num_rows() - $querys_Okta_05->num_rows();
// $querys_sudah_quote_others_05 = $querys_sudah_quote_05->num_rows() - $querys_sudah_quote_Fajar_05->num_rows() - $querys_sudah_quote_Faoji_05->num_rows() - $querys_sudah_quote_Mashudy_05->num_rows() - $querys_sudah_quote_Okta_05->num_rows();
// $querys_belum_quote_others_05->num_rows() = $querys_belum_quote_05->num_rows() - $querys_belum_quote_Fajar_05->num_rows() - $querys_belum_quote_Faoji_05->num_rows() - $querys_belum_quote_Mashudy_05->num_rows() - $querys_belum_quote_Okta_05->num_rows();
// $querys_po_others_05 = $querys_po_05->num_rows() - $querys_po_Fajar_05->num_rows() - $querys_po_Faoji_05->num_rows() - $querys_po_Mashudy_05->num_rows() - $querys_po_Okta_05->num_rows();
// $querys_quote_others_05 = $querys_sudah_quote_others_05->num_rows() + $querys_belum_quote_others_05->num_rows();
//JUNI
$querys_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t'");
$querys_sudah_quote_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=06 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$querys_quote_06 = $querys_sudah_quote_06->num_rows() + $querys_belum_quote_06->num_rows();
//Fajar
$querys_Fajar_06 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t'");
$querys_sudah_quote_Fajar_06 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_Fajar_06 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_Fajar_06 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_update)=06 and year(tanggal_update)='$t' and progress_status = 'Sudah PO'");
$querys_quote_Fajar_06 = $querys_belum_quote_Fajar_01->num_rows() + $querys_belum_quote_Fajar_02->num_rows() + $querys_belum_quote_Fajar_03->num_rows() + $querys_belum_quote_Fajar_04->num_rows() + $querys_belum_quote_Fajar_05->num_rows() + $querys_belum_quote_Fajar_06->num_rows();
//Faoji
$querys_Faoji_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and pic='Faoji'");
$querys_sudah_quote_Faoji_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$querys_belum_quote_Faoji_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$querys_po_Faoji_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=06 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$querys_quote_Faoji_06 = $querys_belum_quote_Faoji_01->num_rows() + $querys_belum_quote_Faoji_02->num_rows() + $querys_belum_quote_Faoji_03->num_rows() + $querys_belum_quote_Faoji_04->num_rows() + $querys_belum_quote_Faoji_05->num_rows() +  $querys_belum_quote_Faoji_06->num_rows();
//Mashudy
$querys_Mashudy_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and pic='Mashudy'");
$querys_sudah_quote_Mashudy_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$querys_belum_quote_Mashudy_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$querys_po_Mashudy_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=06 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$querys_quote_Mashudy_06 = $querys_belum_quote_Mashudy_01->num_rows() + $querys_belum_quote_Mashudy_02->num_rows() + $querys_belum_quote_Mashudy_03->num_rows() + $querys_belum_quote_Mashudy_04->num_rows() + $querys_belum_quote_Mashudy_05->num_rows() + $querys_belum_quote_Mashudy_06->num_rows();
//Okta
$querys_Okta_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and pic='Okta'");
$querys_sudah_quote_Okta_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$querys_belum_quote_Okta_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$querys_po_Okta_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=06 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$querys_quote_Okta_06 = $querys_belum_quote_Okta_01->num_rows() + $querys_belum_quote_Okta_02->num_rows() + $querys_belum_quote_Okta_03->num_rows() + $querys_belum_quote_Okta_04->num_rows() + $querys_belum_quote_Okta_05->num_rows() + $querys_belum_quote_Okta_06->num_rows();
//Zulfikri
$querys_Zulfikri_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and pic='Zulfikri'");
$querys_sudah_quote_Zulfikri_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$querys_belum_quote_Zulfikri_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=06 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$querys_po_Zulfikri_06 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=06 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$querys_quote_Zulfikri_06 = $querys_belum_quote_Zulfikri_01->num_rows() + $querys_belum_quote_Zulfikri_02->num_rows() + $querys_belum_quote_Zulfikri_03->num_rows() + $querys_belum_quote_Zulfikri_04->num_rows() + $querys_belum_quote_Zulfikri_05->num_rows() + $querys_belum_quote_Zulfikri_06->num_rows();
//others
// $querys_others_06 = $querys_06->num_rows() - $querys_Fajar_06->num_rows() - $querys_Faoji_06->num_rows() - $querys_Mashudy_06->num_rows() - $querys_Okta_06->num_rows();
// $querys_sudah_quote_others_06 = $querys_sudah_quote_06->num_rows() - $querys_sudah_quote_Fajar_06->num_rows() - $querys_sudah_quote_Faoji_06->num_rows() - $querys_sudah_quote_Mashudy_06->num_rows() - $querys_sudah_quote_Okta_06->num_rows();
// $querys_belum_quote_others_06->num_rows() = $querys_belum_quote_06->num_rows() - $querys_belum_quote_Fajar_06->num_rows() - $querys_belum_quote_Faoji_06->num_rows() - $querys_belum_quote_Mashudy_06->num_rows() - $querys_belum_quote_Okta_06->num_rows();
// $querys_po_others_06 = $querys_po_06->num_rows() - $querys_po_Fajar_06->num_rows() - $querys_po_Faoji_06->num_rows() - $querys_po_Mashudy_06->num_rows() - $querys_po_Okta_06->num_rows();
// $querys_quote_others_06 = $querys_sudah_quote_others_06->num_rows() + $querys_belum_quote_others_06->num_rows();
//JULI
$querys_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t'");
$querys_sudah_quote_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$querys_quote_07 = $querys_sudah_quote_07->num_rows() + $querys_belum_quote_07->num_rows();
//Fajar
$querys_Fajar_07 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t'");
$querys_sudah_quote_Fajar_07 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_Fajar_07 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_Fajar_07 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$querys_quote_Fajar_07 = $querys_belum_quote_Fajar_01->num_rows() + $querys_belum_quote_Fajar_02->num_rows() + $querys_belum_quote_Fajar_03->num_rows() + $querys_belum_quote_Fajar_04->num_rows() + $querys_belum_quote_Fajar_05->num_rows() + $querys_belum_quote_Fajar_06->num_rows() + $querys_belum_quote_Fajar_07->num_rows();
//Faoji
$querys_Faoji_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and pic='Faoji'");
$querys_sudah_quote_Faoji_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$querys_belum_quote_Faoji_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$querys_po_Faoji_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$querys_quote_Faoji_07 = $querys_belum_quote_Faoji_01->num_rows() + $querys_belum_quote_Faoji_02->num_rows() + $querys_belum_quote_Faoji_03->num_rows() + $querys_belum_quote_Faoji_04->num_rows() + $querys_belum_quote_Faoji_05->num_rows() +  $querys_belum_quote_Faoji_06->num_rows() +  $querys_belum_quote_Faoji_07->num_rows();
//Mashudy
$querys_Mashudy_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and pic='Mashudy'");
$querys_sudah_quote_Mashudy_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$querys_belum_quote_Mashudy_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$querys_po_Mashudy_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$querys_quote_Mashudy_07 = $querys_belum_quote_Mashudy_01->num_rows() + $querys_belum_quote_Mashudy_02->num_rows() + $querys_belum_quote_Mashudy_03->num_rows() + $querys_belum_quote_Mashudy_04->num_rows() + $querys_belum_quote_Mashudy_05->num_rows() + $querys_belum_quote_Mashudy_06->num_rows() + $querys_belum_quote_Mashudy_07->num_rows();
//Okta
$querys_Okta_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and pic='Okta'");
$querys_sudah_quote_Okta_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$querys_belum_quote_Okta_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$querys_po_Okta_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$querys_quote_Okta_07 = $querys_belum_quote_Okta_01->num_rows() + $querys_belum_quote_Okta_02->num_rows() + $querys_belum_quote_Okta_03->num_rows() + $querys_belum_quote_Okta_04->num_rows() + $querys_belum_quote_Okta_05->num_rows() + $querys_belum_quote_Okta_06->num_rows() + $querys_belum_quote_Okta_07->num_rows();
//Zulfikri
$querys_Zulfikri_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and pic='Zulfikri'");
$querys_sudah_quote_Zulfikri_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$querys_belum_quote_Zulfikri_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=07 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$querys_po_Zulfikri_07 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=07 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$querys_quote_Zulfikri_07 = $querys_belum_quote_Zulfikri_01->num_rows() + $querys_belum_quote_Zulfikri_02->num_rows() + $querys_belum_quote_Zulfikri_03->num_rows() + $querys_belum_quote_Zulfikri_04->num_rows() + $querys_belum_quote_Zulfikri_05->num_rows() + $querys_belum_quote_Zulfikri_06->num_rows() + $querys_belum_quote_Zulfikri_07->num_rows();
//others
// $querys_others_07 = $querys_07->num_rows() - $querys_Fajar_07->num_rows() - $querys_Faoji_07->num_rows() - $querys_Mashudy_07->num_rows() - $querys_Okta_07->num_rows();
// $querys_sudah_quote_others_07 = $querys_sudah_quote_07->num_rows() - $querys_sudah_quote_Fajar_07->num_rows() - $querys_sudah_quote_Faoji_07->num_rows() - $querys_sudah_quote_Mashudy_07->num_rows() - $querys_sudah_quote_Okta_07->num_rows();
// $querys_belum_quote_others_07->num_rows() = $querys_belum_quote_07->num_rows() - $querys_belum_quote_Fajar_07->num_rows() - $querys_belum_quote_Faoji_07->num_rows() - $querys_belum_quote_Mashudy_07->num_rows() - $querys_belum_quote_Okta_07->num_rows();
// $querys_po_others_07 = $querys_po_07->num_rows() - $querys_po_Fajar_07->num_rows() - $querys_po_Faoji_07->num_rows() - $querys_po_Mashudy_07->num_rows() - $querys_po_Okta_07->num_rows();
// $querys_quote_others_07 = $querys_sudah_quote_others_07->num_rows() + $querys_belum_quote_others_07->num_rows();
//AGUSTUS
$querys_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t'");
$querys_sudah_quote_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$querys_quote_08 = $querys_sudah_quote_08->num_rows() + $querys_belum_quote_08->num_rows();
//Fajar
$querys_Fajar_08 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t'");
$querys_sudah_quote_Fajar_08 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_Fajar_08 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_Fajar_08 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$querys_quote_Fajar_08 = $querys_sudah_quote_Fajar_08->num_rows() + $querys_belum_quote_Fajar_08->num_rows();
//Faoji
$querys_Faoji_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and pic='Faoji'");
$querys_sudah_quote_Faoji_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$querys_belum_quote_Faoji_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$querys_po_Faoji_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$querys_quote_Faoji_08 = $querys_sudah_quote_Faoji_08->num_rows() +  $querys_belum_quote_Faoji_08->num_rows();
//Mashudy
$querys_Mashudy_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and pic='Mashudy'");
$querys_sudah_quote_Mashudy_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$querys_belum_quote_Mashudy_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$querys_po_Mashudy_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$querys_quote_Mashudy_08 = $querys_sudah_quote_Mashudy_08->num_rows() + $querys_belum_quote_Mashudy_08->num_rows();
//Okta
$querys_Okta_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and pic='Okta'");
$querys_sudah_quote_Okta_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$querys_belum_quote_Okta_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$querys_po_Okta_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$querys_quote_Okta_08 = $querys_sudah_quote_Okta_08->num_rows() + $querys_belum_quote_Okta_08->num_rows();
//Zulfikri
$querys_Zulfikri_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and pic='Zulfikri'");
$querys_sudah_quote_Zulfikri_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$querys_belum_quote_Zulfikri_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=08 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$querys_po_Zulfikri_08 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=08 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$querys_quote_Zulfikri_08 = $querys_sudah_quote_Zulfikri_08->num_rows() + $querys_belum_quote_Zulfikri_08->num_rows();
//others
// $querys_others_08 = $querys_08->num_rows() - $querys_Fajar_08->num_rows() - $querys_Faoji_08->num_rows() - $querys_Mashudy_08->num_rows() - $querys_Okta_08->num_rows();
// $querys_sudah_quote_others_08 = $querys_sudah_quote_08->num_rows() - $querys_sudah_quote_Fajar_08->num_rows() - $querys_sudah_quote_Faoji_08->num_rows() - $querys_sudah_quote_Mashudy_08->num_rows() - $querys_sudah_quote_Okta_08->num_rows();
// $querys_belum_quote_others_08->num_rows() = $querys_belum_quote_08->num_rows() - $querys_belum_quote_Fajar_08->num_rows() - $querys_belum_quote_Faoji_08->num_rows() - $querys_belum_quote_Mashudy_08->num_rows() - $querys_belum_quote_Okta_08->num_rows();
// $querys_po_others_08 = $querys_po_08->num_rows() - $querys_po_Fajar_08->num_rows() - $querys_po_Faoji_08->num_rows() - $querys_po_Mashudy_08->num_rows() - $querys_po_Okta_08->num_rows();
// $querys_quote_others_08 = $querys_sudah_quote_others_08->num_rows() + $querys_belum_quote_others_08->num_rows();
//SEPTEMBER
$querys_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t'");
$querys_sudah_quote_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$querys_quote_09 = $querys_sudah_quote_09->num_rows() + $querys_belum_quote_09->num_rows();
//Fajar
$querys_Fajar_09 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t'");
$querys_sudah_quote_Fajar_09 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_Fajar_09 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_Fajar_09 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$querys_quote_Fajar_09 = $querys_sudah_quote_Fajar_09->num_rows() + $querys_belum_quote_Fajar_09->num_rows();
//Faoji
$querys_Faoji_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and pic='Faoji'");
$querys_sudah_quote_Faoji_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$querys_belum_quote_Faoji_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$querys_po_Faoji_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$querys_quote_Faoji_09 = $querys_sudah_quote_Faoji_09->num_rows() +  $querys_belum_quote_Faoji_09->num_rows();
//Mashudy
$querys_Mashudy_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and pic='Mashudy'");
$querys_sudah_quote_Mashudy_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$querys_belum_quote_Mashudy_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$querys_po_Mashudy_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$querys_quote_Mashudy_09 = $querys_sudah_quote_Mashudy_09->num_rows() + $querys_belum_quote_Mashudy_09->num_rows();
//Okta
$querys_Okta_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and pic='Okta'");
$querys_sudah_quote_Okta_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$querys_belum_quote_Okta_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$querys_po_Okta_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$querys_quote_Okta_09 = $querys_sudah_quote_Okta_09->num_rows() + $querys_belum_quote_Okta_09->num_rows();
//Zulfikri
$querys_Zulfikri_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and pic='Zulfikri'");
$querys_sudah_quote_Zulfikri_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$querys_belum_quote_Zulfikri_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=09 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$querys_po_Zulfikri_09 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=09 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$querys_quote_Zulfikri_09 = $querys_sudah_quote_Zulfikri_09->num_rows() + $querys_belum_quote_Zulfikri_09->num_rows();
//others
// $querys_others_09 = $querys_09->num_rows() - $querys_Fajar_09->num_rows() - $querys_Faoji_09->num_rows() - $querys_Mashudy_09->num_rows() - $querys_Okta_09->num_rows();
// $querys_sudah_quote_others_09 = $querys_sudah_quote_09->num_rows() - $querys_sudah_quote_Fajar_09->num_rows() - $querys_sudah_quote_Faoji_09->num_rows() - $querys_sudah_quote_Mashudy_09->num_rows() - $querys_sudah_quote_Okta_09->num_rows();
// $querys_belum_quote_others_09->num_rows() = $querys_belum_quote_09->num_rows() - $querys_belum_quote_Fajar_09->num_rows() - $querys_belum_quote_Faoji_09->num_rows() - $querys_belum_quote_Mashudy_09->num_rows() - $querys_belum_quote_Okta_09->num_rows();
// $querys_po_others_09 = $querys_po_09->num_rows() - $querys_po_Fajar_09->num_rows() - $querys_po_Faoji_09->num_rows() - $querys_po_Mashudy_09->num_rows() - $querys_po_Okta_09->num_rows();
// $querys_quote_others_09 = $querys_sudah_quote_others_09->num_rows() + $querys_belum_quote_others_09->num_rows();
//OKTOBER
$querys_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t'");
$querys_sudah_quote_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$querys_quote_10 = $querys_sudah_quote_10->num_rows() + $querys_belum_quote_10->num_rows();
//Fajar
$querys_Fajar_10 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t'");
$querys_sudah_quote_Fajar_10 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_Fajar_10 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_Fajar_10 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$querys_quote_Fajar_10 = $querys_sudah_quote_Fajar_10->num_rows() + $querys_belum_quote_Fajar_10->num_rows();
//Faoji
$querys_Faoji_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and pic='Faoji'");
$querys_sudah_quote_Faoji_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$querys_belum_quote_Faoji_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$querys_po_Faoji_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$querys_quote_Faoji_10 = $querys_sudah_quote_Faoji_10->num_rows() +  $querys_belum_quote_Faoji_10->num_rows();
//Mashudy
$querys_Mashudy_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and pic='Mashudy'");
$querys_sudah_quote_Mashudy_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$querys_belum_quote_Mashudy_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$querys_po_Mashudy_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$querys_quote_Mashudy_10 = $querys_sudah_quote_Mashudy_10->num_rows() + $querys_belum_quote_Mashudy_10->num_rows();
//Okta
$querys_Okta_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and pic='Okta'");
$querys_sudah_quote_Okta_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$querys_belum_quote_Okta_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$querys_po_Okta_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$querys_quote_Okta_10 = $querys_sudah_quote_Okta_10->num_rows() + $querys_belum_quote_Okta_10->num_rows();
//Zulfikri
$querys_Zulfikri_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and pic='Zulfikri'");
$querys_sudah_quote_Zulfikri_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$querys_belum_quote_Zulfikri_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=10 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$querys_po_Zulfikri_10 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=10 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$querys_quote_Zulfikri_10 = $querys_sudah_quote_Zulfikri_10->num_rows() + $querys_belum_quote_Zulfikri_10->num_rows();
//others
// $querys_others_10 = $querys_10->num_rows() - $querys_Fajar_10->num_rows() - $querys_Faoji_10->num_rows() - $querys_Mashudy_10->num_rows() - $querys_Okta_10->num_rows();
// $querys_sudah_quote_others_10 = $querys_sudah_quote_10->num_rows() - $querys_sudah_quote_Fajar_10->num_rows() - $querys_sudah_quote_Faoji_10->num_rows() - $querys_sudah_quote_Mashudy_10->num_rows() - $querys_sudah_quote_Okta_10->num_rows();
// $querys_belum_quote_others_10->num_rows() = $querys_belum_quote_10->num_rows() - $querys_belum_quote_Fajar_10->num_rows() - $querys_belum_quote_Faoji_10->num_rows() - $querys_belum_quote_Mashudy_10->num_rows() - $querys_belum_quote_Okta_10->num_rows();
// $querys_po_others_10 = $querys_po_10->num_rows() - $querys_po_Fajar_10->num_rows() - $querys_po_Faoji_10->num_rows() - $querys_po_Mashudy_10->num_rows() - $querys_po_Okta_10->num_rows();
// $querys_quote_others_10 = $querys_sudah_quote_others_10->num_rows() + $querys_belum_quote_others_10->num_rows();
//NOVEMBER
$querys_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t'");
$querys_sudah_quote_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$querys_quote_11 = $querys_sudah_quote_11->num_rows() + $querys_belum_quote_11->num_rows();
//Fajar
$querys_Fajar_11 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t'");
$querys_sudah_quote_Fajar_11 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_Fajar_11 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_Fajar_11 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$querys_quote_Fajar_11 = $querys_sudah_quote_Fajar_11->num_rows() + $querys_belum_quote_Fajar_11->num_rows();
//Faoji
$querys_Faoji_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and pic='Faoji'");
$querys_sudah_quote_Faoji_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$querys_belum_quote_Faoji_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$querys_po_Faoji_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$querys_quote_Faoji_11 = $querys_sudah_quote_Faoji_11->num_rows() +  $querys_belum_quote_Faoji_11->num_rows();
//Mashudy
$querys_Mashudy_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and pic='Mashudy'");
$querys_sudah_quote_Mashudy_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$querys_belum_quote_Mashudy_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$querys_po_Mashudy_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$querys_quote_Mashudy_11 = $querys_sudah_quote_Mashudy_11->num_rows() + $querys_belum_quote_Mashudy_11->num_rows();
//Okta
$querys_Okta_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and pic='Okta'");
$querys_sudah_quote_Okta_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$querys_belum_quote_Okta_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$querys_po_Okta_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$querys_quote_Okta_11 = $querys_sudah_quote_Okta_11->num_rows() + $querys_belum_quote_Okta_11->num_rows();
//Zulfikri
$querys_Zulfikri_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and pic='Zulfikri'");
$querys_sudah_quote_Zulfikri_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$querys_belum_quote_Zulfikri_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=11 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$querys_po_Zulfikri_11 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=11 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$querys_quote_Zulfikri_11 = $querys_sudah_quote_Zulfikri_11->num_rows() + $querys_belum_quote_Zulfikri_11->num_rows();
//others
// $querys_others_11 = $querys_11->num_rows() - $querys_Fajar_11->num_rows() - $querys_Faoji_11->num_rows() - $querys_Mashudy_11->num_rows() - $querys_Okta_11->num_rows();
// $querys_sudah_quote_others_11 = $querys_sudah_quote_11->num_rows() - $querys_sudah_quote_Fajar_11->num_rows() - $querys_sudah_quote_Faoji_11->num_rows() - $querys_sudah_quote_Mashudy_11->num_rows() - $querys_sudah_quote_Okta_11->num_rows();
// $querys_belum_quote_others_11->num_rows() = $querys_belum_quote_11->num_rows() - $querys_belum_quote_Fajar_11->num_rows() - $querys_belum_quote_Faoji_11->num_rows() - $querys_belum_quote_Mashudy_11->num_rows() - $querys_belum_quote_Okta_11->num_rows();
// $querys_po_others_11 = $querys_po_11->num_rows() - $querys_po_Fajar_11->num_rows() - $querys_po_Faoji_11->num_rows() - $querys_po_Mashudy_11->num_rows() - $querys_po_Okta_11->num_rows();
// $querys_quote_others_11 = $querys_sudah_quote_others_11->num_rows() + $querys_belum_quote_others_11->num_rows();
//DESEMBER
$querys_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t'");
$querys_sudah_quote_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$querys_quote_12 = $querys_sudah_quote_12->num_rows() + $querys_belum_quote_12->num_rows();
//Fajar
$querys_Fajar_12 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t'");
$querys_sudah_quote_Fajar_12 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote'");
$querys_belum_quote_Fajar_12 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Belum Quote'");
$querys_po_Fajar_12 = $this->db->query("SELECT * FROM tsurat_2 where pic='Fajar' and  kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah PO'");
$querys_quote_Fajar_12 = $querys_sudah_quote_Fajar_12->num_rows() + $querys_belum_quote_Fajar_12->num_rows();
//Faoji
$querys_Faoji_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and pic='Faoji'");
$querys_sudah_quote_Faoji_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Faoji'");
$querys_belum_quote_Faoji_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Faoji'");
$querys_po_Faoji_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Faoji'");
$querys_quote_Faoji_12 = $querys_sudah_quote_Faoji_12->num_rows() +  $querys_belum_quote_Faoji_12->num_rows();
//Mashudy
$querys_Mashudy_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and pic='Mashudy'");
$querys_sudah_quote_Mashudy_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Mashudy'");
$querys_belum_quote_Mashudy_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Mashudy'");
$querys_po_Mashudy_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Mashudy'");
$querys_quote_Mashudy_12 = $querys_sudah_quote_Mashudy_12->num_rows() + $querys_belum_quote_Mashudy_12->num_rows();
//Okta
$querys_Okta_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and pic='Okta'");
$querys_sudah_quote_Okta_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Okta'");
$querys_belum_quote_Okta_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Okta'");
$querys_po_Okta_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah PO' and pic='Okta'");
$querys_quote_Okta_12 = $querys_sudah_quote_Okta_12->num_rows() + $querys_belum_quote_Okta_12->num_rows();
//Zulfikri
$querys_Zulfikri_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and pic='Zulfikri'");
$querys_sudah_quote_Zulfikri_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Sudah Quote' and pic='Zulfikri'");
$querys_belum_quote_Zulfikri_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_input)=12 and year(tanggal_input)='$t' and progress_status = 'Belum Quote' and pic='Zulfikri'");
$querys_po_Zulfikri_12 = $this->db->query("SELECT * FROM tsurat_2 where kode_jenis = 'INQ' and month(tanggal_update)=12 and year(tanggal_update)='$t' and progress_status = 'Sudah PO' and pic='Zulfikri'");
$querys_quote_Zulfikri_12 = $querys_sudah_quote_Zulfikri_12->num_rows() + $querys_belum_quote_Zulfikri_12->num_rows();
//others
// $querys_others_12 = $querys_12->num_rows() - $querys_Fajar_12->num_rows() - $querys_Faoji_12->num_rows() - $querys_Mashudy_12->num_rows() - $querys_Okta_12->num_rows();
// $querys_sudah_quote_others_12 = $querys_sudah_quote_12->num_rows() - $querys_sudah_quote_Fajar_12->num_rows() - $querys_sudah_quote_Faoji_12->num_rows() - $querys_sudah_quote_Mashudy_12->num_rows() - $querys_sudah_quote_Okta_12->num_rows();
// $querys_belum_quote_others_12->num_rows() = $querys_belum_quote_12->num_rows() - $querys_belum_quote_Fajar_12->num_rows() - $querys_belum_quote_Faoji_12->num_rows() - $querys_belum_quote_Mashudy_12->num_rows() - $querys_belum_quote_Okta_12->num_rows();
// $querys_po_others_12 = $querys_po_12->num_rows() - $querys_po_Fajar_12->num_rows() - $querys_po_Faoji_12->num_rows() - $querys_po_Mashudy_12->num_rows() - $querys_po_Okta_12->num_rows();
// $querys_quote_others_12 = $querys_sudah_quote_others_12->num_rows() + $querys_belum_quote_others_12->num_rows();
?>