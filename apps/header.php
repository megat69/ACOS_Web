	<header id="foreground_app_header">
		<div id="Icon">
			<img src="<?php echo $Icon; ?>"/>
		</div>
		<div id="Name">
			<?php if (isset($Title)) { echo htmlspecialchars($Title).' - '; } ?><?php include $Name; ?>
		</div>
		<div id="CloseOptions">
			<! - - Resize - ->
			<img src="<?php echo $home_path.'assets/img/ACOS_Resize.png'; ?>" onclick="parent.resizeIframe();"/>
			<! - - Expand - ->
			<img src="<?php echo $home_path.'assets/img/ACOS_Expand.png'; ?>" onclick="parent.expandIFrame();" class="Expand"/>
			<! - - Close - ->
			<img src="<?php echo $home_path.'assets/img/ACOS_Bin.png'; ?>" onclick="parent.closeIFrame();"/>
		</div>
	</header>