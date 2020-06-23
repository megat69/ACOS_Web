<?php
	$translations_path = "../../translations/";
	$home_path = "../../";
	require $home_path.'lang_select.php';
	if (isset($_COOKIE["ACOS_Theme"])) {
		$Theme = $_COOKIE["ACOS_Theme"];
	} else {
		$Theme = "dark";
		setcookie('ACOS_Theme', 'dark', time() + 365*24*3600, '/acos-remastered');
	}
	$Icon = $home_path.'assets/img/ACOS_Textrock.png';
	$Name = $translations_path.'navbar/textrock_short';
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
	<script src="<?php echo $home_path; ?>main/script.js"></script>
	<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
	<script>
		function newFile() {
			if (confirm('<?php include $translations_path.'apps/textrock/Menu__File_confirm_delete_'.$Lang; ?>') == true) {
				document.getElementById('MainTextArea').value = '';
			}
		}

		function saveAsCookie() {
			if (confirm('<?php include $translations_path.'apps/textrock/Menu__File_confirm_delete_'.$Lang; ?>') == true) {
				document.cookie = 'TextRock_FileSaved='+ document.getElementById('MainTextArea').value.replace(/\n/gi, 'ACOSENTER_CHAR') +'; expires=Tue, 25 Mar 2032 12:00:00 UTC; path=/acos-remastered';
			}
		}

		function loadFromCookie(cookie_name) {
			if (confirm('<?php include $translations_path.'apps/textrock/Menu__File_confirm_delete_'.$Lang; ?>') == true) {
				let values = getCookie(cookie_name).split('ACOSENTER_CHAR');
				document.getElementById('MainTextArea').value = '';
				for (i=0;i<values.length;i++) {
					document.getElementById('MainTextArea').value += values[i]+'\n';
				}
			}
		}

		function downloadAsTxt() {
			let data = document.getElementById('MainTextArea').value.replace(/\n/gi, 'ACOSENTER_CHAR');
			let filename = prompt("<?php include $translations_path.'apps/textrock/AskFilename_'.$Lang; ?>");
		    window.open('download.php?filename='+filename+'&data='+data, '_blank');
		}

		function loadFromTxt() {
			console.log('Not atm.')
		}
	</script>
</head>
<body>
	<?php require '../header.php'; ?>
	<div id="Menu">
		<div id="Menu__File">
			<?php include $translations_path.'apps/textrock/Menu__File_'.$Lang; ?>
			<div id="Menu__File__Dropdown">
				<div onclick="newFile();"><?php include $translations_path.'apps/textrock/NewFile_'.$Lang; ?></div>
				<div onclick="saveAsCookie();">
					<?php include $translations_path.'apps/textrock/SaveAsCookie_'.$Lang; ?>
				</div>
				<div onclick="loadFromCookie('TextRock_FileSaved');">
					<?php include $translations_path.'apps/textrock/LoadFromCookie_'.$Lang; ?>
				</div>
				<div onclick="downloadAsTxt();">
					<?php include $translations_path.'apps/textrock/DownloadAsTxt_'.$Lang; ?>
				</div>
				<div onclick="loadFromTxt();">
					<?php include $translations_path.'apps/textrock/LoadFromTxt_'.$Lang; ?>
				</div>
			</div>
		</div>
		<div id="Menu__Edit">
			Edit
		</div>
	</div>
	<textarea id="MainTextArea"><?php if (isset($_COOKIE['TextRock_FileSaved'])) { echo str_replace('ACOSENTER_CHAR', PHP_EOL, htmlspecialchars($_COOKIE['TextRock_FileSaved'])); } ?></textarea>
</body>
</html>