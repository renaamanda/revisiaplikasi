
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
               <img width="70px" src="<?= base_url() ?>assets/logo4.png"><br>
                <font size="5">DAKOTA CARGO</font> <br>
                <font size="3">Jl. Gubernur Soebardjo, Basirih, Kec. Aluh-Aluh, Kabupaten Banjar, Kalimantan Selatan 70242</font>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>


    <h3 align="center" style="font-size: 16px;"><u>LAPORAN TRACKING <br> <?php echo strtoupper(tgl_indo($tgl1));?> SAMPAI DENGAN <?php echo strtoupper(tgl_indo($tgl2));?> </u> <br> </h3>
    <br>
    <table border="1"width="100%" style="font-size: 14px;">
     <thead style="background-color: #d5eacf; text-align: center; ">
<tr>
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
        <th>No Transaksi</th>
        <th>Nama Barang</th>
        <th>Nama Kurir</th>
        <th>Tanggal Jam Tracking</th>
        <th>Status Kirim</th>
        <th>Catatan Tracking</th>
        
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

      