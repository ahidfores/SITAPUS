<?php error_reporting(0); session_start();
include "config/conn.php"; include 'config/rupiah.php';
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
echo '<meta http-equiv="refresh" content="0; url=index.php">';

}else{

include 'lib/function.php'; ob_start(); 
$query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_saldo FROM transaksi_infaq");
$row_saldo=mysqli_fetch_array($query_saldo);
$saldo_keseluruhan= $row_saldo['jumlah_saldo'];

$query_saldo=mysqli_query($conn,"SELECT SUM(kredit) as jumlah_saldo FROM transaksi_infaq");
$row_saldo=mysqli_fetch_array($query_saldo);
$saldo_keseluruhan1= $row_saldo['jumlah_saldo'];

$query_saldo=mysqli_query($conn,"SELECT (total_infaq) as jumlah_saldo FROM transaksi_infaq");
$row_saldo=mysqli_fetch_array($query_saldo);
$saldo_keseluruhan2= $row_saldo['jumlah_saldo'];
?>


<html>
<head>
<title>Cetak Laporan Infaq</title>

<style type="text/css"> body{
font-family: sans-serif;
}
table {
border-collapse: collapse; font-family: sans-serif;
}
 
th {


}
 

height: 30px; font-size: 12px;
font-family: sans-serif;
 
table, th, td {
border: 1px solid black; font-size: 11px; padding: 5px;
}

h5 {
  text-align: left; font-size: 12px; padding: -8px;
}
 
h3{
 

padding-bottom: -15px; font-family: sans-serif;
text-align: center; text-transform: uppercase;
 
}
p{
font-size: 12px; text-align: center; padding-bottom: -8px;
}
.divider-dashed {
border-top: 1px dashed #ccc; background-color: #fff; height: 1px;
margin: 10px 0;
}
#kiri
{
width:50%; height:100px; background-color:#FF0; float:left;
}
#kanan
{
width:50%; height:100px; background-color:#0C0; float:right;
}
</style>
</head>
<body>
<!-- laporan transaksi -->
<?php
if ($_GET['p']=='1'){
$query=mysqli_query($conn,"SELECT * FROM sekolah LIMIT 1");
$r=mysqli_fetch_array($query);
$nama_file = 'lap_transaksi_infaq-nasabah';
$tanggal1 = $_GET[t1];
$tanggal2 = $_GET[t2];

$nasabah = $_GET[id];
$id1 = decrypt($tanggal1);
$id2 = decrypt($tanggal2);
$id_nasabah = decrypt($nasabah);
$tgl1 = date('Y-m-d', strtotime($id1));
$tgl2 = date('Y-m-d', strtotime($id2));
$date_1 = date('d M Y', strtotime($id1));
$date_2 = date('d M Y', strtotime($id2));

$query_rek=mysqli_query($conn,"SELECT * FROM nasabah WHERE id_nasabah='$id_nasabah'");
$r2=mysqli_fetch_array($query_rek);
?>
<!--<h3 >Laporan Masuk Transaksi Infaq <br><?php echo
$r[nama_sekolah];?></h3> -->
<h3> <a  style="font-size: 30px;">	<img src="build/images/logo mi.png" width="10%">&nbsp;<?php echo  $r[nama_sekolah];?>  </h3> 
	<br>
	
  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Laporan Transaksi Infaq Nasabah</h3>

<p><?php echo $r[alamat];?>	</p>
<p><?php echo $r[telephone];?> - <?php echo $r[situs];?> </p>
<div class="divider-dashed"></div><br><br>
<p>Tanggal : <?php echo $date_1;?> s.d <?php echo $date_2;?></p><br>
<p><b><?php echo $r2['nama'];?></b> <i> ( <?php echo
$r['no_rekening'];?> )</i></p>
<table width="100%">
<tr>
<th>Tanggal</th>
<th>No Transaksi</th>
<th>Nama</th>
<th>Keterangan</th>
<th>Debit</th>
<th>Kredit</th>
<th width="110">Total Infaq</th>
</tr>
<?php
$query = "SELECT DATE_FORMAT(transaksi_infaq.tanggal, '%d-%m-%Y') as tgl,
transaksi_infaq.id_infaq, nasabah.nama, transaksi_infaq.debit, transaksi_infaq.kredit
FROM transaksi_infaq JOIN nasabah ON transaksi_infaq.id_nasabah=nasabah.id_nasabah WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2')AND transaksi_infaq.id_nasabah ='$id_nasabah' order by id_infaq asc "; // Tampilkan semua data gambar
$sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
if($row > 0){
$count = 2 ;
while($data = mysqli_fetch_array($sql)){ ?>
<tr >
<td><?php echo $data['tgl'];?></td>
<td><?php echo $data['id_infaq'];?></td>
<td><?php echo $data['nama'];?></td>
<td><?php echo $data['keterangan'];?></td>
<?php if($count==1){?>
<td><?php echo "Rp. ".rupiah($data['debit']);?></td>
<td><?php echo "Rp. ".rupiah($data['kredit']);?></td>
<td>
<?php
$debit=$data['debit'];
$saldo=$data['debit'];  echo "Rp. ".rupiah($saldo);
?>
</td>
<?php }else{ if($data['debit']!=0){ ?>

  <td><?php echo "Rp. ".rupiah($data['debit']);?></td>
<td><?php echo "Rp. ".rupiah($data['kredit']);?></td>
<td>
<?php
$debit=$denit+$data['debit'];
$saldo=$saldo+$data['debit']; echo "Rp. ".rupiah($saldo);

}else{?>
<td><?php echo "Rp. ".rupiah($data['debit']);?></td>
<td><?php echo "Rp. ".rupiah($data['kredit']);?></td>
<td>
<?php
$kredit=$kredit+$data['kredit'];
$saldo=$saldo-$data['kredit']; echo "Rp. ".rupiah($saldo);
}
}
$count++
?>
</tr>
<?php
}

}else {	echo "<tr><td colspan='6'>Data tidak ada</td></tr>";}
?>
</table>
<br><br>
<?php
                      $query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksi_infaq WHERE id_nasabah ='".$r['id_nasabah']."'");
                      $saldo = mysqli_fetch_array($query_saldo);
                      $saldoo= $saldo['jumlah_debit'];
                      ?>   
                               
                      <!-- <div class="col-md-5 col-sm-15 col-xs-15" style="margin-left: 0px;"> -->
                    <!-- <h4><small>Total Saldo : Rp. <?php echo rupiah($saldoo);?></small></h4> -->
                  </div>  
<!--<h5><small>&nbsp;&nbsp;&nbsp;Total Infaq Masuk : Rp. <?php echo rupiah($saldo_keseluruhan);?> </small></h5>
<h5><small>&nbsp;&nbsp;&nbsp;<ins>Total Infaq Keluar :  Rp. <?php echo rupiah($saldo_keseluruhan1);?></small></ins> _</h5>
<h5>&nbsp;&nbsp;&nbsp;Total Infaq Keseluruhan: Rp. <?php echo rupiah($saldo_keseluruhan2);?> </h5>-->

<?php
 $query=mysqli_query($conn,"SELECT * FROM pegawai " );
 $r=mysqli_fetch_array($query);
  ?>

<br>
<div class="pull-right">
      <div style="text-align: left;">

      <h5>&nbsp;&nbsp; Lumajang, <?php echo date('j F Y'); ?> </h5>
	  	<h5>&nbsp;&nbsp;	Diketahui oleh,    </h5>       
		   <h5>&nbsp;&nbsp;&nbsp;Bagian Keuangan  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
       Kepala Sekolah</h5>  
				<br><br><br>
				<h5>&nbsp;&nbsp;&nbsp;<?php echo $r['nama'];?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      Hasani, S.Pdi</h5>
			
</div>
</div>

  <?php
  ?>
  






  
  <?php } ?>
  </body>
  </html>
  
  <?php
  $html = ob_get_contents(); ob_end_clean();
  require_once 'dompdf/dompdf_config.inc.php';
  $dompdf = new dompdf();
  $dompdf->set_paper('A4', 'potrait');
  $dompdf->load_html($html);
  $dompdf->render();
  $dompdf->stream("$nama_file.pdf",array('Attachment'=>0))?>
  <?php
  }
  ?>
  
 
  