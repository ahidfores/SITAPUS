<?php 

if ($_GET['module']=='') {
	include 'component/home.php';
}elseif ($_GET['module'] == 'pegawai') {
	if ($_SESSION['leveluser']=='admin'){
	include 'component/com_pegawai/pegawai.php';
	}else{
		echo '<meta http-equiv="refresh" content="0; url=index.php">';
	}
}elseif ($_GET['module'] == 'kelas') {
	include 'component/com_kelas/kelas.php';
}elseif ($_GET['module'] == 'nasabah') {
	include 'component/com_nasabah/nasabah.php';
}elseif ($_GET['module'] == 'nasabah2') {
	include 'component/com_nasabah2/nasabah2.php';
}elseif ($_GET['module'] == 'nasabah3') {
	include 'component/com_nasabah3/nasabah3.php';
}elseif ($_GET['module'] == 'nasabah') {
}elseif ($_GET['module'] == 'sekolahmi') {
	include 'component/com_sekolahMI/sekolahMI.php';
}elseif ($_GET['module'] == 'transaksi') {
	include 'component/com_transaksi/transaksi.php';
}elseif ($_GET['module'] == 't_infaq') {
	include 'component/com_infaq/infaq.php';
}elseif ($_GET['module'] == 'laporan-transaksi') {
	include 'component/com_laporan/laporan-transaksi.php';
}elseif ($_GET['module'] == 'laporan_transaksi_nasabah') {
	include 'component/com_laporan/laporan_transaksi_nasabah.php';
}elseif ($_GET['module'] == 'laporan_transaksi_infaq') {
	include 'component/com_laporan/laporan_transaksi_infaq.php';
}elseif ($_GET['module'] == 'laporan_transaksi_infaq_nasabah') {
	include 'component/com_laporan/laporan_transaksi_infaq_nasabah.php';
}elseif ($_GET['module'] == 'cetak') {
	include 'cetak_transaksi.php';
}elseif ($_GET['module'] == 'cetak') {
	include 'cetak.php';
}elseif ($_GET['module'] == 'sekolah') {
	 if ($_SESSION['leveluser']=='admin'){
	include 'component/com_sekolah/sekolah.php';
	}else{
		echo '<meta http-equiv="refresh" content="0; url=index.php">';
	}
}else{
	echo '<meta http-equiv="refresh" content="0; url=?module=beranda">';
}


?>