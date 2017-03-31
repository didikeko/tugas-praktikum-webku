<?php require "header3.php" ?>
	<div class="ui three column center aligned grid">
		<div class="column">
			<h2 class="ui teal image header">
				<div class="content">Log-in to your account</div>
			</h2>
			<form class="ui form" method="POST">
				<div class="ui stacked segment">
					<div class="field">
						<div class="ui left icon input">
							<i class="user icon">
							</i>
							<input type="text" name="username" placeholder="Username" >
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon">
							</i>
							<input type="password" name="password" placeholder="Password">
						</div>
					</div>
					<input class="ui fluid large teal submit button" type="submit" value="login" name="submit" >
				</div>
				<div class="ui error message"></div>
			</form>
			<?php
			require 'koneksi.php';
			session_start();
			if (isset($_POST['submit'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				$query = mysql_query("SELECT * FROM login WHERE username = '$username' LIMIT 1");
				$hasil = mysql_fetch_array($query);
				if (password_verify($password, $hasil['password'])) {
					$_SESSION['username'] = $hasil['username'];
					if($hasil['privilege'] == 1){
						header('location: ./home_admin.php');
					} else{
						header('location: ./home_user.php');
					}
				} else {
				?>
				<center><div class="ui error message">Invalid username/password</div></center>
				<?php
				}
			}
			?>
			<div class="ui message">
				<a href="register.php">Sign Up</a>
		    </div>
		</div>
	</div>
</body>