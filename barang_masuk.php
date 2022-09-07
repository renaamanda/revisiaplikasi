


 
   

    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">Barang Masuk</h2>
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
                  <a target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url();?>barang_masuk/cetak"><i class="fa fa-print"></i> CETAK </a>
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH BARANG MASUK</button>
                    <?php endif;?>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover table-responsive" >
                      <thead style="background-color: #cfcbca;">
                          <tr>
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
        <th>No Transaksi</th>
				<th>Nama Petugas</th>
				<th>Nama Customer</th>
				<th>Cabang</th>
				<th>Nama Barang</th>
				<th>Tanggal Jam Masuk</th>
				<th>Total Biaya</th>
				
				<th>Jumlah</th>
				<th>Berat</th>
        <th>Nama Penerima</th>
        <th>Telp Penerima</th>
        <th>Alamat Penerima</th>
         <th>Petugas Input</th>
        <th>Tanggal Jam Input</th>
				<?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                        <th style="text-align: center;">Action</th>
                                                         <?php endif;?>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($data_barang_masuk->result_array() as $i) :
                                            $id_barang_masuk=$i["id_barang_masuk"];
                                              ?>
                         <tr>
                                              
        <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
        <td><?php echo $i["no_transaksi"];?></td>
        <td><?php echo $i["nama_p"];?></td>
        <td><?php echo $i["nama_c"];?></td>
        <td><?php echo $i["nama_cabang"];?></td>
        <td><?php echo $i["nama_barang"];?></td>
        <td><?php echo date('d-M-Y, H:i',strtotime($i["tanggal_jam_masuk"]));?></td>
       <td><?php echo rupiah($i["total_biaya"]);?></td>
        
        <td><?php echo $i["jumlah"];?> <?php echo $i["satuan"];?></td>
        <td><?php echo $i["berat"];?> kg</td>
        <td><?php echo $i["nama_penerima"];?></td>
        <td><?php echo $i["telp_penerima"];?></td>
        <td><?php echo $i["alamat_penerima"];?></td>
        <td><?php echo $i["petugas_input_bm"];?></td>
        <td><?php echo tgl_indo(date('Y-m-d',strtotime($i["tanggal_jam_input_bm"]))); echo date(', H:i',strtotime($i["tanggal_jam_input_bm"]));?></td>
        
                                             <?php if($this->session->userdata('level')!="Pimpinan"):?>
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">

                                                <a target="_blank" style="margin: 2px;" href="barang_masuk/cetak2/<?php echo $id_barang_masuk;?>" type="button" class="btn btn-success mdi mdi-pencil btn-sm" ><i class="fa fa-print"></i> CETAK</a>

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_barang_masuk;?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_barang_masuk;?>"><i class="fa fa-trash"></i> DELETE</button>
                                                  
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
       <form  action="<?php echo base_url()."barang_masuk/simpan_barang_masuk"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH BARANG MASUK</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  <div class="form-group m-t-20">
                                    <label>No Transaksi <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="no_transaksi" required  placeholder="No Transaksi" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Petugas<span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_pegawai" required>
                                      <option value="">--pilih petugas--</option>
                                      <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                        <option value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nik'];?> | <?php echo $key['nama'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

																<div class="form-group m-t-20">
                                    <label>Customer <span style="color: red;">*</span></label>
                                   <select class="form-control" name="id_customer" required>
                                      <option value="">--pilih customer--</option>
                                      <?php foreach ($this->db->get('customer')->result_array() as $key):?>
                                        <option value="<?php echo $key['id_customer'];?>"><?php echo $key['kode_customer'];?> | <?php echo $key['nama'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

																<div class="form-group m-t-20">
                                    <label>Cabang <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_cabang" required>
                                      <option value="">--pilih cabang--</option>
                                      <?php foreach ($this->db->get('cabang')->result_array() as $key):?>
                                        <option value="<?php echo $key['id_cabang'];?>"><?php echo $key['nama_cabang'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>


																<div class="form-group m-t-20">
                                    <label>Nama Barang <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_barang" required  placeholder="Nama Barang" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Jam Masuk <span style="color: red;">*</span></label>
                                    <input type="datetime-local" class="form-control" name="tanggal_jam_masuk" required  placeholder="Tanggal Jam Masuk" >
                                </div>

											<div class="form-group m-t-20">
                                    <label>Total Biaya <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control uang" name="total_biaya" required  placeholder="Total Biaya" >
                                </div>

																

																<div class="form-group m-t-20">
                                    <label>Jumlah <span style="color: red;">*</span></label>
                                    <input type="number" class="form-control" name="jumlah" required  placeholder="Jumlah" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Satuan <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="satuan" required  placeholder="Satuan" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Berat (kg)<span style="color: red;">*</span></label>
                                    <input type="number" step="0.01" value="0.00" class="form-control" name="berat" required  placeholder="Berat" >
                                </div>

                                

                                <div class="form-group m-t-20">
                                    <label>Nama Penerima <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_penerima" required  placeholder="Nama Penerima" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Telp Penerima <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="telp_penerima" required  placeholder="Telp Penerima" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Alamat Penerima <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="alamat_penerima" required></textarea>
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
  <?php foreach ($data_barang_masuk->result_array() as $i) :
                                            $id_barang_masuk=$i["id_barang_masuk"];
                                          ?>
       <form  action="<?php echo base_url()."barang_masuk/update_barang_masuk"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_barang_masuk;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE BARANG MASUK</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                        <input type="hidden" name="id_barang_masuk" value="<?php echo $id_barang_masuk;?>">

                                <div class="form-group m-t-20">
                                    <label>No Transaksi <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i["no_transaksi"];?>" type="text" class="form-control" name="no_transaksi" required  placeholder="No Transaksi" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Petugas<span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_pegawai" required>
                                      <option value="">--pilih petugas--</option>
                                      <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                        <option <?= ($i['id_pegawai']==$key['id_pegawai'])?'selected':'';?> value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nik'];?> | <?php echo $key['nama'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Customer <span style="color: red;">*</span></label>
                                   <select class="form-control" name="id_customer" required>
                                      <option value="">--pilih customer--</option>
                                      <?php foreach ($this->db->get('customer')->result_array() as $key):?>
                                        <option <?= ($i['id_customer']==$key['id_customer'])?'selected':'';?> value="<?php echo $key['id_customer'];?>"><?php echo $key['kode_customer'];?> | <?php echo $key['nama'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Cabang <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_cabang" required>
                                      <option value="">--pilih cabang--</option>
                                      <?php foreach ($this->db->get('cabang')->result_array() as $key):?>
                                        <option <?= ($i['id_cabang']==$key['id_cabang'])?'selected':'';?> value="<?php echo $key['id_cabang'];?>"><?php echo $key['nama_cabang'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

																<div class="form-group m-t-20">
                                    <label>Nama Barang <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["nama_barang"];?>" type="text" class="form-control" name="nama_barang" required  placeholder="Nama Barang" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Jam Masuk <span style="color: red;">*</span></label>
                                    <input value="<?php echo date('Y-m-d\TH:i', strtotime($i['tanggal_jam_masuk'])) ?>" type="datetime-local" class="form-control" name="tanggal_jam_masuk" required  placeholder="Tanggal Jam Masuk" >
                                </div>

											<div class="form-group m-t-20">
                                    <label>Total Biaya <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["total_biaya"];?>" type="text" class="form-control uang" name="total_biaya" required  placeholder="Total Biaya" >
                                </div>

																

																<div class="form-group m-t-20">
                                    <label>Jumlah <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["jumlah"];?>" type="number" class="form-control" name="jumlah" required  placeholder="Jumlah" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Satuan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["satuan"];?>" type="text" class="form-control" name="satuan" required  placeholder="Satuan" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Berat (kg)<span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["berat"];?>" step="0.01" type="number" class="form-control" name="berat" required  placeholder="Berat" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Nama Penerima <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["nama_penerima"];?>" type="text" class="form-control" name="nama_penerima" required  placeholder="Nama Penerima" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Telp Penerima <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["telp_penerima"];?>" type="text" class="form-control" name="telp_penerima" required  placeholder="Telp Penerima" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Alamat Penerima <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="alamat_penerima" required><?php echo $i["alamat_penerima"];?></textarea>
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



   <?php foreach ($data_barang_masuk->result_array() as $i) :
                                            $id_barang_masuk=$i["id_barang_masuk"];
                                          ?>
       <form  action="<?php echo base_url()."barang_masuk/hapus_barang_masuk"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_barang_masuk;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS BARANG MASUK</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_barang_masuk;?>">
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
  text: "Barang Masuk Berhasil di SIMPAN",
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Barang Masuk Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Barang Masuk Berhasil di HAPUS"
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






			