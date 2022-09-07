


 
   

    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">Surat Jalan</h2>
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
                  <?php if($this->session->userdata('level')!="kurir"):?>
                  <a target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url();?>surat_jalan/cetak"><i class="fa fa-print"></i> CETAK </a>
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH SURAT JALAN</button>
                   <?php endif;?>
                   <?php endif;?>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover table-responsive" >
                      <thead style="background-color: #cfcbca;">
                          <tr>
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
        <th>Nomor Surat Jalan</th>
        <th>Nama Petugas</th>
        <th>Nama Kurir</th>
        <th>Tujuan Pengiriman</th>
				<th>Daftar Barang</th>
				<th>Tanggal Surat</th>
        <th>Petugas Input</th>
        <th>Tanggal Jam Input</th>
				<?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                        <th style="text-align: center;">Action</th>
                                                        <?php endif;?>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($data_surat_jalan->result_array() as $i) :
                                            $id_surat_jalan=$i["id_surat_jalan"];
                                            $id_barang_masuk=$i['id_barang_masuk'];
                                            $check = explode(',', $id_barang_masuk);
                                              ?>
                         <tr>
                                              
        <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
        <td><?php echo $i["nomor_surat_jalan"];?></td>
        <td><?php echo $i["nama_p"];?></td>
        <td><?php echo $i["nama"];?></td>
        <td><?php echo $i["tujuan_pengiriman"];?></td>
                                  <td>
                                              <?php foreach ($this->db->query("SELECT *, pegawai.nama as nama_p, customer.nama nama_c FROM barang_masuk,pegawai,customer,cabang WHERE 
barang_masuk.id_pegawai=pegawai.id_pegawai AND
barang_masuk.id_customer=customer.id_customer AND
barang_masuk.id_cabang=cabang.id_cabang")->result_array() as $i3) : 
                                                $id2=$i3['id_barang_masuk']; 
                                                $nama2=$i3['no_transaksi']; 
                                                $nip2=$i3['nama_barang']; 
                                              ?>
                                              <?php in_array($id2, $check) ? print "~".$nip2."#".$nama2." <br>" : ""; ?>
                                              <?php endforeach;?>
                                                </td>
        <td><?php echo tgl_indo($i["tanggal_surat"]);?></td>
        
        <td><?php echo $i["petugas_input_sj"];?></td>
        <td><?php echo tgl_indo(date('Y-m-d',strtotime($i["tanggal_jam_input_sj"]))); echo date(', H:i',strtotime($i["tanggal_jam_input_sj"]));?></td>
        
                                             <?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                <td style="text-align: right;">
                                                    <div class="btn-group" role="group" aria-label="Basic example">

                                                <a target="_blank" style="margin: 2px;" href="surat_jalan/cetak2/<?php echo $id_surat_jalan;?>" type="button" class="btn btn-success mdi mdi-pencil btn-sm" ><i class="fa fa-print"></i> CETAK</a>

                                                 <?php if($this->session->userdata('level')!="kurir"):?>

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_surat_jalan;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_surat_jalan;?>"><i class="fa fa-trash"></i> DELETE</button>

                                                 <?php endif;?>
                                                  
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
       <form  action="<?php echo base_url()."surat_jalan/simpan_surat_jalan"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH SURAT JALAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="form-group m-t-20">
                                    <label>Nomor Surat Jalan <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nomor_surat_jalan" required  placeholder="Nomor Surat Jalan" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Petugas <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_pegawai" required>
                                      <option value="">--pilih petugas--</option>
                                      <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                        <option value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nik'];?> | <?php echo $key['nama'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Kurir <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_kurir" required>
                                      <option value="">--pilih kurir--</option>
                                      <?php foreach ($this->db->get('kurir')->result_array() as $key):?>
                                        <option value="<?php echo $key['id_kurir'];?>"><?php echo $key['nik'];?> | <?php echo $key['nama'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>


                                  <div class="form-group m-t-20">
                                    <label>Tujuan Pengiriman <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="tujuan_pengiriman" required  placeholder="Tujuan Pengiriman" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Barang Masuk <span style="color: red;">*</span></label>
                                    <select data-placeholder="Choose tags ..." class="form-control js-example-basic-multiple"  name="id_barang_masuk[]" required multiple="multiple">
                                      <?php foreach ($this->db->query("SELECT *, pegawai.nama as nama_p, customer.nama nama_c FROM barang_masuk,pegawai,customer,cabang WHERE 
barang_masuk.id_pegawai=pegawai.id_pegawai AND
barang_masuk.id_customer=customer.id_customer AND
barang_masuk.id_cabang=cabang.id_cabang")->result_array() as $key):?>
                                        <option  value="<?php echo $key['id_barang_masuk'];?>"><?php echo $key['no_transaksi'];?> # <?php echo $key['nama_barang'];?></option>
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
  <?php foreach ($data_surat_jalan->result_array() as $i) :
                                            $id_surat_jalan=$i["id_surat_jalan"];
                                             $id_barang_masuk=$i['id_barang_masuk'];
                                            $check = explode(',', $id_barang_masuk);
                                          ?>
       <form  action="<?php echo base_url()."surat_jalan/update_surat_jalan"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_surat_jalan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE SURAT JALAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                        <input type="hidden" name="id_surat_jalan" value="<?php echo $id_surat_jalan;?>">

                                <div class="form-group m-t-20">
                                    <label>Nomor Surat Jalan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["nomor_surat_jalan"];?>" type="text" class="form-control" name="nomor_surat_jalan" required  placeholder="Nomor Surat Jalan" >
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Petugas <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_pegawai" required>
                                      <option value="">--pilih petugas--</option>
                                      <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                        <option <?= ($i['id_pegawai']==$key['id_pegawai'])?'selected':'';?> value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nik'];?> | <?php echo $key['nama'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Kurir <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_kurir" required>
                                      <option value="">--pilih kurir--</option>
                                      <?php foreach ($this->db->get('kurir')->result_array() as $key):?>
                                        <option <?= ($i['id_kurir']==$key['id_kurir'])?'selected':'';?> value="<?php echo $key['id_kurir'];?>"><?php echo $key['nik'];?> | <?php echo $key['nama'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>


                                 <div class="form-group m-t-20">
                                    <label>Tujuan Pengiriman <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tujuan_pengiriman"];?>" type="text" class="form-control" name="tujuan_pengiriman" required  placeholder="Tujuan Pengiriman" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Barang Masuk <span style="color: red;">*</span></label>
                                     <select data-placeholder="Choose tags ..." class="form-control js-example-basic-multiple"  name="id_barang_masuk[]" required multiple="multiple">
                                      <?php foreach ($this->db->query("SELECT *, pegawai.nama as nama_p, customer.nama nama_c FROM barang_masuk,pegawai,customer,cabang WHERE 
barang_masuk.id_pegawai=pegawai.id_pegawai AND
barang_masuk.id_customer=customer.id_customer AND
barang_masuk.id_cabang=cabang.id_cabang")->result_array() as $key):?>
                                        <option <?php if(in_array($key['id_barang_masuk'], $check)){echo "selected";}else{};?> value="<?php echo $key['id_barang_masuk'];?>"><?php echo $key['no_transaksi'];?> # <?php echo $key['nama_barang'];?></option>
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



   <?php foreach ($data_surat_jalan->result_array() as $i) :
                                            $id_surat_jalan=$i["id_surat_jalan"];
                                          ?>
       <form  action="<?php echo base_url()."surat_jalan/hapus_surat_jalan"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_surat_jalan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS SURAT JALAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_surat_jalan;?>">
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
  text: "Surat Jalan Berhasil di SIMPAN",
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Surat Jalan Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Surat Jalan Berhasil di HAPUS"
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






			