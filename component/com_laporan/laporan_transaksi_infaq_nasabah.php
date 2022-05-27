<?php 
include '../../config/conn.php';
$aksi = "component/com_nasabah/nasabah_aksi.php";
$query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_saldo FROM transaksi_infaq");
$row_saldo=mysqli_fetch_array($query_saldo);
$saldo_keseluruhan= $row_saldo['jumlah_saldo'];

$query_saldo=mysqli_query($conn,"SELECT SUM(kredit) as jumlah_saldo FROM transaksi_infaq");
$row_saldo=mysqli_fetch_array($query_saldo);
$saldo_keseluruhan1= $row_saldo['jumlah_saldo'];

$query_saldo=mysqli_query($conn,"SELECT (total_infaq) as jumlah_saldo FROM transaksi_infaq");
$row_saldo=mysqli_fetch_array($query_saldo);
$saldo_keseluruhan2= $row_saldo['jumlah_saldo'];

// $view = isset($_GET['view']) ? $_GET['view'] : null;
$bulan = date('m');
$tahun = date('Y');
if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
  $bulan = $_GET['bulan'];
  $tahun = $_GET['tahun'];
}	

$tahun_bulan = $tahun.'-'.$bulan;





if ($_GET['aksi']==''){


  ?>
<!-- page content -->

        <div class="col" role="main">

          <div class="">
          <div class="page-title">
              <div class="title_left">
                <h3>Laporan Transaksi Infaq</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                 
                </div>
              </div>

            </div>

            <div class="clearfix"></div><br>


            <div class="row">

              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    <h2 >Laporan Masuk Periode <small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                 
                      <form action="?module=laporan_transaksi_infaq_nasabah&aksi=periode_masuk"  enctype="multipart/form-data" method="POST">
                      <!-- <label for="nama">No Rekening * :</label> -->
                      <input type="hidden"  class="typeahead form-control" placeholder="Tulis Nomor Rekening..." name="id_nasabah" value="<?= $_SESSION['id']?>" required /><br>

                      <select class="form-select" id="select_bulan" aria-label="Default select example">
                      <option selected>Pilih Bulan</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    <button type="button" onclick="set_bulan()" class="btn btn-success btn-sm">Set Bulan</button>
                       <label for="nama">Periode :</label>
                     <div class="well" style="overflow: auto">
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                       
                      <div class="input-group">
                          <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <input type="text" class="form-control " id="tanggal1"  value="<?php echo date("d-m-Y");?>"    name="tanggal1"  >
                      </div>

                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 8px;">
                        <p style="text-align: center;">Sampai</p>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <input type="text" class="form-control " value="<?php echo date("d-m-Y");?>" id="tanggal2"   name="tanggal2"  >
                      </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                      <button type="submit" class="btn btn-success btn-sm">Submit</button>
                        
                    </form>   
                         
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>

              <?php if ($_SESSION['leveluser'] == 'admin'){ ?>
             <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    <h2 >Laporan keluar Periode <small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                  <form action="?module=laporan_transaksi_infaq_nasabah&aksi=periode_keluar"  enctype="multipart/form-data" method="POST">
                  <form method="POST">
                  <select name="bulan" class="form-select" id="select_bulan2" aria-label="Default select example">
                  <!-- <select name="bulan" class="form-control"aria-label="Default select example"> -->
                      <option selected>Pilih Bulan</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option> 
                <!-- <option value="1" <?php echo $bulan==1 ? "selected" : ""; ?>>Januari</option> 
								<option value="2" <?php echo $bulan==2 ? "selected" : ""; ?>>Februari</option>
								<option value="3" <?php echo $bulan==3 ? "selected" : ""; ?>>Maret</option>
								<option value="4" <?php echo $bulan==4 ? "selected" : ""; ?>>April</option>
								<option value="5" <?php echo $bulan==5 ? "selected" : ""; ?>>Mei</option>
								<option value="6" <?php echo $bulan==6 ? "selected" : ""; ?>>Juni</option>
								<option value="7" <?php echo $bulan==7 ? "selected" : ""; ?>>Juli</option>
								<option value="8" <?php echo $bulan==8 ? "selected" : ""; ?>>Agustus</option>
								<option value="9" <?php echo $bulan==9 ? "selected" : ""; ?>>September</option>
								<option value="10" <?php echo $bulan==10 ? "selected" : ""; ?>>Oktober</option>
								<option value="11" <?php echo $bulan==11 ? "selected" : ""; ?>>November</option>
								<option value="12" <?php echo $bulan==12 ? "selected" : ""; ?>>Desember</option> -->
                    </select>
                    <button type="button" onclick="set_bulan2()" class="btn btn-success btn-sm">Set Bulan</button>
                       <label for="nama">Periode :</label>
                     <div class="well" style="overflow: auto">
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <input type="text" class="form-control " value="<?php echo date("d-m-Y");?>" id="tanggal3"   name="tanggal1"  >
                      </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 8px;">
                        <p style="text-align: center;">Sampai</p>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <input type="text" class="form-control "  value="<?php echo date("d-m-Y");?>" id="tanggal4"   name="tanggal2"  >
                      </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                      <button type="submit" class="btn btn-success btn-sm">Submit</button>
</form> 
                    </form>     
                      </div>
                    </div> 
                   
                  </div>
                </div>
              </div>   

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }?>
<!-- /page content -->





<?php  }elseif ($_GET['aksi'] == 'periode_masuk') {

$id= $_POST['id_nasabah'];
$query_rek=mysqli_query($conn,"SELECT * FROM nasabah WHERE id_nasabah='$id'");
$r=mysqli_fetch_array($query_rek);

?>
  



<!-- page content -->
<div class="col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    <h2 >Laporan Transaksi Masuk Periode <small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <?php
                  $date_1 = date('d M Y', strtotime($_POST[tanggal1] ));
                  $date_2 = date('d M Y', strtotime($_POST[tanggal2] ));
                  ?>
                  	<strong>Dari : <?php echo $date_1; ?>  Sampai : <?php echo $date_2; ?></strong>
                 
                  <div class="col-md-9 col-sm-12 col-xs-12">
                   <form action="cetak_infaq_nasabah.php" target="_blank" enctype="multipart/form-data" method="GET">
                   <input type="hidden"   name="p" value="1">
                   
                  <input type="hidden"   name="id" value="<?php echo encrypt($r[id_nasabah]);?>">  
                   <input type="hidden"   name="t1" value="<?php echo encrypt($_POST[tanggal1]);?>">
                   <input type="hidden" name="t2" value="<?php echo encrypt($_POST[tanggal2]);?>">
                   
                   <button type="submit"  class="btn btn-success btn-sm"><i class="glyphicon glyphicon-print"></i> Cetak Laporan</button> 
                   
                   <button type="button" class="btn btn-default btn-sm" onclick=self.history.back()>Batal</button>
                   

                    </form>
                    <div class="col-md-12 col-sm-15 col-xs-15" style="margin-left: 0px;">
                    <!-- <h4><small>Infaq Masuk: Rp. <?php echo rupiah($saldo_keseluruhan);?></small> - <small>Infaq Keluar: Rp. <?php echo rupiah($saldo_keseluruhan1);?></small> = <small>Total Infaq: </small> Rp. <?php echo rupiah($saldo_keseluruhan2);?> </h4> -->
                  </div>
                  </div>
                  
                  <div class="x_content">
                    
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th width="20">Tipe</th>
                          <th>Tanggal</th> 
                          <th>No Transaksi</th>
                          <th>Pegawai</th>
                          <th>Keterangan</th>
                        
                          <th>Debit</th>
                          <th>Kredit</th>
                          
                          <th width="110">Total Infaq</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $tanggal1 = $_POST[tanggal1];
                      $tanggal2 = $_POST[tanggal2];
                      $tgl1 = date('Y-m-d', strtotime($tanggal1 ));
                      $tgl2 = date('Y-m-d', strtotime($tanggal2 ));
                      $date_1 = date('d-M', strtotime($tanggal1 ));
                      $date_2 = date('d-M', strtotime($tanggal2 ));

                          $no = 0;
                          $query=mysqli_query($conn,"SELECT * FROM transaksi_infaq JOIN nasabah ON transaksi_infaq.id_nasabah=nasabah.id_nasabah WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2') AND transaksi_infaq.id_nasabah='$r[id_nasabah]' order by id_infaq asc ");
                         
                       
                          
                          $count = 2 ;
                          


                          while($row=mysqli_fetch_array($query)){
                          $no++;
                      ?>

                            <tr style="background: <?php if ($row['kredit'] == 0){ ?>
                          #defff1;
                          <?php }else{ ?>
                            #feeeea;
                            <?php } ?>">
                               <td><?php if ($row['kredit'] == 0){ ?><a  class="btn btn-success btn-xs" ><i class="glyphicon glyphicon-save-file"></i></a> <?php }else{ ?> <a  class="btn btn-danger btn-xs" ><i class="glyphicon glyphicon-open-file"></i></a><?php } ?></td> 
                               <td><?php echo $row['tanggal'];?></td>
                               <td><?php echo $row['id_infaq'];?></td> 
                               <td><?php echo $row['nama'];?></td>
                               <td><?php echo $row['keterangan'];?></td>
                               
                               <!--<td><?php echo $row['debit'];?></td>
                               <td><?php echo $row['kredit'];?></td>
                               <td><?php echo $row['total_infaq'] ;?></td> -->
                               
                               
              
                          <?php if($count==1){?>

                               <td><?php echo "Rp.".rupiah($row['debit']);?></td>
                               <td><?php echo "Rp.".rupiah($row['kredit']);?></td>
                               <td>
                               <?php  
                               $debit=$row['debit'];
                               $saldo=$row['debit'];
                               echo "Rp.".rupiah($saldo);
                               ?>
                               </td>

                               <?php }else{
                                if($row['debit']!=0){ 
                                ?>
                                <td><?php echo "Rp.".rupiah($row['debit']);?></td>
                                <td><?php echo "Rp.".rupiah($row['kredit']);?></td>
                                <td>
                                 <?php  
                                 $debit=$denit+$row['debit'];
                                 $saldo=$saldo+$row['debit'];
                                 echo "Rp.".rupiah($saldo);
                                 ?>


                               <?php }else{?>
                                <td><?php echo "Rp.".rupiah($row['debit']);?></td>
                                <td><?php echo "Rp.".rupiah($row['kredit']);?></td>
                                <td>
                                 <?php  
                                 $kredit=$kredit+$row['kredit'];
                                  $saldo=$saldo-$row['kredit'];
                                 echo "Rp.".rupiah($saldo);
                               

                                     }


                               }
                               $count++
                               ?> 

                            </tr>  
                       
                      <?php } ?>


                         
                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </div>
