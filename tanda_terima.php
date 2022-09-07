


 
   

    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">Tanda Terima</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-inner mt--5">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"></h4>
                  <?php if($this->session->userdata('level')!="Pimpinan"):?>
                  <a target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url();?>tanda_terima/cetak"><i class="fa fa-print"></i> CETAK </a>
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH TANDA TERIMA</button>
                    <?php endif;?>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover " >
                      <thead style="background-color: #cfcbca;">
                          <tr>
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
        <th>Nomor Surat Tanda Terima</th>
				<th>No Transaksi</th>
        <th>Nama Barang</th>
				<th>Tanggal Surat</th>
        <th>Petugas Input</th>
        <th>Tanggal Jam Input</th>
				<?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                        <th style="text-align: center;">Action</th>
                                                         <?php endif;?>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($data_tanda_terima->result_array() as $i) :
                                            $id_tanda_terima=$i["id_tanda_terima"];
                                              ?>
                         <tr>
                                              
        <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
        <td><?php echo $i["nomor_surat_tanda_terima"];?></td>
        <td><?php echo $i["no_transaksi"];?></td>
        <td><?php echo $i["nama_barang"];?></td>
        <td><?php echo tgl_indo($i["tanggal_surat"]);?></td>
        <td><?php echo $i["petugas_input_tt"];?></td>
        <td><?php echo tgl_indo(date('Y-m-d',strtotime($i["tanggal_jam_input_tt"]))); echo date(', H:i',strtotime($i["tanggal_jam_input_tt"]));?></td>
        
                                             <?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">

                                                <a target="_blank" style="margin: 2px;" href="tanda_terima/cetak2/<?php echo $id_tanda_terima;?>" type="button" class="btn btn-success mdi mdi-pencil btn-sm" ><i class="fa fa-print"></i> CETAK</a>

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_tanda_terima;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_tanda_terima;?>"><i class="fa fa-trash"></i> DELETE</button>
                                                  
                                                  </div>
                                                </td>
                                                 <?php endif;?>
                                              </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        
          
          
        </div>
      </div>

<!--Tambah Data-->
       <form  action="<?php echo base_url()."tanda_terima/simpan_tanda_terima"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH TANDA TERIMA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="form-group m-t-20">
                                    <label>Nomor Surat Tanda Terima <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nomor_surat_tanda_terima" required  placeholder="Nomor Surat Tanda Terima" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Barang Masuk <span style="color: red;">*</span></label>
                                     <select class="form-control" name="id_barang_masuk" required>
                                      <option value="">--pilih barang masuk--</option>
                                      <?php foreach ($this->db->query("SELECT *, pegawai.nama as nama_p, customer.nama nama_c FROM barang_masuk,pegawai,customer,cabang WHERE 
barang_masuk.id_pegawai=pegawai.id_pegawai AND
barang_masuk.id_customer=customer.id_customer AND
barang_masuk.id_cabang=cabang.id_cabang")->result_array() as $key):?>
                                        <option value="<?php echo $key['id_barang_masuk'];?>"><?php echo $key['no_transaksi'];?> | <?php echo $key['nama_barang'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Surat <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_surat" required  placeholder="Tanggal Surat" >
                                </div>

																
                              
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-info">SIMPAN</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>






<!--Update Data-->
  <?php foreach ($data_tanda_terima->result_array() as $i) :
                                            $id_tanda_terima=$i["id_tanda_terima"];
                                          ?>
       <form  action="<?php echo base_url()."tanda_terima/update_tanda_terima"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_tanda_terima;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE TANDA TERIMA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                        <input type="hidden" name="id_tanda_terima" value="<?php echo $id_tanda_terima;?>">

                                <div class="form-group m-t-20">
                                    <label>Nomor Surat Tanda Terima <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["nomor_surat_tanda_terima"];?>" type="text" class="form-control" name="nomor_surat_tanda_terima" required  placeholder="Nomor Surat Tanda Terima" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Barang Masuk <span style="color: red;">*</span></label>
                                     <select class="form-control" name="id_barang_masuk" required>
                                      <option value="">--pilih barang masuk--</option>
                                      <?php foreach ($this->db->query("SELECT *, pegawai.nama as nama_p, customer.nama nama_c FROM barang_masuk,pegawai,customer,cabang WHERE 
barang_masuk.id_pegawai=pegawai.id_pegawai AND
barang_masuk.id_customer=customer.id_customer AND
barang_masuk.id_cabang=cabang.id_cabang")->result_array() as $key):?>
                                        <option <?= ($i['id_barang_masuk']==$key['id_barang_masuk'])?'selected':'';?> value="<?php echo $key['id_barang_masuk'];?>"><?php echo $key['no_transaksi'];?> | <?php echo $key['nama_barang'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Surat <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tanggal_surat"];?>" type="date" class="form-control" name="tanggal_surat" required  placeholder="Tanggal Surat" >
                                </div>

																

                            
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-success">UPDATE</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



   <?php foreach ($data_tanda_terima->result_array() as $i) :
                                            $id_tanda_terima=$i["id_tanda_terima"];
                                          ?>
       <form  action="<?php echo base_url()."tanda_terima/hapus_tanda_terima"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_tanda_terima;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS TANDA TERIMA</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_tanda_terima;?>">
                         <span>Apakah Anda yakin ingin menghapus data ini?</span>
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-danger">HAPUS</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



  



<script type="text/javascript">
  $().DataTable();
</script>


<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
<?php if($this->session->flashdata("berhasil_simpan") == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: "success",
  text: "Tanda Terima Berhasil di SIMPAN",
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Tanda Terima Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Tanda Terima Berhasil di HAPUS"
})
 </script>
<?php endif; ?>


<?php if($this->session->flashdata("gagal_up") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "error",
  text: "Format File Gambar SALAH"
})
 </script>
<?php endif; ?>






			