


 
   

    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">Pengeluaran</h2>
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
                  <a target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url();?>pengeluaran/cetak"><i class="fa fa-print"></i> CETAK </a>
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PENGELUARAN</button>
                    <?php endif;?>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover table-responsive" >
                      <thead style="background-color: #cfcbca;">
                          <tr>
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
        <th>Nama Cabang</th>
        <th>Kota</th>
				<th>Nama Pengeluaran</th>
				<th>Tanggal Pengeluaran</th>
				<th>Biaya Pengeluaran</th>
				<th>Keterangan</th>
        <th>Petugas Input</th>
        <th>Tanggal Jam Input</th>
				 <?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                        <th style="text-align: center;">Action</th>
                                                         <?php endif;?>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($data_pengeluaran->result_array() as $i) :
                                            $id_pengeluaran=$i["id_pengeluaran"];
                                              ?>
                         <tr>
                                              
        <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
        <td><?php echo $i["nama_cabang"];?></td>
        <td><?php echo $i["kota"];?></td>
        <td><?php echo $i["nama_pengeluaran"];?></td>
        <td><?php echo tgl_indo($i["tanggal_pengeluaran"]);?></td>
        <td><?php echo rupiah($i["biaya_pengeluaran"]);?></td>
        <td><?php echo $i["keterangan"];?></td>
        <td><?php echo $i["petugas_input_p2"];?></td>
        <td><?php echo tgl_indo(date('Y-m-d',strtotime($i["tanggal_jam_input_p2"]))); echo date(', H:i',strtotime($i["tanggal_jam_input_p2"]));?></td>
        
                                              <?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">

                                                <a target="_blank" style="margin: 2px;" href="pengeluaran/cetak2/<?php echo $id_pengeluaran;?>" type="button" class="btn btn-success mdi mdi-pencil btn-sm" ><i class="fa fa-print"></i> CETAK</a>

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pengeluaran;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pengeluaran;?>"><i class="fa fa-trash"></i> DELETE</button>
                                                  
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
       <form  action="<?php echo base_url()."pengeluaran/simpan_pengeluaran"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH PENGELUARAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="form-group m-t-20">
                                    <label>Cabang <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_cabang" required>
                                      <option value="">--pilih cabang--</option>
                                      <?php foreach ($this->db->get("cabang")->result_array() as $key):?>
                                        <option value="<?php echo $key['id_cabang'];?>"><?php echo $key['nama_cabang'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

																<div class="form-group m-t-20">
                                    <label>Nama Pengeluaran <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_pengeluaran" required  placeholder="Nama Pengeluaran" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Pengeluaran <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_pengeluaran" required  placeholder="Tanggal Pengeluaran" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Biaya Pengeluaran <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control uang" name="biaya_pengeluaran" required  placeholder="Biaya Pengeluaran" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Keterangan </label>
                                    <textarea class="form-control" name="keterangan" ></textarea>
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
  <?php foreach ($data_pengeluaran->result_array() as $i) :
                                            $id_pengeluaran=$i["id_pengeluaran"];
                                          ?>
       <form  action="<?php echo base_url()."pengeluaran/update_pengeluaran"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pengeluaran;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE PENGELUARAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                        <input type="hidden" name="id_pengeluaran" value="<?php echo $id_pengeluaran;?>">

                                 <div class="form-group m-t-20">
                                    <label>Cabang <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_cabang" required>
                                      <option value="">--pilih cabang--</option>
                                      <?php foreach ($this->db->get("cabang")->result_array() as $key):?>
                                        <option <?= ($i['id_cabang']==$key['id_cabang'])?'selected':'';?> value="<?php echo $key['id_cabang'];?>"><?php echo $key['nama_cabang'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

																<div class="form-group m-t-20">
                                    <label>Nama Pengeluaran <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["nama_pengeluaran"];?>" type="text" class="form-control" name="nama_pengeluaran" required  placeholder="Nama Pengeluaran" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Pengeluaran <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tanggal_pengeluaran"];?>" type="date" class="form-control" name="tanggal_pengeluaran" required  placeholder="Tanggal Pengeluaran" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Biaya Pengeluaran <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["biaya_pengeluaran"];?>" type="text" class="form-control uang" name="biaya_pengeluaran" required  placeholder="Biaya Pengeluaran" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Keterangan </label>
                                    <textarea class="form-control" name="keterangan" ><?php echo $i["keterangan"];?></textarea>
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



   <?php foreach ($data_pengeluaran->result_array() as $i) :
                                            $id_pengeluaran=$i["id_pengeluaran"];
                                          ?>
       <form  action="<?php echo base_url()."pengeluaran/hapus_pengeluaran"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pengeluaran;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS PENGELUARAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pengeluaran;?>">
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
  text: "Pengeluaran Berhasil di SIMPAN",
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Pengeluaran Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Pengeluaran Berhasil di HAPUS"
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






			