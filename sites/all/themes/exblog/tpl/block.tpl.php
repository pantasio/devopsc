<?php 
global $base_url;
$out = '';

if($block->region == 'right_sidebar'){
	
	$out .= '<div class="'.$block->css_class.' contextual-links-region">';
	$out .= '<div class="sidebar-widget-content content">';
	if ($block->block_subtitle):
		$out .= '<div class="sidebar-widget-title"><span>'.$block->block_subtitle.'</span></div>';
	endif;
	if ($block->subject):
		$out .= '<h1>'.$block->subject.'</h1>';
	endif;
	$out .= render($title_suffix);
	$out .= $content;
	$out .= '</div>';
	$out .= '</div>';
	
} elseif($block->region == 'top_content') {
	
	$out .= '<div class="'.$block->css_class.' contextual-links-region">';
	if ($block->block_subtitle):
		$out .= '<div class="promote-box-subtitle"><span>'.$block->block_subtitle.'</span></div>';
	endif;
	if ($block->subject):
		$out .= '<div class="promote-box-title">'.$block->subject.'</div>';
	endif;
	$out .= render($title_suffix);
	$out .= $content;
	$out .= '</div>';
	
} elseif($block->region == 'content') {
	$out .= $content;
	
} else {
	
	$out .= '<div class="'.$block->css_class.' contextual-links-region">';
	$out .= render($title_suffix);
	$out .= $content;
	$out .= '</div>';	
	
}

print $out;

?>


