<?php
	$browserlang = explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
	if (isset($_GET['lang']) && $_GET['lang'] == 'fr') {
		$Lang = "fr";
		setcookie('ACOS_Lang', 'fr', time() + 365*24*3600, '/acos-remastered');
	} elseif (isset($_GET['lang']) && $_GET['lang'] == 'en') {
		$Lang = "en";
		setcookie('ACOS_Lang', 'en', time() + 365*24*3600, '/acos-remastered');
	} elseif ($_COOKIE['ACOS_Lang'] == 'fr') {
		$Lang = "fr";
		setcookie('ACOS_Lang', 'fr', time() + 365*24*3600, '/acos-remastered');
	} elseif (preg_match("#fr#", $browserlang[0])) {
		$Lang = "fr";
		setcookie('ACOS_Lang', 'fr', time() + 365*24*3600, '/acos-remastered');
	} elseif (preg_match("#en#", $browserlang[0])) {
		$Lang = "en";
		setcookie('ACOS_Lang', 'en', time() + 365*24*3600, '/acos-remastered');
	} else {
		$Lang = "en";
		setcookie('ACOS_Lang', 'en', time() + 365*24*3600, '/acos-remastered');
	}