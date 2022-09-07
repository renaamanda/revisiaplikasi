
    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">LAPORAN TRACKING </h2>
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
                             <form target="_blank" action="<?php echo site_url("tracking/filter") ?>" method="post">
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
                            <form target="_blank" action="<?php echo site_url("tracking/cetak") ?>" method="post">
                            <input style="margin-left: 20px;" type="submit" class="btn btn-success" target="_blank" value="Cetak Semua" >
                      </form>
                      </div>
              </div>
              </div>
                  </div>
                
              
           

         <hr>
          <div class="card-body card-dashboard">
                 <table id="basic-datatables" class="display table table-striped table-hover table-responsive" >
                      <thead>
                    <tr>
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
        <th>No Transaksi</th>
        <th>Nama Barang</th>
        <th>Nama Kurir</th>
        <th>Tanggal Jam Tracking</th>
        <th>Status Kirim</th>
        <th>Catatan Tracking</th>
        <th>Petugas Input</th>
        <th>Tanggal Jam Input</th>
        
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
        <td><?php echo $i["petugas_input_tr"];?></td>
        <td><?php echo tgl_indo(date('Y-m-d',strtotime($i["tanggal_jam_input_tr"]))); echo date(', H:i',strtotime($i["tanggal_jam_input_tr"]));?></td>
        
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
      