
<?php
class M_truk extends CI_Model{

		function get_all_truk(){
			$hsl=$this->db->query("SELECT * FROM truk");
			return $hsl;
		}


		function hapus_truk($kode){
			$hsl=$this->db->query("DELETE FROM truk where id_truk=".$kode."");
			return $hsl;
		}

		public function add_truk($data){
			$this->db->insert("truk", $data);
			return true;
		}

		public function get_truk_by_id($id){
			$query = $this->db->get_where("truk", array("id_truk" => $id));
			return $result = $query->row_array();
		}

		public function edit_truk($data, $id){
			$this->db->where("id_truk", $id);
			$this->db->update("truk", $data);
			return true;
		}

}	
			