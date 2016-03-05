<?php require_once(drupal_get_path('theme','exblog').'/tpl/header.tpl.php'); 

global $base_url;
?>
<?php 
	if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
		print render($tabs);
	endif;
	print $messages;
	unset($page['content']['system_main']['default_message']);
?>
<div class="page-title">	<div class="wrap">		<h1><?php print drupal_get_title(); ?></h1>	</div></div>
<div id="body" class="error404">
	<div class="wrap">
		<div class="full-column">
			<div class="page-entry">
				<div class="page-entry-body">
					<div class="page-entry-content content">
						<div class="woocommerce">
							<?php print render($page['content']); ?>
						</div>
					</div>
					<div class="cleared"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once(drupal_get_path('theme','exblog').'/tpl/footer.tpl.php'); ?>
