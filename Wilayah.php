
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Wilayah extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_wilayah");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_wilayah"]=$this->m_wilayah->get_all_wilayah();
		$x["sidebar"]="wilayah";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("wilayah/wilayah");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_wilayah"]=$this->m_wilayah->get_all_wilayah();
		$this->load->view("wilayah/cetak",$x);
	}


	public function lihat()
	{
		$x["data_wilayah"]=$this->m_wilayah->get_all_wilayah();
    $x["sidebar"]="wilayah2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("wilayah/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_wilayah"]=$this->db->query("SELECT * FROM wilayah WHERE date() BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("wilayah/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_wilayah"]=$this->db->query("SELECT * FROM wilayah WHERE wilayah.id_wilayah=".$id."")->row_array();
		$this->load->view("wilayah/cetak2",$x);
	}
	

		public function simpan_wilayah()
	{
			$data["nama_wilayah"] = $this->input->post("nama_wilayah");
				
				
					$result = $this->m_wilayah->add_wilayah($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("wilayah"));
					}
	}



		public function update_wilayah()
	{
		$id = $this->input->post("id_wilayah"); 
		
			$data["nama_wilayah"] = $this->input->post("nama_wilayah");
				
				
					$result = $this->m_wilayah->edit_wilayah($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("wilayah"));
					}
	}

	function hapus_wilayah(){
		$kode=$this->input->post("kode");
		$this->m_wilayah->hapus_wilayah($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("wilayah");
	}
}
			