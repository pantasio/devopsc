<?php require_once(drupal_get_path('theme','exblog').'/tpl/header.tpl.php'); 

global $base_url;
?>
<div class="single single-product woocommerce woocommerce-page">
	<div id="container">
		<div id="content" role="main">
			<?php if ($breadcrumb): ?>
				<nav class="woocommerce-breadcrumb">
					<?php print $breadcrumb; ?>
				</nav>
			<?php endif; ?>
			<div itemscope itemtype="http://schema.org/Product"  class="product type-product status-publish has-post-thumbnail product_cat-marketing sale shipping-taxable purchasable product-type-simple product-cat-marketing instock">
				<?php  if($page['content']):?>
					<?php print render($page['content']) ?>
				<?php endif; ?>
				<div class="related products">
					<h2><?php print t('Related Products');?></h2>
					<?php print render($page['content_section']); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once(drupal_get_path('theme','exblog').'/tpl/footer.tpl.php'); ?>