
<?php
class M_pengiriman extends CI_Model{

		function get_all_pengiriman(){

			if($this->session->userdata('level')=="kurir"){
				$dd=$this->session->userdata('id_pengguna2');
 				$hsl=$this->db->query("SELECT * FROM barang_masuk,kurir,truk,pengiriman WHERE 
pengiriman.id_barang_masuk=barang_masuk.id_barang_masuk AND
pengiriman.id_kurir=kurir.id_kurir AND
pengiriman.id_truk=truk.id_truk AND pengiriman.id_kurir='$dd'");
			}elseif ($this->session->userdata('level')=="customer") {
				$dd=$this->session->userdata('id_pengguna2');
				$hsl=$this->db->query("SELECT * FROM barang_masuk,kurir,truk,pengiriman WHERE 
pengiriman.id_barang_masuk=barang_masuk.id_barang_masuk AND
pengiriman.id_kurir=kurir.id_kurir AND
pengiriman.id_truk=truk.id_truk AND barang_masuk.id_customer='$dd'");
			}else{
				$hsl=$this->db->query("SELECT * FROM barang_masuk,kurir,truk,pengiriman WHERE 
pengiriman.id_barang_masuk=barang_masuk.id_barang_masuk AND
pengiriman.id_kurir=kurir.id_kurir AND
pengiriman.id_truk=truk.id_truk");
			}
			return $hsl;
		}


		function hapus_pengiriman($kode){
			$hsl=$this->db->query("DELETE FROM pengiriman where id_pengiriman=".$kode."");
			return $hsl;
		}

		public function add_pengiriman($data){
			$this->db->insert("pengiriman", $data);
			return true;
		}

		public function get_pengiriman_by_id($id){
			$query = $this->db->get_where("pengiriman", array("id_pengiriman" => $id));
			return $result = $query->row_array();
		}

		public function edit_pengiriman($data, $id){
			$this->db->where("id_pengiriman", $id);
			$this->db->update("pengiriman", $data);
			return true;
		}

}	
			