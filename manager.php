<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<?php $page_title = "The Almighty Manager"; ?>
		<?php include_once('includes/header.inc'); ?>
    </head>
	<body>
		<?php include_once('includes/menu.inc'); ?>
		<section class="mng_table">
<?php
function sanitise_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//// check if the manager has logged in
if (!isset($_SESSION["username"])) {
	header("location: login.php");
    exit();
} else {

$show_all = "SELECT order_id, order_time, order_cost, order_status, fname, lname, product, quantity, color, features FROM orders";

//// functions for the manager
if (isset($_POST["action"])) {
	switch($_POST["action"]) {

		case "show_all": 
			$query = $show_all;
			break;

		case "search_name":
			$fname = sanitise_input($_POST["fname"]);
			$lname = sanitise_input($_POST["lname"]);
			$query = $show_all." WHERE fname LIKE '%$fname%' AND lname LIKE '%$lname%'";
			break;

		case "search_product":
			$product = sanitise_input($_POST["product"]);
			$query = $show_all." WHERE product LIKE '%$product%'";
			break;

		case "pending_product":
			$query = $show_all." WHERE order_status = 'PENDING'";
			break;

		case "sort_product":
			$query = $show_all." ORDER BY order_cost DESC";
			break;
			
		case "delete_order":
			$id_order = $_POST["order_id"];
			$status_order = $_POST["order_status"];
			$query = "DELETE FROM orders WHERE order_id = '$id_order' AND order_status LIKE 'PENDING';";
			header ("location: manager.php");
			break;
			
		case "pending_order":
			$id_order = $_POST["order_id"];
			$query = "UPDATE orders SET order_status = 'PENDING' WHERE order_id = '$id_order';";
			header ("location: manager.php");
			break;
			
		case "fulfilled_order":
			$id_order = $_POST["order_id"];
			$query = "UPDATE orders SET order_status = 'FULFILLED' WHERE order_id = '$id_order';";
			header ("location: manager.php");
			break;
			
		case "paid_order":
			$id_order = $_POST["order_id"];
			$query = "UPDATE orders SET order_status = 'PAID' WHERE order_id = '$id_order';";
			header ("location: manager.php");
			break;
			
		case "archived_order":
			$id_order = $_POST["order_id"];
			$query = "UPDATE orders SET order_status = 'ARCHIVED' WHERE order_id = '$id_order';";
			header ("location: manager.php");
			break;
	}
} else {
	$query = $show_all;
}

		////display the orders stored in the database
		require_once ("settings.php");
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
		if (!$conn) {
			echo "<h2>We are currently experiencing issues with the database.</h2>";
			exit();
		} else {
			$display = mysqli_query($conn, $query);
			if ($display) {
					echo "<div class=\"mng_body mng_form2\">\n";
					echo "<br><h2 class=\"big_title\">The Orders</h2>";
					echo "<table class=\"mng_table\">\n";
					echo "<tr>\n"
						."<th scope=\"col\">Order ID</th>\n"
						."<th scope=\"col\">Order Time</th>\n"
						."<th scope=\"col\">Order Cost</th>\n"
						."<th scope=\"col\">Order Status</th>\n"
						."<th scope=\"col\">First Name</th>\n"
						."<th scope=\"col\">Last Name</th>\n"
						."<th scope=\"col\">Product</th>\n"
						."<th scope=\"col\">Quantity</th>\n"
						."<th scope=\"col\">Color</th>\n"
						."<th scope=\"col\">Features</th>\n"
						."<th scope=\"col\">Actions</th>\n"
						."</tr>\n";
					while ($data = mysqli_fetch_assoc($display)) {
						echo "<tr>\n";
						echo "<td>", $data["order_id"],"</td>\n";
						echo "<td>", $data["order_time"],"</td>\n";
						echo "<td>", $data["order_cost"],"</td>\n";
						echo "<td>", $data["order_status"],"</td>\n";
						echo "<td>", $data["fname"],"</td>\n";
						echo "<td>", $data["lname"],"</td>\n";
						echo "<td>", $data["product"],"</td>\n";
						echo "<td>", $data["quantity"],"</td>\n";
						echo "<td>", $data["color"],"</td>\n";
						echo "<td>", $data["features"],"</td>\n";
						echo "<td><form method=\"post\" action=\"manager.php\">\n";
						echo "<input type=\"hidden\" name=\"order_id\" value=",$data["order_id"],"/>\n";
						echo "<input type=\"hidden\" name=\"order_status\" value=",$data["order_status"],"/>\n";
						echo "<button type=\"submit\" value=\"delete_order\" name=\"action\">Delete</button>\n";
						echo "<button type=\"submit\" value=\"pending_order\" name=\"action\">PENDING</button>\n";
						echo "<button type=\"submit\" value=\"fulfilled_order\" name=\"action\">FULFILLED</button>\n";
						echo "<button type=\"submit\" value=\"paid_order\" name=\"action\">PAID</button>\n";
						echo "<button type=\"submit\" value=\"archived_order\" name=\"action\">ARCHIVED</button>\n";
						echo "</form></td>\n";
						echo "</tr>\n";
					}
					echo "</table>\n";
					echo "</div>\n";
					mysqli_free_result ($display);
			
			} else {
				echo "<h2>The database cannot be displayed at the moment.</h2>";
			}

			mysqli_close($conn);
		}
}
?>
	<div class="form_page security mng_form">
		<form method="post" action="manager.php">
			<button type="submit" value="show_all" name="action">Show All</button>
			<fieldset>
				<legend>Search for a name</legend>
				<p><label for="fname">First Name:</label>
				<input type="text" id="fname" name="fname"/></p>
				<p><label for="lname">Last Name:</label>
				<input type="text" id="lname" name="lname"/></p>
				<button type="submit" value="search_name" name="action">Go</button>
			</fieldset>

			<fieldset>
				<legend>Search for a product</legend>
				<p><label for="product">Product's Orders:</label>
				<select name="product" id="product">
				<option value = "">Options</option>
				<option value = "Poor College Kid">Poor College Kid</option>
				<option value = "Basic Alpha Male">Basic Alpha Male</option>
				<option value = "Toxic Playboy">Toxic Playboy</option>
				</select></p>
				<button type="submit" value="search_product" name="action">Go</button>
			</fieldset>
			
			<button type="submit" value="pending_product" name="action">Search for pending orders</button>
			
			<button type="submit" value="sort_product" name="action">Sort the orders by total cost</button>
			
			<fieldset>
				<legend>More Reports</legend>
				<button type="submit" value="popular_product" name="action2">The Most Popular Product Ordered</button>
				<button type="submit" value="average_product" name="action2">The Average Number of Orders Per Day</button>
			</fieldset>
		</form>
	</div>
	
