<?php
	$translations_path = "../../../../translations/";
	$home_path = "../../../../";
	require $home_path.'lang_select.php';
	sleep(1);
	require $home_path.'theme_select.php';
	$Icon = $home_path.'assets/img/ACOS_BrowseApps.png';
	$Name = "name.txt";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="<?php echo $home_path; ?>css/style.css"/>
	<link rel="stylesheet" href="../style.css"/>
	<link rel="stylesheet" href="../../../style.css"/>
	<link rel="stylesheet" href="<?php echo $home_path.'css/'.$Theme; ?>_theme.css">
	<title>ACOS</title>
</head>
<body>
	<script>
		function setCookie(name,value) {
		    var expires = "";
		    let days = "Tue, 25 Mar 2032 12:00:00 UTC";
		    if (days) {
		        var date = new Date();
		        date.setTime(date.getTime() + (days*24*60*60*1000));
		        expires = "; expires=" + date.toUTCString();
		    }
		    document.cookie = name + "=" + (value || "")  + expires + "; path=/acos-remastered";
		}

		function getCookie(name) {
		    var nameEQ = name + "=";
		    var ca = document.cookie.split(';');
		    for(var i=0;i < ca.length;i++) {
		        var c = ca[i];
		        while (c.charAt(0)==' ') c = c.substring(1,c.length);
		        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		    }
		    return null;
		}

		function installApp() {
			let InstalledApps = getCookie('ACOS_InstalledApps');
			let Separator = '|';
			if (InstalledApps === null || InstalledApps === 'null') {
				let Separator = '';
			}
			InstalledApps = InstalledApps+Separator+'<?php include $Name; ?>SEPminecraft-classicSEPhttps://store-images.s-microsoft.com/image/apps.45782.9007199266731945.debbc4f1-cde0-491b-8c6f-b6b015eecab6.4716cccc-5f37-4bb5-9db1-0c1dbc99003f';
			setCookie('ACOS_InstalledApps', InstalledApps);
			alert('Installed !');
		}
	</script>
	<?php require '../../../header.php'; ?>
	<div id="Main">
		<h1 id="Name">
			<?php include 'name.txt'; ?>
		</h1>
		<div id="Image">
			<img src="https://store-images.s-microsoft.com/image/apps.45782.9007199266731945.debbc4f1-cde0-491b-8c6f-b6b015eecab6.4716cccc-5f37-4bb5-9db1-0c1dbc99003f"/>
		</div>
		<div id="Install" align="right" onclick="installApp();">
			<span><?php include $translations_path.'apps/all/install_'.$Lang; ?> <img src="<?php echo $home_path; ?>assets/img/ACOS_Install.png"/></span>
		</div>
		<div id="Description">
			<h2><?php include $translations_path.'apps/all/product_description_'.$Lang; ?></h2>
			<?php include 'description_'.$Lang.'.html'; ?>
		</div>
	</div>
</body>