
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Pengeluaran extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_pengeluaran");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_pengeluaran"]=$this->m_pengeluaran->get_all_pengeluaran();
		$x["sidebar"]="pengeluaran";
	    $this->load->view("header",$x);
	    $this->load->view("sidebar");
	    $this->load->view("pengeluaran/pengeluaran");
	    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_pengeluaran"]=$this->m_pengeluaran->get_all_pengeluaran();
		$this->load->view("pengeluaran/cetak",$x);
	}


	public function lihat()
	{
		$x["data_pengeluaran"]=$this->m_pengeluaran->get_all_pengeluaran();
    $x["sidebar"]="pengeluaran2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("pengeluaran/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_pengeluaran"]=$this->db->query("SELECT * FROM pengeluaran,cabang WHERE 
pengeluaran.id_cabang=cabang.id_cabang AND date(tanggal_pengeluaran) BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("pengeluaran/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_pengeluaran"]=$this->db->query("SELECT * FROM pengeluaran,cabang WHERE 
pengeluaran.id_cabang=cabang.id_cabang AND pengeluaran.id_pengeluaran=".$id."")->row_array();
		$this->load->view("pengeluaran/cetak2",$x);
	}
	

		public function simpan_pengeluaran()
	{
				$biaya_pengeluaran=str_replace(".", "", $this->input->post('biaya_pengeluaran'));
				$data["id_cabang"] = $this->input->post("id_cabang");
				$data["nama_pengeluaran"] = $this->input->post("nama_pengeluaran");
				$data["tanggal_pengeluaran"] = $this->input->post("tanggal_pengeluaran");
				$data["biaya_pengeluaran"] = $biaya_pengeluaran;
				$data["keterangan"] = $this->input->post("keterangan");
				$data["petugas_input_p2"] = $this->session->userdata("nama_lengkap");
				
				
					$result = $this->m_pengeluaran->add_pengeluaran($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("pengeluaran"));
					}
	}



		public function update_pengeluaran()
	{
		$id = $this->input->post("id_pengeluaran"); 
		
				$biaya_pengeluaran=str_replace(".", "", $this->input->post('biaya_pengeluaran'));
				$data["id_cabang"] = $this->input->post("id_cabang");
				$data["nama_pengeluaran"] = $this->input->post("nama_pengeluaran");
				$data["tanggal_pengeluaran"] = $this->input->post("tanggal_pengeluaran");
				$data["biaya_pengeluaran"] = $biaya_pengeluaran;
				$data["keterangan"] = $this->input->post("keterangan");
				
				
					$result = $this->m_pengeluaran->edit_pengeluaran($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("pengeluaran"));
					}
	}

	function hapus_pengeluaran(){
		$kode=$this->input->post("kode");
		$this->m_pengeluaran->hapus_pengeluaran($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("pengeluaran");
	}
}
			