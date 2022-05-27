<?php 
include '../../config/conn.php';
if ($_GET['aksi']==''){
 
$query_saldo=mysqli_query($conn,"SELECT SUM(saldo) as jumlah_saldo FROM nasabah");
$row_saldo=mysqli_fetch_array($query_saldo);
$saldo_keseluruhan= $row_saldo['jumlah_saldo'];


?>
<!-- page content -->
        <div class="col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    <h2 >Data Siswa <small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-9 col-sm-12 col-xs-12">
                  <a  class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAdd"> Cari Data Siswa</a>
                   
                  </div>
                  <div class="col-md-5 col-sm-15 col-xs-15" style="margin-left: 0px;">
                  
                  </div>
                  <div class="x_content">
<!-- Page content -->




<?php } elseif ($_GET['aksi'] == 'setoran_tunai'){

if (isset($_POST['tunai'])){ 

if (empty($_POST['kredit'])) {
    mysqli_query($conn,"INSERT INTO transaksiTabungan(id_transaksi,
                                  id_nasabah,
                                  tanggal,
                                  debit,
                                  kredit,
                                 
                                  keterangan) VALUES('$_POST[id]',
                                                 '$_POST[id_nasabah]',
                                                 '$_POST[tanggal]',
                                                 '$_POST[debit]',
                                                 '0',
                                             
                                                 '$_POST[keterangan]')");


    $query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksiTabungan WHERE id_nasabah ='$_POST[id_nasabah]'");
    $saldo = mysqli_fetch_array($query_saldo);
    $saldoo= $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];
    mysqli_query($conn,"UPDATE nasabah SET saldo = '$saldoo'
                                    WHERE id_nasabah = '$_POST[id_nasabah]'");

    }else{
      mysqli_query($conn,"INSERT INTO transaksiTabungan(id_transaksi,
                                  id_nasabah,
                                  tanggal,
                                  debit,
                                  kredit,
                            
                                  keterangan) VALUES('$_POST[id]',
                                                 '$_POST[id_nasabah]',
                                                 '$_POST[tanggal]',
                                                 '0',
                                                 '$_POST[kredit]',
                                                
                                                 '$_POST[keterangan]')");

      $query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksiTabungan WHERE id_nasabah ='$_POST[id_nasabah]'");
    $saldo = mysqli_fetch_array($query_saldo);
    $saldoo= $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];

    mysqli_query($conn,"UPDATE nasabah SET saldo = '$saldoo'
                                    WHERE id_nasabah = '$_POST[id_nasabah]'");

    }




    echo "<script language='javascript'>document.location='?module=nasabah2';</script>";



}else{

$id= $_POST['no_rekening'];
$query=mysqli_query($conn,"SELECT * FROM nasabah WHERE no_rekening='$id'");
$r=mysqli_fetch_array($query);
$cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM nasabah WHERE no_rekening='$_POST[no_rekening]'"));
if ($cek == 0){
echo "<script>window.alert('Nomor Rekening Tidak ada !')
    window.location='?module=nasabah2'</script>";
}else{
?>
<!-- page content -->
        <div class="col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    <h2 >Data Siswa</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="?module=nasabah2&aksi=setoran_tunai"  enctype="multipart/form-data" method="POST" >
                    <div class="row">
                    <div class="col-md-6">
                  
                 
                    <label for="nama">ID Nasabah :</label>
                      <input type="hidden"  class="form-control" name="id_nasabah" value="<?php echo $r['id_nasabah'];?>"  />
                      <input type="text" disabled class="form-control"  value="<?php echo $r['id_nasabah'];?>" />

                      <label for="nama">Nomor Rekening :</label>
                      <input type="hidden"  class="form-control" name="id_nasabah" value="<?php echo $r['id_nasabah'];?>"  />
                      <input type="text" disabled class="form-control"  value="<?php echo $r['no_rekening'];?>" />

                      <label for="alamat">Nama :</label>
                      <input class="form-control" disabled  value="<?php echo $r['nama'];?>"  >

                      <label for="telephone">Tempat, Tanggal Lahir :</label>
                      <input type="text" disabled class="form-control" value="<?php echo $r['tempat_lahir'];?>, <?php echo $r['tanggal_lahir'];?>"  />  
                      <input type="hidden" class="form-control" name="tanggal" value="<?php echo date('Y-m-d');?>"   />


                      <label for="username">Alamat :</label>
                      <input type="text" disabled class="form-control"  value="<?php echo $r['alamat'];?>" disabled /> 

                      <label for="password">Orang Tua :</label>
                      <input type="text"  class="form-control"  value="<?php echo $r['orang_tua'];?>" disabled  />

                      </div>
                      <div class="col-md-6">

                      <label for="password">Saldo :</label>
                      <?php
                      $query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksiTabungan WHERE id_nasabah ='".$r['id_nasabah']."'");
                      $saldo = mysqli_fetch_array($query_saldo);
                      $saldoo= $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];
                      ?>                      
                      <h3>Rp. <?php echo rupiah($saldoo);?></h3>

                    
                      
                
                     
                      </div>

                      </div>
                   
                 
                    <div class="ln_solid"></div>
                      <div class="form-group">
                          <button type="button" class="btn btn-default btn-sm" onclick=self.history.back()>Batal</button>
                      
                        <br>
                      </div>
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
<!-- /page content -->





<?php } 

    }

}elseif ($_GET['aksi'] == 'penarikan_tunai'){

if (isset($_POST['tarik'])){ 

if (empty($_POST['kredit'])) {
    mysqli_query($conn,"INSERT INTO transaksiTabungan(id_transaksi,
                                  id_nasabah,
                                  tanggal,
                                  debit,
                                  kredit,
                                  keterangan) VALUES('$_POST[id]',
                                                 '$_POST[id_nasabah]',
                                                 '$_POST[tanggal]',
                                                 '$_POST[debit]',
                                                 '0',
                                                 '$_POST[keterangan]')");


    $query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksiTabungan WHERE id_nasabah ='$_POST[id_nasabah]'");
    $saldo = mysqli_fetch_array($query_saldo);
    $saldoo= $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];
    mysqli_query($conn,"UPDATE nasabah SET saldo = '$saldoo'
                                    WHERE id_nasabah = '$_POST[id_nasabah]'");

    }else{
      mysqli_query($conn,"INSERT INTO transaksiTabungan(id_transaksi,
                                  id_nasabah,
                                  tanggal,
                                  debit,
                                  kredit,
                                  keterangan) VALUES('$_POST[id]',
                                                 '$_POST[id_nasabah]',
                                                 '$_POST[tanggal]',
                                                 '0',
                                                 '$_POST[kredit]',
                                                 '$_POST[keterangan]')");

      $query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksiTabungan WHERE id_nasabah ='$_POST[id_nasabah]'");
    $saldo = mysqli_fetch_array($query_saldo);
    $saldoo= $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];

    mysqli_query($conn,"UPDATE nasabah SET saldo = '$saldoo'
                                    WHERE id_nasabah = '$_POST[id_nasabah]'");

    }




    echo "<script language='javascript'>document.location='?module=nasabah2';</script>";



}else{


$id= $_POST['no_rekening'];
$query=mysqli_query($conn,"SELECT * FROM nasabah WHERE no_rekening='$id'");
$r=mysqli_fetch_array($query);

$cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM nasabah WHERE no_rekening='$_POST[no_rekening]'"));
if ($cek == 0){
echo "<script>window.alert('Nomor Rekening Tidak ada !')
    window.location='?module=nasabah2'</script>";
}else{

?>




<?php } 
    }
}?>

<!-- Modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Data Siswa</h4>
      </div>
      <div class="modal-body">
          
           <form action="?module=nasabah2&aksi=setoran_tunai" class="form-horizontal form-label-left" method="POST">

                      <div class="form-group">
                        <div class="col-sm-12 col-sm-12 col-xs-12 ">
                          <div class="input-group">
                            <input type="text" class="typeahead form-control" placeholder="Tulis Nomor Rekening" required name="no_rekening" autofocus=”autofocus” autocomplete="off">
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                             </span>

                          </div>
                         
                        </div>
                      </div>
                    </form>
                      
      </div>
     
      <!-- end form for validations --> 
    </div>
  </div>
</div>
<!-- /modal -->








