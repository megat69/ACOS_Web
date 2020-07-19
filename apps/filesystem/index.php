<?php
	$translations_path = "../../translations/";
	$home_path = "../../";
	require $home_path.'lang_select.php';
	sleep(1);
	require $home_path.'theme_select.php';
	$Icon = $home_path.'assets/img/ACOS_Folder.png';
	$Name = $translations_path.'navbar/filesystem_'.$Lang;

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
		function setCookie(name,value) {
		    var expires = "";
		    let days = "Tue, 25 Mar 2032 12:00:00 UTC";
		    if (days) {
		        var date = new Date();
		        date.setTime(date.getTime() + (days*24*60*60*1000));
		        expires = "; expires=" + date.toUTCString();
		    }
		    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
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

		function addNewFolder() {
			let folder_name = prompt("<?php include $translations_path.'apps/filesystem/NewFolderName_'.$Lang; ?>")
			let Main = document.getElementById('Main');
			if (folder_name != null) {
				Main.innerHTML += '<div class="Folder" class="LaunchDiv">\n\t<img src="<?php echo $home_path; ?>assets/img/ACOS_Folder.png"/>\n\t<div>'+folder_name+'</div>\n</div>';
				let currentFolders = JSON.parse(getCookie("ACOS_Folders"));
				folder_name = folder_name;
				currentFolders["Folders"] += '|'+folder_name;
				setCookie("ACOS_Folders", JSON.stringify(currentFolders));
				console.log(currentFolders);
			}
		}

		function folderOptions(e) {
			var cX = event.clientX;
			var sX = event.screenX;
			var cY = event.clientY;
			var sY = event.screenY;
			let FolderContextMenu = document.getElementById('FolderContextMenu');
			FolderContextMenu.style.transform = 'translate('+cX+'px,'+cY+'px)';
			FolderContextMenu.style.display = "block";
			return false;
		}

		function fileOptions(e) {
			var cX = event.clientX;
			var sX = event.screenX;
			var cY = event.clientY;
			var sY = event.screenY;
			let FileContextMenu = document.getElementById('FileContextMenu');
			FolderContextMenu.style.transform = 'translate('+cX+'px,'+cY+'px)';
			FolderContextMenu.style.display = "block";
			return false;
		}

		function openFile(id) {
			let element = document.getElementById(id);
			console.log(element);
			element = element.getElementsByTagName('div')[0];
			console.log(element);
			element = element.innerHTML;
			console.log(element);
			console.log("../textrock/?lang=<?php echo $Lang;?>&filename="+element);
			document.location.href = "../textrock/?lang=<?php echo $Lang;?>&filename="+element;
		}

		document.addEventListener('click', function(){
			document.getElementById('FolderContextMenu').style.display = "none";
		}, false);
	</script>
	<?php require '../header.php'; ?>
	<div id="Main" oncontextmenu="return false">
		<div id="NewFolder" class="Folder" class="LaunchDiv" onclick="addNewFolder();">
			<img src="<?php echo $home_path; ?>assets/img/ACOS_NewFolder.png"/>
			<div><?php include $translations_path.'apps/filesystem/AddNewFolder_'.$Lang; ?></div>
		</div>
		<?php
			$Folders = json_decode($_COOKIE['ACOS_Folders']);
			//print_r($Folders);
			$Folders = $Folders->Folders;
			//print_r($Folders);
			$Folders = explode("|", $Folders);
			for ($i=1; $i < count($Folders); $i++) { 
				?>
					<div class="Folder" class="LaunchDiv" oncontextmenu="folderOptions();">
						<img src="<?php echo $home_path; ?>assets/img/ACOS_Folder.png"/>
						<div><?php echo $Folders[$i]; ?></div>
					</div>
				<?php
			}
		?>
		<?php
			$Files = json_decode($_COOKIE['ACOS_Folders']);
			//print_r($Folders);
			$Files = $Files->textrock;
			//print_r($Folders);
			$Files = explode("|", $Files);
			for ($i=1; $i < count($Files); $i++) {
				$File = explode("CONTENT", $Files[$i]);
				?>
					<div class="File" class="LaunchDiv" oncontextmenu="fileOptions('text');" onclick="openFile(this.id);" id="File<?php echo $i; ?>">
						<img src="<?php echo $home_path; ?>assets/img/ACOS_Textrock.png"/>
						<div><?php echo $File[0]; ?></div>
					</div>
				<?php
			}
		?>
	</div>
	<div id="FolderContextMenu" class="ContextMenu">
		<div onclick="console.log('Open');"><?php include $translations_path.'apps/filesystem/open_'.$Lang; ?></div>
		<div id="DeleteFolder" onclick="console.log('Delete');"><?php include $translations_path.'apps/filesystem/delete_'.$Lang; ?></div>
	</div>
	<div id="FileContextMenu" class="ContextMenu">
		<div onclick="console.log('Open');"><?php include $translations_path.'apps/filesystem/open_'.$Lang; ?></div>
		<div id="DeleteFile" onclick="console.log('Delete');"><?php include $translations_path.'apps/filesystem/delete_'.$Lang; ?></div>
	</div>
</body>