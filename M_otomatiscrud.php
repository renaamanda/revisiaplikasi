<?php
class M_otomatiscrud extends CI_Model{

	function membuat_file_view_inti($nama_asal,$db_nama,$cetak_satuan,$tabel_responsive){
		//membuat file view inti
    if (empty($cetak_satuan)) {
      $button_cetak_satuan="";
    }else{
      $button_cetak_satuan='<a target="_blank" style="margin: 2px;" href="'.$nama_asal.'/cetak2/<?php echo $id_'.$nama_asal.';?>" type="button" class="btn btn-success mdi mdi-pencil btn-sm" ><i class="fa fa-print"></i> CETAK</a>';
    }
		$nama_asal2=strtoupper(str_replace("_", " ", $nama_asal));
		$nama_asal3=ucwords(str_replace("_", " ", $nama_asal));
		$nama_file='application/views/'.$nama_asal.'/'.$nama_asal.'.php';
		$file = fopen($nama_file,"w");
		$query_nama_kolom=$this->db->query("SELECT COLUMN_NAME,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '".$db_nama."' and table_name = '".$nama_asal."'")->result();
		$string_kolom="";
		$string_kolom2="";
		$string_tambah="";
		$string_edit="";
		$jumlah1=1;
		$jumlah2=1;
		$jumlah3=1;
		$jumlah4=1;
			//pertama
		foreach ($query_nama_kolom as $key) {
			if($jumlah1>1){
			$nama_kolom1=str_replace("_", " ", $key->COLUMN_NAME);
			$string_kolom.='<th>'.ucwords($nama_kolom1).'</th>
				';
			}
			$jumlah1++;
		}

			//kedua
		foreach ($query_nama_kolom as $key) {
      if($jumlah2>1){
        if ($key->DATA_TYPE=="date") {
          $string_kolom2.='<td><?php echo tgl_indo($i["'.$key->COLUMN_NAME.'"]);?></td>
        ';
        }elseif ($key->DATA_TYPE=="timestamp") {
          $string_kolom2.='<td><?php echo date("d-F-Y, H:i",strtotime($i["'.$key->COLUMN_NAME.'"]));?></td>
        ';
        }else{
          $string_kolom2.='<td><?php echo $i["'.$key->COLUMN_NAME.'"];?></td>
        ';
        }
      
      }
      $jumlah2++;
    }

			//kolom tambah
		foreach ($query_nama_kolom as $key) {
			if($jumlah3>1){
			$namefild=str_replace("_", " ", $key->COLUMN_NAME);

			//jika int
			if ($key->DATA_TYPE=="int") {
				$string_tambah.='<div class="form-group m-t-20">
                                    <label>'.ucwords($namefild).' <span style="color: red;">*</span></label>
                                    <input type="number" class="form-control" name="'.$key->COLUMN_NAME.'" required  placeholder="'.ucwords($namefild).'" >
                                </div>

																';
			}
			//jika varchar
			elseif ($key->DATA_TYPE=="varchar") {
				$string_tambah.='<div class="form-group m-t-20">
                                    <label>'.ucwords($namefild).' <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="'.$key->COLUMN_NAME.'" required  placeholder="'.ucwords($namefild).'" >
                                </div>

																';
			}
			//jika text
			elseif ($key->DATA_TYPE=="text") {
				$string_tambah.='<div class="form-group m-t-20">
                                    <label>'.ucwords($namefild).' </label>
                                    <textarea class="form-control" name="'.$key->COLUMN_NAME.'" ></textarea>
                                </div>

																';
			}
			//jika date
			elseif ($key->DATA_TYPE=="date") {
				$string_tambah.='<div class="form-group m-t-20">
                                    <label>'.ucwords($namefild).' <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="'.$key->COLUMN_NAME.'" required  placeholder="'.ucwords($namefild).'" >
                                </div>

																';
			}
      //jika enum
      elseif ($key->DATA_TYPE=="enum") {

        $type2 = $this->db->query("SHOW COLUMNS FROM {$nama_asal} WHERE Field = '{$key->COLUMN_NAME}'" )->row(0)->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $type2, $matches2);
        $isi_enum = explode("','", $matches2[1]);
        $string_enum="";
        foreach ($isi_enum as $values22)
        {
          $string_enum.="<option>{$values22}</option>
          ";
        }
        $string_tambah.='<div class="form-group m-t-20">
                                    <label>'.ucwords($namefild).' <span style="color: red;">*</span></label>
                                    <select class="form-control" name="'.$key->COLUMN_NAME.'" required>
                                      <option value="">--pilih '.$namefild.'--</option>
                                      '.$string_enum.'
                                    </select>
                                </div>

                                ';
      }
			//jika timestamp
			elseif ($key->DATA_TYPE=="timestamp") {
				// otomatis terisi
			}else{
				$string_tambah.='<div class="form-group m-t-20">
                                    <label>'.ucwords($namefild).' <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="'.$key->COLUMN_NAME.'" required  placeholder="'.ucwords($namefild).'" >
                                </div>

											';
			}
			

			}
			$jumlah3++;
		}


