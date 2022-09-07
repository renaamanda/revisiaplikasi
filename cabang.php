


 
   

    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">Cabang</h2>
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
                  <a target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url();?>cabang/cetak"><i class="fa fa-print"></i> CETAK </a>
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH CABANG</button>
                    <?php endif;?>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover " >
                      <thead style="background-color: #cfcbca;">
                          <tr>
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
        <th>Nama Cabang</th>
				<th>Kota</th>
				<th>Alamat</th>
				<th>No Telp</th>
        <th>Petugas Input</th>
        <th>Tanggal Jam Input</th>
				   <?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                        <th style="text-align: center;">Action</th>
                                                         <?php endif;?>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($data_cabang->result_array() as $i) :
                                            $id_cabang=$i["id_cabang"];
                                              ?>
                         <tr>
                                              
        <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
        <td><?php echo $i["nama_cabang"];?></td>
        <td><?php echo $i["kota"];?></td>
        <td><?php echo $i["alamat"];?></td>
        <td><?php echo $i["no_telp"];?></td>
        <td><?php echo $i["petugas_input"];?></td>
        <td><?php echo tgl_indo(date('Y-m-d',strtotime($i["tanggal_jam_input"]))); echo date(', H:i',strtotime($i["tanggal_jam_input"]));?></td>
        
                                              <?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">

                                                

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_cabang;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_cabang;?>"><i class="fa fa-trash"></i> DELETE</button>
                                                  
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
       <form  action="<?php echo base_url()."cabang/simpan_cabang"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH CABANG</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="form-group m-t-20">
                                    <label>Nama Cabang <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_cabang" required  placeholder="Nama Cabang" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Kota <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="kota" required  placeholder="Kota" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Alamat <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="alamat" required></textarea>
                                </div>

																<div class="form-group m-t-20">
                                    <label>No Telp <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="no_telp" required  placeholder="No Telp" >
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
  <?php foreach ($data_cabang->result_array() as $i) :
                                            $id_cabang=$i["id_cabang"];
                                          ?>
       <form  action="<?php echo base_url()."cabang/update_cabang"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_cabang;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE CABANG</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                        <input type="hidden" name="id_cabang" value="<?php echo $id_cabang;?>">

                                <div class="form-group m-t-20">
                                    <label>Nama Cabang <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["nama_cabang"];?>" type="text" class="form-control" name="nama_cabang" required  placeholder="Nama Cabang" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Kota <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["kota"];?>" type="text" class="form-control" name="kota" required  placeholder="Kota" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Alamat <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="alamat" required><?php echo $i["alamat"];?></textarea>
                                </div>

																<div class="form-group m-t-20">
                                    <label>No Telp <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["no_telp"];?>" type="text" class="form-control" name="no_telp" required  placeholder="No Telp" >
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



   <?php foreach ($data_cabang->result_array() as $i) :
                                            $id_cabang=$i["id_cabang"];
                                          ?>
       <form  action="<?php echo base_url()."cabang/hapus_cabang"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_cabang;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS CABANG</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_cabang;?>">
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
  text: "Cabang Berhasil di SIMPAN",
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Cabang Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Cabang Berhasil di HAPUS"
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






			