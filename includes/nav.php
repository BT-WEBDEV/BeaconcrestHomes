<?php 	require_once("db_connection.php");
		require_once("functions.php");
?>

<?php
$gallery_list = list_portfolio_galleries_in_nav();
while ($gallery_fetch = mysqli_fetch_assoc($gallery_list)) {
	$galleries_name[] = $gallery_fetch;
}
?>

<nav id="nav" class="navbar navbar-default navbar-static">
	<div class="container-fluid">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">
				<img id="nav-logo" src="/images/logos/beacon-crest-logo.png" alt="Beacon Crest" title="">
			</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="/available-homes/index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Available Homes<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/available-homes/index.php?id=MD">Maryland/DC</a></li>
						<li><a href="/available-homes/index.php?id=VA">Virginia</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="/portfolio/index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Portfolio<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<?php foreach($galleries_name as $gallery) { ?>
							<li><a href="/portfolio/gallery.php?id=<?php echo $gallery['gid'] ?>"><?php echo $gallery['title']; ?></a></li>
						<?php } ?>
					</ul>
				</li>
				<li><a href="/beaconcrestcares/">BeaconCrest CAREs</a></li>
				<li><a href="/build-on-your-lot/">On Your Lot</a></li>
				<li><a href="/webuyhomes/">We Buy Homes</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/about-us/">Our Team</a></li>
						<li><a href="/our-process/">Our Process</a></li>
					</ul>
				</li>
				<li><a href="/careers/">Careers</a></li>
				<li><a href="/contact-us/">Contact</a></li>
			</ul>
		</div>

	</div>
</nav>

<?php
mysqli_free_result($gallery_list);
mysqli_close($connection);
?>