		//kolom edit
		foreach ($query_nama_kolom as $key) {
			if($jumlah4>1){
			$namefild=str_replace("_", " ", $key->COLUMN_NAME);

			//jika int
			if ($key->DATA_TYPE=="int") {
				$string_edit.='<div class="form-group m-t-20">
                                    <label>'.ucwords($namefild).' <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["'.$key->COLUMN_NAME.'"];?>" type="number" class="form-control" name="'.$key->COLUMN_NAME.'" required  placeholder="'.ucwords($namefild).'" >
                                </div>

																';
			}
			//jika varchar
			elseif ($key->DATA_TYPE=="varchar") {
				$string_edit.='<div class="form-group m-t-20">
                                    <label>'.ucwords($namefild).' <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["'.$key->COLUMN_NAME.'"];?>" type="text" class="form-control" name="'.$key->COLUMN_NAME.'" required  placeholder="'.ucwords($namefild).'" >
                                </div>

																';
			}
			//jika text
			elseif ($key->DATA_TYPE=="text") {
				$string_edit.='<div class="form-group m-t-20">
                                    <label>'.ucwords($namefild).' </label>
                                    <textarea class="form-control" name="'.$key->COLUMN_NAME.'" ><?php echo $i["'.$key->COLUMN_NAME.'"];?></textarea>
                                </div>

																';
			}
			//jika date
			elseif ($key->DATA_TYPE=="date") {
				$string_edit.='<div class="form-group m-t-20">
                                    <label>'.ucwords($namefild).' <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["'.$key->COLUMN_NAME.'"];?>" type="date" class="form-control" name="'.$key->COLUMN_NAME.'" required  placeholder="'.ucwords($namefild).'" >
                                </div>

																';
			}
       //jika enum
      elseif ($key->DATA_TYPE=="enum") {

        $type3 = $this->db->query("SHOW COLUMNS FROM {$nama_asal} WHERE Field = '{$key->COLUMN_NAME}'" )->row(0)->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $type3, $matches3);
        $isi_enu3 = explode("','", $matches3[1]);
        $string_enum3="";
        foreach ($isi_enu3 as $values22)
        {
          $string_enum3.='<option <?= ($i["'.$key->COLUMN_NAME.'"]=="'.$values22.'")?"selected":"";?> >'.$values22.'</option>
          ';
        }
        $string_edit.='<div class="form-group m-t-20">
                                    <label>'.ucwords($namefild).' <span style="color: red;">*</span></label>
                                    <select class="form-control" name="'.$key->COLUMN_NAME.'" required>
                                      <option value="">--pilih '.$namefild.'--</option>
                                      '.$string_enum3.'
                                    </select>
                                </div>
                                ';
      }
			//jika timestamp
			elseif ($key->DATA_TYPE=="timestamp") {
				// otomatis terisi
			}else{
				$string_edit.='<div class="form-group m-t-20">
                                    <label>'.ucwords($namefild).' <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["'.$key->COLUMN_NAME.'"];?>" type="text" class="form-control" name="'.$key->COLUMN_NAME.'" required  placeholder="'.ucwords($namefild).'" >
                                </div>

											';
			}
			

			}
			$jumlah4++;
		}

		echo fwrite($file,'


 
   

    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">'.$nama_asal3.'</h2>
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
                  <a target="_blank" class="btn btn-primary btn-sm" href="<?php echo base_url();?>'.$nama_asal.'/cetak"><i class="fa fa-print"></i> CETAK </a>
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH '.$nama_asal2.'</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover '.$tabel_responsive.'" >
                      <thead style="background-color: #cfcbca;">
                          <tr>
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
        '.$string_kolom.'
                                                        <th style="text-align: center;">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($data_'.$nama_asal.'->result_array() as $i) :
                                            $id_'.$nama_asal.'=$i["id_'.$nama_asal.'"];
                                              ?>
                         <tr>
                                              
        <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
        '.$string_kolom2.'
                                             
                                                <td style="text-align: right;">
                                                  <div class="btn-group" role="group" aria-label="Basic example">

                                                '.$button_cetak_satuan.'

                                                <button style="margin: 2px;" type="button"  class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_'.$nama_asal.';?>"><i class="fa fa-edit"></i> EDIT</button>

                                                <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_'.$nama_asal.';?>"><i class="fa fa-trash"></i> DELETE</button>
                                                  
                                                  </div>
                                                </td>
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
       <form  action="<?php echo base_url()."'.$nama_asal.'/simpan_'.$nama_asal.'"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>TAMBAH '.$nama_asal2.'</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                        

                                  '.$string_tambah.'
                              
                  

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
  <?php foreach ($data_'.$nama_asal.'->result_array() as $i) :
                                            $id_'.$nama_asal.'=$i["id_'.$nama_asal.'"];
                                          ?>
       <form  action="<?php echo base_url()."'.$nama_asal.'/update_'.$nama_asal.'"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_'.$nama_asal.';?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>UPDATE '.$nama_asal2.'</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                        <input type="hidden" name="id_'.$nama_asal.'" value="<?php echo $id_'.$nama_asal.';?>">

                                '.$string_edit.'

                            
                  

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



   <?php foreach ($data_'.$nama_asal.'->result_array() as $i) :
                                            $id_'.$nama_asal.'=$i["id_'.$nama_asal.'"];
                                          ?>
       <form  action="<?php echo base_url()."'.$nama_asal.'/hapus_'.$nama_asal.'"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_'.$nama_asal.';?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-danger white">
                                  <h4 class="modal-title" id="myModalLabel9" style="color: white;"> <b>HAPUS '.$nama_asal2.'</b></h4>
                                  <button  type="button"  class="close"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" >&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_'.$nama_asal.';?>">
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
  text: "'.$nama_asal3.' Berhasil di SIMPAN",
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "'.$nama_asal3.' Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "'.$nama_asal3.' Berhasil di HAPUS"
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






			');
		fclose($file);
	}






		 function membuat_file_cetak($nama_asal,$db_nama)
	{
		//membuat file cetak
		$nama_asal2=strtoupper(str_replace("_", " ", $nama_asal));
		$nama_file='application/views/'.$nama_asal.'/cetak.php';
		$file = fopen($nama_file,"w");
    $query_nama_kolom=$this->db->query("SELECT COLUMN_NAME,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '".$db_nama."' and table_name = '".$nama_asal."'")->result();
		$string_kolom="";
		$string_kolom2="";
		$jumlah1=1;
		$jumlah2=1;
			//pertama
		foreach ($query_nama_kolom as $key) {
			if($jumlah1>1){
			$nama_kolom1=str_replace("_", " ", $key->COLUMN_NAME);
			$string_kolom.='<th>'.ucwords($nama_kolom1).'</th>
				';
			}
			$jumlah1++;
		}

			//kedua
		foreach ($query_nama_kolom as $key) {
      if($jumlah2>1){
        if ($key->DATA_TYPE=="date") {
          $string_kolom2.='<td><?php echo tgl_indo($i["'.$key->COLUMN_NAME.'"]);?></td>
        ';
        }elseif ($key->DATA_TYPE=="timestamp") {
          $string_kolom2.='<td><?php echo date("d-F-Y, H:i",strtotime($i["'.$key->COLUMN_NAME.'"]));?></td>
        ';
        }else{
          $string_kolom2.='<td><?php echo $i["'.$key->COLUMN_NAME.'"];?></td>
        ';
        }
      
      }
      $jumlah2++;
    }
		echo fwrite($file,'
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <base href="<?php echo base_url();?>"/>
  </head>
  <style type="text/css">
    @media print{@page {size: landscape}}
  </style>
  <body onload="window.print()">
   <?php 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,",",".");
  return $hasil_rupiah;
}
?>

