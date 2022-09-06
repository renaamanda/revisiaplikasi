
<?php
class M_pegawai extends CI_Model{

		function get_all_pegawai(){
			$hsl=$this->db->query("SELECT * FROM pegawai");
			return $hsl;
		}


		function hapus_pegawai($kode){
			$hsl=$this->db->query("DELETE FROM pegawai where id_pegawai=".$kode."");
			return $hsl;
		}

		public function add_pegawai($data){
			$this->db->insert("pegawai", $data);
			return true;
		}

		public function get_pegawai_by_id($id){
			$query = $this->db->get_where("pegawai", array("id_pegawai" => $id));
			return $result = $query->row_array();
		}

		public function edit_pegawai($data, $id){
			$this->db->where("id_pegawai", $id);
			$this->db->update("pegawai", $data);
			return true;
		}

}	
			