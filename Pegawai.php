
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Pegawai extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_pegawai");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_pegawai"]=$this->m_pegawai->get_all_pegawai();
		$x["sidebar"]="pegawai";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("pegawai/pegawai");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_pegawai"]=$this->m_pegawai->get_all_pegawai();
		$this->load->view("pegawai/cetak",$x);
	}


	public function lihat()
	{
		$x["data_pegawai"]=$this->m_pegawai->get_all_pegawai();
    $x["sidebar"]="pegawai2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("pegawai/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_pegawai"]=$this->db->query("SELECT * FROM pegawai WHERE date(tmt_pegawai) BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("pegawai/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_pegawai"]=$this->db->query("SELECT * FROM pegawai WHERE pegawai.id_pegawai=".$id."")->row_array();
		$this->load->view("pegawai/cetak2",$x);
	}
	

		public function simpan_pegawai()
	{

				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['foto_pegawai']['name']))
				{
				if($this->upload->do_upload('foto_pegawai'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data["foto_pegawai"] = $dok;



					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('pegawai');
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
				$data["tmt_pegawai"] = $this->input->post("tmt_pegawai");
				
				
					$result = $this->m_pegawai->add_pegawai($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("pegawai"));
					}
	}



		public function update_pegawai()
	{
		$id = $this->input->post("id_pegawai"); 

				$config['upload_path'] = './assets/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$config['max_size']    = 0;
				$this->upload->initialize($config);
				if(!empty($_FILES['foto_pegawai']['name']))
				{
				if($this->upload->do_upload('foto_pegawai'))
					{
							$gbr = $this->upload->data();
							$dok=$gbr['file_name'];
							$data["foto_pegawai"] = $dok;



					}else{
						$this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
						redirect('pegawai');
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
				$data["tmt_pegawai"] = $this->input->post("tmt_pegawai");
				
				
					$result = $this->m_pegawai->edit_pegawai($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("pegawai"));
					}
	}

	function hapus_pegawai(){
		$kode=$this->input->post("kode");
		$this->m_pegawai->hapus_pegawai($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("pegawai");
	}
}
			