<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    );
    $pecahkan = explode("-", $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . " " . $bulan[(int) $pecahkan[1]] . " " . $pecahkan[0];
}?>
      <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                <img width="70px" src="<?= base_url() ?>assets/logo4.png">
            </td>
           <td>
                <font style="margin-right: 70px;" size="5">PEMERINTAH KABUPATEN KAPUAS</font> <br>
                <font style="margin-right: 70px;" size="6">SEKRETARIAT DAERAH</font> <br>
                <font style="margin-right: 70px;" size="3">Jalan Pemuda Km. 5,5 No. 1 Telp. (0513) – 21005 KODE POS 73515</font>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>


    <h3 align="center" style="font-size: 16px;"><u>LAPORAN '.$nama_asal2.'</u> <br> </h3>
    <br>
    <table border="1"width="100%" style="font-size: 14px;">
     <thead style="background-color: #d5eacf; text-align: center; ">
  <tr>
                          <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                    '.$string_kolom.'
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_'.$nama_asal.'->result_array() as $i) :
                                            $id_'.$nama_asal.'=$i["id_'.$nama_asal.'"];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                  	'.$string_kolom2.'
        </tr>
            <?php endforeach;?>
    </table>
<BR><BR>
   <div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 11pt;">
        <label>
            Ditetapkan di,_____________<br>
            Pada Tanggal <?= tgl_indo(date("Y-m-d")) ?>
            <br>
            <p style="text-align: center;">
              <br>
                <b>Mengetahui,_____________</b><br>
            </p>
            <br><br><br>
            <p style="text-align: center;">
                <b><u>_______________________</u></b><br>
            </p>
        </label>
    </div>
  </body>
