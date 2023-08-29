<?php
	function charset_encode() {
		global $connection;

		if (!mysqli_set_charset($connection, "utf8")) {
			mysqli_error($connection);
			exit();
		} else {
			mysqli_character_set_name($connection);
		}
	}

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

	function list_portfolio_galleries_in_nav() {
		global $connection;

		$query  = "SELECT * ";
		$query .= "FROM wp_ngg_gallery ";
		$query .= "ORDER BY sortorder ASC";
		$gallery_list = mysqli_query($connection, $query);
		confirm_query($gallery_list);
		return $gallery_list;
	}

	function list_state_properties_wp($location) {
		switch ($location) {
			case "MD" : $location = "Maryland"; break;
			case "VA" : $location = "Virginia"; break;
		}
		global $connection;

		$query_wp = "SELECT prop.id, prop.field_313, prop.location_text, item.item_name, types.name, prop.street_no, prop.field_42, prop.location4_name, prop.location2_name ";
		$query_wp .= "FROM wp_wpl_properties AS prop ";
		$query_wp .= "INNER JOIN wp_wpl_items AS item ";
		$query_wp .= "ON item.parent_id = prop.id ";
		$query_wp .= "INNER JOIN wp_wpl_listing_types AS types ";
		$query_wp .= "ON types.id = prop.listing ";

		if($location == "Virginia") {
		$query_wp .= "WHERE prop.location2_name = '$location' AND prop.finalized = 1 AND prop.confirmed = 1 AND item.item_type = 'gallery'";
		} 	
		else if ($location == "Maryland") {
		$query_wp .= "WHERE (prop.location2_name = '$location' OR prop.location2_name = 'District Of Columbia') AND prop.finalized = 1 AND prop.confirmed = 1 AND prop.deleted = 0 AND item.item_type = 'gallery'";
		}

		$query_wp .= "GROUP BY prop.id ORDER BY prop.sortorder";
		$state_properties_wp = mysqli_query($connection, $query_wp);

		confirm_query($state_properties_wp);
		return $state_properties_wp;

	}



	function spell_state($location) {
		switch ($location) {
			case "MD" : $location = "Maryland/DC"; break;
			case "VA" : $location = "Virginia"; break;
		}
		return $location;
	}

	function check_special($special) {
		global $image;

		switch($special) {
			case "Available" :
				$image = null;
				break;
			case "Premium" :
				$image = "<img class=\"special\" src=\"images/special/speciaL-premium.png\" alt=\"\" title=\"\">";
				break;
			case "Immedaite Deliver" :
				$image = "<img class=\"special\" src=\"images/special/deli-banner.png\" alt=\"\" title=\"\">";
				break;
			case "Sold" :
				$image = "<img class=\"special\" src=\"images/special/sold-banner.png\" alt=\"\" title=\"\">";
				break;
			case "Under Offer" :
				$image = "<img class=\"special\" src=\"images/special/speciaL-underoffer.png\" alt=\"\" title=\"\">";
				break;
			case "Under Contract" :
				$image = "<img class=\"special\" src=\"images/special/speciaL-undercontact.png\" alt=\"\" title=\"\">";
				break;
			case "Model" :
				$image = "<img class=\"special\" src=\"images/special/speciaL-model.png\" alt=\"\" title=\"\">";
				break;
			default :
				$image = null;
				break;
		}
		return $image;
	}

	function list_property_info_wp($property_id) {
		global $connection;

		$query  = "SELECT prop.id, prop.field_313, prop.bedrooms, prop.bathrooms, prop.location_text, prop.field_308, types.name, prop.googlemap_lt, prop.googlemap_ln, user.main_email, user.first_name, user.last_name, user.tel, prop.price, prop.living_area, prop.lot_area ";
		$query .= "FROM wp_wpl_properties AS prop ";
		$query .= "INNER JOIN wp_wpl_listing_types AS types ";
		$query .= "ON types.id = prop.listing ";
		$query .= "INNER JOIN wp_wpl_users AS user ";
		$query .= "ON user.id = prop.user_id ";
		$query .= "WHERE prop.id = '$property_id'";

		$property_info = mysqli_query($connection, $query);
		confirm_query($property_info);
		return $property_info;
	}

	function list_property_gallery_wp($property_id) {
		global $connection;
		$query  = "SELECT * ";
		$query .= "FROM wp_wpl_items ";
		$query .= "WHERE wp_wpl_items.parent_id = '$property_id' ";
		$query .= "ORDER BY wp_wpl_items.index";
		
		$property_gallery = mysqli_query($connection, $query);
		confirm_query($property_gallery);
		return $property_gallery;

	}


	function list_property_features($property_id, $category) {
		global $connection;

		$query  = "SELECT * FROM BeaconCrestpropertylisting_properties_features AS pf ";
		$query .= "JOIN BeaconCrestpropertylisting_features AS f ";
		$query .= "ON pf.feature_id = f.id ";
		$query .= "WHERE pf.property_id = $property_id ";
		$query .= "AND f.category_id = $category";
		$features = mysqli_query($connection, $query);
		confirm_query($features);
		return $features;
	}

	function show_gallery_images($gallery) {
		global $connection;

		$query = "SELECT * FROM wp_ngg_pictures AS img ";
		$query .= "JOIN wp_ngg_gallery AS gal ";
		$query .= "ON img.galleryid = gal.gid ";
		$query .= "WHERE img.galleryid = '$gallery' ";
		$query .= "ORDER BY img.sortorder";
		$galleries = mysqli_query($connection, $query);
		confirm_query($galleries);
		return $galleries;
	}
?>