<!-- /page content -->

<?php 
} elseif ($_GET['aksi'] == 'periode_keluar'){

?>

<!-- page content -->
        <div class="col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    <h2 >Laporan Transaksi keluar Periode <small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <?php
                  $date_1 = date('d M Y', strtotime($_POST[tanggal1] ));
                  $date_2 = date('d M Y', strtotime($_POST[tanggal2] ));
                  ?>
                  <!-- <div class="alert alert-info"> -->
						<strong>Dari : <?php echo $date_1; ?>  Sampai : <?php echo $date_2; ?></strong>
					<!-- </div>  -->
                  <div class="col-md-9 col-sm-12 col-xs-12">
                   <form action="cetak_keluar_infaq.php" target="_blank" enctype="multipart/form-data" method="GET">
                   <input type="hidden"   name="p" value="1">
                  <!-- <input type="hidden"   name="id" value="<?php echo encrypt($r[id_pegawai]);?>"> -->
                   <input type="hidden"   name="t1" value="<?php echo encrypt($_POST[tanggal1]);?>">
                   <input type="hidden" name="t2" value="<?php echo encrypt($_POST[tanggal2]);?>">
                   <?php if ($_SESSION['leveluser'] == 'admin'){ ?>
                   <button type="submit"  class="btn btn-success btn-sm"><i class="glyphicon glyphicon-print"></i> Cetak Laporan</button> 
                   <?php }?>
                   <button type="button" class="btn btn-default btn-sm" onclick=self.history.back()>Batal</button>
                    </form>
                    <div class="col-md-12 col-sm-15 col-xs-15" style="margin-left: 0px;">
                    <!-- <h4><small>Infaq Masuk: Rp. <?php echo rupiah($saldo_keseluruhan);?></small> - <small>Infaq Keluar: Rp. <?php echo rupiah($saldo_keseluruhan1);?></small> = <small>Total Infaq: </small> Rp. <?php echo rupiah($saldo_keseluruhan2);?> </h4> -->
                  </div>  
                  </div>

                  
                  <div class="x_content">
                    
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th width="20">Tipe</th>
                          <th>Tanggal</th> 
                          <th>No Transaksi</th>
                          <th>Pegawai</th>
                          <th>Keterangan</th>
                         <!-- <th>Total Infaq</th> -->
                          <th>Debit</th>
                          <th>Kredit</th>
                          
                          <th width="110">Total Infaq</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $tanggal1 = $_POST[tanggal1];
                      $tanggal2 = $_POST[tanggal2];
                      $tgl1 = date('Y-m-d', strtotime($tanggal1 ));
                      $tgl2 = date('Y-m-d', strtotime($tanggal2 ));

                          $no = 0;
                          $query=mysqli_query($conn,"SELECT * FROM transaksi_infaq JOIN pegawai ON transaksi_infaq.id_pegawai=pegawai.id_pegawai WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2') order by id_infaq asc ");
                         
                       
                          
                          $count = 2 ;
                          


                          while($row=mysqli_fetch_array($query)){
                          $no++;
                      ?>

                            <tr style="background: <?php if ($row['kredit'] == 0){ ?>
                          #defff1;
                          <?php }else{ ?>
                            #feeeea;
                            <?php } ?>">
                               <td><?php if ($row['kredit'] == 0){ ?><a  class="btn btn-success btn-xs" ><i class="glyphicon glyphicon-save-file"></i></a> <?php }else{ ?> <a  class="btn btn-danger btn-xs" ><i class="glyphicon glyphicon-open-file"></i></a><?php } ?></td> 
                               <td><?php echo $row['tanggal'];?></td>
                               <td><?php echo $row['id_infaq'];?></td> 
                               <td><?php echo $row['nama'];?></td>
                               <td><?php echo $row['keterangan'];?></td>
                               
                               <!--<td><?php echo $row['debit'];?></td>
                               <td><?php echo $row['kredit'];?></td>
                               <td><?php echo $row['total_infaq'] ;?></td> -->
                               
                               
              
                          <?php if($count==1){?>

                               <td><?php echo "Rp.".rupiah($row['debit']);?></td>
                               <td><?php echo "Rp.".rupiah($row['kredit']);?></td>
                               <td>
                               <?php  
                               $debit=$row['debit'];
                               $saldo=$row['debit'];
                               echo "Rp.".rupiah($saldo);
                               ?>
                               </td>

                               <?php }else{
                                if($row['debit']!=0){ 
                                ?>
                                <td><?php echo "Rp.".rupiah($row['debit']);?></td>
                                <td><?php echo "Rp.".rupiah($row['kredit']);?></td>
                                <td>
                                 <?php  
                                 $debit=$denit+$row['debit'];
                                 $saldo=$saldo+$row['debit'];
                                 echo "Rp.".rupiah($saldo);
                                 ?>


                               <?php }else{?>
                                <td><?php echo "Rp.".rupiah($row['debit']);?></td>
                                <td><?php echo "Rp.".rupiah($row['kredit']);?></td>
                                <td>
                                 <?php  
                                 $kredit=$kredit+$row['kredit'];
                                  $saldo=$saldo-$row['kredit'];
                                 echo "Rp.".rupiah($saldo);
                               

                                     }


                               }
                               $count++
                               ?> 

                            </tr>  
                       
                      <?php } ?>


                         
                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </div>