</html>

			');
		fclose($file);
	}





     function membuat_file_cetak_satuan($nama_asal,$db_nama)
  {
    //membuat file cetak
    $nama_asal2=strtoupper(str_replace("_", " ", $nama_asal));
    $nama_file='application/views/'.$nama_asal.'/cetak2.php';
    $file = fopen($nama_file,"w");
    $query_nama_kolom=$this->db->query("SELECT COLUMN_NAME,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '".$db_nama."' and table_name = '".$nama_asal."'")->result();
    $string_kolom="";
    $jumlah1=1;
      //pertama
    foreach ($query_nama_kolom as $key) {
      if($jumlah1>1){
      $nama_kolom1=str_replace("_", " ", $key->COLUMN_NAME);
      

      if ($key->DATA_TYPE=="date") {
        $string_kolom.='
      <tr>
        <td width="130px">'.ucwords($nama_kolom1).'</td>
        <td width="10px">:</td>
        <td><?php echo tgl_indo($data_'.$nama_asal.'["'.$key->COLUMN_NAME.'"]);?></td>
      <tr>
        ';
        }elseif ($key->DATA_TYPE=="timestamp") {
         $string_kolom.='
      <tr>
        <td width="130px">'.ucwords($nama_kolom1).'</td>
        <td width="10px">:</td>
        <td><?php echo date("d-F-Y, H:i",strtotime($data_'.$nama_asal.'["'.$key->COLUMN_NAME.'"]));?></td>
      <tr>
        ';
        }else{
          $string_kolom.='
      <tr>
        <td width="130px">'.ucwords($nama_kolom1).'</td>
        <td width="10px">:</td>
        <td><?php echo $data_'.$nama_asal.'["'.$key->COLUMN_NAME.'"];?></td>
      <tr>
        ';
        }
      
      }
      $jumlah1++;
    }

    echo fwrite($file,'
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <base href="<?php echo base_url();?>"/>
  </head>
  <body onload="window.print()">
   <?php 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,",",".");
  return $hasil_rupiah;
}
?>

<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    );
    $pecahkan = explode("-", $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . " " . $bulan[(int) $pecahkan[1]] . " " . $pecahkan[0];
}?>
      <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                <img width="70px" src="<?= base_url() ?>assets/logo4.png">
            </td>
           <td>
                <font size="5">PEMERINTAH KABUPATEN KAPUAS</font> <br>
                <font size="6">SEKRETARIAT DAERAH</font> <br>
                <font size="3">Jalan Pemuda Km. 5,5 No. 1 Telp. (0513) – 21005 KODE POS 73515</font>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>


    <h3 align="center" style="font-size: 16px;"><u>LAPORAN '.$nama_asal2.'</u> <br> </h3>
    <br>

