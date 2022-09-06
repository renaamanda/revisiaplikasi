
<?php
class M_kurir extends CI_Model{

		function get_all_kurir(){
			$hsl=$this->db->query("SELECT * FROM kurir");
			return $hsl;
		}


		function hapus_kurir($kode){
			$hsl=$this->db->query("DELETE FROM kurir where id_kurir=".$kode."");
			return $hsl;
		}

		public function add_kurir($data){
			$this->db->insert("kurir", $data);
			return true;
		}

		public function get_kurir_by_id($id){
			$query = $this->db->get_where("kurir", array("id_kurir" => $id));
			return $result = $query->row_array();
		}

		public function edit_kurir($data, $id){
			$this->db->where("id_kurir", $id);
			$this->db->update("kurir", $data);
			return true;
		}

}	
			