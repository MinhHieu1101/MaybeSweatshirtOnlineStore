<?php
	session_start();
	$_SESSION = array();
	session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<?php $page_title = "Getting Out"; ?>
		<?php include_once('includes/header.inc'); ?>
    </head>
	<body>
		<?php include_once('includes/menu.inc'); 
	//redirect to the login page after signing out ?>
	<div class="form_page security">
		<hr class="line">
		<h2>You are departing from an idyllic environment.
					  Please wait 3 seconds...</h2>
		<hr class="line">
	</div>
<?php
	include_once('includes/footer.inc');
	header("Refresh: 3; URL=login.php");
	exit();
?>
	</body>
</html>