<table border="0"  style="margin-left: 30px; font-size: 11pt;"  class="table" >
  <tbody>
   '.$string_kolom.'
  </tbody>
</table>

<BR><BR>
   <div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 11pt;">
        <label>
            Ditetapkan di,_____________<br>
            Pada Tanggal <?= tgl_indo(date("Y-m-d")) ?>
            <br>
            <p style="text-align: center;">
              <br>
                <b>Mengetahui,_____________</b><br>
            </p>
            <br><br><br>
            <p style="text-align: center;">
                <b><u>_______________________</u></b><br>
            </p>
        </label>
    </div>
  </body>
</html>

      ');
    fclose($file);
  }





     function membuat_file_cetak_filter($nama_asal,$db_nama)
  {
    //membuat file cetak
    $nama_asal2=strtoupper(str_replace("_", " ", $nama_asal));
    $nama_file='application/views/'.$nama_asal.'/cetak_filter.php';
    $file = fopen($nama_file,"w");
    $query_nama_kolom=$this->db->query("SELECT COLUMN_NAME,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '".$db_nama."' and table_name = '".$nama_asal."'")->result();
    $string_kolom="";
    $string_kolom2="";
    $jumlah1=1;
    $jumlah2=1;
      //pertama
    foreach ($query_nama_kolom as $key) {
      if($jumlah1>1){
      $nama_kolom1=str_replace("_", " ", $key->COLUMN_NAME);
      $string_kolom.='<th>'.ucwords($nama_kolom1).'</th>
        ';
      }
      $jumlah1++;
    }

      //kedua
    foreach ($query_nama_kolom as $key) {
      if($jumlah2>1){
        if ($key->DATA_TYPE=="date") {
          $string_kolom2.='<td><?php echo tgl_indo($i["'.$key->COLUMN_NAME.'"]);?></td>
        ';
        }elseif ($key->DATA_TYPE=="timestamp") {
          $string_kolom2.='<td><?php echo date("d-F-Y, H:i",strtotime($i["'.$key->COLUMN_NAME.'"]));?></td>
        ';
        }else{
          $string_kolom2.='<td><?php echo $i["'.$key->COLUMN_NAME.'"];?></td>
        ';
        }
      
      }
      $jumlah2++;
    }
    echo fwrite($file,'
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <base href="<?php echo base_url();?>"/>
  </head>
  <style type="text/css">
    @media print{@page {size: landscape}}
  </style>
  <body onload="window.print()">
   <?php 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,",",".");
  return $hasil_rupiah;
}
?>

<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    );
    $pecahkan = explode("-", $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . " " . $bulan[(int) $pecahkan[1]] . " " . $pecahkan[0];
}?>
      <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                <img width="70px" src="<?= base_url() ?>assets/logo4.png">
            </td>
           <td>
                <font style="margin-right: 70px;" size="5">PEMERINTAH KABUPATEN KAPUAS</font> <br>
                <font style="margin-right: 70px;" size="6">SEKRETARIAT DAERAH</font> <br>
                <font style="margin-right: 70px;" size="3">Jalan Pemuda Km. 5,5 No. 1 Telp. (0513) – 21005 KODE POS 73515</font>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>


    <h3 align="center" style="font-size: 16px;"><u>LAPORAN '.$nama_asal2.' <br> <?php echo strtoupper(tgl_indo($tgl1));?> SAMPAI DENGAN <?php echo strtoupper(tgl_indo($tgl2));?> </u> <br> </h3>
    <br>
    <table border="1"width="100%" style="font-size: 14px;">
     <thead style="background-color: #d5eacf; text-align: center; ">
  <tr>
                          <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                    '.$string_kolom.'
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_'.$nama_asal.'->result_array() as $i) :
                                            $id_'.$nama_asal.'=$i["id_'.$nama_asal.'"];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                    '.$string_kolom2.'
        </tr>
            <?php endforeach;?>
    </table>
<BR><BR>
   <div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 11pt;">
        <label>
            Ditetapkan di,_____________<br>
            Pada Tanggal <?= tgl_indo(date("Y-m-d")) ?>
            <br>
            <p style="text-align: center;">
              <br>
                <b>Mengetahui,_____________</b><br>
            </p>
            <br><br><br>
            <p style="text-align: center;">
                <b><u>_______________________</u></b><br>
            </p>
        </label>
    </div>
  </body>
