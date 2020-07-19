<?php
	$translations_path = "../../translations/";
	$home_path = "../../";
	require $home_path.'lang_select.php';
	sleep(1);
	require $home_path.'theme_select.php';
	$Icon = $home_path.'assets/img/ACOS_Textrock.png';
	$Name = $translations_path.'navbar/textrock_short';

	if ( !function_exists('json_decode') ){
	    function json_decode($content, $assoc=false){
            require_once $home_path.'JSON/Services/JSON.php';
            if ( $assoc ){
                $json = new Services_JSON(SERVICES_JSON_LOOSE_TYPE);
	        } else {
                $json = new Services_JSON;
            }
	        return $json->decode($content);
	    }
	}
	 
	if ( !function_exists('json_encode') ){
	    function json_encode($content){
            require_once $home_path.'JSON/Services/JSON.php';
            $json = new Services_JSON; 
	        return $json->encode($content);
	    }
	}

	$Title = file_get_contents($translations_path.'apps/all/untitled_'.$Lang);
	// OPEN FILE
	if (!empty($_FILES)) {
		$name = $_FILES["file"]["name"];
		$TextareaOutput = file_get_contents($name);
		$Title = $name;
	} elseif (isset($_GET['filename'])) {
		$TextFile = $_COOKIE['ACOS_Folders'];
		$TextFile = json_decode($TextFile);
		$TextFile = $TextFile->textrock;
		$TextFile = explode("|", $TextFile);
		$TextareaOutput = '';
		for ($i=0; $i < count($TextFile); $i++) { 
			$FinalText = explode("CONTENT", $TextFile[$i]);
			if ($FinalText[0] == htmlspecialchars($_GET['filename'])) {
				$TextareaOutput = $FinalText[1];
				break;
			}
		}
		$Title = htmlspecialchars($_GET['filename']);
	} elseif (isset($_COOKIE['TextRock_FileSaved'])) {
		$TextareaOutput = str_replace('ACOSENTER_CHAR', PHP_EOL, htmlspecialchars($_COOKIE['TextRock_FileSaved']));
	}
	// SAVE FILE
	if (!empty($_POST)) {
		$filename = htmlspecialchars($_POST['filename']);
		$textarea_value = htmlspecialchars($_POST['textarea_value']);
		$Files = json_decode($_COOKIE['ACOS_Folders']);
		$TextrockFiles = $Files->textrock;
		$TextrockFiles = explode("|", $TextrockFiles); // Stores filenames + content in an array, starts by index 1.
		$was_found = false;
		$temp_filestring = '';
		for ($i=1; $i < count($TextrockFiles); $i++) { 
			$FileMeta = explode("CONTENT", $TextrockFiles[$i]); // Gets that array : [filename, content]
			if ($filename === $FileMeta[0]) {
				$was_found = true;
				$FileMeta[1] = htmlspecialchars($_POST['textarea_value']);//$textarea_value;
			}
			$CurrentFile = $FileMeta[0].'CONTENT'.$FileMeta[1];
			$temp_filestring = $temp_filestring.'|'.$CurrentFile;
		}
		if ($was_found == false) {
			$temp_filestring = $temp_filestring.'|'.$filename.'CONTENT'.$textarea_value;
		}
		$TextareaOutput = $textarea_value;
		$Title = $filename;
		$Files->textrock = $temp_filestring;
		setcookie('ACOS_Folders', json_encode($Files), time() + 365*24*3600, '/acos-remastered');
	}

	$debug = '';
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

		<?php
			echo 'console.log(\''.$debug.'\');';
			if (isset($cookie_content)) {
				$var = str_replace(PHP_EOL, '\\n', $cookie_content);
				$var = str_replace('//', '\/\/', $var);
				$var = str_replace('"', '\"', $var);
				echo 'let cookie_content = "'.$var.'";'.PHP_EOL;
				echo 'setCookie("ACOS_Folders", cookie_content);';
			}
		?>

		let displayLoadForm = false;
		let displayFileSaver = false;

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
			if (displayLoadForm == false) {
				document.getElementById('LoadForm').style.display = "block";
				document.getElementById('Overlay').style.display = "block";
				displayLoadForm = true;
			} else {
				document.getElementById('LoadForm').style.display = "none";
				document.getElementById('Overlay').style.display = "none";
				displayLoadForm = false;
			}
		}

		/*let file = document.getElementById("File_Input").files[0];
		let reader = new FileReader();
		reader.onload = function (e) {
		    let textArea = document.getElementById("MainTextArea");
		    textArea.value = e.target.result;
		};
		reader.readAsText(file);*/

		function ReadFile(e){
			let input = document.getElementById('File_Input');
			let reader = new FileReader();
			reader.onload = function () {
				console.log(reader.result);
				if (confirm("<?php include $translations_path.'apps/textrock/Menu__File_confirm_delete_'.$Lang; ?>") == true) {
					document.getElementById('MainTextArea').value = reader.result;
				}
				//return reader.result;
			}
			const text = reader.readAsText(input.files[0]);

			loadFromTxt();
		}

		function getSelectionText() {
		    var text = "";
		    var activeEl = document.activeElement;
		    var activeElTagName = activeEl ? activeEl.tagName.toLowerCase() : null;
		    if (
		      (activeElTagName == "textarea") || (activeElTagName == "input" &&
		      /^(?:text|search|password|tel|url)$/i.test(activeEl.type)) &&
		      (typeof activeEl.selectionStart == "number")
		    ) {
		        text = activeEl.value.slice(activeEl.selectionStart, activeEl.selectionEnd);
		    } else if (window.getSelection) {
		        text = window.getSelection().toString();
		    }
		    return text;
		}

		function copyToClipboard() {
			let highlightedText = getSelectionText();
			console.log(highlightedText);
		}

		function save() {
			let filesaver = document.getElementById('FileSaver');
			if (displayFileSaver == false) {
				filesaver.style.display = "block";
				document.getElementById('Overlay').style.display = "block";
				displayFileSaver = true;
				document.getElementById('InputTextAreaValue').setAttribute("value", document.getElementById('MainTextArea').value);
			} else {
				filesaver.style.display = "none";
				document.getElementById('Overlay').style.display = "none";
				displayFileSaver = false;
			}
		}
	</script>
