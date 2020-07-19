<?php
	if (isset($_COOKIE['ACOS_Background']) && $_COOKIE['ACOS_Background'] != 'CUSTOM:none') {
		$Background = str_replace('CUSTOM:', '', $_COOKIE['ACOS_Background']);
		$file = $Background;
		$file_headers = @get_headers($file);
		if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
		    $exists = false;
		}
		else {
		    $exists = true;
		}
		if ($exists == true) {
			?>
				<style>
					body {
						background: url("<?php echo $Background; ?>") no-repeat center center fixed;
						background-size: cover;
					}
				</style>
			<?php
		} else {
			?>
				<script>alert('The selcted image does not exist. Go in BuildIt! to change that.')</script>
			<?php
		}
		
	}