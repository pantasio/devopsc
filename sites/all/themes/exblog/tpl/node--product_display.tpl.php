<?php
/**
 * @file
 * Default theme implementation to display a node.
 */
global $base_root, $base_url;

	if(isset($content['product:field_image'])){
		$img_uri = $content['product:field_image']['#items'][0]['uri'];
	} else {
		$img_uri = '';
	}
	$img_url = file_create_url($img_uri);
  
if($page){ ?>


	<?php $onsale = render($content['product:field_commerce_saleprice_on_sale']);
		if (strip_tags($onsale) == '1'): ?>
		<span class="onsale"><?php print t('Sale!');?></span>
	<?php endif; ?>
	<div class="images">
		<a href="<?php print $img_url; ?>" itemprop="image" class="woocommerce-main-image zoom" title="<?php print $title; ?>" data-rel="prettyPhoto">
			<img src="<?php print $img_url; ?>" class="attachment-shop_single" alt="<?php print $title; ?>" title="<?php print $title; ?>" />
		</a>
	</div>
	<div class="summary entry-summary">
		<h1 itemprop="name" class="product_title entry-title">
			<?php print $title; ?>
		</h1>
		<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<p class="price">
				<?php 
				$onsale = render($content['product:field_commerce_saleprice_on_sale']);
				if (strip_tags($onsale) == '1') {?>
					<del>
						<span class="amount">
							<?php print strip_tags(render($content['product:commerce_price'])); ?>
						</span>
					</del>
					<ins>
						<span class="amount">
							<?php print strip_tags(render($content['product:field_commerce_saleprice'])); ?>
						</span>
					</ins>
				<?php  } else {?>
					<span class="amount">
						<?php print strip_tags(render($content['product:commerce_price'])) ; ?>
					</span>
				<?php  }?>
			</p>
			<meta itemprop="price" content="10" />
			<meta itemprop="priceCurrency" content="USD" />
			<link itemprop="availability" href="http://schema.org/InStock" />
		</div>
		<div itemprop="description">
			<p><?php print strip_tags(render($content['product:field_description'])) ; ?></p>
		</div>
		<?php
			  $sku = render($content['product:sku']);
			  $product = commerce_product_load_by_sku($sku);
			  hide($content['links']);
			  hide($content['comments']);
			  hide($content['product:field_description']);
			  hide($content['product:field_image']);
			  hide($content['product:commerce_price']);
			  hide($content['product:field_quantity']);
			  hide($content['product:field_commerce_saleprice_on_sale']);
			  hide($content['product:field_commerce_saleprice']);
			  hide($content['field_product_category']);
			  hide($content['body']);
			  print render($content);
		?>
		<div class="product_meta">
			<span class="posted_in">
				<?php print t('Category: ');?>
				<?php print strip_tags(render($content['field_product_category']),'<a>') ; ?>		
			</span>
		</div>
	</div>
	<div class="woocommerce-tabs">
		<ul class="tabs">
			<li class="description_tab"><a href="#" rel="tab-description"><?php print t('Description');?></a></li>
			<li class="reviews_tab"><a href="#" rel="tab-reviews"><?php print t('Reviews (').$comment_count.t(')'); ?></a></li>
		</ul>
		<div class="panel entry-content" id="tab-description">
			<h2>
				<?php t('Product Description');?>
			</h2>
			<?php print render($content['product:field_description']) ; ?></div>
		<div class="panel entry-content" id="tab-reviews">
			<div id="reviews">
				<?php print render($content['comments'])?>
			</div>
		</div>
	</div>
<?php } else { ?>

<li class="product">
	<a href="<?php print $node_url; ?>">
		<?php $onsale = render($content['product:field_commerce_saleprice_on_sale']);
			if (strip_tags($onsale) == '1'): ?>
				<span class="onsale"><?php print t('Sale!');?></span>
		<?php endif; ?>
		<img src="<?php print $img_url;?>" class="attachment-shop_catalog" alt="<?php print $title;?>" />
		<h3><?php print $title;?></h3>
		<span class="price">
			<?php 
				$onsale = render($content['product:field_commerce_saleprice_on_sale']);
				if (strip_tags($onsale) == '1') {?>
					<del>
						<span class="amount">
							<?php print strip_tags(render($content['product:commerce_price'])); ?>
						</span>
					</del>
					<ins>
						<span class="amount">
							<?php print strip_tags(render($content['product:field_commerce_saleprice'])); ?>
						</span>
					</ins>
				<?php  } else {?>
					<span class="amount">
						<?php print strip_tags(render($content['product:commerce_price'])) ; ?>
					</span>
				<?php  }?>
		</span>
	</a>
	<?php
	  $sku = render($content['product:sku']);
	  $product = commerce_product_load_by_sku($sku);
	  hide($content['links']);
	  hide($content['comments']);
	  hide($content['product:field_description']);
	  hide($content['product:field_image']);
	  hide($content['product:commerce_price']);
	  hide($content['product:field_quantity']);
	  hide($content['field_product_category']);
	  hide($content['body']);
	  print render($content);
	 ?>
</li>

<?php } ?>