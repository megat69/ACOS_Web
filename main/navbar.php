<?php
	$translations_path = "../translations/";
	$home_path = "../";
	require $home_path.'lang_select.php';
	sleep(1);
?>
<nav id="MainNavbar">
	<!- - ACOS - - >
	<div title="<?php include $translations_path.'navbar/return_home_'.$Lang; ?>" onclick="document.location.href = '<?php echo $home_path.'main/'; ?>';">
		<img src="<?php echo $home_path; ?>assets/img/ACOS_Logo.png"/>
	</div>
	<! - - BuildIt! - - >
	<div title="<?php include $translations_path.'navbar/build_it_'.$Lang; ?>" onclick="document.location.href = <?php echo '\''.$home_path.'main/?foreground_app=build-it&lang='.$Lang.'\''; ?>;">
		<img src="<?php echo $home_path; ?>assets/img/ACOS_BuildIt.png"/>
	</div>
	<! - - Filesystem - ->
	<div title="<?php include $translations_path.'navbar/filesystem_'.$Lang; ?>" onclick="document.location.href = <?php echo '\''.$home_path.'main/?foreground_app=filesystem&lang='.$Lang.'\''; ?>;">
		<img src="<?php echo $home_path; ?>assets/img/ACOS_Folder.png"/>
	</div>
	<! - - App browser - - >
	<div title="<?php include $translations_path.'apps/apps-browser/app_browser_'.$Lang; ?>" onclick="document.location.href = <?php echo '\''.$home_path.'main/?foreground_app=app-browser&lang='.$Lang.'\''; ?>;">
		<img src="<?php echo $home_path; ?>assets/img/ACOS_BrowseApps.png"/>
	</div>
	<! - - TextRock - - >
	<div title="<?php include $translations_path.'navbar/textrock_'.$Lang; ?>" onclick="document.location.href = <?php echo '\''.$home_path.'main/?foreground_app=textrock&lang='.$Lang.'\''; ?>;">
		<img src="<?php echo $home_path; ?>assets/img/ACOS_Textrock.png"/>
	</div>

	<! - - Other apps - - >
	<?php
		if (isset($_COOKIE['ACOS_InstalledApps']) && $_COOKIE['ACOS_InstalledApps'] != '') {
			$InstalledApps = htmlspecialchars($_COOKIE['ACOS_InstalledApps']);
			$InstalledApps = explode('|', $InstalledApps);
			for ($i=0; $i < count($InstalledApps); $i++) { 
				$CurrentApp = explode('SEP', $InstalledApps[$i]); // [Name, AppID, IconLink]
				?>
				<! - - <?php echo $CurrentApp[0]; ?> - - >
				<div title="<?php echo $CurrentApp[0]; ?>" onclick="document.location.href = <?php echo '\''.$home_path.'main/?foreground_app=custom/'.$CurrentApp[1].'&lang='.$Lang.'\''; ?>;">
					<img src="<?php echo str_replace('PHPHOMEPATH', $home_path, $CurrentApp[2]); ?>"/>
				</div>
				<?php
			}
		}
	?>
</nav>

