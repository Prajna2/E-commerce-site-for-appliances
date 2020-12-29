<?php
$con = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
mysqli_select_db($con, 'miniproject') or die("cannot select DB");
$query = mysqli_query($con, "SELECT * FROM products WHERE pid='16'");
$numrows = mysqli_num_rows($query);
if ($numrows != 0) {
	while ($row = mysqli_fetch_assoc($query)) {
		$name = $row['name'];
		$code = $row['code'];
		$pid = $row['pid'];

		$price = $row['price'];
		$availability = $row['availability'];
		$cond = $row['cond'];
		$brand = $row['brand'];
		$shipperid = $row['shipper-id'];
		$shipperphone = $row['shipper-phone'];
		$description = $row['description'];
		$img1 = $row['img1'];
		$img2 = $row['img2'];
		$img3 = $row['img3'];
	}
}
?>
<html>

<head>
	<title>E-Commerce website Single Product</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background-color:	#F0F8FF;">
	<div class="top-nav-bar">
		<div class="search-box">
			<i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
			<i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>
			<a href="proj.html"><img src="logo.png" class="logo"></a>
			<input type="text" class="form-control">
			<span class="input-group-text"><i class="fa fa-search"></i></span>


		</div>
		<div class="menu-bar">
			<ul>
				<li><a href="cart.html"><i class="fa fa-shopping-basket"></i>CART</a></li>
				<li><a href="Registration.php">SIGN UP</a></li>
				<li><a href="#">LOGIN</a></li>
			</ul>
		</div>
	</div>

	<!------------------Single Product-------------------------------->
	<section class="single-product">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div id="product-slider" class="carousel slide carousel-fade" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="<?php echo $img1 ?>" class="d-block" width="470" height="525">
							</div>
							<div class="carousel-item">
								<img src="<?php echo $img2 ?>" class="d-block" width="500" height="525">
							</div>
							<div class="carousel-item">
								<img src="<?php echo $img3 ?>" class="d-block" width="500" height="525">
							</div>
							<a class="carousel-control-prev" href="#product-slider" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#product-slider" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>

				<div class="col-md-7">
					<p class="new-arrival text-center">NEW</p>
					<h2 style="color:black;"><b><?php echo $name ?></h2>
					<p><b>Product Code: <?php echo $code ?></p>

					<i class="fa fa-star" style="background-color: gold;"></i>
					<i class="fa fa-star" style="background-color: gold;"></i>
					<i class="fa fa-star" style="background-color: gold;"></i>
					<i class="fa fa-star" style="background-color: gold;"></i>
					<i class="fa fa-star-half-o" style="background-color: gold;"></i>
					<p class="price"><?php echo $price ?></p>
					<p><b>Availability: <?php echo $availability ?></p>
					<p><b>Condition: <?php echo $cond ?></p>
					<p><b>Brand: <?php echo $brand ?></p>
					<p><b>Shipper Details: ID:<?php echo $shipperid ?> <b> Phone no : <?php echo $shipperphone ?></p>
					<label><b>Quantity: </label>
					<input type="text" value="1">
					<form action="cart.php" method="post">
						<?php
						$name = str_replace(' ', '_', $name);

						?>
						<input type="hidden" name="name" value=<?php echo $name ?>>
						<input type="hidden" name="pid" value=<?php echo $pid ?>>
						<a href="cart.html"><button type="submit" style="margin: 20px;" class="btn btn-primary"> Add To Cart</button></a>

					</form>
					<button style="padding-left: 22px; padding-right:22px" type="button" class="btn btn-primary"> Buy Now</button> <br><br>
				</div>
			</div>
		</div>
	</section>

	<!------------------product-description------------------------------->
	<section class="product-description">
		<div class="container">
			<h6 style="font-weight: 900;font-size: larger;"><b>Product Description </h6>
			<p style="color:black;font-size: medium;"><b>
					<?php echo $description ?>
			</p>
			<hr>
		</div>
	</section>

	<!------------------footer-------------------------->
	<section class="footer">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-3">
					<h1>Useful Links</h1>
					<p>Privacy Policy</p>
					<p>Terms of Use</p>
					<p>Return Policy </p>
					<p>Discount Coupons</p>
				</div>

				<div class="col-md-3">
					<h1>Company</h1>
					<p>About Us</p>
					<p>Contact Us</p>
					<p>Career </p>
					<p>Affiliate</p>
				</div>

				<div class="col-md-3">
					<h1>Follow Us On</h1>
					<p><i class="fa fa-facebook-official"></i>Facebook</p>
					<p><i class="fa fa-youtube-play"></i>YouTube</p>
					<p><i class="fa fa-linkedin"></i>Linkedin </p>
					<p><i class="fa fa-twitter"></i>Twitter</p>
				</div>

				<div class="col-md-3 footer-image">
					<h1>Download App</h1>
					<img src="appstore.png">

				</div>
			</div>
			<hr>
			<p class="copyright">Made for minipoject<i class="fa fa-heart-o"></i> by Prajna,Reena,Gavin</p>
		</div>

	</section>

	<script>
		function openmenu() {
			document.getElementById("side-menu").style.display = "block";
			document.getElementById("menu-btn").style.display = "none";
			document.getElementById("close-btn").style.display = "block";


		}

		function closemenu() {
			document.getElementById("side-menu").style.display = "none";
			document.getElementById("menu-btn").style.display = "block";
			document.getElementById("close-btn").style.display = "none";


		}
	</script>
</body>

</html>