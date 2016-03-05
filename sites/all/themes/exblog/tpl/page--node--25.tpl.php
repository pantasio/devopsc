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
<div class="archive post-type-archive post-type-archive-product woocommerce woocommerce-page">
	<div id="container">
		<div id="content" role="main">
			<?php if ($breadcrumb): ?>
				<nav class="woocommerce-breadcrumb">
					<?php print $breadcrumb; ?>
				</nav>
			<?php endif; ?>
			<h1 class="page-title"><?php print drupal_get_title(); ?></h1>
			<?php  if($page['content_section']):?>
				<?php print render($page['content_section']); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php require_once(drupal_get_path('theme','exblog').'/tpl/footer.tpl.php'); ?>
