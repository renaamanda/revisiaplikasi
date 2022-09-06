
<?php
class M_tanda_terima extends CI_Model{

		function get_all_tanda_terima(){
			$hsl=$this->db->query("SELECT * FROM barang_masuk,tanda_terima WHERE 
tanda_terima.id_barang_masuk=barang_masuk.id_barang_masuk");
			return $hsl;
		}


		function hapus_tanda_terima($kode){
			$hsl=$this->db->query("DELETE FROM tanda_terima where id_tanda_terima=".$kode."");
			return $hsl;
		}

		public function add_tanda_terima($data){
			$this->db->insert("tanda_terima", $data);
			return true;
		}

		public function get_tanda_terima_by_id($id){
			$query = $this->db->get_where("tanda_terima", array("id_tanda_terima" => $id));
			return $result = $query->row_array();
		}

		public function edit_tanda_terima($data, $id){
			$this->db->where("id_tanda_terima", $id);
			$this->db->update("tanda_terima", $data);
			return true;
		}

}	
			