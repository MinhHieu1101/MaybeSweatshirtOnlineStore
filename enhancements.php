<!DOCTYPE html>
<html lang="en">
    <head>
		<?php $page_title = "Our Enhancements for Assignment 1"; ?>
		<?php include_once('includes/header.inc'); ?>
	</head>
	<body>
		<?php include_once('includes/menu.inc'); ?>
		
		<section>
	<div class="form_page">	
		<h1>All Enhancements on our website - Assignment 1</h1>
			<h3>Enhancement 1</h3>
				<p>Firstly, when you scroll down at the homepage, you will see two section: boutique & sweethearts.
				   For a better user experience, these sections are enabled to enlarge when user move the mouse around inside them.
				   This feature was created by using transition & transform which scale when hovering in css.
				<br>*Link to enhancement: </p>
				<a href="index.php">Home</a>
			
			<h3>Enhancement 2</h3>
				<p>Secondly, for better viewing, we used the display:flex & display: grid, grid-column,... to arrange each section and obtain a
				   balance between margins, paddings, gaps. You can see the example in the navigation bar and footer, 
				   banner section on homepage or the member list on "About Us" page.
				<br>*Link to enhancement: </p>
				<a href="index.php">Home</a>
				<a href="product.php">Products</a>
			
			<h3>Enhancement 3</h3>
				<p>Finally, when an user hovers on each product, a new layer with a different variant color of the product will slide up 
				   for the user to imagine more choices to buy, 
				   this feature works because we styled a background image so that it will appear on hovering the mouse.
				<br>*Link to enhancement: </p>
				<a href="product.php">Products</a>
    </div>
		</section>
		
		<?php include_once('includes/footer.inc'); ?>
	</body>
</html>


