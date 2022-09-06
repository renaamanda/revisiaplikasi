
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Tanda_terima extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_tanda_terima");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_tanda_terima"]=$this->m_tanda_terima->get_all_tanda_terima();
		$x["sidebar"]="tanda_terima";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("tanda_terima/tanda_terima");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_tanda_terima"]=$this->m_tanda_terima->get_all_tanda_terima();
		$this->load->view("tanda_terima/cetak",$x);
	}


	public function lihat()
	{
		$x["data_tanda_terima"]=$this->m_tanda_terima->get_all_tanda_terima();
    $x["sidebar"]="tanda_terima2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("tanda_terima/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_tanda_terima"]=$this->db->query("SELECT * FROM barang_masuk,tanda_terima WHERE 
tanda_terima.id_barang_masuk=barang_masuk.id_barang_masuk AND date(tanggal_surat) BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("tanda_terima/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_tanda_terima"]=$this->db->query("SELECT *, pegawai.nama as nama_p, customer.nama nama_c, customer.alamat as alamat_c, customer.no_hp as no_hp_c FROM tanda_terima,barang_masuk,pegawai,customer,cabang WHERE 
barang_masuk.id_pegawai=pegawai.id_pegawai AND
barang_masuk.id_customer=customer.id_customer AND
barang_masuk.id_cabang=cabang.id_cabang AND tanda_terima.id_barang_masuk=barang_masuk.id_barang_masuk AND tanda_terima.id_tanda_terima=".$id."")->row_array();
		$this->load->view("tanda_terima/cetak2",$x);
	}
	

		public function simpan_tanda_terima()
	{
			$data["nomor_surat_tanda_terima"] = $this->input->post("nomor_surat_tanda_terima");
				$data["id_barang_masuk"] = $this->input->post("id_barang_masuk");
				$data["tanggal_surat"] = $this->input->post("tanggal_surat");
				$data["petugas_input_tt"] = $this->session->userdata("nama_lengkap");
				
				
					$result = $this->m_tanda_terima->add_tanda_terima($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("tanda_terima"));
					}
	}



		public function update_tanda_terima()
	{
		$id = $this->input->post("id_tanda_terima"); 
		
			$data["nomor_surat_tanda_terima"] = $this->input->post("nomor_surat_tanda_terima");
				$data["id_barang_masuk"] = $this->input->post("id_barang_masuk");
				$data["tanggal_surat"] = $this->input->post("tanggal_surat");
				
				
					$result = $this->m_tanda_terima->edit_tanda_terima($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("tanda_terima"));
					}
	}

	function hapus_tanda_terima(){
		$kode=$this->input->post("kode");
		$this->m_tanda_terima->hapus_tanda_terima($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("tanda_terima");
	}
}
			