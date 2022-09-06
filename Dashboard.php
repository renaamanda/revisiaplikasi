<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_data');
		
	}

	public function index()
	{

		$x['sidebar']="dashboard";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('dashboard');
		$this->load->view('footer');
	}

	
}
