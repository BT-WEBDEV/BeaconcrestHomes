<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
<?php

	charset_encode();

	$selected_property_id = (int)$_GET['id'];

	// Property details
	$property_info_list = list_property_info_wp($selected_property_id);
	$property_info = mysqli_fetch_assoc($property_info_list);
	$phone = preg_replace('/\D+/', '', $property_info["tel"]);
	// Property Gallery
	$property_info_gal = list_property_gallery_wp($selected_property_id);

	while($gallery_fetch = mysqli_fetch_assoc($property_info_gal)) {
		$prop_gallery[] = $gallery_fetch;
	}

	// while($com_feature = mysqli_fetch_assoc($community_features)) {
	// 	$community_features_1[] = $com_feature;
	// }
	// print_r($property_features);
	// echo sizeof($property_features);
	$image_path = "https://beaconcresthomes.com/cms_admin/wp-content/uploads/WPL/";
?>
<?php include '../includes/head.php'; ?>
<link rel="stylesheet" href="/css/stylesheets/lightbox.css">
</head>
<body>
<?php include '../includes/nav.php'; ?>

<div id="listing-map-div">
	<div id="map"></div>
</div>
<div class="container-fluid property-overlook">
	<div class="col-md-12">
		<div class="row card-wrap group-pad">
			<div class="col-md-4 property-thumb">
				<div class="fotorama" data-allowfullscreen="true" data-nav="thumbs" data-arrows="always">
					<?php
						foreach ($prop_gallery as $gal) {
						if($gal["item_type"]=="gallery") {
					?>
					<img src="<?php echo $image_path . $gal["parent_id"] . '/'.$gal["item_name"]; ?>">
				  	<?php }
					else if($gal["item_type"]=="attachment") {
						$floorplan = $gal["item_name"];
					} } ?>
				</div>
				<?php
					if(isset($property_info["name"])) {
					echo check_special($property_info["name"]);
				} ?>
			</div>

			<div class="col-md-8 property-details">
				<div class="button-group floor-plan-bu">
					<!-- Virtual tour link -->
					<?php if($property_info["field_313"] == "Langley") { ?>
						<a href="http://spws.homevisit.com/hvid/281213" class="button bu-olive" target="_blank">Virtual Tour</a>
					<?php } ?>
					
					<?php if($floorplan) { ?>
					<a href="<?php echo $image_path . $selected_property_id ."/". $floorplan; ?>" class="button bu-olive" target="_blank">Floor plan</a>	
					<?php } ?>
				</div>
				
				<div class="home-specs">
					<h2><?php echo $property_info["field_313"]; ?></h2>
					<div>
						<p>
						<?php echo $property_info["bedrooms"] . " Bedrooms, " . $property_info["bathrooms"] . " Bathrooms"; ?>
						</p>
						<p><?php 
						if($property_info["price"] != 0 ) {
							echo "Price: ", $property_info["price"];
						}
						if($property_info["living_area"] != 0) {
							echo " | Sq. Ft: ", number_format($property_info["living_area"]);
						}
						if($property_info["lot_area"] != 0) {
						echo " | Lot Area: ", $property_info["lot_area"];
						}
						?></p>
					</div>
					<h3><?php echo $property_info["location_text"]; ?></h3>
				</div>

				<p class="contact-line">
<span class="bold">Contact:</span> 
<span class="contact-line-style"><?php echo $property_info["first_name"]; ?> <?php echo $property_info["last_name"]; ?></span> | 
<a class="prop-link" href="tel:<?php echo $phone; ?>"><?php echo $property_info["tel"]; ?></a> | 
<a class="prop-link" href="mailto:<?php echo $property_info["main_email"]; ?>"><?php echo $property_info["main_email"]; ?></a>
				</p>

				<div class="email-desc-toggle">
					<a class="prop-link" id="toggle-desc" href="javascript:void(0)">&lt; Description</a>
					<a class="prop-link" id="toggle-email" href="javascript:void(0)">Email Us &gt;</a>
				</div>
				<div id="property-email">
					<h1 style="text-align: center;" class="result"></h1>
					<form id="contact_form" method="post" name="sign-up-form" class="property-form">
						<div class="input-inline">
							<label class="label">Name:</label>
							<input type="text" name="full-name" required="">
						</div>
						<div class="input-inline">
							<label class="label">Email:</label>
							<input type="text" name="email" required="">
						</div>
						<label class="label">Comments:</label>
						<textarea name="comment" type="text"></textarea>
						<input type="hidden" name="emailTo" value="<?php echo $property_info["main_email"]; ?>">
						<input type="hidden" name="nameTo" value="<?php echo $property_info["first_name"]; ?> <?php echo $property_info["last_name"]; ?>">
						<input type="hidden" name="phone" value="No Phone">
						<!-- <div>
							<label class="label" style="width: 10%; display: inline-block;">Captcha:</label>
							<input type="text" style="width: 20%; display: inline-block;" name="captcha">
						</div> -->
						<input id="button" class="button bu-dark-blue" type="submit" name="submit" value="Submit">
					</form>
				</div><!--end property-email -->
				<div id="property-description"> 
<?php echo nl2br($property_info["field_308"]); ?>
				</div>
			</div><!-- end 8 col -->

<!-- 			<div class="col-sm-12 features">
				<h5>Property Features</h5>
				<ul class="force-columns" id="property-features">
<?php
foreach($property_features_1 as $pfeature) {
	echo "<li>" . $pfeature["title"] . "</li>";
}
?>
				</ul>
			</div> -->

<!-- 			<div class="col-sm-12 features">
				<h5>Community Features</h5>
				<ul class="force-columns" id="community-features">
<?php 
foreach($community_features_1 as $cfeature) {
	echo "<li>" . $cfeature['title'] . "</li>";
}
?>
				</ul>
			</div> -->

		</div>
	</div>
</div>

<?php //mysqli_free_result($features_list); ?>
<?php mysqli_free_result($property_info_list); ?>

<?php include '../includes/footer.php'; ?>
<!-- GOOGLE MAPS -->
<script>
function initMap() {
	var map = document.getElementById('map');
	var lat = '<?php echo $property_info["googlemap_lt"]; ?>';
	var lng = '<?php echo $property_info["googlemap_ln"]; ?>';
	lat = Number(lat);
	lng = Number(lng);
	if ((lat != 0) && (lng != 0)) {
		var myLatLng = {lat: lat, lng: lng};
		map = new google.maps.Map(map, {
			center: myLatLng,
			scrollwheel: false,
			zoom: 15
		});

		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map
		});
	}
	else {
		map.className = 'no-map-coords';
	}
}
</script>
<script src="/js/lightbox.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_OqoUjBSb9m4CCjhDHbULJm4LCEz8Bas&callback=initMap"
async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
</body>
</html>