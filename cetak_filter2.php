
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
  <body>
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


    <h3 align="center" style="font-size: 16px;"><u>LAPORAN GRAFIK PEMASUKAN BULAN <?php echo strtoupper($bulan);?> <?php echo $tahun;?> </u> <br> </h3>
    <br>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <canvas id="myChart" style="width:100%; height: 600px;"></canvas>
   
<BR><BR>
<?php
$no1=rand(0,255);
$no2=rand(0,255);

$date2 = date("F Y", strtotime("$bln2 $tahun"));
$date = date("F Y", strtotime("$bln2 $tahun"));
$akhir = date('t', strtotime($date));
$akhir2 = date('t', strtotime($date2));
$stt="";
$stt3="";

?>


<script type="text/javascript">
   var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar', // also try bar or other graph types

        // The data for our dataset
        data: {
            labels: [<?php for ($i=0; $i < $akhir; $i++) { 
                           $day_num = date('j', strtotime($date));
                           $day_name = date('D', strtotime($date));
                           $day = "$day_name $day_num";
                          $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                          $stt3.="'".$day."',";
                        }
                        $stt4=substr($stt3, 0, -1);
                        echo $stt4;?>],
            // Information about the dataset
        datasets: [{
                label: 'Jumlah Pemasukan',
                backgroundColor: 'rgba(<?php echo $no1?>,<?php echo $no2?>, 245)',
                borderColor: 'rgba(<?php echo $no1?>,<?php echo $no2?>, 245)',
                data: [<?php for ($i=0; $i < $akhir2; $i++) { 
                           $day_num = date('j', strtotime($date2));
                           $day_name = date('D', strtotime($date2));
                           $day = "$day_name $day_num";
                          $date2 = date("Y-m-d", strtotime("+1 day", strtotime($date2)));
                      
                            $jumlah_barang_masuk=$this->db->query("SELECT *, SUM(barang_masuk.total_biaya) as hrg_baru, pegawai.nama as nama_p, customer.nama nama_c FROM barang_masuk,pegawai,customer,cabang WHERE 
barang_masuk.id_pegawai=pegawai.id_pegawai AND
barang_masuk.id_customer=customer.id_customer AND
barang_masuk.id_cabang=cabang.id_cabang AND YEAR(barang_masuk.tanggal_jam_masuk)='$tahun' AND MONTH(barang_masuk.tanggal_jam_masuk)='$bln' AND DAY(barang_masuk.tanggal_jam_masuk)='$day_num'")->row();
                          
                          

                         $stt.=$jumlah_barang_masuk->hrg_baru.",";
                        }
                        $stt2=substr($stt, 0, -1);
                        echo $stt2;?>],
            }]
        },

       
    });

</script>

<script type="text/javascript">
  var delayInMilliseconds = 1000; 

setTimeout(function() {
  window.print()
}, delayInMilliseconds);
</script>
  </body>
</html>

      