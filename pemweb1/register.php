<!DOCTYPE html>
<html>

<script type="text/javascript">
function validasi_input(form){
   pola_username=/^[a-zA-Z0-9\_\-]{6,100}$/;
   pola_nama=/^[a-zA-Z ]+$/;
   pola_email=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   pola_telepon=/^[0-9]{10,12}$/;
   pola_sekolah = /^[a-zA-Z0-9\ \-]{6,100}$/;
   if (!pola_nama.test(form.fName.value)){
		alert ('Penulisan first name salah');
	    form.fName.focus();
	    return false;
	}
	if (!pola_nama.test(form.lName.value)){
		alert ('Penulisan Last name salah');
	    form.lName.focus();
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
	var minchar=8;
   if (form.password.value<minchar){
	    alert ('Password tidak boleh kosong');
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

	if (!pola_telepon.test(form.telepon.value)){
		alert ('penulisan nomor telepon salah!');
	    form.telepon.focus();
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

<?php
	require 'koneksi.php';
	if (isset($_POST['submit'])) {
		$fullname = $_POST['fName'];
		$lastname = $_POST['lName'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$jk = $_POST['gender'];
		$sekolah = $_POST['sekolah'];
		$asal = $_POST['asal_kota'];
		$privileges = $_POST['privileges'];
		$telp = $_POST['telepon'];

		if($username==''){
			echo "Register Failed";
		} else{
			$query = mysql_query("INSERT into login VALUES('','$fullname','$lastname','$username','$email','$password','$jk','$sekolah','$asal','$privileges','$telp')");
			header('location: ./index.php');
		}
	}
?>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="css.css">
	<script src="../semantic/dist/semantic.min.js"></script>
</head>
	<body>
		<div class="ui three column center aligned grid">
			<div class="column">
				<h2 class="ui teal image header">
					<div class="content">Register your account</div>
				</h2>
				<form class="ui form" method="POST" onsubmit="return validasi_input(this)">
					<div class="ui stacked segment">
						<div class="field">
					      		<input name="fName" placeholder="First Name" type="text">
					    </div>
						<div class="field">
					      		<input name="lName" placeholder="Last Name" type="text">
				    	</div>
						<div class="field">
							<div class="ui left icon input">
								<i class="user icon">
								</i>
								<input type="text" name="username" placeholder="Username">
							</div>
						</div>
						<div class="field">
							<div class="ui left icon input">
								<i class="mail icon">
								</i>
								<input type="text" name="email" placeholder="Email">
							</div>
						</div>
						<div class="field">
							<div class="ui left icon input">
								<i class="lock icon">
								</i>
								<input type="password" name="password" placeholder="Password">
							</div>
						</div>
						<div class="field">
							<div class="inline fields">
						    <label>Jenis Kelamin</label>
						    <div class="field">
						      <div class="ui radio checkbox">
						        <input name="gender" value="Laki-laki" checked="checked" type="radio">
						        <label>Laki-laki</label>
						      </div>
						    </div>
						    <div class="field">
						      <div class="ui radio checkbox">
						        <input name="gender" value="Perempuan" type="radio">
						        <label>Perempuan</label>
						      </div>
						    </div>
						  </div>
						</div>
						<div class="field">
							<div class="ui left icon input">
								<i class="student icon">
								</i>
								<input type="text" name="sekolah" placeholder="Asal Sekolah">
							</div>
						</div>
						<div class="field">
							<div class="ui left icon input">
								<select class="ui dropdown" name="asal_kota" >
									<option value="" checked>Asal Kota</option>
								    <option value="Kota Jakarta"> Jakarta</option>
								    <option value="Kota Bandung">Bandung</option>
								    <option value="Kota Semarang">Semarang</option>
								    <option value="Kota Yogyakarta">Yogyakarta</option>
								</select>
							</div>
						</div>
						<div class="field">
							<div class="ui left icon input">
								<select class="ui dropdown" name="privileges">
							        <option value="">Pilih Hak Akses</option>
								    <option value="1">Admin</option>
								    <option value="0">User</option>
							    </select>
							</div>
						</div>
						<div class="field">
							<div class="ui left icon input">
								<i class="phone icon"></i>
								<input type="text" name="telepon" placeholder="No. Telepon">
							</div>
						</div>
						<div class="required inline field">
							<div class="ui checkbox">
					        	<input name="agree" type="checkbox">
					        	<label>I agree to the terms and conditions</label>
					     	</div>
					   	</div>
					</div>
					<input class="ui fluid large teal submit button" type="submit" value="Sign-Up" name="submit">
				</form>
			</div>
		</div>
	</body>
</html>