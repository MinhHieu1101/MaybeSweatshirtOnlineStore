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
		} else {
		$usernameRule = "/^[A-Za-z0-9_-]{5,20}$/";
		$passwordRule = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{8,20}$/";

		//check the username
		$username = $_POST["username"];
		if (!preg_match($usernameRule,$username)) {
			$usernameError = "Username should only contain letters, numbers, underscores, and dashes";
		} else {
			$get_admin = "SELECT * FROM admins WHERE username = '$username'";
			$check_admin_query = mysqli_query($conn, $get_admin);
			$check_admin = mysqli_num_rows($check_admin_query);
			if ($check_admin > 0) {
				$usernameError = "Username already existed";
			}
		}

		//check the password
		$password = $_POST["password"];
		if (!preg_match($passwordRule,$password)) {
			$passwordError = "Password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit";
		}

		if (empty($usernameError) && empty($passwordError)) {
			$insert_admin = "INSERT INTO admins (username, password) VALUES ('$username', '$password')";
			$registration = mysqli_query($conn, $insert_admin);
			if ($registration) {
				$_SESSION["username"] = $username;
				echo "<h2>You signed up succesfully! Welcome to the orders database D:</h2>";
				header("Refresh: 2; URL=login.php");
				mysqli_close($conn);
				exit();
			}
		}
		mysqli_close($conn);
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<?php $page_title = "Infiltration"; ?>
		<?php include_once('includes/header.inc'); ?>
    </head>
	<body>
		<?php include_once('includes/menu.inc'); ?>
		<div class="form_page security">
					<hr class="line">
			<h1>Registration Page</h1>
			<form method="post" action="register.php">
				<label>Username:</label>
				<input type="text" name="username" required>
				<?php if (isset($usernameError)) { echo "<p class='error'>$usernameError</p>"; } ?>
				<br>
				<label>Password:</label>
				<input type="password" name="password" required>
				<?php if (isset($passwordError)) { echo "<p class='error'>$passwordError</p>"; } ?>
				<br>
				<input type="submit" value="Register">
			</form>
					<hr class="line">
			<a href="login.php" class="button">Have you remembered your account ? Login Now !!!</a>
					<hr class="line">
		</div>
		<?php include_once('includes/footer.inc'); ?>
	</body>
</html>
