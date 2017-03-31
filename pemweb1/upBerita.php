<!DOCTYPE html>
<html>
<head>
<title>CRUD PHP</title>
<?php
require 'koneksi.php';
if (isset($_POST['submit'])) {
$berita_id = $_POST['berita_id'];
$berita_judul = $_POST['berita_judul'];
$berita_headline = $_POST['berita_headline'];
$berita_isi = $_POST['berita_isi'];
$berita_author = $_POST['berita_author'];
$berita_tanggal = date('Y-m-d H:i:s');
$query = mysql_query("UPDATE berita SET berita_judul='$berita_judul', berita_headline='$berita_headline',
berita_isi='$berita_isi', berita_author='$berita_author', berita_tanggal='$berita_tanggal' WHERE berita_id='$berita_id'");
if($query){
header('location: ./read.php');
} else{
echo "Gagal UPDATE";
}
}
if (isset($_GET['berita_id'])) {
$berita_id = $_GET['berita_id'];
$query = mysql_query("SELECT * FROM berita WHERE berita_id = '$berita_id'");
$hasil = mysql_fetch_array($query);
?>
</head>
<body>
<u>Edit Data Berita</u>
<form method="POST">
<input type="hidden" name="berita_id" value="<?php echo $hasil[0] ?>">
<table>
<tr>
<td>Judul Berita</td>
<td><input type="text" name="berita_judul" value="<?php echo $hasil[1] ?>"></td>
</tr>
<tr>
<td>Headline Berita</td>
<td><input type="text" name="berita_headline" value="<?php echo $hasil[2] ?>"></td>
</tr>
<tr>
<td>Isi Berita</td>
<td><input type="text" name="berita_isi" value="<?php echo $hasil[3] ?>"></td>
</tr>
<tr>
<td>Penulis Berita</td>
<td><input type="text" name="berita_author" value="<?php echo $hasil[4] ?>"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="UPDATE"></td>
</tr>
</table>
<?php }?>
</form>
</body>
</html>