<!-- /page content -->



<?php   } elseif ($_GET['aksi'] == 'simpan_edit'){

  $module = $_GET['module'];
   mysqli_query($conn,"UPDATE nasabah SET no_rekening = '$_POST[no_rekening]',
                                    nama = '$_POST[nama]',
                                    alamat = '$_POST[alamat]',
                                    tempat_lahir = '$_POST[tempat_lahir]',
                                    tanggal_lahir = '$_POST[tanggal_lahir]',
                                    orang_tua = '$_POST[orang_tua]',
                                    status = '$_POST[status]' 
                                    WHERE id_nasabah = '$_POST[id]'");
   echo "<script language='javascript'>
        document.location='?module=".$module."';
        </script>";

  } elseif ($_GET['aksi'] == 'hapus'){
  $module = $_GET['module'];  
  $idd= $_GET[id];

  $id = decrypt($idd);
  $query=mysqli_query($conn,"Delete FROM nasabah WHERE id_nasabah='$id'");
  echo "<script language='javascript'>document.location='?module=".$module."';</script>";    

  }?>

  <!-- /page content -->






<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Apakah anda yakin menghapus data ini ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
function set_bulan() {
  bulan = $('#select_bulan').val()
  // console.log(bulan)
  $('#tanggal1').val('1-'+bulan+'-2021')
  $('#tanggal2').val('30-'+bulan+'-2021')
  //$('#tanggal3').val('1-'+bulan+'-2021')
  //$('#tanggal4').val('30-'+bulan+'-2021')
}
</script>

<script>
function set_bulan2() {
  bulan = $('#select_bulan2').val()
  // console.log(bulan)
  $('#tanggal3').val('1-'+bulan+'-2021')
  $('#tanggal4').val('30-'+bulan+'-2021')
  //$('#tanggal3').val('1-'+bulan+'-2021')
  //$('#tanggal4').val('30-'+bulan+'-2021')
}
</script>