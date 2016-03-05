<?php
/**
 * @file
 * Default theme implementation to display a node.
 */
global $base_root, $base_url;
	
	if(isset($node->field_image)){
		$img_uri = @$node->field_image['und'][0]['uri'];
		$img_url = file_create_url($img_uri);
		
		$img_uri_1 = @$node->field_image['und'][1]['uri'];
	}
	
	if($node->field_blog_format){
		$blog_format = @$node->field_blog_format['und'][0]['value'];
	}else{
		$blog_format = '0';
	}

?>
<?php if($page) { ?>

<div class="post-entry-single">
	<div class="post">
		<div class="post-entry-top">
			<div class="post-entry-categories">
				<?php print strip_tags(render($content['field_blog_category']),'<a>');?>
			</div>
			<h1 class="post-entry-title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1>
			<div class="post-entry-meta">
				<?php print format_date($node->created, 'custom', 'M j,Y');?>
				<?php print t(' / By ');?>
				<a rel="author" href="<?php print $base_url.'/user/'.$uid; ?>" title="<?php print $node->name; ?>">
					<?php print $node->name; ?>
				</a>
				<?php print t(' / ');?>
				<?php print $comment_count; ?>
			</div>
		</div>
		
		<?php if ($blog_format == '0' || $blog_format == '1'): ?>
			<?php if (!empty($img_uri_1)) { ?>			
			<div class="post-entry-media">
				<div class="post-flexslider">
					<div class="flexslider">
						<ul class="slides">
							<?php
								foreach($node->field_image['und'] as $key => $value){
								$image_uri = $node->field_image['und'][$key]['uri'];
								$image_url = file_create_url($image_uri);
							?>
								<li>
									<img src="<?php print $image_url; ?>" alt="<?php print $title; ?>" />
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<?php } else { ?>
			<div class="post-entry-media">
				<div>
					<a href="<?php print $img_url; ?>">
						<img src="<?php print $img_url; ?>" alt="<?php print $title; ?>">
					</a>
				</div>
			</div>
			<?php } ?>
		<?php endif; ?>
		<?php if ($node->field_map_url && ($blog_format == '0' || $blog_format == '2')): ?>
			<div class="post-entry-map">
				<div>
					<iframe src="<?php print $node->field_map_url['und'][0]['value']; ?>" width="100%" height="300" frameborder="0" style="border:0"></iframe>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($node->field_audio_url && ($blog_format == '0' || $blog_format == '3')): ?>
			<div class="post-entry-media">
				<div>
					<iframe width="100%" height="450" scrolling="no" frameborder="no" src="<?php print $node->field_audio_url['und'][0]['value']; ?>"></iframe>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($node->field_video_url && ($blog_format == '0' || $blog_format == '4')): ?>
			<div class="post-entry-media">
				<div>
					<iframe width="560" height="315" src="<?php print $node->field_video_url['und'][0]['value']; ?>" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		<?php endif; ?>
		<div class="post-entry-body">
			<div class="post-entry-share">
				<a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=640');return false;" class="post-share facebook-share" href="http://www.facebook.com/sharer/sharer.php?u=<?php print $node_url; ?>"><i class="fa fa-facebook"></i></a>
				<a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=640');return false;" class="post-share twitter-share" href="https://twitter.com/share?url=<?php print $node_url; ?>&text=<?php print $title; ?>"><i class="fa fa-twitter"></i></a>
				<a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=640');return false;" class="post-share google-share" href="https://plus.google.com/share?url=<?php print $node_url; ?>"><i class="fa fa-google-plus"></i></a>
			</div>
			<div class="post-entry-content content">
				<p><?php print render($content['body']); ?></p>
			</div>
			<div class="cleared"></div>
		</div>
	</div>
</div>
<div class="post-entry-single-bottom">
	<div class="post-entry-tags">
		<?php print strip_tags(render($content['field_tags']),'<a>');?>
	</div>
</div>
<div class="post-single-section">
	<div class="post-single-section-title"><span><?php print t('You may also like');?></span></div>
	<div class="post-single-section-content">
		<?php print getRelatedPosts('blog',$nid); ?>
		<div class="cleared"></div>
	</div>
</div>
<?php print render($content['comments'])?>
<div class="cleared"></div>

<?php } else {  ?>

<div class="post-entry">
	<div class="post">
		<div class="post-entry-top">
			<div class="post-entry-categories">
				<?php print strip_tags(render($content['field_blog_category']),'<a>');?>
			</div>
			<h1 class="post-entry-title">
				<a href="<?php print $node_url; ?>"><?php print $title; ?></a>
			</h1>
			<div class="post-entry-meta">
				<?php print format_date($node->created, 'custom', 'M j,Y');?>
				<?php print t(' / By ');?>
				<a rel="author" href="<?php print $base_url.'/user/'.$uid; ?>" title="<?php print $node->name; ?>">
					<?php print $node->name; ?>
				</a>
				<?php print t(' / ');?>
				<?php print $comment_count; ?>
			</div>
		</div>
		<?php if ($node->field_video_url) { ?>
			<div class="post-entry-media">
				<div>
					<iframe width="560" height="315" src="<?php print $node->field_video_url['und'][0]['value']; ?>" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		<?php } else { ?>
			<?php if ($node->field_audio_url) { ?>
				<div class="post-entry-media">
					<iframe width="100%" height="450" scrolling="no" frameborder="no" src="<?php print $node->field_audio_url['und'][0]['value']; ?>"></iframe>
				</div>
			<?php } else { ?>
				<?php if ($node->field_map_url) { ?>
					<div class="post-entry-map">
						<div>
							<iframe src="<?php print $node->field_map_url['und'][0]['value']; ?>" width="100%" height="300" frameborder="0" style="border:0"></iframe>
						</div>
					</div>
				<?php } else { ?>
					<?php if (!empty($img_uri_1)) { ?>
						<div class="post-entry-media">
							<div class="post-flexslider">
								<div class="flexslider">
									<ul class="slides">
										<?php
											foreach($node->field_image['und'] as $key => $value){
											$image_uri = $node->field_image['und'][$key]['uri'];
											$image_url = file_create_url($image_uri);
									 	?>
											<li>
												<img src="<?php print $image_url; ?>" alt="<?php print $title; ?>" />
											</li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<div class="post-entry-media">
							<a href="<?php print $img_url; ?>">
								<img src="<?php print $img_url; ?>" alt="<?php print $title; ?>">
							</a>
						</div>
					<?php } ?>
				<?php } ?>
			<?php } ?>
		<?php } ?>
		<div class="post-entry-body">
			<div class="post-entry-content content">
				<p><?php print render($content['body']); ?></p>
			</div>
			<div class="cleared"></div>
			<div class="post-entry-bottom">
				<a class="post-entry-button" href="<?php print $node_url; ?>" >
					<?php print t('Read More');?>
				</a>
			</div>
		</div>
	</div>
</div>

<?php } ?>