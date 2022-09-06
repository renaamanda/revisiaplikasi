
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Tracking extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_tracking");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_tracking"]=$this->m_tracking->get_all_tracking();
		$x["sidebar"]="tracking";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("tracking/tracking");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_tracking"]=$this->m_tracking->get_all_tracking();
		$this->load->view("tracking/cetak",$x);
	}


	public function lihat()
	{
		$x["data_tracking"]=$this->m_tracking->get_all_tracking();
    $x["sidebar"]="tracking2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("tracking/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_tracking"]=$this->db->query("SELECT * FROM tracking,barang_masuk,kurir WHERE
tracking.id_barang_masuk=barang_masuk.id_barang_masuk AND
tracking.id_kurir=kurir.id_kurir AND date(tanggal_jam_tracking) BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("tracking/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_tracking"]=$this->db->query("SELECT * FROM tracking,barang_masuk,kurir WHERE
tracking.id_barang_masuk=barang_masuk.id_barang_masuk AND
tracking.id_kurir=kurir.id_kurir AND tracking.id_tracking=".$id."")->row_array();
		$this->load->view("tracking/cetak2",$x);
	}
	

		public function simpan_tracking()
	{
			$data["id_barang_masuk"] = $this->input->post("id_barang_masuk");
				$data["id_kurir"] = $this->input->post("id_kurir");
				$data["tanggal_jam_tracking"] = $this->input->post("tanggal_jam_tracking");
				$data["status_kirim"] = $this->input->post("status_kirim");
				$data["catatan_tracking"] = $this->input->post("catatan_tracking");
				$data["petugas_input_tr"] = $this->session->userdata("nama_lengkap");
				
				
					$result = $this->m_tracking->add_tracking($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("tracking"));
					}
	}



		public function update_tracking()
	{
		$id = $this->input->post("id_tracking"); 
		
			$data["id_barang_masuk"] = $this->input->post("id_barang_masuk");
				$data["id_kurir"] = $this->input->post("id_kurir");
				$data["tanggal_jam_tracking"] = $this->input->post("tanggal_jam_tracking");
				$data["status_kirim"] = $this->input->post("status_kirim");
				$data["catatan_tracking"] = $this->input->post("catatan_tracking");
				
				
					$result = $this->m_tracking->edit_tracking($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("tracking"));
					}
	}

	function hapus_tracking(){
		$kode=$this->input->post("kode");
		$this->m_tracking->hapus_tracking($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("tracking");
	}
}
			