</head>
<body>
	<?php $header = '../header.php'; require $header; ?>
	<div id="Menu">
		<div id="Menu__File">
			<?php include $translations_path.'apps/textrock/Menu__File_'.$Lang; ?>
			<div id="Menu__File__Dropdown">
				<div onclick="newFile();"><?php include $translations_path.'apps/textrock/NewFile_'.$Lang; ?></div>
				<div onclick="saveAsCookie();">
					<?php include $translations_path.'apps/textrock/SaveAsCookie_'.$Lang; ?>
				</div>
				<div onclick="save();">
					<?php include $translations_path.'apps/textrock/Save_'.$Lang; ?>
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
			<?php include $translations_path.'apps/textrock/EditMenu_'.$Lang; ?>
			<div id="Menu__Edit__Dropdown">
				<div>
					<?php include $translations_path.'apps/textrock/copy_'.$Lang; ?> <img src="<?php echo $home_path.'assets/img/ACOS_Check.png'; ?>" onmouseout="copyToClipboard();">
				</div>
				<div onclick="cutToClipboard();">
					<?php include $translations_path.'apps/textrock/cut_'.$Lang; ?>
				</div>
				<div onclick="pasteFromClipboard();">
					<?php include $translations_path.'apps/textrock/paste_'.$Lang; ?>
				</div>
			</div>
		</div>
	</div>
	<textarea id="MainTextArea" onkeyup="this.value = this.value.replace(/\|/g, '')"><?php
			if (isset($TextareaOutput)) {
				echo $TextareaOutput;
			}
		?>
		</textarea>
	<div id="Overlay"></div>
	<form id="LoadForm" method="post" action="?foreground_app=textrock">
		<input type="file" name="file" id="File_Input" accept=".txt" onchange="ReadFile();" /><br/>
		<button type="submit"><?php include $translations_path.'apps/build-it/submit_'.$Lang; ?></button>
		<img src="<?php echo $home_path.'assets/img/ACOS_Bin.png'; ?>" title="Close" onclick="loadFromTxt();"/>
	</form>
	<form id="FileSaver" method="post" action="?foreground_app=textrock">
		<input type="hidden" name="textarea_value" id="InputTextAreaValue" value=""/>
		<input type="text" name="filename" id="Filename_Input" />
		<button type="submit" onclick="document.getElementById('FileSaver').setAttribute('action', '?foreground_app=textrock&filename='+document.getElementById('Filename_Input').value);"><?php include $translations_path.'apps/build-it/submit_'.$Lang; ?></button>
		<img src="<?php echo $home_path.'assets/img/ACOS_Bin.png'; ?>" title="Close" onclick="save();"/>
	</form>
</body>
</html>