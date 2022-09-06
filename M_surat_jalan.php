
<?php
class M_surat_jalan extends CI_Model{

		function get_all_surat_jalan(){
			if($this->session->userdata('level')=="kurir"){
			$dd=$this->session->userdata('id_pengguna2');
 			$hsl=$this->db->query("SELECT *, pegawai.nama as nama_p FROM surat_jalan,pegawai,kurir where surat_jalan.id_pegawai=pegawai.id_pegawai AND surat_jalan.id_kurir=kurir.id_kurir AND surat_jalan.id_kurir='$dd'");
			}else{
				$hsl=$this->db->query("SELECT *, pegawai.nama as nama_p FROM surat_jalan,pegawai,kurir where surat_jalan.id_pegawai=pegawai.id_pegawai AND surat_jalan.id_kurir=kurir.id_kurir");
			}
			return $hsl;
		}


		function hapus_surat_jalan($kode){
			$hsl=$this->db->query("DELETE FROM surat_jalan where id_surat_jalan=".$kode."");
			return $hsl;
		}

		public function add_surat_jalan($data){
			$this->db->insert("surat_jalan", $data);
			return true;
		}

		public function get_surat_jalan_by_id($id){
			$query = $this->db->get_where("surat_jalan", array("id_surat_jalan" => $id));
			return $result = $query->row_array();
		}

		public function edit_surat_jalan($data, $id){
			$this->db->where("id_surat_jalan", $id);
			$this->db->update("surat_jalan", $data);
			return true;
		}

}	
			