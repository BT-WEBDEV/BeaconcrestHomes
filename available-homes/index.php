<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
	$selected_state = (string)$_GET['id'];

	$state_properties = list_state_properties_wp($selected_state); 
	while ($state_properties_fetch = mysqli_fetch_assoc($state_properties)) {
		$properties[] = $state_properties_fetch;
	}
	$image_path = "https://beaconcresthomes.com/cms_admin/wp-content/uploads/WPL/";
 ?>

<?php include '../includes/head.php'; ?>
</head>
<body>
<?php include '../includes/nav.php'; ?>

<article class="container">
	<div class="row page-head align-c group-pad" id="available-homes-head">
		<div class="col-lg-12">
			<h2>AVAILABLE HOMES</h2>
			<h4><?php echo spell_state($selected_state); ?></h4>
		</div>
	</div>
</article>

<div class="container-fluid">
	<div class="row cards-group group-pad light-olive-bg">
		
		<?php foreach ($properties as $property) { 
			switch ($property["location2_name"]) {
				case "Maryland" : $state = "MD"; break;
				case "Virginia" : $state = "VA"; break;
				case "District Of Columbia" : $state = "DC"; break;
			}
			?>
		<div class="col-sm-6 col-md-4 col-xlg-3 property-cards">
			<div class="card-wrapper">
				<div class="card-head">
					<a href="property.php?id=<?php echo urlencode($property["id"]) ?>">
						<h3><?php echo $property["field_313"]; ?></h3>
						<p><?php echo $property["street_no"]," ",$property["field_42"], ", ",$property["location4_name"],", ",$state; ?></p>
					</a>
				</div>
				<a href="property.php?id=<?php echo urlencode($property["id"]) ?>">
					<div class="card-image" style="background-image: url(<?php echo $image_path . $property["id"] . '/'.$property["item_name"]; ?>);">
						<?php 
						if(isset($property["name"])) {
							echo check_special($property["name"]);
						}
						?>
					</div>
				</a>
				<!-- <div class="card-details">
					<p>
<?php //echo $property["address_1"] . "<br>" . $property["address_city"] . ", " . $property["address_state"] . "<br>"; ?>
					</p>
					<p class="bold">
<?php //echo $property["bedrooms"] . " BD | " . $property["bathrooms"] . " BA"; ?>
					</p>
				</div> -->
			</div>
		</div>
		<?php } ?>

	</div>
</div>
<?php mysqli_free_result($state_properties); ?>

<?php include '../includes/footer.php'; ?>
</body>
</html>