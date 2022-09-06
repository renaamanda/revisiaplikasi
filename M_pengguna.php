<?php
class M_pengguna extends CI_Model{

	function get_all_pengguna(){
		$hsl=$this->db->query("SELECT * FROM pengguna");
		return $hsl;
	}


	function hapus_pengguna($kode){
		$hsl=$this->db->query("DELETE FROM pengguna where id_pengguna='$kode'");
		return $hsl;
	}

	public function add_pengguna($data){
			$this->db->insert('pengguna', $data);
			return true;
		}

		public function get_pengguna_by_id($id){
			$query = $this->db->get_where('pengguna', array('id_pengguna' => $id));
			return $result = $query->row_array();
		}

		public function edit_pengguna($data, $id){
			$this->db->where('id_pengguna', $id);
			$this->db->update('pengguna', $data);
			return true;
		}

}	