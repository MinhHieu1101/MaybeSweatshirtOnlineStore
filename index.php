<!DOCTYPE html>
<html lang="en">
    <head>
		<?php $page_title = "Maybe Boutique"; ?>
		<?php include_once('includes/header.inc'); ?>
    </head>
    <body>
		<?php include_once('includes/menu.inc'); ?>
        <main>
            <section class="index">
                <div class="index_container grid_layout">
                    <div class="index_frame">
                        <h1 class="index_banner">MEN <br><span>FASHION</span></h1>
                        <a href="product.php" class="button">SHOPPING NOW</a>
                    </div>
						<img src="images/home.png" class="index_img" alt="Main Model">
				</div>
            </section>

            <section>
                <div class="banner_container grid_layout">
                    <div class="banner_group">
                        <img src="images/man_left.png" alt="Left Side Model" class="banner_img">

                        <div>
							<h2 class="banner_banner">Maybe Boutique</h2>
                            <a href="about.php" class="banner_link">Read More About Us</a>
                        </div>
						
                    </div>
					
                    <div class="banner_group">
                        <div>
                            <h2 class="banner_banner">Men's SWEATSHIRTS</h2>
							<a href="https://youtu.be/OIlAjw9mBEc" class="banner_link" target="_blank">Watch Our Website Origin</a><br>
							<a href="https://youtu.be/6SaQhSykAeo" class="banner_link" target="_blank">Watch Our Website Further Development</a>
                        </div>
						<img src="images/man_right.png" alt="Right Side Model" class="banner_img">
                    </div>
                </div>
            </section>
        </main>
		<?php include_once('includes/footer.inc'); ?>
    </body>
</html>