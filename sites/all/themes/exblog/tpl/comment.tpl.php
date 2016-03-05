<?php 
global $base_url;
?>

<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
	<div class="comment-entry" >
		<div class="comment-entry-left">
			<div class="comment-avatar">
				<?php
					if(render($content['picture'])){
					  print render($content['picture']);
					}  else {
					  print "<img alt='Default avatar' src='http://dummyimage.com/90x90' srcset='http://dummyimage.com/180x180' class='avatar photo' height='90' width='90'/>";
					}
				 ?>
			</div>
		</div>
		<div class="comment-entry-right">
			<div class="comment-entry-right-inner">
				<div class="comment-author">
					<?php print theme('username', array('account' => $content['comment_body']['#object'], 'attributes' => array('class' => 'url'))) ?>
					<span class="comment-date">
						<?php print format_date($node->created, 'custom', 'M j, Y'); ?>
						<?php print t(' at ');?>
						<?php print format_date($node->created, 'custom', 'h:i a'); ?>
					</span>
				</div>
				<div class="comment-content content">
					<p><?php print render($content['comment_body']);?></p>
				</div>
				<div class="comment-reply">
					<?php print render($content['links']);?>
				</div>
			</div>
		</div>
		<div class="cleared"></div>
	</div>
</li>