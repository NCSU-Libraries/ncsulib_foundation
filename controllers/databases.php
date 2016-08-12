<?php

	/**
	 * Implements theme_field()
	 *
	 * Databases url
	 */
	function ncsulib_foundation_field__field_database_url__databases($variables){
	  	$url = $variables['items'][0]['#markup'];
	  	$output = '<br><p><a href="'.$url.'" class="styled button">View Database</a></p>';

	  	return $output;
	}
?>
