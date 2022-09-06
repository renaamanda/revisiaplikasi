
<?php
class M_pengeluaran extends CI_Model{

		function get_all_pengeluaran(){
			$hsl=$this->db->query("SELECT * FROM pengeluaran,cabang WHERE 
pengeluaran.id_cabang=cabang.id_cabang");
			return $hsl;
		}


		function hapus_pengeluaran($kode){
			$hsl=$this->db->query("DELETE FROM pengeluaran where id_pengeluaran=".$kode."");
			return $hsl;
		}

		public function add_pengeluaran($data){
			$this->db->insert("pengeluaran", $data);
			return true;
		}

		public function get_pengeluaran_by_id($id){
			$query = $this->db->get_where("pengeluaran", array("id_pengeluaran" => $id));
			return $result = $query->row_array();
		}

		public function edit_pengeluaran($data, $id){
			$this->db->where("id_pengeluaran", $id);
			$this->db->update("pengeluaran", $data);
			return true;
		}

}	
			