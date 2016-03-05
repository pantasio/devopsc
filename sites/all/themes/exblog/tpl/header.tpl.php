<?php 
global $base_url;

?>
<div id="header">
	<div class="wrap">
		<?php if($logo):?>
			<div class="logo-box">
				<h1>
					<a class="logo-image" href="<?php print $base_url; ?>">											
						<?php  if($page['header_logo_2']){?>
							<?php print strip_tags(render($page['header_logo_2']),'<img>'); ?>
						<?php  } else { ?>							
							<?php  if($page['header_logo']):?>								
								<?php print strip_tags(render($page['header_logo']),'<img>'); ?>						
							<?php endif; ?>
						<?php  } ?>						
						
					</a>
				</h1>
			</div>
		<?php endif; ?>
		<?php  if($page['header_social']):?>
			<?php print render($page['header_social']); ?>
		<?php endif; ?>
		<div class="toggle-menu-button"><i class="fa fa-align-justify"></i></div>
		<?php  if($page['main_menu']):?>
			<div class="main-menu">
				<div class="menu-main-menu-container">
					<?php print render($page['main_menu']); ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="cleared"></div>
	</div>
</div>