<!DOCTYPE html>
<html lang="<?php print $language->language; ?>">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php print $head_title; ?></title>
<?php print $styles; ?><?php print $head; ?>
<?php
	//Tracking code
	$tracking_code = theme_get_setting('general_setting_tracking_code', 'exblog');
	print $tracking_code;
	//Custom css
	$custom_css = theme_get_setting('custom_css', 'exblog');
	if(!empty($custom_css)):
?>
<style type="text/css" media="all">
<?php print $custom_css;?>
</style>
<?php
	endif;
?>
</head>

<body class="home blog <?php print $classes;?>" <?php print $attributes;?>>
<div id="background">
	<div id="main-menu-toggle">
		<div class="toggle-menu-top"><span class="toggle-menu-close"><i class="fa fa-arrow-left"></i></span></div>
		<div class="menu-toggle-menu-container">
		</div>
	</div>
	<div id="back_top"><i class="fa fa-angle-up"></i></div>
	<div id="page" >
		<?php print $page_top; ?><?php print $page; ?><?php print $page_bottom; ?>
	</div>
</div>
<?php print $scripts; ?>
</body>
</html>

