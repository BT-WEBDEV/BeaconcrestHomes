<?php 
// console log function

		function console_log($output, $with_script_tags = true) {
		    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
		    if ($with_script_tags) {
		        $js_code = '<script>' . $js_code . '</script>';
		    }
		    echo $js_code;
		}



$seo_path = explode("/", $_SERVER['REQUEST_URI']);
$seo_path = $seo_path[1];
$state = "";
if ($_GET['id'] and $seo_path == "available-homes") {
	$state = $_GET['id'];
}

//var_dump($seo_path);

function get_seo_data($seo_path) {
	global $state;
	
	$seo_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/data/seo_data.json";
	$seo_json = file_get_contents($seo_url);
	$data = json_decode($seo_json,true);

	foreach ($data['seo_contents'] as $value) {
		if($value['url'] == $seo_path) {
			if ($state != "") {
				foreach ($value['sub-url'] as $val) {
					if ($val['state'] == $state ) {
						$seo_data = $val;
					}
				}
			} else {
				$seo_data = $value;
			}			
		}
	}

	return $seo_data;
}

?>