<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="description" content="A Sorrowful Fashion Store For Men" />
		<meta name="keywords" content="HTML5, CSS, PHP, MySQL, fashion" />
		<meta name="author" content="The most average men on the planet"  />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"  />
		<link href="https://fonts.googleapis.com/css?family=Karma" rel="stylesheet"  />
        <link href="styles/style.css" rel="stylesheet"  />
		<title>Processing the order</title>
	</head>
<body>  

<?php
function sanitise_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$_SESSION["firstname"] = "";
$_SESSION["firstnameError"] = "";

$_SESSION["lastname"] = "";
$_SESSION["lastnameError"] = "";

$_SESSION["emailaddress"] = "";
$_SESSION["emailaddressError"] = "";

$_SESSION["streetaddress"] = "";
$_SESSION["streetaddressError"] = "";

$_SESSION["suburbtown"] = "";
$_SESSION["suburbtownError"] = "";

$_SESSION["state"] = "";
$_SESSION["stateError"] = "";

$_SESSION["postcode"] = "";
$_SESSION["postcodeError"] = "";

$_SESSION["phonenumber"] = "";
$_SESSION["phonenumberError"] = "";

$_SESSION["contact"] = "";
$_SESSION["contactError"] = "";

$_SESSION["product"] = "";
$_SESSION["price"] = "";
$_SESSION["productError"] = "";

$_SESSION["quantity"] = "";
$_SESSION["quantityError"] = "";

$_SESSION["color"] = "";
$_SESSION["colorError"] = "";

$_SESSION["features"] = "";

$_SESSION["type_cred"] = "";
$_SESSION["type_credError"] = "";

$_SESSION["name_cred"] = "";
$_SESSION["name_credError"] = "";

$_SESSION["num_cred"] = "";
$_SESSION["num_credError"] = "";

$_SESSION["exp_cred"] = "";
$_SESSION["exp_credError"] = "";

$_SESSION["cvv_cred"] = "";
$_SESSION["cvv_credError"] = "";

$_SESSION["comments"] = "";

$_SESSION["order_id"] = "";

$_SESSION["check"] = FALSE;

