<?php
	if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>
	
<div id="comment-section" class="post-single-section">
	<div class="comment-number post-single-section-title">
		<span><?php print $content['#node']->comment_count.t(' Comments')?></span>
	</div>
	<div id="comment-container">
		<ul>
			<?php print render($content['comments']); ?>
		</ul>
	</div>
</div>
<div id="comment-form">
	<div id="respond" class="comment-respond">
		<?php print render($content['comment_form'])?>
	</div>
</div>


<?php
	}
?>
