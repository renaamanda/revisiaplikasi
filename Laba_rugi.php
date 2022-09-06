<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laba_rugi extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
	}

	public function halaman_print()
	{
		$x['sidebar']="laba_rugi2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('laba_rugi/halaman_print');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$this->load->view('laba_rugi/cetak_filter',$x);
	}

	public function cetak()
	{	
		$this->load->view('laba_rugi/cetak');
	}

}