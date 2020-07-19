<?php
	$translations_path = "../../../translations/";
	$home_path = "../../../";
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
	<link rel="stylesheet" href="../style.css"/>
	<link rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="../../style.css"/>
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

		function openAppDesc(App) {
			let appID = App.toLowerCase();
			appID = appID.replace(" ", "-");
			appID = appID.replace(".", "-");
			appID = appID.replace("!", "-");
			document.location.href = '../apps/'+appID+'?lang=<?php echo $Lang; ?>';
		}

		function deleteApp(appID) {
			let InstalledApps = getCookie('ACOS_InstalledApps');
			InstalledApps = InstalledApps.split('|');
			for (var i = 0; i < InstalledApps.length; i++) {
				if (InstalledApps[i].includes(appID) == true) {
					let AppName = InstalledApps[i].split('SEP');
					alert('The app '+AppName[0]+' has correctly been uninstalled.');
					document.getElementById(AppName[1]).style.display = 'none';
					InstalledApps.splice(i, 1);
				}
			}
			let Cookie = InstalledApps[0];
			for (var i = 1; i < InstalledApps.length; i++) {
				Cookie = Cookie + '|' + InstalledApps[i];
			}
			if (Cookie.charAt(0) === '|') {
				Cookie.substring(1);
			}
			setCookie('ACOS_InstalledApps', Cookie);
		}

		function SwitchToPrevious(Position) {
			let InstalledApps = getCookie('ACOS_InstalledApps');
			InstalledApps = InstalledApps.split('|');
			//console.log('Before : '+InstalledApps);
			let StringToMove = InstalledApps[Position];
			InstalledApps.splice(Position, 1);
			InstalledApps.splice(Position-1, 0, StringToMove);
			let Cookie = InstalledApps[0];
			for (var i = 1; i < InstalledApps.length; i++) {
				Cookie = Cookie + '|' + InstalledApps[i];
			}
			if (Cookie.charAt(0) === '|') {
				Cookie.substring(1);
			}
			setCookie('ACOS_InstalledApps', Cookie);
			//console.log('After : '+InstalledApps);
			document.location.reload(true);
		}

		function SwitchToNext(Position) {
			let InstalledApps = getCookie('ACOS_InstalledApps');
			InstalledApps = InstalledApps.split('|');
			//console.log('Before : '+InstalledApps);
			let StringToMove = InstalledApps[Position];
			InstalledApps.splice(Position, 1);
			InstalledApps.splice(Position+1, 0, StringToMove);
			let Cookie = InstalledApps[0];
			for (var i = 1; i < InstalledApps.length; i++) {
				Cookie = Cookie + '|' + InstalledApps[i];
			}
			if (Cookie.charAt(0) === '|') {
				Cookie.substring(1);
			}
			setCookie('ACOS_InstalledApps', Cookie);
			//console.log('After : '+InstalledApps);
			document.location.reload(true);
		}
	</script>
	<?php require '../../header.php'; ?>
	<div id="Main">
		<div id="ManageApps" onclick="document.location.href = '../';" align="right">
			<img src="<?php echo $home_path; ?>assets/img/ACOS_Check.png"/>
		</div>

		<h1><?php include $Name; ?> - <?php include $translations_path.'apps/apps-browser/manage_apps_'.$Lang; ?></h1>

		<div id="YourApps">
			<?php include $translations_path.'apps/apps-browser/your_apps_'.$Lang; ?> :<br/>
			<?php
				if (isset($_COOKIE['ACOS_InstalledApps']) && $_COOKIE['ACOS_InstalledApps'] != '') {
					$InstalledApps = htmlspecialchars($_COOKIE['ACOS_InstalledApps']);
					$InstalledApps = explode('|', $InstalledApps);
					for ($i=0; $i < count($InstalledApps); $i++) { 
						$CurrentApp = explode('SEP', $InstalledApps[$i]); // [Name, AppID, IconLink]
						?>
						<! - - <?php echo $CurrentApp[0]; ?> - - >
						<div title="<?php echo $CurrentApp[0]; ?>" id="<?php echo $CurrentApp[1]; ?>">
							<img src="<?php echo str_replace('PHPHOMEPATH', $home_path, $CurrentApp[2]); ?>"/><br/><?php echo $CurrentApp[0]; ?><br/>
							<?php echo '<span class="Position'.$i.'">'; ?>Position : 
							<?php
								if ($i > 0) {
									?>
										<img src="<?php echo $home_path; ?>assets/img/ACOS_Arrow.png" style="height: 1em; transform: rotate(180deg);" onclick="SwitchToPrevious(<?php echo $i; ?>);">
									<?php
								}
							?>
							<?php echo ($i+1); ?>
							<?php
								if ($i < count($InstalledApps)-1) {
									?>
										<img src="<?php echo $home_path; ?>assets/img/ACOS_Arrow.png" style="height: 1em;" onclick="SwitchToNext(<?php echo $i; ?>);">
									<?php
								}
								echo '</span>';
							?>

							<div class="DeleteApp" onclick="deleteApp('<?php echo $CurrentApp[1]; ?>');"><img src="<?php echo $home_path; ?>assets/img/ACOS_Bin.png" align="right"></div>
						</div>
						<?php
					}
				} else {
					include $translations_path.'apps/apps-browser/no_app_installed_'.$Lang;
				}
			?>
		</div>
	</div>
</body>