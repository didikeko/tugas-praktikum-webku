<?php require "header.php" ?>
	<div class="ui grid centered">
		<div class="fifteen wide column">
		<?php
			require 'koneksi.php';
			session_start();
			if($_SESSION['username']){
				echo "Stay Enjoy ".$_SESSION['username'];
				$tampil = mysql_query("SELECT * FROM login");
				?>
				<table class="ui inverted table" cellspacing="0" width="100%">  
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
				    <th> Action</th>
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
					        <td>
								<a class="ui button" href="update.php?id=<?php echo $data[0]?>">Update
								<a class="ui button" href="hapus.php?id=<?php echo $data[0]?>">Delete
							</td>
				        </tr> 
				        
				<?php }

				?>

				</table>
				<br>
				<a href="register.php" class="ui button">Add User</a>
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