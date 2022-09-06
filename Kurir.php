
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Kurir extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_kurir");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_kurir"]=$this->m_kurir->get_all_kurir();
		$x["sidebar"]="kurir";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("kurir/kurir");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_kurir"]=$this->m_kurir->get_all_kurir();
		$this->load->view("kurir/cetak",$x);
	}


	public function lihat()
	{
		$x["data_kurir"]=$this->m_kurir->get_all_kurir();
    $x["sidebar"]="kurir2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("kurir/lihat");
		$this->load->view("footer");
	}

	public function lihat2()
	{
		$x["data_kurir"]=$this->m_kurir->get_all_kurir();
    	$x["sidebar"]="kurir3";
		$this->load->view("header",$x);
    	$this->load->view("sidebar");
		$this->load->view("kurir/lihat2");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_kurir"]=$this->db->query("SELECT * FROM kurir WHERE date(tmt_kurir) BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("kurir/cetak_filter",$x);
	}

	public function filter2()
	{	
		$tahun=$this->input->post("tahun");
		$x["tahun"]=$this->input->post("tahun");
		$bulan=$this->input->post("bulan");
		$x["bulan"]=$this->input->post("bulan");

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


		$this->load->view("kurir/cetak_filter2",$x);
	}

	public function filter3()
	{	
		$tahun=$this->input->post("tahun");
		$x["tahun"]=$this->input->post("tahun");
		$this->load->view("kurir/cetak_filter3",$x);
	}

	public function cetak2($id)
	{	
		$x["data_kurir"]=$this->db->query("SELECT * FROM kurir WHERE kurir.id_kurir=".$id."")->row_array();
		$this->load->view("kurir/cetak2",$x);
	}
	

		public function simpan_kurir()
	{

				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['foto_kurir']['name']))
				{
				if($this->upload->do_upload('foto_kurir'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data["foto_kurir"] = $dok;



					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('kurir');
					}
				}


			$data["nik"] = $this->input->post("nik");
			$data["nama"] = $this->input->post("nama");
				$data["tempat_lahir"] = $this->input->post("tempat_lahir");
				$data["tanggal_lahir"] = $this->input->post("tanggal_lahir");
				$data["jenis_kelamin"] = $this->input->post("jenis_kelamin");
				$data["agama"] = $this->input->post("agama");
				$data["alamat"] = $this->input->post("alamat");
				$data["no_hp"] = $this->input->post("no_hp");
				$data["tmt_kurir"] = $this->input->post("tmt_kurir");
				$data["petugas_input"] = $this->session->userdata("nama_lengkap");
				$data["count_kurir"] = 1;

				if (!empty($this->input->post('password'))) {
					$data["password"] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				}
				
				
					$result = $this->m_kurir->add_kurir($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("kurir"));
					}
	}



		public function update_kurir()
	{
		$id = $this->input->post("id_kurir"); 

		$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['foto_kurir']['name']))
				{
				if($this->upload->do_upload('foto_kurir'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data["foto_kurir"] = $dok;



					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('kurir');
					}
				}

				
		
			$data["nik"] = $this->input->post("nik");
			$data["nama"] = $this->input->post("nama");
				$data["tempat_lahir"] = $this->input->post("tempat_lahir");
				$data["tanggal_lahir"] = $this->input->post("tanggal_lahir");
				$data["jenis_kelamin"] = $this->input->post("jenis_kelamin");
				$data["agama"] = $this->input->post("agama");
				$data["alamat"] = $this->input->post("alamat");
				$data["no_hp"] = $this->input->post("no_hp");
				$data["tmt_kurir"] = $this->input->post("tmt_kurir");


				if (!empty($this->input->post('password'))) {
					$data["password"] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				}
				
				
					$result = $this->m_kurir->edit_kurir($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("kurir"));
					}
	}

	function hapus_kurir(){
		$kode=$this->input->post("kode");
		$this->m_kurir->hapus_kurir($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("kurir");
	}
}
			