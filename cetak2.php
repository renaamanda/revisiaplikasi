
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


    <h3 align="center" style="font-size: 16px;"><u>LAPORAN TRACKING</u> <br> </h3>
    <br>

<table border="0"  style="margin-left: 30px; font-size: 11pt;"  class="table" >
  <tbody>
   
      <tr>
        <td width="130px">No Transaksi</td>
        <td width="10px">:</td>
        <td><?php echo $data_tracking["no_transaksi"];?></td>
      <tr>
        
      <tr>
        <td width="130px">Nama Barang</td>
        <td width="10px">:</td>
        <td><?php echo $data_tracking["nama_barang"];?></td>
      <tr>
        
      <tr>
        <td width="130px">Nama Kurir</td>
        <td width="10px">:</td>
        <td><?php echo $data_tracking["nama"];?></td>
      <tr>
        
      <tr>
        <td width="130px">Tanggal Jam Tracking</td>
        <td width="10px">:</td>
        <td><?php echo date('d-M-Y, H:i',strtotime($data_tracking["tanggal_jam_tracking"]));?></td>
      <tr>
        
      <tr>
        <td width="130px">Status Kirim</td>
        <td width="10px">:</td>
        <td><?php echo $data_tracking["status_kirim"];?></td>
      <tr>
        
      <tr>
        <td width="130px">Catatan Tracking</td>
        <td width="10px">:</td>
        <td><?php echo $data_tracking["catatan_tracking"];?></td>
      <tr>
        
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

      