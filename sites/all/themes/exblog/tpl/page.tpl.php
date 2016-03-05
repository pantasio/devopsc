<?php require_once(drupal_get_path('theme','exblog').'/tpl/header.tpl.php'); 

global $base_url;
?>
<?php 
	if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
		print render($tabs);
	endif;
	print $messages;
	unset($page['content']['system_main']['default_message']);
?><div class="page-title">	<div class="wrap">		<h1><?php print drupal_get_title(); ?></h1>	</div></div>
<div id="body" >
	<div class="wrap">
		<?php  if($page['right_sidebar']) { ?>
			<?php  if($page['content']):?>
				<div class="big-column left"><?php print render($page['content']); ?></div>
			<?php endif; ?>
			<div class="small-column right"><?php print render($page['right_sidebar']); ?></div>
		<?php } else { ?>
			<?php  if($page['content']):?>
				<?php print render($page['content']); ?>
			<?php endif; ?>
		<?php } ?>
		<div class="cleared"></div>
	</div>
</div>
<?php require_once(drupal_get_path('theme','exblog').'/tpl/footer.tpl.php'); ?>
