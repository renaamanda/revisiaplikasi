


 
   

    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">Tracking</h2>
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
                  <?php if($this->session->userdata('level')!="customer"):?>
                  <?php if($this->session->userdata('level')!="Pimpinan"):?>
                  <a target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url();?>tracking/cetak"><i class="fa fa-print"></i> CETAK </a>
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH TRACKING</button>
                   <?php endif;?>
                   <?php endif;?>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover table-responsive" >
                      <thead style="background-color: #cfcbca;">
                          <tr>
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
        <th>No Transaksi</th>
        <th>Nama Barang</th>
				<th>Nama Kurir</th>
				<th>Tanggal Jam Tracking</th>
				<th>Status Kirim</th>
				<th>Catatan Tracking</th>
        <th>Petugas Input</th>
        <th>Tanggal Jam Input</th>
        <?php if($this->session->userdata('level')!="customer"):?>
				<?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                        <th style="text-align: center;">Action</th>
                                                        <?php endif;?>
                                                        <?php endif;?>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($data_tracking->result_array() as $i) :
                                            $id_tracking=$i["id_tracking"];
                                              ?>
                         <tr>
                                              
        <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
        <td><?php echo $i["no_transaksi"];?></td>
        <td><?php echo $i["nama_barang"];?></td>
        <td><?php echo $i["nama"];?></td>
        <td><?php echo date('d-M-Y, H:i',strtotime($i["tanggal_jam_tracking"]));?></td>
        <td><?php echo $i["status_kirim"];?></td>
        <td><?php echo $i["catatan_tracking"];?></td>
        <td><?php echo $i["petugas_input_tr"];?></td>
        <td><?php echo tgl_indo(date('Y-m-d',strtotime($i["tanggal_jam_input_tr"]))); echo date(', H:i',strtotime($i["tanggal_jam_input_tr"]));?></td>
          
          <?php if($this->session->userdata('level')!="customer"):?>
                                             <?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">

                                                <a target="_blank" style="margin: 2px;" href="tracking/cetak2/<?php echo $id_tracking;?>" type="button" class="btn btn-success mdi mdi-pencil btn-sm" ><i class="fa fa-print"></i> CETAK</a>

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_tracking;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_tracking;?>"><i class="fa fa-trash"></i> DELETE</button>
                                                  
                                                  </div>
                                                </td>
                                                <?php endif;?>
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
       <form  action="<?php echo base_url()."tracking/simpan_tracking"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH TRACKING</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">


                  <?php if($this->session->userdata('level')!="kurir"):?>
                         <div class="form-group m-t-20">
                                    <label>Kurir <span style="color: red;">*</span></label>
                                     <select class="form-control" name="id_kurir" required>
                                      <option value="">--pilih kurir--</option>
                                      <?php foreach ($this->db->get("kurir")->result_array() as $key):?>
                                        <option value="<?php echo $key['id_kurir'];?>"><?php echo $key['nik'];?> | <?php echo $key['nama'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                        <?php else:
                          $id_kurir2=$this->session->userdata('id_pengguna2');
                          $dat_pen=$this->db->query("SELECT * FROM kurir where id_kurir='$id_kurir2'")->row_array();
                            ?>
                         <div class="form-group m-t-20">
                                <label class="form-label" >Kurir *</label>
                                <input value="<?php echo $dat_pen['id_kurir'];?>" type="hidden" name="id_kurir" value="" class="form-control" > 
                                <input value="<?php echo $dat_pen['nama'];?>" readonly type="text"  class="form-control" >
                          </div>
                         <div class="form-group m-t-20">
                                <label class="form-label" >NIK Kurir*</label> 
                                <input value="<?php echo $dat_pen['nik'];?>" readonly type="text"  class="form-control" >
                          </div>
                        <?php endif;?>
                        

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
                                    <label>Tanggal Jam Tracking <span style="color: red;">*</span></label>
                                    <input type="datetime-local" class="form-control" name="tanggal_jam_tracking" required  placeholder="Tanggal Jam Tracking" >
                                </div>

											<div class="form-group m-t-20">
                                    <label>Status Kirim <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="status_kirim" required  placeholder="Status Kirim" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Catatan Tracking </label>
                                    <textarea class="form-control" name="catatan_tracking" ></textarea>
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
  <?php foreach ($data_tracking->result_array() as $i) :
                                            $id_tracking=$i["id_tracking"];
                                          ?>
       <form  action="<?php echo base_url()."tracking/update_tracking"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_tracking;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE TRACKING</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                        <input type="hidden" name="id_tracking" value="<?php echo $id_tracking;?>">

                        <?php if($this->session->userdata('level')!="kurir"):?>
                          <div class="form-group m-t-20">
                                    <label>Kurir <span style="color: red;">*</span></label>
                                     <select class="form-control" name="id_kurir" required>
                                      <option value="">--pilih kurir--</option>
                                      <?php foreach ($this->db->get("kurir")->result_array() as $key):?>
                                        <option <?= ($i['id_kurir']==$key['id_kurir'])?'selected':'';?> value="<?php echo $key['id_kurir'];?>"><?php echo $key['nik'];?> | <?php echo $key['nama'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                        <?php else:
                          $id_kurir2=$this->session->userdata('id_pengguna2');
                          $dat_pen=$this->db->query("SELECT * FROM kurir where id_kurir='$id_kurir2'")->row_array();
                            ?>
                         <div class="form-group m-t-20">
                                <label class="form-label" >Kurir *</label>
                                <input value="<?php echo $dat_pen['id_kurir'];?>" type="hidden" name="id_kurir" value="" class="form-control" > 
                                <input value="<?php echo $dat_pen['nama'];?>" readonly type="text"  class="form-control" >
                          </div>
                         <div class="form-group m-t-20">
                                <label class="form-label" >NIK Kurir*</label> 
                                <input value="<?php echo $dat_pen['nik'];?>" readonly type="text"  class="form-control" >
                          </div>
                        <?php endif;?>

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
                                    <label>Tanggal Jam Tracking <span style="color: red;">*</span></label>
                                    <input value="<?php echo date('Y-m-d\TH:i', strtotime($i['tanggal_jam_masuk'])) ?>" type="datetime-local" class="form-control" name="tanggal_jam_tracking" required  placeholder="Tanggal Jam Tracking" >
                                </div>

											<div class="form-group m-t-20">
                                    <label>Status Kirim <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["status_kirim"];?>" type="text" class="form-control" name="status_kirim" required  placeholder="Status Kirim" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Catatan Tracking </label>
                                    <textarea class="form-control" name="catatan_tracking" ><?php echo $i["catatan_tracking"];?></textarea>
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



   <?php foreach ($data_tracking->result_array() as $i) :
                                            $id_tracking=$i["id_tracking"];
                                          ?>
       <form  action="<?php echo base_url()."tracking/hapus_tracking"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_tracking;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS TRACKING</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_tracking;?>">
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
  text: "Tracking Berhasil di SIMPAN",
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Tracking Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Tracking Berhasil di HAPUS"
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






			