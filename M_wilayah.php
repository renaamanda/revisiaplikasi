
<?php
class M_wilayah extends CI_Model{

		function get_all_wilayah(){
			$hsl=$this->db->query("SELECT * FROM wilayah");
			return $hsl;
		}


		function hapus_wilayah($kode){
			$hsl=$this->db->query("DELETE FROM wilayah where id_wilayah=".$kode."");
			return $hsl;
		}

		public function add_wilayah($data){
			$this->db->insert("wilayah", $data);
			return true;
		}

		public function get_wilayah_by_id($id){
			$query = $this->db->get_where("wilayah", array("id_wilayah" => $id));
			return $result = $query->row_array();
		}

		public function edit_wilayah($data, $id){
			$this->db->where("id_wilayah", $id);
			$this->db->update("wilayah", $data);
			return true;
		}

}	
			