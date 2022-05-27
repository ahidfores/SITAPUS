<?php
ob_start();
session_start();

    include "conn.php";

?>

      
<h3>Data <?php echo $_SESSION['namalengkap'];?></h3>
<br>
<?php	
$data = mysqli_query ($conn, " select  * from nasabah where id_nasabah ='".$_SESSION['id']."'");
$row = mysqli_fetch_array ($data);
?> 

			<table class="table">
      <tr>
					<td  style="width:10%;">
						ID Nasabah
					</td>
					<td>
						: <?php echo $row['id_nasabah'];?>
					</td>
				</tr>

				<tr>
					<td style="width:10%;">
						NO Rekening
					</td>
					<td>
						: <?php echo $row['no_rekening'];?>
					</td>
				</tr>


				<tr>					
					<td>
						Tempat Lahir
					</td>
					<td>
						: <?php echo $row['tempat_lahir'];?> 
					</td>
				</tr>
        <tr>					
					<td>
						Tanggal Lahir
					</td>
					<td>
						: <?php echo $row['tanggal_lahir'];?> 
					</td>
				</tr>

        <tr>					
					<td>
						Orang Tua
					</td>
					<td>
						: <?php echo $row['orang_tua'];?> 
					</td>
				</tr>
				<tr>		
					<td>
						Alamat
					</td>
					<td>
						: <?php echo $row['alamat'];?>
					</td>
				</tr>


        <tr>		
					<td style="font-size: 20px;">
						Saldo
					</td>
					<td style="font-size: 20px;">
						: <?php echo $row['saldo'];?>
					</td>
				</tr>
			</table>

