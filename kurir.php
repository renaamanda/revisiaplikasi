


 
   

    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">Kurir</h2>
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
                  <a target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url();?>kurir/cetak"><i class="fa fa-print"></i> CETAK </a>
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH KURIR</button>
                    <?php endif;?>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover table-responsive" >
                      <thead style="background-color: #cfcbca;">
                          <tr>
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
        <th>Image</th>
        <th>NIK</th>
        <th>Nama</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Agama</th>
				<th>Alamat</th>
				<th>No Hp</th>
				<th>Tmt Kurir</th>
        <th>Petugas Input</th>
        <th>Tanggal Jam Input</th>
				<?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                        <th style="text-align: center;">Action</th>
                                                         <?php endif;?>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($data_kurir->result_array() as $i) :
                                            $id_kurir=$i["id_kurir"];
                                              ?>
                         <tr>
                                              
        <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
         <td><img src="<?php echo base_url();?>assets/image/<?php echo $i["foto_kurir"];?>" height="100px" width="80px"></td>
        <td><?php echo $i["nik"];?></td>
        <td><?php echo $i["nama"];?></td>
        <td><?php echo $i["tempat_lahir"];?></td>
        <td><?php echo tgl_indo($i["tanggal_lahir"]);?></td>
        <td><?php echo $i["jenis_kelamin"];?></td>
        <td><?php echo $i["agama"];?></td>
        <td><?php echo $i["alamat"];?></td>
        <td><?php echo $i["no_hp"];?></td>
        <td><?php echo tgl_indo($i["tmt_kurir"]);?></td>
        <td><?php echo $i["petugas_input"];?></td>
        <td><?php echo tgl_indo(date('Y-m-d',strtotime($i["tanggal_jam_input"]))); echo date(', H:i',strtotime($i["tanggal_jam_input"]));?></td>
        
                                             <?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">

                                                <a target="_blank" style="margin: 2px;" href="kurir/cetak2/<?php echo $id_kurir;?>" type="button" class="btn btn-success mdi mdi-pencil btn-sm" ><i class="fa fa-print"></i> CETAK</a>

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_kurir;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_kurir;?>"><i class="fa fa-trash"></i> DELETE</button>
                                                  
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
       <form  action="<?php echo base_url()."kurir/simpan_kurir"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH KURIR</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="form-group m-t-20">
                                    <label>NIK <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nik" required  placeholder="NIK" >
                                </div>

                                  <div class="form-group m-t-20">
                                    <label>Nama <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama" required  placeholder="Nama" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tempat Lahir <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="tempat_lahir" required  placeholder="Tempat Lahir" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Lahir <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_lahir" required  placeholder="Tanggal Lahir" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Jenis Kelamin <span style="color: red;">*</span></label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                      <option value="">--pilih jenis kelamin--</option>
                                      <option>Laki-Laki</option>
          <option>Perempuan</option>
          
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Agama <span style="color: red;">*</span></label>
                                    <select class="form-control" name="agama" required>
                                      <option value="">--pilih agama--</option>
                                      <option>Islam</option>
          <option>Protestan</option>
          <option>Katolik</option>
          <option>Hindu</option>
          <option>Buddha</option>
          <option>Khonghucu</option>
          
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Alamat <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="alamat" required></textarea>
                                </div>

																<div class="form-group m-t-20">
                                    <label>No Hp <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="no_hp" required  placeholder="No Hp" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tmt Kurir <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tmt_kurir" required  placeholder="Tmt Kurir" >
                                </div>

                                <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Password </label>
                                        <input autocomplete="new-password" type="password" name="password" class="form-control" placeholder="Password">
                                  </div> 


                                   <div class="form-group m-t-20">
                                    <label>Foto Kurir <span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" name="foto_kurir" required  placeholder="Foto Kurir" >
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
  <?php foreach ($data_kurir->result_array() as $i) :
                                            $id_kurir=$i["id_kurir"];
                                          ?>
       <form  action="<?php echo base_url()."kurir/update_kurir"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_kurir;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE KURIR</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                        <input type="hidden" name="id_kurir" value="<?php echo $id_kurir;?>">

                                  <div class="form-group m-t-20">
                                    <label>NIK <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["nik"];?>" type="text" class="form-control" name="nik" required  placeholder="NIK" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Nama <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["nama"];?>" type="text" class="form-control" name="nama" required  placeholder="Nama" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tempat Lahir <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tempat_lahir"];?>" type="text" class="form-control" name="tempat_lahir" required  placeholder="Tempat Lahir" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Lahir <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tanggal_lahir"];?>" type="date" class="form-control" name="tanggal_lahir" required  placeholder="Tanggal Lahir" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Jenis Kelamin <span style="color: red;">*</span></label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                      <option value="">--pilih jenis kelamin--</option>
                                      <option <?= ($i["jenis_kelamin"]=="Laki-Laki")?"selected":"";?> >Laki-Laki</option>
          <option <?= ($i["jenis_kelamin"]=="Perempuan")?"selected":"";?> >Perempuan</option>
          
                                    </select>
                                </div>
                                <div class="form-group m-t-20">
                                    <label>Agama <span style="color: red;">*</span></label>
                                    <select class="form-control" name="agama" required>
                                      <option value="">--pilih agama--</option>
                                      <option <?= ($i["agama"]=="Islam")?"selected":"";?> >Islam</option>
          <option <?= ($i["agama"]=="Protestan")?"selected":"";?> >Protestan</option>
          <option <?= ($i["agama"]=="Katolik")?"selected":"";?> >Katolik</option>
          <option <?= ($i["agama"]=="Hindu")?"selected":"";?> >Hindu</option>
          <option <?= ($i["agama"]=="Buddha")?"selected":"";?> >Buddha</option>
          <option <?= ($i["agama"]=="Khonghucu")?"selected":"";?> >Khonghucu</option>
          
                                    </select>
                                </div>
                                <div class="form-group m-t-20">
                                    <label>Alamat <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="alamat" required><?php echo $i["alamat"];?></textarea>
                                </div>

																<div class="form-group m-t-20">
                                    <label>No Hp <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["no_hp"];?>" type="text" class="form-control" name="no_hp" required  placeholder="No Hp" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tmt Kurir <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tmt_kurir"];?>" type="date" class="form-control" name="tmt_kurir" required  placeholder="Tmt Kurir" >
                                </div>


                                 <div class="col-12 col-md-12" style="margin-bottom: 12px;">
                                        <label class="form-label" >Password </label>
                                        <input autocomplete="new-password" type="password" name="password" class="form-control" placeholder="Password">
                                        <span style="color: red;">kosongkan jika tidak ada perubahan password</span>
                                  </div> 


                                  <div class="form-group m-t-20">
                                    <label>Foto Kurir </label>
                                    <input type="file" class="form-control" name="foto_kurir"   placeholder="Foto Kurir" >
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



   <?php foreach ($data_kurir->result_array() as $i) :
                                            $id_kurir=$i["id_kurir"];
                                          ?>
       <form  action="<?php echo base_url()."kurir/hapus_kurir"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_kurir;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS KURIR</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_kurir;?>">
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
  text: "Kurir Berhasil di SIMPAN",
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Kurir Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Kurir Berhasil di HAPUS"
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






			