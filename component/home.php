<?php
session_start();
$query_saldo=mysqli_query($conn,"SELECT SUM(saldo) as jumlah_saldo FROM nasabah");
$row_saldo=mysqli_fetch_array($query_saldo);
$saldo_keseluruhan= $row_saldo['jumlah_saldo'];

$bulan = date('m');
$query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksiTabungan WHERE DATE_FORMAT((tanggal),'%m') like '%$bulan%'");
$saldo = mysqli_fetch_array($query_saldo);
$saldo_bulan= $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];

$hari = date('d');
$query_hari=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksiTabungan WHERE DATE_FORMAT((tanggal),'%d') like '%$hari%'");
$saldo_h = mysqli_fetch_array($query_hari);
$saldo_hari= $saldo_h['jumlah_debit'] - $saldo_h['jumlah_kredit'];

$query_total_infaq=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksi_infaq");
$row_total_infaq=mysqli_fetch_array($query_total_infaq);
$total_infaq_keseluruhan= $row_total_infaq['jumlah_debit'] - $row_total_infaq['jumlah_kredit'];
$jumlah_infaq=$total_infaq_keseluruhan;

$bulan = date('m');
$query_total_infaq=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksi_infaq WHERE DATE_FORMAT((tanggal),'%m') like '%$bulan%'");
$total_infaq = mysqli_fetch_array($query_total_infaq);
$total_infaq_bulan= $total_infaq['jumlah_debit'] - $total_infaq['jumlah_kredit'];

$hari = date('d');
$query_hari=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksi_infaq WHERE DATE_FORMAT((tanggal),'%d') like '%$hari%'");
$total_infaq_h = mysqli_fetch_array($query_hari);
$total_infaq_hari= $total_infaq_h['jumlah_debit'] - $total_infaq_h['jumlah_kredit'];



?>

<!-- page content -->
        <div class="col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                

                  <div class="x_title" style="text-transform: capitalize;">
               

<?php
echo "Hari : <b>" . date("l"). "</b></b>"   ;
$tanggal= mktime(date("m"),date("d"),date("Y"));
echo "| Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "| Pukul : <b>". $jam." "."</b>";
$a = date ("H");
if (($a>=6) && ($a<=11)){
echo "<b>, Selamat Pagi !!</b>";
}
else if(($a>11) && ($a<=15))
{
echo ", Selamat Pagi !!";}
else if (($a>15) && ($a<=18)){
echo ", Selamat Siang !!";}
else { echo ", <b> Selamat Malam </b>";}
?> 
                    </div>
                            
                    <h2 >Selamat datang, <?php echo $_SESSION['namalengkap'];?></h2>
                    
                    <div class="clearfix"></div>
                  </div>
            



                 

                  <?php if ($_SESSION['leveluser'] == 'admin'){ ?>
                  <div class="x_content" style="padding: 20px; text-align: center;  ">

                    <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats bg-blue"> 
                    
                        <div class="icon"></div>
                        <h1>Rp. <?php echo rupiah($saldo_keseluruhan);?></h1>
                        <p>Total Saldo Keseluruhan</p>
                       
                      </div>
                      
                    </div>
                    <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                     <div class="tile-stats bg-green">
                        <div class="icon"></div>
                        <h1>Rp. <?php echo rupiah($total_infaq_keseluruhan);?></h1>
                        
                        <p>Total Infaq Keseluruhan</p>
                       
                      </div>
                      
                    </div>

                    <!--<div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                     <div class="tile-stats bg-blue">

                        <div class="icon"></div>
                       
                        <h1>Rp. <?php echo rupiah($saldo_hari);?></h1>
                        <p>Saldo Hari ini</p>
                       
                      </div>
                      
                    </div> -->

                   <!-- <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                     <div class="tile-stats bg-green">
                        <div class="icon"></div>
                        <h1>Rp. <?php echo rupiah($total_infaq_hari);?></h1>
                        <p>Infaq Hari ini</p>
                       
                      </div>
                      
                    </div> -->

                   <div class="divider-dashed" style="padding: 40px;"></div>
                   <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats bg-white">
                <?php 
                $query_pegawai=mysqli_query($conn,"SELECT *  FROM pegawai");
                $num_pegawai = mysqli_num_rows($query_pegawai);
                $query_nasabah=mysqli_query($conn,"SELECT *  FROM nasabah");
                $num_nasabah = mysqli_num_rows($query_nasabah);

                
                ?> 
                <a href="index.php?module=pegawai" >
                  <div class="icon"></div>
                  
                  <h1><?php echo $num_pegawai;?></h1> 
                 
                  <p>Data Pegawai</p>
                 
                </div>

              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats bg-white">
                <a href="index.php?module=nasabah" >
                  <div class="icon"></div>
                 <h1><?php echo $num_nasabah;?></h1> 
                 

                  <p>Data Nasabah</p>
                 
                </div>
                
              </div>
        
                
              </div>


                  </div>
                  <?php }?>

                </div>
              </div>

          </div>
        </div>
      </div><br><br>
    </div>
  </div>
</div>
<!-- /page content -->