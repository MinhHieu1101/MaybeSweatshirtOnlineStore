<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<?php $page_title = "Correct Your Order Information"; ?>
		<?php include_once('includes/header.inc'); ?>
    </head>
	<body>
		<?php include_once('includes/menu.inc'); ?>
		
<?php
if ($_SESSION["check"] == TRUE) {
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
	$comments = $_SESSION["comments"];
	//error messages
	$firstnameError = $_SESSION["firstnameError"];
	$lastnameError = $_SESSION["lastnameError"];
	$emailaddressError = $_SESSION["emailaddressError"];
	$streetaddressError = $_SESSION["streetaddressError"];
	$suburbtownError = $_SESSION["suburbtownError"];
	$stateError = $_SESSION["stateError"];
	$postcodeError = $_SESSION["postcodeError"];
	$phonenumberError = $_SESSION["phonenumberError"];
	$contactError = $_SESSION["contactError"];
	$productError = $_SESSION["productError"];
	$quantityError = $_SESSION["quantityError"];
	$colorError = $_SESSION["colorError"];
	$type_credError = $_SESSION["type_credError"];
	$name_credError = $_SESSION["name_credError"];
	$num_credError = $_SESSION["num_credError"];
	$exp_credError = $_SESSION["exp_credError"];
	$cvv_credError = $_SESSION["cvv_credError"];
} else {
	header ("location: payment.php");
}
?>		
		<section>
		  <div class="form_page">
		    <h1 class="big_title">Cozy Purchase</h1>
			<form method="post" action="process_order.php" novalidate="novalidate">
			<p>
			<label for="firstname">First name:</label>
			<input type="text" id="firstname" name="firstname" value="<?php echo $firstname;?>"/>
			<span class="error"> <?php echo $firstnameError;?></span>
			</p>

			<p>
			<label for="lastname">Last name:</label>
			<input type="text" id="lastname" name="lastname" value="<?php echo $lastname;?>"/>
			<span class="error"> <?php echo $lastnameError;?></span>
			</p>

			<p>
			<label for="emailaddress">Email address:</label>
			<input type="email" id="emailaddress" name="emailaddress" value="<?php echo $emailaddress;?>"/>
			<span class="error"> <?php echo $emailaddressError;?></span>
			</p>

			<fieldset>
			<legend>Address</legend>	
				<p>
				<label for="streetaddress">Street address:</label>
				<input type="text" id="streetaddress" name="streetaddress" value="<?php echo $streetaddress;?>"/>
				<span class="error"> <?php echo $streetaddressError;?></span>
				</p>

				<p>
				<label for="suburbtown">Suburb/Town:</label>
				<input type="text" id="suburbtown" name="suburbtown" value="<?php echo $suburbtown;?>"/>
				<span class="error"> <?php echo $suburbtownError;?></span>
				</p>

				<p>
				<label for="state">State:</label>
				<select name="state" id="state">
				<option value = "">Please Select</option>	
				<option value = "VIC" <?php if (isset($state) && $state=="VIC") echo "selected";?>>VIC</option>
				<option value = "NSW" <?php if (isset($state) && $state=="NSW") echo "selected";?>>NSW</option>
				<option value = "QLD" <?php if (isset($state) && $state=="QLD") echo "selected";?>>QLD</option>
				<option value = "NT" <?php if (isset($state) && $state=="NT") echo "selected";?>>NT</option>
				<option value = "WA" <?php if (isset($state) && $state=="WA") echo "selected";?>>WA</option>
				<option value = "SA" <?php if (isset($state) && $state=="SA") echo "selected";?>>SA</option>
				<option value = "TAS" <?php if (isset($state) && $state=="TAS") echo "selected";?>>TAS</option>
				<option value = "ACT" <?php if (isset($state) && $state=="ACT") echo "selected";?>>ACT</option>
				</select>
				<span class="error"> <?php echo $stateError;?></span>
				</p>

				<p>
				<label for="postcode">Postcode:</label>
				<input type="text" id="postcode" name="postcode" value="<?php echo $postcode;?>"/>
				<span class="error"> <?php echo $postcodeError;?></span>
				</p>
			</fieldset>

			<p>
			<label for="phonenumber">Phone number:</label>
			<input type="text" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber;?>"/>
			<span class="error"> <?php echo $phonenumberError;?></span>
			</p>

			<p>Preferred contact: <br>
			<label for="email">Email</label>
			<input type="radio" id="email" name="contact" value="Email" <?php if (isset($contact) && $contact=="Email") echo "checked";?>>
			
			<label for="post">Post</label>
			<input type="radio" id="post" name="contact" value="Post" <?php if (isset($contact) && $contact=="Post") echo "checked";?>>
			
			<label for="phone">Phone</label>
			<input type="radio" id="phone" name="contact" value="Phone" <?php if (isset($contact) && $contact=="Phone") echo "checked";?>>
			<span class="error"> <?php echo $contactError;?></span>
			</p>

			<p>
			<label for="product">Product:</label>
			<select name="product" id="product">
			<option value = "">Please Select</option>
			<option value = "Poor College Kid" <?php if (isset($product) && $product=="Poor College Kid") echo "selected";?>>Poor College Kid - 20$</option>
			<option value = "Basic Alpha Male" <?php if (isset($product) && $product=="Basic Alpha Male") echo "selected";?>>Basic Alpha Male - 60$</option>
			<option value = "Toxic Playboy" <?php if (isset($product) && $product=="Toxic Playboy") echo "selected";?>>Toxic Playboy - 200$</option>
			</select>
			<span class="error"> <?php echo $productError;?></span>
			</p>
			
			<p>
			<label for="quantity">Desired quantity:</label>
			<input type="text" id="quantity" name="quantity" value="<?php echo $quantity;?>"/>
			<span class="error"> <?php echo $quantityError;?></span>
			</p>
			
			<p>
			<label for="color">Preferred color:</label>
			<select name="color" id="color">
			<option value = "">Please Select</option>
			<option value = "Rich Black" <?php if (isset($color) && $color=="Rich Black") echo "selected";?>>Rich Black</option>
			<option value = "Rose Pink" <?php if (isset($color) && $color=="Rose Pink") echo "selected";?>>Rose Pink</option>
			<option value = "Winter White" <?php if (isset($color) && $color=="Winter White") echo "selected";?>>Winter White</option>
			</select>
			<span class="error"> <?php echo $colorError;?></span>
			</p>			
			
			<p>Product features:<br>
			<label for="shortsleeves">
			<input type="checkbox" id="shortsleeves" name="features[]" value="Short Sleeves" <?php if (isset($features) && preg_match("/\bShort\b/", $features)) echo "checked";?>/>Short Sleeves +20$</label>
			
			<label for="detachablehood">
			<input type="checkbox" id="detachablehood" name="features[]" value="Detachable Hood" <?php if (isset($features) && preg_match("/\bHood\b/", $features)) echo "checked";?>/>Detachable Hood +20$</label>
			
			<label for="insidepocket">
			<input type="checkbox" id="insidepocket" name="features[]" value="Inside Pocket" <?php if (isset($features) && preg_match("/\bPocket\b/", $features)) echo "checked";?>/>Inside Pocket +20$</label>
			</p>
			
			<fieldset>
			<legend>Credit Card Details</legend>
			
				<p>
					<label for="type_cred">Credit Card Type:</label>
					<select name="type_cred" id="type_cred">
					<option value = "">Please Select</option>
					<option value = "Visa">Visa</option>
					<option value = "Mastercard">Mastercard</option>
					<option value = "American Express">American Express</option>
					</select>
					<span class="error"> <?php echo $type_credError;?></span>
				</p>
			
				<p>
				<label for="name_cred">Cardholder Name:</label>
				<input type="text" id="name_cred" name="name_cred"/>
				<span class="error"> <?php echo $name_credError;?></span>
				</p>
				
				<p>
				<label for="num_cred">Credit Card Number:</label>
				<input type="text" id="num_cred" name="num_cred"/>
				<span class="error"> <?php echo $num_credError;?></span>
				</p>
				
				<p>
				<label for="exp_cred">Credit Card Expiration Date:</label>
				<input type="text" id="exp_cred" name="exp_cred"/>
				<span class="error"> <?php echo $exp_credError;?></span>
				</p>
				
				<p>
				<label for="cvv_cred">Card Verification Value:</label>
				<input type="text" id="cvv_cred" name="cvv_cred"/>
				<span class="error"> <?php echo $cvv_credError;?></span>
				</p>
				
			</fieldset>

			<p>
			<label for="comments">Comments:</label>
			<br>
			<textarea id="comments" name="comments" rows="5" cols="40" value="<?php echo $comments;?>"></textarea>
			</p>

			<p>
			<input type= "submit" value="Check Out">
			</p>
			
			</form>
		  </div>
		</section>  
		
	<?php include_once('includes/footer.inc'); ?>
	<?php session_destroy(); ?>
	</body>
</html>