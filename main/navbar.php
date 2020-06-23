<?php
	$translations_path = "../translations/";
	$home_path = "../";
	require $home_path.'lang_select.php';
	sleep(1);
?>
<nav id="MainNavbar">
	<div title="<?php include $translations_path.'navbar/return_home_'.$Lang; ?>" onclick="document.location.href = '<?php echo $home_path.'main/'; ?>';">
		<img src="<?php echo $home_path; ?>assets/img/ACOS_Logo.png"/>
	</div>
	<div title="<?php include $translations_path.'navbar/build_it_'.$Lang; ?>" onclick="document.location.href = <?php echo '\''.$home_path.'main/?foreground_app=build-it&lang='.$Lang.'\''; ?>;">
		<img src="<?php echo $home_path; ?>assets/img/ACOS_BuildIt.png"/>
	</div>
	<div title="<?php include $translations_path.'navbar/textrock_'.$Lang; ?>" onclick="document.location.href = <?php echo '\''.$home_path.'main/?foreground_app=textrock&lang='.$Lang.'\''; ?>;">
		<img src="<?php echo $home_path; ?>assets/img/ACOS_Textrock.png"/>
	</div>
</nav>

