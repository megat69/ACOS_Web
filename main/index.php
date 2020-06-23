<?php
	$translations_path = "../translations/";
	$home_path = "../";
	require $home_path.'lang_select.php';
	if (isset($_COOKIE["ACOS_Theme"])) {
		$Theme = $_COOKIE["ACOS_Theme"];
	} else {
		$Theme = "dark";
		setcookie('ACOS_Theme', 'dark', time() + 365*24*3600, '/acos-remastered');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="<?php echo $home_path; ?>css/style.css"/>
	<link rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="<?php echo $home_path.'css/'.$Theme; ?>_theme.css">
	<link rel="icon" href="<?php echo $home_path; ?>assets/img/ACOS_Logo.png"/>
	<title>ACOS</title>
	<script src="script.js"></script>
</head>
<body onclick="resizeIFrame();">
	<h1 align="center">
		<span class="ACOS_Red">AC</span><span class="ACOS_Blue">OS</span> - <?php include $translations_path.'main/title_'.$Lang ?>
	</h1>

	<?php
		// Foreground app
		if (isset($_GET['foreground_app'])) {
			echo '<iframe id="foreground_app" src="../apps/'.htmlspecialchars($_GET['foreground_app']).'/?lang='.$Lang.'"></iframe>';
		}
	?>

	<form id="resizer">
		Width : <input type="number" name="width" id="resizer_width" min="50" max="" value="" onchange="now_resizeIFrame();" step="5" /><br/>
		Height : <input type="number" name="height" id="resizer_height" min="50" max="" value="" onchange="now_resizeIFrame();" step="5" /><br/>
	</form>

	<?php
		// navbar
		include 'navbar.php';
	?>

	<script>
		function closeIFrame() {
		    document.location.href = "../<?php echo $home_path.'main/?lang='.$Lang; ?>";
		}
	</script>
</body>
</html>