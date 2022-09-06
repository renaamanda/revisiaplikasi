
<?php
class M_cabang extends CI_Model{

		function get_all_cabang(){
			$hsl=$this->db->query("SELECT * FROM cabang");
			return $hsl;
		}


		function hapus_cabang($kode){
			$hsl=$this->db->query("DELETE FROM cabang where id_cabang=".$kode."");
			return $hsl;
		}

		public function add_cabang($data){
			$this->db->insert("cabang", $data);
			return true;
		}

		public function get_cabang_by_id($id){
			$query = $this->db->get_where("cabang", array("id_cabang" => $id));
			return $result = $query->row_array();
		}

		public function edit_cabang($data, $id){
			$this->db->where("id_cabang", $id);
			$this->db->update("cabang", $data);
			return true;
		}

}	
			