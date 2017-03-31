<?php
	require 'koneksi.php';
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = mysql_query("DELETE FROM login WHERE id = '$id'");
		if($query){
			echo "Sukses Hapus";
			header('location: ./home_admin.php');
		}else{
			echo "Gagal Hapus";
			header('location: ./home_admin.php');
		}
	}
?>