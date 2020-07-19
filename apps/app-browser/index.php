<?php
	$translations_path = "../../translations/";
	$home_path = "../../";
	require $home_path.'lang_select.php';
	sleep(1);
	require $home_path.'theme_select.php';
	$Icon = $home_path.'assets/img/ACOS_BrowseApps.png';
	$Name = $translations_path.'apps/apps-browser/app_browser_'.$Lang;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="<?php echo $home_path; ?>css/style.css"/>
	<link rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="../style.css"/>
	<link rel="stylesheet" href="<?php echo $home_path.'css/'.$Theme; ?>_theme.css">
	<title>ACOS</title>
</head>
<body>
	<script>
		let displayFeaturedApps = true;

		function toggleFeaturedApps() {
			if (displayFeaturedApps == true) {
				document.getElementById('FeaturedApps').style.display = "none";
				displayFeaturedApps = false;
			} else {
				document.getElementById('FeaturedApps').style.display = "grid";
				displayFeaturedApps = true;
			}
		}

		function openAppDesc(App) {
			let appID = App.toLowerCase();
			appID = appID.replace(" ", "-");
			appID = appID.replace(".", "-");
			appID = appID.replace("!", "-");
			document.location.href = 'apps/'+appID+'?lang=<?php echo $Lang; ?>';
		}
	</script>
	<?php require '../header.php'; ?>
	<div id="Main">
		<div id="ManageApps" onclick="document.location.href = 'manage-apps/';" align="right">
			<img src="<?php echo $home_path; ?>assets/img/ACOS_Bin.png"/>
		</div>
		<h1><?php include $Name; ?></h1>
		<h2 class="Center">
			<?php include $translations_path.'apps/apps-browser/description_'.$Lang; ?>
		</h2>

		<div id="Announcement_FeaturedApps" onclick="toggleFeaturedApps();">
			<?php include $translations_path.'apps/apps-browser/FeaturedApps_'.$Lang; ?> <hr/>
		</div>
		<div id="FeaturedApps" align="center">
			<div class="App" onclick="openAppDesc(this.getElementsByClassName('AppName')[0].innerHTML);">
				<div class="AppIcon">
					<img src="<?php echo $home_path; ?>assets/img/Startpage.png"/>
				</div>
				<div class="AppName">Startpage</div>
			</div>
			<div class="App" onclick="openAppDesc(this.getElementsByClassName('AppName')[0].innerHTML);">
				<div class="AppIcon"><img src="https://store-images.s-microsoft.com/image/apps.45782.9007199266731945.debbc4f1-cde0-491b-8c6f-b6b015eecab6.4716cccc-5f37-4bb5-9db1-0c1dbc99003f"></div>
				<div class="AppName">Minecraft Classic</div>
			</div>
			<div class="App" onclick="openAppDesc(this.getElementsByClassName('AppName')[0].innerHTML);">
				<div class="AppIcon"><img src="https://scmadi.xyz/games/images/36/36.jpg"></div>
				<div class="AppName">Bullet Force</div>
			</div>
			<div class="App" onclick="openAppDesc(this.getElementsByClassName('AppName')[0].innerHTML);">
				<div class="AppIcon"><img src="https://files.apigame.com/files/image/krunker.PNG"></div>
				<div class="AppName">Krunker.io</div>
			</div>
			<div class="App" onclick="openAppDesc(this.getElementsByClassName('AppName')[0].innerHTML);">
				<div class="AppIcon"><img src="<?php echo $home_path; ?>assets/img/ACOS_0and0.png"></div>
				<div class="AppName">0and0</div>
			</div>
			<div class="App" onclick="openAppDesc(this.getElementsByClassName('AppName')[0].innerHTML);">
				<div class="AppIcon"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/07/Wikipedia_logo_%28svg%29.svg/1200px-Wikipedia_logo_%28svg%29.svg.png"></div>
				<div class="AppName">Wikipedia</div>
			</div>
		</div>
	</div>
</body>