<?php
	if (isset($_COOKIE["ACOS_Theme"])) {
		$Theme = $_COOKIE["ACOS_Theme"];
	} else {
		$Theme = "dark";
		setcookie('ACOS_Theme', 'dark', time() + 365*24*3600, '/acos-remastered');
	}