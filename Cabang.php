
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Cabang extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_cabang");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_cabang"]=$this->m_cabang->get_all_cabang();
		$x["sidebar"]="cabang";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("cabang/cabang");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_cabang"]=$this->m_cabang->get_all_cabang();
		$this->load->view("cabang/cetak",$x);
	}


	public function lihat()
	{
		$x["data_cabang"]=$this->m_cabang->get_all_cabang();
    $x["sidebar"]="cabang2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("cabang/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_cabang"]=$this->db->query("SELECT * FROM cabang WHERE date() BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("cabang/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_cabang"]=$this->db->query("SELECT * FROM cabang WHERE cabang.id_cabang=".$id."")->row_array();
		$this->load->view("cabang/cetak2",$x);
	}
	

		public function simpan_cabang()
	{
			$data["nama_cabang"] = $this->input->post("nama_cabang");
				$data["kota"] = $this->input->post("kota");
				$data["alamat"] = $this->input->post("alamat");
				$data["no_telp"] = $this->input->post("no_telp");
				$data["petugas_input"] = $this->session->userdata("nama_lengkap");
				
				
					$result = $this->m_cabang->add_cabang($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("cabang"));
					}
	}



		public function update_cabang()
	{
		$id = $this->input->post("id_cabang"); 
		
			$data["nama_cabang"] = $this->input->post("nama_cabang");
				$data["kota"] = $this->input->post("kota");
				$data["alamat"] = $this->input->post("alamat");
				$data["no_telp"] = $this->input->post("no_telp");
				
				
					$result = $this->m_cabang->edit_cabang($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("cabang"));
					}
	}

	function hapus_cabang(){
		$kode=$this->input->post("kode");
		$this->m_cabang->hapus_cabang($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("cabang");
	}
}
			