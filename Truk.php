
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Truk extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_truk");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_truk"]=$this->m_truk->get_all_truk();
		$x["sidebar"]="truk";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("truk/truk");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_truk"]=$this->m_truk->get_all_truk();
		$this->load->view("truk/cetak",$x);
	}


	public function lihat()
	{
		$x["data_truk"]=$this->m_truk->get_all_truk();
    $x["sidebar"]="truk2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("truk/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_truk"]=$this->db->query("SELECT * FROM truk WHERE date() BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("truk/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_truk"]=$this->db->query("SELECT * FROM truk WHERE truk.id_truk=".$id."")->row_array();
		$this->load->view("truk/cetak2",$x);
	}
	

		public function simpan_truk()
	{
			$data["nama_truk"] = $this->input->post("nama_truk");
				$data["plat"] = $this->input->post("plat");
				$data["kapasitas"] = $this->input->post("kapasitas");
				$data["petugas_input"] = $this->session->userdata("nama_lengkap");
				
				
					$result = $this->m_truk->add_truk($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("truk"));
					}
	}



		public function update_truk()
	{
		$id = $this->input->post("id_truk"); 
		
			$data["nama_truk"] = $this->input->post("nama_truk");
				$data["plat"] = $this->input->post("plat");
				$data["kapasitas"] = $this->input->post("kapasitas");
				
				
					$result = $this->m_truk->edit_truk($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("truk"));
					}
	}

	function hapus_truk(){
		$kode=$this->input->post("kode");
		$this->m_truk->hapus_truk($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("truk");
	}
}
			