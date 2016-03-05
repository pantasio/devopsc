<?php 
global $base_url;

?>
<?php  if($page['top_footer_2']){?>
	<div class="footer-callout">
		<div class="wrap">
			<?php print render($page['top_footer_2']); ?>
			<div class="cleared"></div>
		</div>
	</div>
<?php } else { ?>
	<?php  if($page['top_footer']):?>
	<div class="footer-callout">
		<div class="wrap">
			<?php print render($page['top_footer']); ?>
			<div class="cleared"></div>
		</div>
	</div>
	<?php endif; ?>
<?php } ?>

<div id="footer"></div>
<div id="footer-bottom">
<?php  if($page['footer_2']){?>
	<div class="wrap">
		<div id="footer-logo">
			<?php print render($page['footer_2']); ?>
		</div>
	</div>
<?php } else { ?>
	<?php  if($page['footer']):?>
	<div class="wrap">
		<div id="footer-logo">
			<?php print render($page['footer']); ?>
		</div>
	</div>
	<?php endif; ?>
<?php } ?>
	
	<div class="footer-under-bottom">
		<div class="wrap">
			<?php $copy = theme_get_setting('footer_copyright_message','exblog'); ?>
			<?php if(!empty($copy )) { ?>
				<div id="footer-copyright">
					<?php print $copy; ?>	 
				</div>
			<?php } ?>	
			<?php  if($page['footer_menu']):?>
				<div id="footer-menu">
					<div class="menu-footer-menu-container">
						<?php print render($page['footer_menu']); ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="cleared"></div>
		</div>
	</div>
</div>