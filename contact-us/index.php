<?php include '../includes/head.php'; ?>
</head>
<body>

<?php include '../includes/nav.php'; ?>

<div class="container-fluid" id="contact-page">
	<div class="row">
		<div class="col-md-6" id="contact-map-div" style="background-image: url(images/contact-bg.jpg);">
			<!-- <div id="map"></div> -->
		</div>

		<div class="col-md-6" id="contact-content">
			<section class="group-pad light-blue-bg" id="contact-head">
				<h2>Contact Us</h2>
				<p>
Register with BeaconCrest Homes to receive advance notice about our new custom home opportunities. This entitles you to valuable information available only to our Internet registrants, including notifications of special incentives, open houses and events.
				</p>
				<p class="phone-icon"><a href="tel:7033422020">(703) 342-2020</a></p>
				<p class="email-icon"><a href="mailto:info@beaconcresthomes.com">info@beaconcresthomes.com</a></p>
			</section>

			<article class="contact-form">
				<p>Use the form below to get in touch!</p>
				<h1 style="text-align: center;" class="result"></h1>
				<form id="contact_form" method="post" name="sign-up-form">
					<input type="text" name="full-name" placeholder="Full Name" required="">
					<input type="text" name="email" placeholder="Email" required="">
					<input type="text" name="phone" placeholder="Phone" required="">
					<input type="text" name="comment" placeholder="Message" required="">
					<!-- <input type="text" name="captcha" placeholder="Code"> -->
					<input id="button" class="button bu-dark-blue" type="submit" name="submit" value="Submit">
				</form>
			</article>
		</div>
	</div>
</div>

<?php include '../includes/footer.php'; ?>
</body>
</html>