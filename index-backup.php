<?php include "includes/head.php"; ?>
</head>
<body>
<header>
	<div class="container-fluid">
		<div class="row">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Carousel items -->
				<div class="carousel-inner">
					<div class="active item">
						<img src="images/home-slider/39A-Living-Room-2-FULL.jpg">
					</div>
					<!-- <div class="item">
						<img src="images/home-slider/1905-Foxhall-Circle-Hi-Res-(21)-FULL.jpg">
					</div> -->
				</div>
				<!-- Carousel nav -->
				<a class="carousel-control left" href="#myCarousel" data-slide="prev"><p>&lt;</p></a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next"><p>&gt;</p></a>
				<!-- <a class="carousel-control left" href="#myCarousel" data-slide="prev"><img src="images/home-slider/controls/prev-bu.png"></a> -->
				<!-- <a class="carousel-control right" href="#myCarousel" data-slide="next"><img src="images/home-slider/controls/next-bu.png"></a> -->
			</div>
		</div>
	</div>
</header>

<?php include "includes/nav.php"; ?>
<article class="container">
	<div class="row group-pad align-c" id="home-head">
		<div class="col-lg-12">
			<p>
BeaconCrest Homes is a regional homebuilding company specializing in high-end infill residential development. We concentrate on the cities of Washington D.C., Arlington, Alexandria, Falls Church, Bethesda, and Potomac. We take pride in our client-focused approach to building the home that is uniquely yours.
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
Take a look at our finely crafted homes currently on the market.
			</p>
			<div class="button-group">
				<a href="/available-homes/index.php?id=MD" class="button bu-white">Maryland</a>
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
<script>
$('.carousel').carousel({
  interval: 4000,
  pause: "false"
})
</script>
</body>
</html>