<?php
		////advanced reports
	if (isset($_POST["action2"])) {
		switch($_POST["action2"]) {
			case "popular_product": 
				$query2 = "SELECT product AS famous_item, SUM(quantity) AS number_of_orders
						FROM orders
						GROUP BY product
						ORDER BY famous_item DESC
						LIMIT 1;";
				$header1 = "The Most Famous Item";
				$header2 = "Number of Orders";
				$datacell1 = "famous_item";
				$datacell2 = "number_of_orders";
				break;
				
			case "average_product": 
				$query2 = "SELECT date, ROUND(AVG(quantity_count)) AS average_orders_per_day
						FROM (
						  SELECT DATE(order_time) AS date, COUNT(*) AS quantity_count
						  FROM orders
						  GROUP BY date
						) AS daily_order_count
						GROUP BY date;";
				$header1 = "Date";
				$header2 = "Average Number of Orders";
				$datacell1 = "date";
				$datacell2 = "average_orders_per_day";
				break;
		}
	
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
		if (!$conn) {
			echo "<h2>We are currently experiencing issues with the database.</h2>";
			exit();
		} else {
			$display2 = mysqli_query($conn, $query2);
			if ($display2) {
					echo "<h2 class=\"big_title\">Advanced Report</h2>";
					echo "<table class=\"mng_table\">\n";
					echo "<tr>\n"
						."<th scope=\"col\">",$header1,"</th>\n"
						."<th scope=\"col\">",$header2,"</th>\n"
						."</tr>\n";
					while ($report = mysqli_fetch_assoc($display2)) {
						echo "<tr>\n";
						echo "<td>", $report[$datacell1],"</td>\n";
						echo "<td>", $report[$datacell2],"</td>\n";
						echo "</tr>\n";
					}
					echo "</table>\n";
					mysqli_free_result ($display2);
			} else {
				mysqli_close($conn);
			}
			mysqli_close($conn);
		}
	}
?>

					<hr class="line">
		<a href="logout.php" class="button">Get me out of here D: -> Logout</a>
					<hr class="line">
		</section>
		<?php include_once('includes/footer.inc'); ?>
	</body>
</html>