


 
   

    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">Pengiriman</h2>
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
                  <a target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url();?>pengiriman/cetak"><i class="fa fa-print"></i> CETAK </a>
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PENGIRIMAN</button>
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
				<th>No Pengiriman</th>
        <th>Wilayah Pengiriman</th>
				<th>Nama Kurir</th>
				<th>No Plat</th>
        <th>Status Pengiriman</th>
				<th>Tanggal Jam Pengiriman</th>
				<th>File Bukti Kirim</th>
        <th>Petugas Input</th>
        <th>Tanggal Jam Input</th>
        <th>Penilaian Customer</th>
        <th>Catatan Customer</th>
				<?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                        <th style="text-align: center;">Action</th>
                                                         <?php endif;?>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($data_pengiriman->result_array() as $i) :
                                            $id_pengiriman=$i["id_pengiriman"];
                                              ?>
                         <tr>
                                              
        <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                          
                                           
                                              
        <td><?php echo $i["no_transaksi"];?></td>
        <td><?php echo $i["nama_barang"];?></td>
        <td><?php echo $i["no_pengiriman"];?></td>
        <td><?php echo $i["nama_wilayah"];?></td>
        <td><?php echo $i["nama"];?></td>
        <td><?php echo $i["plat"];?></td>
        
        <td><?php echo $i["status_pengiriman"];?></td>
        <td><?php echo date('d-M-Y, H:i',strtotime($i["tanggal_jam_pengiriman"]));?></td>

        <td><a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['file_bukti_kirim'];?>" class="btn btn-success mdi mdi-pencil btn-sm"><i class="fa fa-eye"></i> LIHAT</a></td>
        <td><?php echo $i["petugas_input_p1"];?></td>
        <td><?php echo tgl_indo(date('Y-m-d',strtotime($i["tanggal_jam_input_p1"]))); echo date(', H:i',strtotime($i["tanggal_jam_input_p1"]));?></td>
        <td>
          <?php if($i["penilaian"]==1):?>
            <i class="fa fa-star"></i>
          <?php elseif($i["penilaian"]==2):?>
            <i class="fa fa-star"></i><i class="fa fa-star"></i>
          <?php elseif($i["penilaian"]==3):?>
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
          <?php elseif($i["penilaian"]==4):?>
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
          <?php elseif($i["penilaian"]==5):?>
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
          <?php endif;?>
        </td>
        <td><?php echo $i["catatan_customer"];?></td>
        
                                             <?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">
                                                    <?php if($i['status_pengiriman']=="SELESAI"):?>
                                                     <?php if($this->session->userdata('level')=="customer"):?>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#modnilai<?php echo $id_pengiriman;?>"><i class="fa fa-star"></i> BERI PENILAIAN</button>
                                                  </div>
                                                  <?php endif;?>
                                                  <?php endif;?>



                                                <?php if($this->session->userdata('level')!="customer"):?>

                                                <a target="_blank" style="margin: 2px;" href="pengiriman/cetak2/<?php echo $id_pengiriman;?>" type="button" class="btn btn-success mdi mdi-pencil btn-sm" ><i class="fa fa-print"></i> CETAK</a>

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pengiriman;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pengiriman;?>"><i class="fa fa-trash"></i> DELETE</button>
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
       <form  action="<?php echo base_url()."pengiriman/simpan_pengiriman"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH PENGIRIMAN</b></h4>
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
                                    <label>No Pengiriman <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="no_pengiriman" required  placeholder="No Pengiriman" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Wilayah Pengiriman <span style="color: red;">*</span></label>
                                  <select class="form-control" name="nama_wilayah" required>
                                      <option value="">--pilih wilayah--</option>
                                      <?php foreach ($this->db->get("wilayah")->result_array() as $key):?>
                                        <option><?php echo $key['nama_wilayah'];?> </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

											

																<div class="form-group m-t-20">
                                    <label>Truk <span style="color: red;">*</span></label>
                                     <select class="form-control" name="id_truk" required>
                                      <option value="">--pilih truk--</option>
                                      <?php foreach ($this->db->get("truk")->result_array() as $key):?>
                                        <option value="<?php echo $key['id_truk'];?>"><?php echo $key['plat'];?> | <?php echo $key['nama_truk'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Jam Pengiriman <span style="color: red;">*</span></label>
                                    <input type="datetime-local" class="form-control" name="tanggal_jam_pengiriman" required  placeholder="Tanggal Jam Pengiriman" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Status Pengiriman <span style="color: red;">*</span></label>
                                    <select class="form-control" name="status_pengiriman" required>
                                      <option>--plih status pengiriman--</option>
                                      <option>DIKIRIM</option>
                                      <option>DALAM PERJALANAN</option>
                                      <option>SELESAI</option>
                                    </select>
                                </div>

											<div class="form-group m-t-20">
                                    <label>File Bukti Kirim </label>
                                    <input type="file" name="file_bukti_kirim" class="form-control">
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
  <?php foreach ($data_pengiriman->result_array() as $i) :
                                            $id_pengiriman=$i["id_pengiriman"];
                                          ?>
       <form  action="<?php echo base_url()."pengiriman/update_pengiriman"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pengiriman;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE PENGIRIMAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                        <input type="hidden" name="id_pengiriman" value="<?php echo $id_pengiriman;?>">


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
                                    <label>No Pengiriman <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['no_pengiriman'];?>" type="text" class="form-control" name="no_pengiriman" required  placeholder="No Pengiriman" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Wilayah Pengiriman <span style="color: red;">*</span></label>
                                  <select class="form-control" name="nama_wilayah" required>
                                      <option value="">--pilih wilayah--</option>
                                      <?php foreach ($this->db->get("wilayah")->result_array() as $key):?>
                                        <option <?= ($i['nama_wilayah']==$key['nama_wilayah'])?'selected':'';?>><?php echo $key['nama_wilayah'];?> </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

                             

                                <div class="form-group m-t-20">
                                    <label>Truk <span style="color: red;">*</span></label>
                                     <select class="form-control" name="id_truk" required>
                                      <option value="">--pilih truk--</option>
                                      <?php foreach ($this->db->get("truk")->result_array() as $key):?>
                                        <option <?= ($i['id_truk']==$key['id_truk'])?'selected':'';?> value="<?php echo $key['id_truk'];?>"><?php echo $key['plat'];?> | <?php echo $key['nama_truk'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tanggal Jam Pengiriman <span style="color: red;">*</span></label>
                                    <input value="<?php echo date('Y-m-d\TH:i', strtotime($i['tanggal_jam_pengiriman'])) ?>" type="datetime-local" class="form-control" name="tanggal_jam_pengiriman" required  placeholder="Tanggal Jam Pengiriman" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Status Pengiriman <span style="color: red;">*</span></label>
                                    <select class="form-control" name="status_pengiriman" required>
                                      <option>--plih status pengiriman--</option>
                                      <option <?= ($i['status_pengiriman']=="DIKIRIM")?'selected':'';?> >DIKIRIM</option>
                                      <option <?= ($i['status_pengiriman']=="DALAM PERJALANAN")?'selected':'';?> >DALAM PERJALANAN</option>
                                      <option <?= ($i['status_pengiriman']=="SELESAI")?'selected':'';?> >SELESAI</option>
                                    </select>
                                </div>

                      <div class="form-group m-t-20">
                                    <label>File Bukti Kirim </label>
                                    <input type="file" name="file_bukti_kirim"  class="form-control">
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



   <?php foreach ($data_pengiriman->result_array() as $i) :
                                            $id_pengiriman=$i["id_pengiriman"];
                                          ?>
       <form  action="<?php echo base_url()."pengiriman/hapus_pengiriman"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pengiriman;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS PENGIRIMAN</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pengiriman;?>">
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



  

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style>
  select{
    font-family: fontAwesome
  }
</style>




  <?php foreach ($data_pengiriman->result_array() as $i) :
                                            $id_pengiriman=$i["id_pengiriman"];
                                          ?>
       <form  action="<?php echo base_url()."pengiriman/update_pengiriman2"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modnilai<?php echo $id_pengiriman;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>BERI PENILAIAN PENGIRIMAN INI</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                        <input type="hidden" name="id_pengiriman" value="<?php echo $id_pengiriman;?>">



                                <div class="form-group m-t-20">
                                    <label>Rating <span style="color: red;">*</span></label>
                                    <select class="form-control" name="penilaian" required>
                                      <option value="">--pilih--</option>
                                      <option <?= ($i['penilaian']=="1")?'selected':'';?> value="1">&#xf005;</option>
                                      <option <?= ($i['penilaian']=="2")?'selected':'';?> value="2">&#xf005;&#xf005;</option>
                                      <option <?= ($i['penilaian']=="3")?'selected':'';?> value="3">&#xf005;&#xf005;&#xf005;</option>
                                      <option <?= ($i['penilaian']=="4")?'selected':'';?> value="4">&#xf005;&#xf005;&#xf005;&#xf005;</option>
                                      <option <?= ($i['penilaian']=="5")?'selected':'';?> value="5">&#xf005;&#xf005;&#xf005;&#xf005;&#xf005;</option>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Catatan </label>
                                    <textarea class="form-control" name="catatan_customer"><?php echo $i['catatan_customer'];?></textarea>
                                </div>

                             

                           

                                

                            
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal" aria-label="Close">TUTUP</button>
                                  <button type="submit" class="btn btn-success">SIMPAN</button>
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
  text: "Pengiriman Berhasil di SIMPAN",
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Pengiriman Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit2") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Berhasil diberi penilaian"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Pengiriman Berhasil di HAPUS"
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






			