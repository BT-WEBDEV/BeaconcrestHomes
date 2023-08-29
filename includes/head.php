<?php
	include("seo_insert.php");
	$seo_data = get_seo_data($seo_path);	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title><?php echo $seo_data['titleTag']; ?></title>

	<meta name="description" content="<?php echo $seo_data['MetaDescription']; ?>" />
	<?php if($seo_data['keywords'] != "") { ?>
	<meta name="keywords" content="<?php echo $seo_data['keywords']; ?>" />
	<?php } ?>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">

	<link rel="stylesheet" href="/css/stylesheets/styles.css">
	<link rel="stylesheet" href="/css/stylesheets/unite-gallery.css">
	<link rel="stylesheet" href="/css/stylesheets/lightbox.css">

	<link rel="icon" type="image/png" href="/images/favicon-192x192.png" sizes="192x192">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130442624-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-130442624-1');
	</script>

