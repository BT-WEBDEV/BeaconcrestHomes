<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php

	$page_id = (int)$_GET["id"];

	$gallery_list = show_gallery_images($page_id);

	while ($galleries_fetch = mysqli_fetch_assoc($gallery_list)) { 
		 $galleries[] = $galleries_fetch;
	}

	$image_path = "https://beaconcresthomes.com/cms_admin";

?>

<?php include '../includes/head.php'; ?>
<link rel='stylesheet' href='../css/unite-gallery.css'>
</head>
<body>

<?php include '../includes/nav.php'; ?>

<article class="container">
	<div class="row page-head align-c group-pad" id="available-homes-head">
		<div class="col-lg-12">
			<h2>Portfolio</h2>
			<h4><?php echo ucwords($galleries[0]['title']); ?></h4>
		</div>
	</div>
</article>

<div class="container-fluid">
	<div class="row" id="gallery" style="display: none;">
		<?php foreach ($galleries as $gallery) { ?>
		<a href="javascript:void(0)">
			<img alt=""
				src="<?php echo $image_path . $gallery['path'] . $gallery['filename']; ?>"
				data-image="<?php echo $image_path . $gallery['path'] . $gallery['filename']; ?>"
				data-description=""
				style="display:none">
		</a>
		<?php } ?>
	</div>
</div>
<?php include("../includes/footer.php"); ?>
<!-- UNCOMMENT AND USE ONLY HERE IF ERRORS -->
<!-- <script src='../js/unitegallery.min.js'></script>
<script src='../js/ug-theme-tiles.js'></script> -->
<script type="text/javascript">
$(document).ready(function(){
	$("#gallery").unitegallery({
		tiles_type:"nested",
		tiles_nested_optimal_tile_width: 350,
	});
});
</script>
</body>
</html>