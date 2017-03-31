<!DOCTYPE html>
<html>
<script type="text/javascript">
	function validasi_input(form){
		pola_username=/^[a-zA-Z0-9\_\-]{6,100}$/;
	   pola_nama=/^[a-zA-Z ]+$/;
	   pola_email=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	   pola_telepon=/^[0-9]{10,12}$/;
	   pola_sekolah = /^[a-zA-Z0-9\ \-]{6,100}$/;
	   if (!pola_nama.test(form.fname.value)){
			alert ('Penulisan first name salah');
		    form.fname.focus();
		    return false;
		}
		if (!pola_nama.test(form.lname.value)){
		alert ('Penulisan Last name salah');
	    form.lname.focus();
	    return false;
	}
   	if (!pola_username.test(form.username.value)){
      alert ('Username minimal 6 karakter dan hanya boleh Huruf atau Angka!');
      form.username.focus();
      return false;
   	}
	  if (!pola_email.test(form.email.value)){
	    alert ('Penulisan Email tidak benar');
	    form.email.focus();
	    return false;
	}
	if (!pola_sekolah.test(form.sekolah.value)) 
    {
        alert ('Penulisan asal sekolah salah!');
        return false;
    }

    if (form.asal_kota.value ==""){
	    alert("Anda belum memilih asal kota!");
	    return (false);
	}

	if (form.privileges.value ==""){
	    alert("Anda belum memilih privileges!");
	    return (false);
	}

	if (!pola_telepon.test(form.no_telp.value)){
		alert ('penulisan nomor telepon salah!');
	    form.no_telp.focus();
	    return false;
	}

	if (form.agree.checked == false) 
    {
        alert ('anda belum menyetujui persyaratan');
        return false;
    }

    return (true);
	}
</script>
	<head>
		<title>CRUD PHP</title>
		<link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
		<link rel="stylesheet" type="text/css" href="css.css">
		<script src="../semantic/dist/semantic.min.js"></script>
		<?php
			require 'koneksi.php';
			if (isset($_POST['submit'])) {
				$id = $_POST['id'];
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$username = $_POST['username'];
				$email = $_POST['email'];
				$jk = $_POST['gender'];
				$sekolah = $_POST['sekolah'];
				$asal = $_POST['asal_kota'];
				$privilege = $_POST['privilege'];
				$no_telp = $_POST['no_telp'];
				$query = mysql_query("UPDATE login SET fname='$fname', lname='$lname',
				username='$username', email='$email', jk='$jk', sekolah='$sekolah', asal='$asal', privilege='$privilege', no_telp='$no_telp' WHERE id='$id'");
				if($query){
					header('location: ./home_admin.php');
				} else{
					echo "Gagal UPDATE";
				}
			}
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$query = mysql_query("SELECT * FROM login WHERE id = '$id'");
				$hasil = mysql_fetch_array($query);
			?>
		</head>
		<body>
				<div class="ui three column center aligned grid">
				<div class="column">
					<h2 class="ui teal image header">
						<div class="content">Edit Data User</div>
					</h2>
				<form method="POST" onsubmit="return validasi_input(this)">
				<input type="hidden" name="id" value="<?php echo $hasil[0] ?>">
				<table>
				<tr>
				<td>Full Name</td>
				<td><input type="text" name="fname" value="<?php echo $hasil[1] ?>"></td>
				</tr>
				<tr>
				<td>Last Name</td>
				<td><input type="text" name="lname" value="<?php echo $hasil[2] ?>"></td>
				</tr>
				<tr>
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $hasil[3] ?>"></td>
				</tr>
				<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $hasil[4] ?>"></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>
						      <div class="ui radio checkbox">
						        <input name="gender" value="Laki-laki" checked="checked" type="radio">
						        <label>Laki-laki</label>
						      </div>
						      <div class="ui radio checkbox">
						        <input name="gender" value="Perempuan" type="radio">
						        <label>Perempuan</label>
						      </div>
					</td>
				</tr>
				<tr>
				<td>Asal Sekolah</td>
				<td><input type="text" name="sekolah" value="<?php echo $hasil[7] ?>"></td>
				</tr>
				<tr>
					<td>Kota Asal</td>
					<td>
						<select class="ui dropdown" name="asal_kota" >
									<option value="" checked>Asal Kota</option>
								    <option value="Kota Jakarta"> Jakarta</option>
								    <option value="Kota Bandung">Bandung</option>
								    <option value="Kota Semarang">Semarang</option>
								    <option value="Kota Yogyakarta">Yogyakarta</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Kota Asal</td>
					<td>
						<select class="ui dropdown" name="privileges" >
									<option value="" checked>Hak Akses</option>
								    <option value="1">Admin</option>
								    <option value="0">User</option>
						</select>
					</td>
				</tr>
				<tr>
				<td>No. Telp</td>
				<td><input type="text" name="no_telp" value="<?php echo $hasil[10] ?>"></td>
				</tr>
				<tr>
				<td><input type="submit" name="submit" value="UPDATE"></td>
				</tr>
				</table>
				
				</form>
				<?php }?>
				</div>
				</div>
	</body>
</html>