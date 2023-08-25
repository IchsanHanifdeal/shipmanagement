<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	<script src="dist/js/jquery.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="form">
		<div class="form-toggle"></div>
		<div class="form-panel one">
			<div class="form-header">
				<h1>Login</h1>
			</div>
			<div class="form-content">
				<!-- buat mengirimkan/post/validasi ke mysql -->
				<form method="POST">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" placeholder="Email" name="email" required="">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" placeholder="Password" name="password" required="">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block" name="masuk">Log In</button>
					</div>
				</form>
				<!-- /buat mengirimkan/post/validasi ke mysql -->
			</div>
		</div>
	</div>

	<?php
	session_start();
	include './backend/koneksi.php';
	if (isset($_POST['masuk'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$ambil = $conn->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
		$cocok = $ambil->num_rows;
		if ($cocok > 0) {
			$data = $ambil->fetch_assoc();

			if ($data['role'] == "Admin") {
				$_SESSION['role'] = "Admin";
				$_SESSION['nama'] = $data['nama'];
				echo "<div class='col-md-3 col-md-offset-3 mx-auto'>";
				echo "<div class='alert alert-success text-center'> Login Berhasil </div>";
				echo "<meta http-equiv='refresh' content='1;url=Admin/Dashboard.php'>";
				echo "</div>";
				exit();
			} elseif ($data['role'] == "User") {
				$_SESSION['role'] = "User";
				echo "<div class='col-md-3 col-md-offset-3 mx-auto'>";
				echo "<div class='alert alert-success text-center'> Login Berhasil </div>";
				echo "<meta http-equiv='refresh' content='1;url=User/Dashboard.php'>";
				echo "</div>";
				exit();
			} else {
				echo "<div class='col-md-3 col-md-offset-3 mx-auto'>";
				echo "<div class='alert alert-danger text-center'> Login Gagal </div>";
				echo "</div>";
			}
		}
	}
	?>

</html>