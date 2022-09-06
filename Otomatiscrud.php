<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otomatiscrud extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_otomatiscrud');
	}

	public function index()
	{
		$this->load->view('otomatiscrud');
	}

	public function proses()
	{

		$nama_asal=$this->input->post('nama_tabel');

		//cek file jika sudah ada
		$filename = 'application/controllers/'.ucwords($nama_asal).'.php';
		if (file_exists($filename)) {
		    $this->session->set_flashdata('sudah_ada', 'Record is Added Successfully!');
			redirect(base_url('otomatiscrud'));
		} else {
		    $rel=$this->input->post('query_relasi');
			$kolom_filter=$this->input->post('kolom_filter');
			$cetak_satuan=$this->input->post('cetak_satuan');
			  if (empty($this->input->post('tabel_responsive'))) {
		        $tabel_responsive="";
		      }else{
		        $tabel_responsive="table-responsive";
		      }
			  if (empty($this->input->post('query_relasi'))) {
		        $query_relasi="SELECT * FROM ".$nama_asal." WHERE";
		        $query_relasi2="SELECT * FROM ".$nama_asal."";
		      }else{
		        $query_relasi="".$rel." AND";
		        $query_relasi2=$this->input->post('query_relasi');
		      }
			$db_nama=$this->db->database;
			$this->m_otomatiscrud->membuat_folder($nama_asal);
			$this->m_otomatiscrud->membuat_file_view_inti($nama_asal,$db_nama,$cetak_satuan,$tabel_responsive);
			$this->m_otomatiscrud->membuat_file_cetak($nama_asal,$db_nama);
			$this->m_otomatiscrud->membuat_file_controller($nama_asal,$db_nama,$kolom_filter,$query_relasi);
			$this->m_otomatiscrud->membuat_file_models($nama_asal,$query_relasi2);

			//filter 
			if (!empty($kolom_filter)) {
				$this->m_otomatiscrud->membuat_file_lihat_filter($nama_asal,$db_nama,$tabel_responsive);
				$this->m_otomatiscrud->membuat_file_cetak_filter($nama_asal,$db_nama);
			}

			//cetak satuan 
			if (!empty($cetak_satuan)) {
				$this->m_otomatiscrud->membuat_file_cetak_satuan($nama_asal,$db_nama);
			}
			

			$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
			redirect(base_url('otomatiscrud'));
		}


		
	}


	public function carikolom(){
        $nama_tabel = $this->input->post('nama_tabel');
        $tabell = $this->db->list_fields("".$nama_tabel."");
        $lists = "<option value=''>--pilih kolom--</option>";
        $jum1=1;
        foreach($tabell as $kolom){
        	if ($jum1>1) {
        		$lists .= "<option>".$kolom."</option>";
        	}
            $jum1++;
        }	
        $callback = array('list_kolom'=>$lists); 
        echo json_encode($callback); 
    }

	
}