</html>

      ');
    fclose($file);
  }




	 function membuat_file_controller($nama_asal,$db_nama,$kolom_filter,$query_relasi)
	{
		//membuat file controllers
		$nama_file='application/controllers/'.ucwords($nama_asal).'.php';
		$file = fopen($nama_file,"w");
    $query_nama_kolom=$this->db->query("SELECT COLUMN_NAME,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '".$db_nama."' and table_name = '".$nama_asal."'")->result();
		$string_kolom="";
		$jumlah1=1;
		foreach ($query_nama_kolom as $key) {
			if($jumlah1>1){
			$string_kolom.='$data["'.$key->COLUMN_NAME.'"] = $this->input->post("'.$key->COLUMN_NAME.'");
				';
			}
			$jumlah1++;
		}
    // query filter
    $tes1='$tgl1';
    $tes2='$tgl2';
    $query_filter="$query_relasi date($kolom_filter) BETWEEN date('$tes1') AND date('$tes2')";
		echo fwrite($file,'
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class '.ucwords($nama_asal).' extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_'.$nama_asal.'");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_'.$nama_asal.'"]=$this->m_'.$nama_asal.'->get_all_'.$nama_asal.'();
		$x["sidebar"]="'.$nama_asal.'";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("'.$nama_asal.'/'.$nama_asal.'");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_'.$nama_asal.'"]=$this->m_'.$nama_asal.'->get_all_'.$nama_asal.'();
		$this->load->view("'.$nama_asal.'/cetak",$x);
	}


	public function lihat()
	{
		$x["data_'.$nama_asal.'"]=$this->m_'.$nama_asal.'->get_all_'.$nama_asal.'();
    $x["sidebar"]="'.$nama_asal.'2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("'.$nama_asal.'/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_'.$nama_asal.'"]=$this->db->query("'.$query_filter.'");
		$this->load->view("'.$nama_asal.'/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_'.$nama_asal.'"]=$this->db->query("'.$query_relasi.' '.$nama_asal.'.id_'.$nama_asal.'=".$id."")->row_array();
		$this->load->view("'.$nama_asal.'/cetak2",$x);
	}
	

		public function simpan_'.$nama_asal.'()
	{
			'.$string_kolom.'
				
					$result = $this->m_'.$nama_asal.'->add_'.$nama_asal.'($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("'.$nama_asal.'"));
					}
	}



		public function update_'.$nama_asal.'()
	{
		$id = $this->input->post("id_'.$nama_asal.'"); 
		
			'.$string_kolom.'
				
					$result = $this->m_'.$nama_asal.'->edit_'.$nama_asal.'($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("'.$nama_asal.'"));
					}
	}

	function hapus_'.$nama_asal.'(){
		$kode=$this->input->post("kode");
		$this->m_'.$nama_asal.'->hapus_'.$nama_asal.'($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("'.$nama_asal.'");
	}
}
			');
		fclose($file);
	}




 function membuat_file_lihat_filter($nama_asal,$db_nama,$tabel_responsive)
  {
    //membuat file lihat filter
    $nama_asal2=strtoupper(str_replace("_", " ", $nama_asal));
    $nama_asal3=ucwords(str_replace("_", " ", $nama_asal));
    $nama_file='application/views/'.$nama_asal.'/lihat.php';
    $file = fopen($nama_file,"w");
    $query_nama_kolom=$this->db->query("SELECT COLUMN_NAME,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '".$db_nama."' and table_name = '".$nama_asal."'")->result();
    $string_kolom="";
    $string_kolom2="";
    $string_tambah="";
    $string_edit="";
    $jumlah1=1;
    $jumlah2=1;
    $jumlah3=1;
    $jumlah4=1;
      //pertama
    foreach ($query_nama_kolom as $key) {
      if($jumlah1>1){
      $nama_kolom1=str_replace("_", " ", $key->COLUMN_NAME);
      $string_kolom.='<th>'.ucwords($nama_kolom1).'</th>
        ';
      }
      $jumlah1++;
    }

      //kedua
    foreach ($query_nama_kolom as $key) {
      if($jumlah2>1){
        if ($key->DATA_TYPE=="date") {
          $string_kolom2.='<td><?php echo tgl_indo($i["'.$key->COLUMN_NAME.'"]);?></td>
        ';
        }elseif ($key->DATA_TYPE=="timestamp") {
          $string_kolom2.='<td><?php echo date("d-F-Y, H:i",strtotime($i["'.$key->COLUMN_NAME.'"]));?></td>
        ';
        }else{
          $string_kolom2.='<td><?php echo $i["'.$key->COLUMN_NAME.'"];?></td>
        ';
        }
      
      }
      $jumlah2++;
    }
    echo fwrite($file,'
    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">LAPORAN '.$nama_asal2.' </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-inner mt--5">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div>
              

            <ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#tab11" role="tab" aria-selected="true">Periode Pertanggal</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab12" href="#tab12" role="tab" aria-selected="false"> Seluruh</a>
              </li>
            </ul>
            <div class="tab-content px-1 pt-1">
              <div class="tab-pane active" id="tab11" role="tabpanel" aria-labelledby="base-tab11">      <br>
                    <br>
                     <div class="row">
                        <div class="col-md-3">
                            DARI TANGGAL
                        </div>
                          <div class="col-md-3">
                        SAMPAI TANGGAL
                        </div>
                      </div>
                   <div class="row">
                        <div class="col-md-3 text-right">
                             <form target="_blank" action="<?php echo site_url("'.$nama_asal.'/filter") ?>" method="post">
                            <input type="date" name="tgl1" class="form-control" required autocomplete="off" />
                        </div>
                          <div class="col-md-3 text-right">
                        <input type="date" name="tgl2" class="form-control" required autocomplete="off" />
                        </div>
                          
                         <div class="col-md-1 text-right">
                            <input type="submit" class="btn btn-success" target="_blank" value="Cetak" >
                        </div>
                      </form>
                      </div>
              </div>
              <div class="tab-pane" id="tab12" role="tabpanel" aria-labelledby="base-tab12">
                 <br>
                    <br>
                <div class="row">
                            <form target="_blank" action="<?php echo site_url("'.$nama_asal.'/cetak") ?>" method="post">
                            <input style="margin-left: 20px;" type="submit" class="btn btn-success" target="_blank" value="Cetak Semua" >
                      </form>
                      </div>
              </div>
              </div>
                  </div>
                
              
           

         <hr>
          <div class="card-body card-dashboard">
                 <table id="basic-datatables" class="display table table-striped table-hover '.$tabel_responsive.'" >
                      <thead>
                        <tr>
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
        '.$string_kolom.'
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_'.$nama_asal.'->result_array() as $i) :
                                            $id_'.$nama_asal.'=$i["id_'.$nama_asal.'"];
                                          ?>
                                    
                                            <tr>
                                              
        <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
        '.$string_kolom2.'
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
      </div>
      ');
    fclose($file);
  }



	 function membuat_file_models($nama_asal,$query_relasi2)
	{

		//membuat folder
		$nama_file='application/models/M_'.$nama_asal.'.php';
		$file = fopen($nama_file,"w");
		echo fwrite($file,'
<?php
class M_'.$nama_asal.' extends CI_Model{

		function get_all_'.$nama_asal.'(){
			$hsl=$this->db->query("'.$query_relasi2.'");
			return $hsl;
		}


		function hapus_'.$nama_asal.'($kode){
			$hsl=$this->db->query("DELETE FROM '.$nama_asal.' where id_'.$nama_asal.'=".$kode."");
			return $hsl;
		}

		public function add_'.$nama_asal.'($data){
			$this->db->insert("'.$nama_asal.'", $data);
			return true;
		}

		public function get_'.$nama_asal.'_by_id($id){
			$query = $this->db->get_where("'.$nama_asal.'", array("id_'.$nama_asal.'" => $id));
			return $result = $query->row_array();
		}

		public function edit_'.$nama_asal.'($data, $id){
			$this->db->where("id_'.$nama_asal.'", $id);
			$this->db->update("'.$nama_asal.'", $data);
			return true;
		}

}	
			');
		fclose($file);
	}




	 function membuat_folder($nama_asal)
	{

		//membuat folder
		$config['upload_path'] = './application/views/'.$nama_asal;
	    $config['allowed_types'] = 'jpg|jpeg|gif|png';
	    $config['max_size'] = '100';
	    $config['max_width']  = '1024';
	    $config['max_height']  = '768';
		if (!is_dir('application/views/'.$nama_asal)) {
			mkdir('./application/views/' . $nama_asal, 0777, TRUE);
		}
	}






}	