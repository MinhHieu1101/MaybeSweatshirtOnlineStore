<!DOCTYPE html>
<html lang="en">
    <head>
		<?php $page_title = "Our Enhancements for Assignment 2"; ?>
		<?php include_once('includes/header.inc'); ?>
	</head>
	<body>
		<?php include_once('includes/menu.inc'); ?>
		
		<section>
	<div class="form_page">	
		<h1>All Enhancements on our website - Assignment 2</h1>
			<h3>Enhancement 1 - Manager Security</h3>
				<p>We successfully implemented a secure management system that includes a "register.php" page with server-side validation, validating an unique username and password rules. 
				This account information is stored in the "admins" table within our database. 
				Next, we developed a "login.php" page to utilize the saved data and regulate access to the manager web page, ensuring it cannot be accessed directly via a URL. 
				Lastly, we created a "logout.php" page and added a "logout" link on the manager page for admins who have successfully logged in. 
				In order for our tutor(s) to verify the necessary features, we additionally saved a default account in our database with the credentials: "admin" as the username and "password" as the password.
				<br>*Link to enhancement: </p>
				<a href="login.php">Login Page</a>
				<a href="logout.php">Logout Page</a>
				<a href="register.php">Register Page</a>
				<a href="manager.php">Manager Page</a>
			
			<h3>Enhancement 2 - Advanced Manager Reports</h3>
				<p>We managed to implement MySQL subqueries, also known as inner queries or nested queries. 
				These are the queries embedded within another query that can be used to filter, aggregate, or manipulate data before returning the final result. 
				By doing this, we were able to offer the manager more advanced reports that displayed the most popular/purchased product as well as the average quantity of orders per day.
				<br>*Link to enhancement: </p>
				<a href="manager.php">Manager Page</a>
    </div>
		</section>
		
		<?php include_once('includes/footer.inc'); ?>
	</body>
</html>


