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
				<div>
					Thanks
				</div>
			</article>
		</div>
	</div>
</div>

<?php include '../includes/footer.php'; ?>
<!-- GOOGLE MAPS -->
<script>
// INFO WINDOW
//https://developers.google.com/maps/documentation/javascript/infowindows
function initMap() {
	var myLatLng = {lat: 38.991196, lng: -77.104374};
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 15,
		center: myLatLng
	});

	var contentString = '<div id="content">'+
							'<p class="firstHeading">BeaconCrest Homes</p>'+
							'<div id="bodyContent">'+
								'<p>Lorem Ipsum dolar sit amet</p>'+
								'<a href="">Get Directions</a>'+
							'</div>'+
						'</div>';

	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});

	var marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
	});
	marker.addListener('click', function() {
		infowindow.open(map, marker);
	});
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJBq4B-QcqJvSF3bEojj4w6OCZLc8Bt-A&callback=initMap"
async defer></script>
</body>
</html>