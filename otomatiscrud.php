<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Otomatis Crud</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/logo4.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/logo4.png">
<link rel="stylesheet" href="<?php echo base_url();?>assets/otomatiscrud.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="<?php echo base_url();?>assets/alert/sweetalert2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/alert/sweetalert2.min.css" rel="stylesheet">
  <script src="<?php echo base_url();?>assets/alert/sweetalert2.min.js"></script>
 <script src="<?php echo base_url();?>assets/alert/sweetalert2.js"></script>
</head>
<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "80%" 
        }
</script>
<body onload="zoom()">
<!-- partial:index.partial.html -->
<div id="particles-js"></div>

<div class="text">
	<h1>CRUD OTOMATIS Ver 1.0</h1>
  <hr>
 <form class="form-horizontal" action="<?php echo base_url();?>otomatiscrud/proses" method="POST" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Tabel <span style="color: red;">*</span></label>
    <select class="form-control" name="nama_tabel" id="nama_tabel" required>
      <option value="">--pilih tabel--</option>
      <?php $tables = $this->db->list_tables(); foreach ($tables as $tabel):?>
      <option><?php echo $tabel;?></option>
      <?php endforeach;?>
    </select>
   <!--  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Cetak Satuan <span style="color: red;">*</span></label>
    <select class="form-control" name="cetak_satuan">
      <option value="">TIDAK</option>
      <option >IYA</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tabel Responsive <span style="color: red;">*</span></label>
    <select class="form-control" name="tabel_responsive">
      <option value="">TIDAK</option>
      <option >IYA</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Filter Berdasarkan </label>
    <select class="form-control" name="kolom_filter" id="list_kolom"  >
      <option value="">--pilih kolom--</option>
     
    </select>
    <div id="emailHelp" class="form-text">Kosongkan jika tanpa filter.</div>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Query relasi </label>
    <textarea class="form-control" name="query_relasi"></textarea>
    <div id="emailHelp" class="form-text">Kosongkan jika tanpa relasi.</div>
  </div>

  

  <button type="submit" class="btn btn-primary col-12">PROSES</button>
</form>
<hr>
Created by. Baihaki
</div>
<!-- partial -->
  <script src='https://cldup.com/S6Ptkwu_qA.js'></script>
  <script  src="<?php echo base_url();?>assets/otomatiscrud.js"></script>
  <script  src="<?php echo base_url();?>assets/otomatiscrud2.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
 swal("", "Berhasil di proses", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('sudah_ada') == TRUE): ?>
 <script type="text/javascript">
 swal("", "File controller sudah ada, harap hapus terlebih dahulu jika ingin menulis code ulang", "warning");
 </script>
<?php endif; ?>


 <script>
  $(document).ready(function(){ 
    $("#nama_tabel").change(function(){ 
      $.ajax({
        type: "POST", 
        url: "<?php echo base_url("/otomatiscrud/carikolom"); ?>", 
        data: {nama_tabel : $("#nama_tabel").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#list_kolom").html(response.list_kolom).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });
    });

  });

  </script>