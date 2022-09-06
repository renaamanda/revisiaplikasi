
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Barang_masuk extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_barang_masuk");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_barang_masuk"]=$this->m_barang_masuk->get_all_barang_masuk();
		$x["sidebar"]="barang_masuk";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("barang_masuk/barang_masuk");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_barang_masuk"]=$this->m_barang_masuk->get_all_barang_masuk();
		$this->load->view("barang_masuk/cetak",$x);
	}


	public function lihat()
	{
		$x["data_barang_masuk"]=$this->m_barang_masuk->get_all_barang_masuk();
    $x["sidebar"]="barang_masuk2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("barang_masuk/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_barang_masuk"]=$this->db->query("SELECT *, pegawai.nama as nama_p, customer.nama nama_c FROM barang_masuk,pegawai,customer,cabang WHERE 
barang_masuk.id_pegawai=pegawai.id_pegawai AND
barang_masuk.id_customer=customer.id_customer AND
barang_masuk.id_cabang=cabang.id_cabang AND date(tanggal_jam_masuk) BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("barang_masuk/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_barang_masuk"]=$this->db->query("SELECT *, pegawai.nama as nama_p, customer.nama nama_c FROM barang_masuk,pegawai,customer,cabang WHERE 
barang_masuk.id_pegawai=pegawai.id_pegawai AND
barang_masuk.id_customer=customer.id_customer AND
barang_masuk.id_cabang=cabang.id_cabang AND barang_masuk.id_barang_masuk=".$id."")->row_array();
		$this->load->view("barang_masuk/cetak2",$x);
	}
	

		public function simpan_barang_masuk()
	{

		$total_biaya=str_replace(".", "", $this->input->post('total_biaya'));
			$data["no_transaksi"] = $this->input->post("no_transaksi");
				$data["id_pegawai"] = $this->input->post("id_pegawai");
				$data["id_customer"] = $this->input->post("id_customer");
				$data["id_cabang"] = $this->input->post("id_cabang");
				$data["nama_barang"] = $this->input->post("nama_barang");
				$data["tanggal_jam_masuk"] = $this->input->post("tanggal_jam_masuk");
				$data["total_biaya"] = $total_biaya;
				$data["nama_penerima"] = $this->input->post("nama_penerima");
				$data["telp_penerima"] = $this->input->post("telp_penerima");
				$data["alamat_penerima"] = $this->input->post("alamat_penerima");
				$data["jumlah"] = $this->input->post("jumlah");
				$data["berat"] = $this->input->post("berat");
				$data["satuan"] = $this->input->post("satuan");
				$data["petugas_input_bm"] = $this->session->userdata("nama_lengkap");
				
				
					$result = $this->m_barang_masuk->add_barang_masuk($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("barang_masuk"));
					}
	}



		public function update_barang_masuk()
	{
		$id = $this->input->post("id_barang_masuk"); 
		
			$total_biaya=str_replace(".", "", $this->input->post('total_biaya'));
			$data["no_transaksi"] = $this->input->post("no_transaksi");
				$data["id_pegawai"] = $this->input->post("id_pegawai");
				$data["id_customer"] = $this->input->post("id_customer");
				$data["id_cabang"] = $this->input->post("id_cabang");
				$data["nama_barang"] = $this->input->post("nama_barang");
				$data["tanggal_jam_masuk"] = $this->input->post("tanggal_jam_masuk");
				$data["total_biaya"] = $total_biaya;
				$data["nama_penerima"] = $this->input->post("nama_penerima");
				$data["telp_penerima"] = $this->input->post("telp_penerima");
				$data["alamat_penerima"] = $this->input->post("alamat_penerima");
				$data["jumlah"] = $this->input->post("jumlah");
				$data["berat"] = $this->input->post("berat");
				$data["satuan"] = $this->input->post("satuan");
				
				
					$result = $this->m_barang_masuk->edit_barang_masuk($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("barang_masuk"));
					}
	}

	function hapus_barang_masuk(){
		$kode=$this->input->post("kode");
		$this->m_barang_masuk->hapus_barang_masuk($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("barang_masuk");
	}
}
			