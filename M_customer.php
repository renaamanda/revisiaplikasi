
<?php
class M_customer extends CI_Model{

		function get_all_customer(){
			$hsl=$this->db->query("SELECT * FROM customer");
			return $hsl;
		}


		function hapus_customer($kode){
			$hsl=$this->db->query("DELETE FROM customer where id_customer=".$kode."");
			return $hsl;
		}

		public function add_customer($data){
			$this->db->insert("customer", $data);
			return true;
		}

		public function get_customer_by_id($id){
			$query = $this->db->get_where("customer", array("id_customer" => $id));
			return $result = $query->row_array();
		}

		public function edit_customer($data, $id){
			$this->db->where("id_customer", $id);
			$this->db->update("customer", $data);
			return true;
		}

}	
			