
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Pengiriman extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_pengiriman");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_pengiriman"]=$this->m_pengiriman->get_all_pengiriman();
		$x["sidebar"]="pengiriman";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("pengiriman/pengiriman");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_pengiriman"]=$this->m_pengiriman->get_all_pengiriman();
		$this->load->view("pengiriman/cetak",$x);
	}


	public function lihat()
	{
		$x["data_pengiriman"]=$this->m_pengiriman->get_all_pengiriman();
    $x["sidebar"]="pengiriman2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("pengiriman/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$nama_wilayah=$this->input->post("nama_wilayah");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["nama_wilayah"]=$this->input->post("nama_wilayah");
		if ($nama_wilayah=="SEMUA") {
			$x["data_pengiriman"]=$this->db->query("SELECT * FROM barang_masuk,kurir,truk,pengiriman WHERE 
pengiriman.id_barang_masuk=barang_masuk.id_barang_masuk AND
pengiriman.id_kurir=kurir.id_kurir AND
pengiriman.id_truk=truk.id_truk AND date(tanggal_jam_pengiriman) BETWEEN date('$tgl1') AND date('$tgl2')");
		}else{
			$x["data_pengiriman"]=$this->db->query("SELECT * FROM barang_masuk,kurir,truk,pengiriman WHERE 
pengiriman.id_barang_masuk=barang_masuk.id_barang_masuk AND
pengiriman.id_kurir=kurir.id_kurir AND
pengiriman.id_truk=truk.id_truk AND nama_wilayah='$nama_wilayah' AND date(tanggal_jam_pengiriman) BETWEEN date('$tgl1') AND date('$tgl2')");	
		}
		
		$this->load->view("pengiriman/cetak_filter",$x);
	}

	public function perbulan()
	{
		$nama_wilayah=$this->input->post('nama_wilayah');
		$tahun=$this->input->post('tahun');
		$bulan=$this->input->post('bulan');
		$data['nama_wilayah']=$this->input->post('nama_wilayah');
		$data['tahun']=$this->input->post('tahun');
		$data['bulan']=$this->input->post('bulan');
		if ($this->input->post('bulan')=="Januari") {
			$bln=1;
		}elseif ($this->input->post('bulan')=="Februari") {
			$bln=2;
		}elseif ($this->input->post('bulan')=="Maret") {
			$bln=3;
		}elseif ($this->input->post('bulan')=="April") {
			$bln=4;
		}elseif ($this->input->post('bulan')=="Mei") {
			$bln=5;
		}elseif ($this->input->post('bulan')=="Juni") {
			$bln=6;
		}elseif ($this->input->post('bulan')=="Juli") {
			$bln=7;
		}elseif ($this->input->post('bulan')=="Agustus") {
			$bln=8;
		}elseif ($this->input->post('bulan')=="September") {
			$bln=9;
		}elseif ($this->input->post('bulan')=="Oktober") {
			$bln=10;
		}elseif ($this->input->post('bulan')=="November") {
			$bln=11;
		}elseif ($this->input->post('bulan')=="Desember") {
			$bln=12;
		}
		if ($nama_wilayah=="SEMUA") {
			$data["data_pengiriman"]=$this->db->query("SELECT * FROM barang_masuk,kurir,truk,pengiriman WHERE 
pengiriman.id_barang_masuk=barang_masuk.id_barang_masuk AND
pengiriman.id_kurir=kurir.id_kurir AND
pengiriman.id_truk=truk.id_truk AND YEAR(tanggal_jam_pengiriman)='$tahun' AND MONTH(tanggal_jam_pengiriman)='$bln' ");
		}else{
			$data["data_pengiriman"]=$this->db->query("SELECT * FROM barang_masuk,kurir,truk,pengiriman WHERE 
pengiriman.id_barang_masuk=barang_masuk.id_barang_masuk AND
pengiriman.id_kurir=kurir.id_kurir AND
pengiriman.id_truk=truk.id_truk AND nama_wilayah='$nama_wilayah' AND YEAR(tanggal_jam_pengiriman)='$tahun' AND MONTH(tanggal_jam_pengiriman)='$bln'");
		}
		
		$this->load->view('pengiriman/cetak_perbulan',$data);
	}

	public function pertahun()
	{
		$nama_wilayah=$this->input->post('nama_wilayah');
		$tahun=$this->input->post('tahun');
		$data['nama_wilayah']=$this->input->post('nama_wilayah');
		$data['tahun']=$this->input->post('tahun');
		if ($nama_wilayah=="SEMUA") {
			$data["data_pengiriman"]=$this->db->query("SELECT * FROM barang_masuk,kurir,truk,pengiriman WHERE 
pengiriman.id_barang_masuk=barang_masuk.id_barang_masuk AND
pengiriman.id_kurir=kurir.id_kurir AND
pengiriman.id_truk=truk.id_truk AND YEAR(tanggal_jam_pengiriman)='$tahun' ");
		}else{
			$data["data_pengiriman"]=$this->db->query("SELECT * FROM barang_masuk,kurir,truk,pengiriman WHERE 
pengiriman.id_barang_masuk=barang_masuk.id_barang_masuk AND
pengiriman.id_kurir=kurir.id_kurir AND
pengiriman.id_truk=truk.id_truk AND nama_wilayah='$nama_wilayah' AND YEAR(tanggal_jam_pengiriman)='$tahun'");
		}
		
		$this->load->view('pengiriman/cetak_pertahun',$data);
	}

	public function cetak2($id)
	{	
		$x["data_pengiriman"]=$this->db->query("SELECT * FROM barang_masuk,kurir,truk,pengiriman WHERE 
pengiriman.id_barang_masuk=barang_masuk.id_barang_masuk AND
pengiriman.id_kurir=kurir.id_kurir AND
pengiriman.id_truk=truk.id_truk AND pengiriman.id_pengiriman=".$id."")->row_array();
		$this->load->view("pengiriman/cetak2",$x);
	}
	

		public function simpan_pengiriman()
	{

				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx|rar|zip';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['file_bukti_kirim']['name']))
				{
				if($this->upload->do_upload('file_bukti_kirim'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data["file_bukti_kirim"] = $dok;



					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('pengiriman');
					}
				}
			
							$data["id_barang_masuk"] = $this->input->post("id_barang_masuk");
							$data["no_pengiriman"] = $this->input->post("no_pengiriman");
							$data["nama_wilayah"] = $this->input->post("nama_wilayah");
							$data["id_kurir"] = $this->input->post("id_kurir");
							$data["id_truk"] = $this->input->post("id_truk");
							$data["status_pengiriman"] = $this->input->post("status_pengiriman");
							$data["tanggal_jam_pengiriman"] = $this->input->post("tanggal_jam_pengiriman");

							$data["petugas_input_p1"] = $this->session->userdata("nama_lengkap");

				
				
					$result = $this->m_pengiriman->add_pengiriman($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("pengiriman"));
					}
	}



		public function update_pengiriman()
	{
		$id = $this->input->post("id_pengiriman"); 
		
				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx|rar|zip';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['file_bukti_kirim']['name']))
				{
				if($this->upload->do_upload('file_bukti_kirim'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data["file_bukti_kirim"] = $dok;



					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('pengiriman');
					}
				}
			
							$data["id_barang_masuk"] = $this->input->post("id_barang_masuk");
							$data["no_pengiriman"] = $this->input->post("no_pengiriman");
							$data["nama_wilayah"] = $this->input->post("nama_wilayah");
							$data["id_kurir"] = $this->input->post("id_kurir");
							$data["id_truk"] = $this->input->post("id_truk");
							$data["status_pengiriman"] = $this->input->post("status_pengiriman");
							$data["tanggal_jam_pengiriman"] = $this->input->post("tanggal_jam_pengiriman");
				
				
					$result = $this->m_pengiriman->edit_pengiriman($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("pengiriman"));
					}
	}


		public function update_pengiriman2()
	{
		$id = $this->input->post("id_pengiriman"); 
		
			
							$data["penilaian"] = $this->input->post("penilaian");
							$data["catatan_customer"] = $this->input->post("catatan_customer");
				
				
					$result = $this->m_pengiriman->edit_pengiriman($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit2", "Record is Added Successfully!");
						redirect(base_url("pengiriman"));
					}
	}

	function hapus_pengiriman(){
		$kode=$this->input->post("kode");
		$this->m_pengiriman->hapus_pengiriman($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("pengiriman");
	}
}
			