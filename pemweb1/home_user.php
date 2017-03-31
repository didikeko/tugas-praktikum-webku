<?php require "header2.php" ?>
	<div class="ui grid centered">
		<div class="fifteen wide column">
		<?php
		require 'koneksi.php';
		session_start();
		if($_SESSION['username']){
			echo " Stay Enjoy ". $_SESSION['username'];
			$tampil = mysql_query("SELECT * FROM login");
				?>
				<center>
				<table  border='1' Width='800' class="ui inverted table">  
				<tr>
				    <th> Id </th>
				    <th> First Name </th>
				    <th> Last Name </th>
				    <th> Username </th>
				    <th> Email </th>
				    <th> Jenis Kelamin </th>
				    <th> Asal Sekolah</th>
				    <th> Kota Asal </th>
				    <th> Privileges </th>
				    <th> Nomor Telepon </th>
				</tr>

				<?php  
				$queri="Select * From login" ;

				$hasil=MySQL_query ($queri);  
				$no = 1;
				while ($data = mysql_fetch_array ($hasil)){
				?>
				        <tr>
				        	<td><?php echo $data[0]?></td>
					        <td><?php echo $data[1]?></td>
					        <td><?php echo $data[2]?></td>
					        <td><?php echo $data[3]?></td>
					        <td><?php echo $data[4]?></td>
					        <td><?php echo $data[6]?></td>
					        <td><?php echo $data[7]?></td>
					        <td><?php echo $data[8]?></td>
					        <td><?php echo $data[9]?></td>
					        <td><?php echo $data[10]?></td>
				        </tr>
				    <?php } ?>
				        </table> 
				        </center>
			<br>
			<a href="index.php">Logout</a>
			<?php 
		} else{
			header('location: ./index.php');
		}
		?>
		</div>
	</div>
	</body>
</html>