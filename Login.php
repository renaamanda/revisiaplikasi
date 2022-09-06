<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

		function __construct(){
		parent::__construct();
      
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function lupa_pass()
	{
		$this->load->view('lupa_pass');
	}

	function aksi_login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');

        $result = $this->db->get_where('pengguna', ['username' => $username])->row_array();
        $result2 = $this->db->get_where('kurir', ['nik' => $username])->row_array();
        $result3 = $this->db->get_where('customer', ['kode_customer' => $username])->row_array();

        // jika usernya ada
        if ($result) {
                if (password_verify($password, $result['password'])) {
                    $data_session = array(
							'id_pengguna2' => $result['id_pengguna'],
							'username2' => $result['username'],
							'nama_lengkap' => $result['nama_lengkap'],
							'no_hp' => $result['no_hp'],
							'foto' => "",
							'level' => $result['level'],
							'email' => $result['email'],
						 	'status2' => "loggg"
						);
					$this->session->set_userdata($data_session);
					$this->session->set_flashdata('berhasil_login', ' ');
					redirect("dashboard");
                } else {
                    $this->session->set_flashdata('data_salah_login', 'Password Salah!');
					redirect("login");
                }
           
        } if ($result2) {
                if (password_verify($password, $result2['password'])) {
                    $data_session = array(
							'id_pengguna2' => $result2['id_kurir'],
							'username2' => $result2['nama'],
							'nama_lengkap' => $result2['nama'],
							'no_hp' => $result2['no_hp'],
							'foto' => "",
							'level' => "kurir",
							'email' => "",
						 	'status2' => "loggg"
						);
					$this->session->set_userdata($data_session);
					$this->session->set_flashdata('berhasil_login', ' ');
					redirect("dashboard");
                } else {
                    $this->session->set_flashdata('data_salah_login', 'Password Salah!');
					redirect("login");
                }
           
        }if ($result3) {
                if (password_verify($password, $result3['password'])) {
                    $data_session = array(
							'id_pengguna2' => $result3['id_customer'],
							'username2' => $result3['nama'],
							'nama_lengkap' => $result3['nama'],
							'no_hp' => $result3['no_hp'],
							'foto' => "",
							'level' => "customer",
							'email' => "",
						 	'status2' => "loggg"
						);
					$this->session->set_userdata($data_session);
					$this->session->set_flashdata('berhasil_login', ' ');
					redirect("dashboard");
                } else {
                    $this->session->set_flashdata('data_salah_login', 'Password Salah!');
					redirect("login");
                }
           
        }  else{
			$this->session->set_flashdata('gagal_login', 'Data Tidak Ditemukan!');
			redirect("login");
		}

	}

	function kirim(){

		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$basee = base_url();

        $result = $this->db->get_where('pengguna', ['username' => $username])->row_array();

        // jika usernya ada
        $id_pengguna2=$result['id_pengguna'];
        $nama_lengkap=$result['nama_lengkap'];
        if ($result) {
                if ($email==$result['email']) {
                	$message = '
					<center><a href="#" style="pointer-events:none;"><img src="https://live.staticflickr.com/65535/51848178480_70e77b94b0_b.jpg" alt="Logo" width="200" height="200" style="display: block;"/></a>
					
					     <h1>UNIT PELAYANAN PENDAPATAN DAERAH <br>SAMSAT BANJARBARU</h1>
					     <h5>Jl. Panglima Batur, Loktabat Utara, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalimantan Selatan 70711</h5>
					     <p>
<table border="0"  style="margin-left: 30px; font-size: 11pt;"  class="table " >
  <tbody>
<tr>
      <td width="190px">Username</td>
      <td width="10px">: </td>
      <td>'.$username.'</td>
  </tr>
  <tr>
      <td width="190px">Nama Lengkap</td>
      <td width="10px">: </td>
      <td>'.$nama_lengkap.'</td>
  </tr>
  <tr>
      <td width="190px">Email</td>
      <td width="10px">: </td>
      <td>'.$email.'</td>
  </tr>
 </tbody>
</table>
Silahkan klik link di bawah ini untuk melakukan penggantian password Anda :<br>
'.$basee.'gantipassword/id/'.$id_pengguna2.'

					     </p>
					     </center>
			     ';
			          $config['mailtype'] = 'html';
			          $config['protocol'] = 'smtp';
			          $config['smtp_host'] = 'ssl://smtp.gmail.com';
			          $config['smtp_user'] = 'layananmail7@gmail.com';
			          $config['smtp_pass'] = 'black98897';
			          $config['smtp_port'] = 465;
			          $config['charset'] = 'iso-8859-1';
			          $config['wordwrap'] = TRUE;
			          $config['newline'] = "\r\n";
			          $this->email->initialize($config);
			          $this->email->from('samsatbanjarbaru267@gmail.com', 'SAMSAT BANJARBARU');
			          $this->email->to($email);
			          $this->email->subject('Lupa Password');
			          $this->email->message($message);
			          $this->email->send();
                	
					$this->session->set_flashdata('berhasil_lupa_pass', ' ');
					redirect("login");
                } else {
                    $this->session->set_flashdata('data_salah_login', 'Password Salah!');
					redirect("login/lupa_pass");
                }
           
        }  else{
			$this->session->set_flashdata('gagal_login', 'Data Tidak Ditemukan!');
			redirect("login/lupa_pass");
		}

	}

			public function logout(){
			$this->session->sess_destroy();
			redirect("login");
		}
}
