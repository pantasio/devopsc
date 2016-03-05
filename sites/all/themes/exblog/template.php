<?php
global $base_url;

function exblog_preprocess_html(&$variables) {	
	drupal_add_css( 'http://fonts.googleapis.com/css?family=Lato%3A900&amp;ver=4.2.2', array('type' => 'external','media' => 'all'));
	drupal_add_css( 'http://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&amp;ver=4.2.2', array('type' => 'external','media' => 'all'));
	drupal_add_css( 'http://fonts.googleapis.com/css?family=Playfair+Display%3A400%2Citalic%2C700%2C700italic%2C900%2C900italic&amp;ver=4.2.2', array('type' => 'external','media' => 'all'));
	drupal_add_css( 'http://fonts.googleapis.com/css?family=Muli%3A300%2C300italic%2C400%2Citalic&amp;ver=4.2.2', array('type' => 'external','media' => 'all'));
	drupal_add_css( 'http://fonts.googleapis.com/css?family=Dancing+Script%3A400%2C700&ver=4.2.2', array('type' => 'external','media' => 'all'));
}

// Remove superfish css files.
function exblog_css_alter(&$css) {
	unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
	//unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
}


function exblog_form_alter(&$form, &$form_state, $form_id) {
	if ($form_id == 'search_block_form') {
		$form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
		$form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
		$form['search_block_form']['#attributes']['id'] = array("mod-search-searchword");
		//disabled submit button
		//unset($form['actions']['submit']);
		unset($form['search_block_form']['#title']);
		$form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
		$form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
		
	}
}

function hook_preprocess_page(&$variables) {	
	if (arg(0) == 'node' && is_numeric($nid)) {
    	if (isset($variables['page']['content']['system_main']['nodes'][$nid])) {
      		$variables['node_content'] =& $variables['page']['content']['system_main']['nodes'][$nid];
      		if (empty($variables['node_content']['field_show_page_title'])) {
        		$variables['node_content']['field_show_page_title'] = NULL;
      		}
    	}
  	}
}

function exblog_preprocess_page(&$vars){
	if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {
    	$term = taxonomy_term_load(arg(2));
    	$vars['theme_hook_suggestions'][] = 'page__vocabulary__' . $term->vocabulary_machine_name;
  	}

	if (isset($vars['node'])) {
		$vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
	}

	if (isset($vars['node'])) {
		$vars['theme_hook_suggestions'][] = 'page__node__'. $vars['node']->nid;
	}
	
	//404 page
	$status = drupal_get_http_header("status");
	if($status == "404 Not Found") {
		$vars['theme_hook_suggestions'][] = 'page__404';
	}


	if (isset($vars['node'])) :
		//print $vars['node']->type;
        if($vars['node']->type == 'page'):
            $node = node_load($vars['node']->nid);
            $output = field_view_field('node', $node, 'field_show_page_title', array('label' => 'hidden'));
            $vars['field_show_page_title'] = $output;
			//sidebar
			$output = field_view_field('node', $node, 'field_sidebar', array('label' => 'hidden'));
            $vars['field_sidebar'] = $output;
        endif;
    endif;
}

function exblog_breadcrumb($variables) {
	$crumbs ='';
	$breadcrumb = $variables['breadcrumb'];
	if (!empty($breadcrumb)) {
		$crumbs .= '';
		foreach($breadcrumb as $value) {

			$crumbs .= $value.'<i class="fa fa-angle-right"></i>';
		}
		$crumbs .= '<span>'.drupal_get_title().'</span>';
		return $crumbs;
	}else{
		return NULL;
	}
}


//custom main menu
function berty_menu_tree__main_menu(array $variables) {
		return '<ul class="sub-menu">' . $variables['tree'] . '</ul>';
}


//relate post
function getRelatedPosts($ntype,$nid){
	$nids = db_query("SELECT n.nid, title FROM {node} n WHERE n.status = 1 AND n.type = :type AND n.nid <> :nid ORDER BY RAND() LIMIT 0,2", array(':type' => $ntype, ':nid' => $nid))->fetchCol();
	$nodes = node_load_multiple($nids);
	$return_string = '';
	if (!empty($nodes)):
		foreach ($nodes as $node) :
			$return_string .= '<div class="post-relative-column ">';
			$return_string .= '<div class="post-relative-thumb"><a href="'.file_create_url($node->field_image['und'][0]['uri']).'" class="popup">';
			$return_string .= '<img src="'.file_create_url($node->field_image['und'][0]['uri']).'" alt="'.$node->title.'">';
			$return_string .= '</a></div>';
			$return_string .= '<div class="post-relative-title">';
			$return_string .= '<a href="'.url("node/" . $node->nid).'">'.$node->title.'</a>';
			$return_string .= '</div></div>';
		endforeach;
	endif;
	return $return_string;
}




if(!empty($_REQUEST["built_in_skins"])){
	$setting_skin = $_REQUEST["built_in_skins"];
} else {
	$setting_skin = theme_get_setting('built_in_skins', 'exblog');
}

if(!empty($setting_skin)){
	$skin_color = '/css/'.$setting_skin;
}else{
	$skin_color = '/css/update.css';
}
$css_skin = array(
	'#tag' => 'link', // The #tag is the html tag - <link />
	'#attributes' => array( // Set up an array of attributes inside the tag
	'href' => $base_url.'/'.path_to_theme().$skin_color,
	'rel' => 'stylesheet',
	'type' => 'text/css',
	'id' => 'skin',
	'data-baseurl'=>$base_url.'/'.path_to_theme()
	),
	'#weight' => 1,
);
drupal_add_html_head($css_skin,'skin');


	
