<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<?php $page_title = "Order Confirmation"; ?>
		<?php include_once('includes/header.inc'); ?>
    </head>
	<body>
		<?php include_once('includes/menu.inc'); ?>
		<section class="bill">
<?php
if ($_SESSION["check"] == TRUE) {
	$order_id = $_SESSION["order_id"];
	require_once ("settings.php");
	$conn = @mysqli_connect ($host, $user, $pwd, $sql_db);
	if (!$conn) {
		echo "<p>Database connection has failed</p>";
		echo "<p>Please try again later!!!</p>";
	} else {
		////mysql query to display a receipt for the customer
		$select_query = "SELECT * FROM orders WHERE order_id = '$order_id';";
		$proceed = mysqli_query($conn, $select_query);
		if ($proceed) {
			while ($user_order = mysqli_fetch_assoc($proceed)) {
				echo "<div class=\"bill-box\">\n"
					."<table cellpadding=\"0\" cellspacing=\"0\">\n"
						."<tr class=\"top\">\n"
							."<td colspan=\"2\">\n"
								."<table>\n"
									."<tr>\n"
										."<td class=\"title\">\n"
											."<p>MAYBE</p>\n"
										."</td>\n"
									."</tr>\n"

									."<tr>\n"
										."<td>\n"
										."</td>\n"

										."<td>\n"
										."<h1>Order Confirmation</h1>\n"
										."</td>\n"
									."</tr>\n"
								."</table>\n"
							."</td>\n"
						."</tr>\n"

						."<tr class=\"information\">\n"
							."<td colspan=\"2\">\n"
								."<table>\n"
									."<tr class=\"heading\">\n"
										."<td>Customer information</td>\n"

										."<td></td>\n"
									."<tr>\n"
										."<td>Name</td>\n"

										."<td>", $user_order["fname"], " ", $user_order["lname"], "</td>\n"
									."</tr>\n"
									."<tr>\n"
										."<td>\nEmail Address</td>\n"

										."<td>\n", $user_order["email_add"], "</td>\n"
									."</tr>\n"
									."<tr>\n"
										."<td>Address</td>\n"

										."<td>", $user_order["street_add"], "</td>\n"
									."</tr>\n"
									."<tr>\n"
										."<td>Suburb/Town</td>\n"

										."<td>\n", $user_order["suburb_town"], "</td>\n"
									."</tr>\n"
									."<tr>\n"
										."<td>State</td>\n"

										."<td>", $user_order["state"], "</td>\n"
									."</tr>\n"
									."<tr>\n"
										."<td>Postcode</td>\n"

										."<td>", $user_order["postcode"], "</td>\n"
									."</tr>\n"
									."<tr>\n"
										."<td>Phone number</td>\n"

										."<td>", $user_order["phone_num"], "</td>\n"
									."</tr>\n"
									."<tr>\n"
										."<td>Pref Contact</td>\n"

										."<td>", $user_order["contact"], "</td>\n"
									."</tr>\n"
								."</table>\n"
							."</td>\n"
						."</tr>\n"

						."<tr class=\"heading\">\n"
							."<td>Order</td>\n"

							."<td></td>\n"
						."</tr>\n"

						."<tr>\n"
							."<td>Order Status</td>\n"

							."<td>", $user_order["order_status"], "</td>\n"
						."</tr>\n"

						."<tr>\n"
							."<td>Order ID</td>\n"

							."<td>", $user_order["order_id"], "</td>\n"
						."</tr>\n"

						."<tr>\n"
							."<td>Item</td>\n"

							."<td>", $user_order["product"], "</td>\n"
						."</tr>\n"

						."<tr>\n"
							."<td>Amount</td>\n"

							."<td>", $user_order["quantity"], "</td>\n"
						."</tr>\n"

						."<tr>\n"
							."<td>Color</td>\n"

							."<td>", $user_order["color"], "</td>\n"
						."</tr>\n"

						."<tr>\n"
							."<td>Feature(s)</td>\n"

							."<td>", $user_order["features"], "</td>\n"
						."</tr>\n"

						."<tr class=\"heading\">\n"
							."<td>Payment</td>\n"

							."<td></td>\n"
						."</tr>\n"

						."<tr>\n"
							."<td>CC Type</td>\n"

							."<td>", $user_order["type_credit"], "</td>\n"
						."</tr>\n"

						."<tr>\n"
							."<td>CC Name</td>\n"

							."<td>", $user_order["name_credit"], "</td>\n"
						."</tr>\n"

						."<tr>\n"
							."<td>CC Num</td>\n"

							."<td>**********</td>\n"
						."</tr>\n"

						."<tr>\n"
							."<td>CC Expire Date</td>\n"

							."<td>", $user_order["exp_credit"], "</td>\n"
						."</tr>\n"
						
						."<tr>\n"
							."<td>CVV</td>\n"

							."<td>***</td>\n"
						."</tr>\n"

						."<tr class=\"total\">\n"
							."<td>Total</td>\n"

							."<td>$", $user_order["order_cost"], "</td>\n"
						."</tr>\n"
					."</table>\n"
				."</div>";
			}
		mysqli_free_result($proceed);
		}
	mysqli_close($conn);
	}
	
} else {
	header ("location: payment.php");
}
?>
		</section>
		<?php include_once('includes/footer.inc'); ?>
	</body>
</html>