
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Pemasukan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_pemasukan"]=$this->m_pemasukan->get_all_pemasukan();
		$x["sidebar"]="pemasukan";
	    $this->load->view("header",$x);
	    $this->load->view("sidebar");
	    $this->load->view("pemasukan/pemasukan");
	    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_pemasukan"]=$this->m_pemasukan->get_all_pemasukan();
		$this->load->view("pemasukan/cetak",$x);
	}


	public function halaman_print()
	{
    $x["sidebar"]="pemasukan2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("pemasukan/halaman_print");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_pemasukan"]=$this->db->query("SELECT * FROM pemasukan,cabang WHERE pemasukan.id_cabang=cabang.id_cabang AND date(tanggal_pemasukan) BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("pemasukan/cetak_filter",$x);
	}


	public function filter2()
	{	

		

		$bulan=$this->input->post("bulan");
		$tahun=$this->input->post("tahun");
		$x["bulan"]=$this->input->post("bulan");
		$x["tahun"]=$this->input->post("tahun");
		if ($this->input->post('bulan')=="Januari") {
			$bln=1;
			$bln2="January";
		}elseif ($this->input->post('bulan')=="Februari") {
			$bln=2;
			$bln2="February";
		}elseif ($this->input->post('bulan')=="Maret") {
			$bln=3;
			$bln2="March";
		}elseif ($this->input->post('bulan')=="April") {
			$bln=4;
			$bln2="April";
		}elseif ($this->input->post('bulan')=="Mei") {
			$bln=5;
			$bln2="May";
		}elseif ($this->input->post('bulan')=="Juni") {
			$bln=6;
			$bln2="June";
		}elseif ($this->input->post('bulan')=="Juli") {
			$bln=7;
			$bln2="July";
		}elseif ($this->input->post('bulan')=="Agustus") {
			$bln=8;
			$bln2="August";
		}elseif ($this->input->post('bulan')=="September") {
			$bln=9;
			$bln2="September";
		}elseif ($this->input->post('bulan')=="Oktober") {
			$bln=10;
			$bln2="October";
		}elseif ($this->input->post('bulan')=="November") {
			$bln=11;
			$bln2="November";
		}elseif ($this->input->post('bulan')=="Desember") {
			$bln=12;
			$bln2="December";
		}
		$x["bln"]=$bln;
		$x["bln2"]=$bln2;

		

		

		
		$this->load->view("pemasukan/cetak_filter2",$x);
	}	

		public function filter3()
	{	
		$tahun=$this->input->post("tahun");
		$x["tahun"]=$this->input->post("tahun");

		

		$this->load->view("pemasukan/cetak_filter3",$x);
	}


}
			