<!DOCTYPE html>
<html>
	<head>
		<title>CRUD PHP</title>
		<?php
			require 'koneksi.php';
			if (isset($_POST['submit'])) {
				$berita_judul = $_POST['berita_judul'];
				$berita_headline = $_POST['berita_headline'];
				$berita_isi = $_POST['berita_isi'];
				$berita_author = $_POST['berita_author'];
				$berita_tanggal = date('Y-m-d H:i:s');
				$query = mysql_query("INSERT into berita VALUES('','$berita_judul','$berita_headline','$berita_isi', '$berita_author', '$berita_tanggal')");
				if($query){
					header('location: ./read.php');
				} else{
					echo "Gagal input";
				}
			}
		?>
	</head>
	<body>
		<u>Input Data Berita</u>
		<form method="POST">
			<table>
				<tr>
					<td>Judul Berita</td>
					<td><input type="text" name="berita_judul"></td>
				</tr>
				<tr>
					<td>Headline Berita</td>
					<td><input type="text" name="berita_headline"></td>
				</tr>
				<tr>
					<td>Isi Berita</td>
					<td><input type="text" name="berita_isi"></td>
				</tr>
				<tr>
					<td>Penulis Berita</td>
					<td><input type="text" name="berita_author"></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="SIMPAN"></td>
				</tr>
			</table>
		</form>
	</body>
</html>