////check the user inputs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$_SESSION["check"] = TRUE;
	$errors = 0;
  if (empty($_POST["firstname"])) {
	$_SESSION["firstnameError"] = "* Your first name is required";
	$errors += 1;
	header ("location: fix_order.php");
  } else {
    $_SESSION["firstname"] = sanitise_input($_POST["firstname"]);
    if (!preg_match("/^[A-Za-z]{1,25}$/",$_SESSION["firstname"])) {
	  $_SESSION["firstnameError"] = "* Only 25 letters are allowed such as Harry";
	  $errors += 1;
	  header ("location: fix_order.php");
    }
  }

  if (empty($_POST["lastname"])) {
  $_SESSION["lastnameError"] = "* Your last name is required";
  $errors += 1;
  header ("location: fix_order.php");
  } else {
    $_SESSION["lastname"] = sanitise_input($_POST["lastname"]);
    if (!preg_match("/^[A-Za-z]{1,25}$/",$_SESSION["lastname"])) {
	  $_SESSION["lastnameError"] = "* Only 25 letters are allowed such as Potter";
	  $errors += 1;
	  header ("location: fix_order.php");
    }
  }
  
  if (empty($_POST["emailaddress"])) {
  $_SESSION["emailaddressError"] = "* Your email address is required";
  $errors += 1;
  header ("location: fix_order.php");
  } else {
    $_SESSION["emailaddress"] = sanitise_input($_POST["emailaddress"]);
    if (!filter_var($_SESSION["emailaddress"], FILTER_VALIDATE_EMAIL)) {
	  $_SESSION["emailaddressError"] = "* Please enter a valid email";
	  $errors += 1;
	  header ("location: fix_order.php");
    }
  }

  if (empty($_POST["streetaddress"])) {
  $_SESSION["streetaddressError"] = "* Your street address is required";
  $errors += 1;
  header ("location: fix_order.php");
  } else {
    $_SESSION["streetaddress"] = sanitise_input($_POST["streetaddress"]);
    if (!preg_match("/^[A-Za-z0-9'\.\-\s\,]{1,40}$/",$_SESSION["streetaddress"])) {
      $_SESSION["streetaddressError"] = "* Only 40 letters with numbers are allowed";
	  $errors += 1;
      header ("location: fix_order.php");
    }
  }

  if (empty($_POST["suburbtown"])) {
  $_SESSION["suburbtownError"] = "* Your suburb or town is required";
  $errors += 1;
  header ("location: fix_order.php");
  } else {
    $_SESSION["suburbtown"] = sanitise_input($_POST["suburbtown"]);
    if (!preg_match("/^[A-Za-z0-9'\.\-\s\,]{1,20}$/",$_SESSION["suburbtown"])) {
      $_SESSION["suburbtownError"] = "* Only 20 letters with numbers are allowed";
	  $errors += 1;
      header ("location: fix_order.php");
    }
  }

  if (empty($_POST["state"])) {
	$_SESSION["stateError"] = "* Your state is required";
	$errors += 1;
	header ("location: fix_order.php");
  } else {
    $_SESSION["state"] = sanitise_input($_POST["state"]);
  }

  if (empty($_POST["postcode"])) {
  $_SESSION["postcodeError"] = "* Your postcode is required";
  $errors += 1;
  header ("location: fix_order.php");
  } else {
    $_SESSION["postcode"] = sanitise_input($_POST["postcode"]);
    if (!preg_match("/^\d{4}$/",$_SESSION["postcode"])) {
      $_SESSION["postcodeError"] = "* Only 4 numbers are allowed such as 0000";
	  $errors += 1;
      header ("location: fix_order.php");
    }
  }

  if (empty($_POST["phonenumber"])) {
  $_SESSION["phonenumberError"] = "* Your phone number is required";
  $errors += 1;
  header ("location: fix_order.php");
  } else {
    $_SESSION["phonenumber"] = sanitise_input($_POST["phonenumber"]);
    if (!preg_match("/^[0-9]{10}$/",$_SESSION["phonenumber"])) {
      $_SESSION["phonenumberError"] = "* Only 10 numbers are allowed such as 9999999999";
	  $errors += 1;
      header ("location: fix_order.php");
    }
  }

  if (empty($_POST["contact"])) {
	$_SESSION["contactError"] = "* Your choice of contact is required";
	$errors += 1;
	header ("location: fix_order.php");
  } else {
    $_SESSION["contact"] = sanitise_input($_POST["contact"]);
  }

  if (empty($_POST["product"])) {
	$_SESSION["productError"] = "* Your choice of product is required";
	$errors += 1;
	header ("location: fix_order.php");
  } else {
		switch ($_POST["product"]) {
		  case "Poor College Kid":
		    $_SESSION["product"] = sanitise_input($_POST["product"]);
			$_SESSION["price"] = 20;
			break;
		  case "Basic Alpha Male":
		    $_SESSION["product"] = sanitise_input($_POST["product"]);
			$_SESSION["price"] = 60;
			break;
		  case "Toxic Playboy":
		    $_SESSION["product"] = sanitise_input($_POST["product"]);
			$_SESSION["price"] = 200;
			break;
		}
  }

  if (empty($_POST["quantity"])) {
  $_SESSION["quantityError"] = "* The quantity is required";
  $errors += 1;
  header ("location: fix_order.php");
  } else {
    $_SESSION["quantity"] = sanitise_input($_POST["quantity"]);
    if (!preg_match("/^[0-9]{1,10}$/",$_SESSION["quantity"])) {
	  $_SESSION["quantityError"] = "* Please enter a valid number";
	  $errors += 1;
      header ("location: fix_order.php");
    }
  }

  if (empty($_POST["color"])) {
	$_SESSION["colorError"] = "* Your choice of color is required";
	$errors += 1;
	header ("location: fix_order.php");
  } else {
    $_SESSION["color"] = sanitise_input($_POST["color"]);
  }

  if (isset($_POST["features"])) {
	$count = count($_POST["features"]);
	$z = intval($count); ////so as to calculate the total price of the order later
	$_SESSION["features"] = implode(", and ",$_POST["features"]);
  } else {
	$z = 0;
	$_SESSION["features"] = "None";
  }

  if (empty($_POST["comments"])) {
  $_SESSION["comments"] = "None";
  } else {
    $_SESSION["comments"] = sanitise_input($_POST["comments"]);
  }

  if (empty($_POST["type_cred"])) {
	$_SESSION["type_credError"] = "* Your type of credit card is required";
	$errors += 1;
	header ("location: fix_order.php");
  } else {
    $_SESSION["type_cred"] = sanitise_input($_POST["type_cred"]);
  }

  if (empty($_POST["name_cred"])) {
  $_SESSION["name_credError"] = "* Your name on the credit card is required";
  $errors += 1;
  header ("location: fix_order.php");
  } else {
    $_SESSION["name_cred"] = sanitise_input($_POST["name_cred"]);
    if (!preg_match("/^[A-Za-z]{1,25}$/",$_SESSION["name_cred"])) {
      $_SESSION["name_credError"] = "* Please enter a valid name";
	  $errors += 1;
      header ("location: fix_order.php");
    }
  }

  if (empty($_POST["num_cred"])) {
  $_SESSION["num_credError"] = "* The number of your credit card is required";
  $errors += 1;
  header ("location: fix_order.php");
  } else {
		switch ($_SESSION["type_cred"]) {
		  case "Visa":
			$_SESSION["num_cred"] = sanitise_input($_POST["num_cred"]);
			if (!preg_match("/^4[0-9]{12}(?:[0-9]{3})?$/",$_SESSION["num_cred"])) {
			  $_SESSION["num_credError"] = "* Please enter a valid VISA credit card number";
			  $errors += 1;
			  header ("location: fix_order.php");
			}
			break;
		  case "Mastercard":
		    $_SESSION["num_cred"] = sanitise_input($_POST["num_cred"]);
			if (!preg_match("/^5[1-5][0-9]{14}$/",$_SESSION["num_cred"])) {
			  $_SESSION["num_credError"] = "* Please enter a valid MASTERCARD credit card number";
			  $errors += 1;
			  header ("location: fix_order.php");
			}
			break;
		  case "American Express":
		    $_SESSION["num_cred"] = sanitise_input($_POST["num_cred"]);
			if (!preg_match("/^3[4|7][0-9]{13}$/",$_SESSION["num_cred"])) {
			  $_SESSION["num_credError"] = "* Please enter a valid AMERICAN EXPRESS credit card number";
			  $errors += 1;
			  header ("location: fix_order.php");
			}
			break;
		}
  }

  if (empty($_POST["exp_cred"])) {
  $_SESSION["exp_credError"] = "* The expiration date of your credit card is required";
  $errors += 1;
  header ("location: fix_order.php");
  } else {
    $_SESSION["exp_cred"] = sanitise_input($_POST["exp_cred"]);
    if (!preg_match("/^(0[1-9]|1[012])-[0-9]{2}$/",$_SESSION["exp_cred"])) {
      $_SESSION["exp_credError"] = "* Please enter a valid date such as 06-24";
	  $errors += 1;
      header ("location: fix_order.php");
    }
  }

  if (empty($_POST["cvv_cred"])) {
  $_SESSION["cvv_credError"] = "* The Card Verification Value - CVV is required";
  $errors += 1;
  header ("location: fix_order.php");
  } else {
    $_SESSION["cvv_cred"] = sanitise_input($_POST["cvv_cred"]);
    if (!preg_match("/^[0-9]{3,4}$/",$_SESSION["cvv_cred"])) {
      $_SESSION["cvv_credError"] = "* Please enter a valid number such as 999 or 8888";
	  $errors += 1;
      header ("location: fix_order.php");
    }
  }

	if ($errors > 0) {
		exit();
	} else {
		////calculate the total price ($z is above in the features section)
		$x = intval($_SESSION["price"]);
		$y = intval($_SESSION["quantity"]);
		$_SESSION["order_cost"] = $x * $y + $z * 20;
	
		////set up the variables
		$order_cost = $_SESSION["order_cost"];
		$firstname = $_SESSION["firstname"];
		$lastname = $_SESSION["lastname"];
		$emailaddress = $_SESSION["emailaddress"];
		$streetaddress = $_SESSION["streetaddress"];
		$suburbtown = $_SESSION["suburbtown"];
		$state = $_SESSION["state"];
		$postcode = $_SESSION["postcode"];
		$phonenumber = $_SESSION["phonenumber"];
		$contact = $_SESSION["contact"];
		$product = $_SESSION["product"];
		$quantity = $_SESSION["quantity"];
		$color = $_SESSION["color"];
		$features = $_SESSION["features"];
		$type_cred = $_SESSION["type_cred"];
		$name_cred = $_SESSION["name_cred"];
		$num_cred = $_SESSION["num_cred"];
		$exp_cred = $_SESSION["exp_cred"];
		$cvv_cred = $_SESSION["cvv_cred"];
		$comments = $_SESSION["comments"];
  
  ///////////////////// MYSQL QUERIES /////////////////////
		require_once ("settings.php");
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
		if (!$conn) {
			echo "<h2>We are currently experiencing issues with our website. We appreciate your patience.</h2>";
			exit();
		} else {
			$create_query = "CREATE TABLE IF NOT EXISTS orders (
								order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
								order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
								order_cost INT(10),
								order_status VARCHAR(10),
								fname VARCHAR(25),
								lname VARCHAR(25),
								email_add VARCHAR(50),
								street_add VARCHAR(40),
								suburb_town VARCHAR(20),
								state VARCHAR(3),
								postcode INT(4),
								phone_num INT(10),
								contact VARCHAR(5),
								product VARCHAR(50),
								quantity INT(10),
								color VARCHAR(20),
								features VARCHAR(60),
								type_credit VARCHAR(20),
								name_credit VARCHAR(25),
								num_credit INT(16),
								exp_credit VARCHAR(5),
								cvv_credit INT(4),
								comments VARCHAR(100)
								);";
			$table = mysqli_query($conn, $create_query);
			
			$insert_query = "INSERT INTO orders
									(order_id, 
									order_time, 
									order_cost, 
									order_status, 
									fname, 
									lname, 
									email_add, 
									street_add, 
									suburb_town, 
									state,
									postcode,
									phone_num, 
									contact, 
									product, 
									quantity, 
									color, 
									features, 
									type_credit, 
									name_credit, 
									num_credit, 
									exp_credit, 
									cvv_credit, 
									comments) 
								VALUES
									(NULL,
									NOW(),
									'$order_cost', 
									'PENDING',
									'$firstname', 
									'$lastname', 
									'$emailaddress', 
									'$streetaddress', 
									'$suburbtown', 
									'$state', 
									'$postcode', 
									'$phonenumber', 
									'$contact', 
									'$product', 
									'$quantity', 
									'$color', 
									'$features', 
									'$type_cred', 
									'$name_cred', 
									'$num_cred', 
									'$exp_cred', 
									'$cvv_cred', 
									'$comments');";
				$add_order = mysqli_query($conn, $insert_query);
				if ($add_order) {
					$_SESSION["order_id"] = mysqli_insert_id($conn);
					mysqli_close($conn);
					header ("location: receipt.php");
					exit();
				}
		}
	}
} else {
	header ("location: payment.php");
}
?>

