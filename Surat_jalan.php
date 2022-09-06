
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Surat_jalan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_surat_jalan");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_surat_jalan"]=$this->m_surat_jalan->get_all_surat_jalan();
		$x["sidebar"]="surat_jalan";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("surat_jalan/surat_jalan");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_surat_jalan"]=$this->m_surat_jalan->get_all_surat_jalan();
		$this->load->view("surat_jalan/cetak",$x);
	}


	public function lihat()
	{
		$x["data_surat_jalan"]=$this->m_surat_jalan->get_all_surat_jalan();
    $x["sidebar"]="surat_jalan2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("surat_jalan/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_surat_jalan"]=$this->db->query("SELECT *, pegawai.nama as nama_p FROM surat_jalan,pegawai,kurir where surat_jalan.id_pegawai=pegawai.id_pegawai AND surat_jalan.id_kurir=kurir.id_kurir AND date(tanggal_surat) BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("surat_jalan/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_surat_jalan"]=$this->db->query("SELECT *, pegawai.nama as nama_p FROM surat_jalan,pegawai,kurir where surat_jalan.id_pegawai=pegawai.id_pegawai AND surat_jalan.id_kurir=kurir.id_kurir AND surat_jalan.id_surat_jalan='$id'")->row_array();
		$this->load->view("surat_jalan/cetak2",$x);
	}
	

		public function simpan_surat_jalan()
	{
		$id_barang_masuk = implode(',', $this->input->post('id_barang_masuk'));
			$data["nomor_surat_jalan"] = $this->input->post("nomor_surat_jalan");
			$data["tujuan_pengiriman"] = $this->input->post("tujuan_pengiriman");
				$data["id_barang_masuk"] = $id_barang_masuk;
				$data["tanggal_surat"] = $this->input->post("tanggal_surat");
				$data["id_pegawai"] = $this->input->post("id_pegawai");
				$data["id_kurir"] = $this->input->post("id_kurir");
				$data["petugas_input_sj"] = $this->session->userdata("nama_lengkap");
				
				
					$result = $this->m_surat_jalan->add_surat_jalan($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("surat_jalan"));
					}
	}



		public function update_surat_jalan()
	{
		$id = $this->input->post("id_surat_jalan"); 
		
			$id_barang_masuk = implode(',', $this->input->post('id_barang_masuk'));
			$data["nomor_surat_jalan"] = $this->input->post("nomor_surat_jalan");
			$data["tujuan_pengiriman"] = $this->input->post("tujuan_pengiriman");
				$data["id_barang_masuk"] = $id_barang_masuk;
				$data["tanggal_surat"] = $this->input->post("tanggal_surat");
				$data["id_pegawai"] = $this->input->post("id_pegawai");
				$data["id_kurir"] = $this->input->post("id_kurir");
				
				
					$result = $this->m_surat_jalan->edit_surat_jalan($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("surat_jalan"));
					}
	}

	function hapus_surat_jalan(){
		$kode=$this->input->post("kode");
		$this->m_surat_jalan->hapus_surat_jalan($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("surat_jalan");
	}
}
			