
<?php
class M_tracking extends CI_Model{

		function get_all_tracking(){
			if($this->session->userdata('level')=="kurir"){
			$dd=$this->session->userdata('id_pengguna2');
 			$hsl=$this->db->query("SELECT * FROM tracking,barang_masuk,kurir WHERE
tracking.id_barang_masuk=barang_masuk.id_barang_masuk AND
tracking.id_kurir=kurir.id_kurir AND tracking.id_kurir='$dd'");
			}elseif ($this->session->userdata('level')=="customer") {
				$dd=$this->session->userdata('id_pengguna2');
				$hsl=$this->db->query("SELECT * FROM tracking,barang_masuk,kurir WHERE
tracking.id_barang_masuk=barang_masuk.id_barang_masuk AND
tracking.id_kurir=kurir.id_kurir AND barang_masuk.id_customer='$dd'");
			}else{
				$hsl=$this->db->query("SELECT * FROM tracking,barang_masuk,kurir WHERE
tracking.id_barang_masuk=barang_masuk.id_barang_masuk AND
tracking.id_kurir=kurir.id_kurir");
			}
			return $hsl;
		}


		function hapus_tracking($kode){
			$hsl=$this->db->query("DELETE FROM tracking where id_tracking=".$kode."");
			return $hsl;
		}

		public function add_tracking($data){
			$this->db->insert("tracking", $data);
			return true;
		}

		public function get_tracking_by_id($id){
			$query = $this->db->get_where("tracking", array("id_tracking" => $id));
			return $result = $query->row_array();
		}

		public function edit_tracking($data, $id){
			$this->db->where("id_tracking", $id);
			$this->db->update("tracking", $data);
			return true;
		}

}	
			