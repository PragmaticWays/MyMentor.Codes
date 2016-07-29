<?php

// URL Format
function urlFormat($str) {
	
	// Replace space with - for SEO purposes
	$str = str_replace(' ', '-', $str);
	
	// String out whitespace
	$str = preg_replace('/\s*/', '', $str);
	
	// Convert string to all lowercase
	$str = strtolower($str);
	
	// URL Encode
	$str = urlencode($str);
	
	return $str;
}

function urlUnformat($str) {
	$str = str_replace('-', ' ', $str);
	return $str;
}

// Date Format
function formatDate($date) {
	$date = date("F j, Y | g:i a", strtotime($date));
	return $date;
}

function is_active($category) {
	if (isset($_GET['category'])) {
		if ($_GET['category'] == $category) {
			return 'active';
		} else {
			return "";
		}
	} else {
		if ($category == null) {
			return 'active';
		}
	}
}