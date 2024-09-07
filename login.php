<?php
	session_start();

	//if the manager already signed in then redirect to the manager page
	if (isset($_SESSION["username"])) {
		header("location: manager.php");
		exit();
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		require_once ("settings.php");
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
		if (!$conn) {
			echo "<h2>We are currently experiencing issues with the database.</h2>";
			exit();
		}

		$username = $_POST["username"];
		$password = $_POST["password"];

		//check the username and the password
		$get_admin = "SELECT * FROM admins WHERE username = '$username'";
		$check_admin_query = mysqli_query($conn, $get_admin);
		$check_admin = mysqli_num_rows($check_admin_query);
		if ($check_admin == 1) {
			$data = mysqli_fetch_assoc($check_admin_query);
			if ($password == $data["password"]) {
				$_SESSION["username"] = $username;
				header("location: manager.php");
				exit();
			} else {
				$passwordError = "Password is incorrect!";
			}
		} else {
			$usernameError = "Username cannot be found. Please register first!";
		}
		mysqli_close($conn);
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<?php $page_title = "Authorization"; ?>
		<?php include_once('includes/header.inc'); ?>
    </head>
	<body>
		<?php include_once('includes/menu.inc'); ?>
		<div class="form_page security">
					<hr class="line">
			<h1>Manager Login</h1>
			<form method="post" action="login.php">
				<label>Username:</label>
				<input type="text" name="username" required>
				<?php if (isset($usernameError)) { echo "<p class='error'>$usernameError</p>"; } ?>
				<br>
				<label>Password:</label>
				<input type="password" name="password" required>
				<?php if (isset($passwordError)) { echo "<p class='error'>$passwordError</p>"; } ?>
				<br>
				<input type="submit" value="Login">
			</form>
					<hr class="line">
			<a href="register.php" class="button">Do you want to become a manager ? Register Now !!!</a>
					<hr class="line">
		</div>
		<?php include_once('includes/footer.inc'); ?>
	</body>
</html>
