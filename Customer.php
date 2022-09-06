
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Customer extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_customer");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_customer"]=$this->m_customer->get_all_customer();
		$x["sidebar"]="customer";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("customer/customer");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_customer"]=$this->m_customer->get_all_customer();
		$this->load->view("customer/cetak",$x);
	}


	public function lihat()
	{
		$x["data_customer"]=$this->m_customer->get_all_customer();
    $x["sidebar"]="customer2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("customer/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_customer"]=$this->db->query("SELECT * FROM customer WHERE date() BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("customer/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_customer"]=$this->db->query("SELECT * FROM customer WHERE customer.id_customer=".$id."")->row_array();
		$this->load->view("customer/cetak2",$x);
	}
	

		public function simpan_customer()
	{
				$data["kode_customer"] = $this->input->post("kode_customer");
				$data["nama"] = $this->input->post("nama");
				$data["alamat"] = $this->input->post("alamat");
				$data["no_hp"] = $this->input->post("no_hp");
				$data["petugas_input"] = $this->session->userdata("nama_lengkap");

				if (!empty($this->input->post('password'))) {
					$data["password"] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				}
				
				
					$result = $this->m_customer->add_customer($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("customer"));
					}
	}



		public function update_customer()
	{
		$id = $this->input->post("id_customer"); 
		
				$data["kode_customer"] = $this->input->post("kode_customer");
				$data["nama"] = $this->input->post("nama");
				$data["alamat"] = $this->input->post("alamat");
				$data["no_hp"] = $this->input->post("no_hp");

				if (!empty($this->input->post('password'))) {
					$data["password"] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				}
				
				
					$result = $this->m_customer->edit_customer($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("customer"));
					}
	}

	function hapus_customer(){
		$kode=$this->input->post("kode");
		$this->m_customer->hapus_customer($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("customer");
	}
}
			