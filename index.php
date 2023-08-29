<?php include "includes/head.php"; ?>
</head>
<body>
<header>
	<div class="container-fluid">
		<div class="row">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				    <div class="item">
				        <img src="images/home-slider/slider-1.jpg" data-color="lightblue" alt="First Image">
				    </div>
				    <div class="item">
				        <img src="images/home-slider/slider-2.jpg" data-color="firebrick" alt="Second Image">
				    </div>
				    <div class="item">
				        <img src="images/home-slider/slider-3.jpg" data-color="violet" alt="Third Image">
				    </div>
				    <div class="item">
				        <img src="images/home-slider/slider-4.jpg" data-color="lightgreen" alt="Fourth Image">
				    </div>
				    <div class="item">
				        <img src="images/home-slider/slider-5.jpg" data-color="tomato" alt="Fifth Image">
				    </div>
				    <div class="item">
				        <img src="images/home-slider/slider-6.jpg" data-color="tomato" alt="Sixth Image">
				    </div>
				    <div class="item">
				        <img src="images/home-slider/slider-7.jpg" data-color="tomato" alt="Seventh Image">
				    </div>
				    <!-- <div class="item">
				        <img src="images/home-slider/slider-8.jpg" data-color="tomato" alt="Fifth Image">
				    </div> -->
				  </div>
				<!-- Carousel nav -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</header>
<div id="home_page">
<?php include "includes/nav.php"; ?>
</div>
<article class="container">
	<div class="row group-pad align-c" id="home-head">
		<div class="col-lg-12">
			<p>
BeaconCrest Homes builds exceptional residences throughout the D.C. Metro Area.  Trust our experience to craft a home that is uniquely yours.
			</p>
		</div>
	</div>
</article>

<div class="container-fluid">
	<article class="row text-image-combo" id="available-homes-combo">
		<section class="col-sm-12 col-md-6 combo-image">
			<!-- CSS BG IMG -->
		</section>
		<section class="col-sm-12 col-md-6 combo-text group-pad align-r olive-bg">
			<h2>AVAILABLE HOMES</h2>
			<p>
<!-- Take a look at our finely crafted homes currently on the market. -->
			</p>
			<div class="button-group">
				<a href="/available-homes/index.php?id=MD" class="button bu-white">Maryland/DC</a>
				<a href="/available-homes/index.php?id=VA" class="button bu-white">Virginia</a>
			</div>
		</section>
	</article>
</div>

<div class="container-fluid">
	<article class="row text-image-combo" id="contact-combo">
		<!-- CSS FULL WIDTH BG IMG -->
		<section class="col-sm-12 col-md-5 combo-text group-pad">
			<h2>CONTACT US</h2>
<a href="tel:7033422020">703 342 2020</a><br>
<a href="mailto:info@beaconcresthomes.com">info@beaconcresthomes.com</a>
			</p>
			<div class="button-group">
				<a href="/contact-us/index.php" class="button bu-light-blue">Get in Touch</a>
			</div>
		</section>
	</article>
</div>


<?php include "includes/footer.php"; ?>
</body>
</html>