<?php
	require 'koneksi.php';
	if (isset($_GET['berita_id'])) {
		$berita_id = $_GET['berita_id'];
		$query = mysql_query("DELETE FROM berita WHERE berita_id = '$berita_id'");
		if($query){
			echo "Sukses Hapus";
			header('location: ./read.php');
		}else{
			echo "Gagal Hapus";
			header('location: ./read.php');
		}
	}
?>