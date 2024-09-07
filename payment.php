<!DOCTYPE html>
<html lang="en">
    <head>
		<?php $page_title = "Product Payment Form"; ?>
		<?php include_once('includes/header.inc'); ?>
    </head>
	<body>
		<?php include_once('includes/menu.inc'); ?>
		
		<section>
		  <div class="form_page">
		    <h1 class="big_title">Cozy Purchase</h1>
			<form method="post" action="process_order.php" novalidate="novalidate">
			<p>
			<label for="firstname">First name:</label>
			<input type="text" id="firstname" name="firstname"/>
			</p>

			<p>
			<label for="lastname">Last name:</label>
			<input type="text" id="lastname" name="lastname"/>
			</p>

			<p>
			<label for="emailaddress">Email address:</label>
			<input type="email" id="emailaddress" name="emailaddress" placeholder="scovis@gmail.com"/>
			</p>

			<fieldset>
			<legend>Address</legend>	
				<p>
				<label for="streetaddress">Street address:</label>
				<input type="text" id="streetaddress" name="streetaddress"/>
				</p>

				<p>
				<label for="suburbtown">Suburb/Town:</label>
				<input type="text" id="suburbtown" name="suburbtown"/>
				</p>

				<p>
				<label for="state">State:</label>
				<select name="state" id="state">
				<option value = "">Please Select</option>	
				<option value = "VIC">VIC</option>
				<option value = "NSW">NSW</option>
				<option value = "QLD">QLD</option>
				<option value = "NT">NT</option>
				<option value = "WA">WA</option>
				<option value = "SA">SA</option>
				<option value = "TAS">TAS</option>
				<option value = "ACT">ACT</option>
				</select>
				</p>

				<p>
				<label for="postcode">Postcode:</label>
				<input type="text" id="postcode" name="postcode" placeholder="0000"/>
				</p>
			</fieldset>

			<p>
			<label for="phonenumber">Phone number:</label>
			<input type="text" id="phonenumber" name="phonenumber" placeholder="0000000000"/>
			</p>

			<p>Preferred contact: <br>
			<label for="email">Email</label>
			<input type="radio" id="email" name="contact" value="Email">	
			
			<label for="post">Post</label>
			<input type="radio" id="post" name="contact" value="Post">	
			
			<label for="phone">Phone</label>
			<input type="radio" id="phone" name="contact" value="Phone">	
			</p>

			<p>
			<label for="product">Product:</label>
			<select name="product" id="product">
			<option value = "">Please Select</option>
			<option value = "Poor College Kid">Poor College Kid - 20$</option>
			<option value = "Basic Alpha Male">Basic Alpha Male - 60$</option>
			<option value = "Toxic Playboy">Toxic Playboy - 200$</option>
			</select>
			</p>
			
			<p>
			<label for="quantity">Desired quantity:</label>
			<input type="text" id="quantity" name="quantity"/>
			</p>
			
			<p>
			<label for="color">Preferred color:</label>
			<select name="color" id="color">
			<option value = "">Please Select</option>
			<option value = "Rich Black">Rich Black</option>
			<option value = "Rose Pink">Rose Pink</option>
			<option value = "Winter White">Winter White</option>
			</select>
			</p>			
			
			<p>Product features:<br>
			<label for="shortsleeves">
			<input type="checkbox" id="shortsleeves" name="features[]" value="Short Sleeves"/>Short Sleeves +20$</label>
			
			<label for="detachablehood">
			<input type="checkbox" id="detachablehood" name="features[]" value="Detachable Hood"/>Detachable Hood +20$</label>
			
			<label for="insidepocket">
			<input type="checkbox" id="insidepocket" name="features[]" value="Inside Pocket"/>Inside Pocket +20$</label>
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
				</p>
			
				<p>
				<label for="name_cred">Cardholder Name:</label>
				<input type="text" id="name_cred" name="name_cred" placeholder="ADELE"/>
				</p>
				
				<p>
				<label for="num_cred">Credit Card Number:</label>
				<input type="text" id="num_cred" name="num_cred" placeholder="0000111122223333"/>
				</p>
				
				<p>
				<label for="exp_cred">Credit Card Expiration Date:</label>
				<input type="text" id="exp_cred" name="exp_cred" placeholder="MM-YY"/>
				</p>
				
				<p>
				<label for="cvv_cred">Card Verification Value:</label>
				<input type="text" id="cvv_cred" name="cvv_cred" placeholder="XXX"/>
				</p>
				
			</fieldset>

			<p>
			<label for="comments">Comments:</label>
			<br>
			<textarea id="comments" name="comments" rows="5" cols="40" placeholder="Please give us your thoughts!"></textarea>
			</p>

			<p>
			<input type= "submit" value="Check Out">
			<input type= "reset" value="Reset">
			</p>
			
			</form>
		  </div>
		</section>  
		
		<?php include_once('includes/footer.inc'); ?>
	</body>
</html>