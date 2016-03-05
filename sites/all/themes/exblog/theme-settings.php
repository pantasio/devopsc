<?php

function exblog_form_system_theme_settings_alter(&$form, $form_state) {
	$theme_path = drupal_get_path('theme', 'exblog');
  	$form['settings'] = array(
      '#type' =>'vertical_tabs',
      '#title' => t('Theme settings'),
      '#weight' => 2,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
	  '#attached' => array(
					'css' => array(drupal_get_path('theme', 'exblog') . '/css/drupalet_base/admin.css'),
					'js' => array(
						drupal_get_path('theme', 'exblog') . '/js/drupalet_admin/admin.js',
					),
			),
  	);
	
	// Tracking code & Css custom
	//==============================
	$form['settings']['general_setting'] = array(
		'#type' => 'fieldset',
		'#title' => t('General Settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	$form['settings']['general_setting']['general_setting_tracking_code'] = array(
		'#type' => 'textarea',
		'#title' => t('Tracking Code'),
		'#default_value' => theme_get_setting('general_setting_tracking_code', 'exblog'),
	);
	$form['settings']['custom_css'] = array(
		'#type' => 'fieldset',
		'#title' => t('Custom CSS'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	$form['settings']['custom_css']['custom_css'] = array(
		'#type' => 'textarea',
		'#title' => t('Custom CSS'),
		'#default_value' => theme_get_setting('custom_css', 'exblog'),
		'#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
	);
	//========= End ================

	
	// Footer Copyright message
	//==============================
	$form['settings']['footer'] = array(
      '#type' => 'fieldset',
      '#title' => t('Footer settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  	);
	$form['settings']['footer']['footer_copyright_message'] = array(
      '#type' => 'textarea',
      '#title' => t('Copyright message'),
      '#default_value' => theme_get_setting('footer_copyright_message','exblog'),
  	);
	//========= End ================
	
	// Switch Skin color
	//===============================
	$form['settings']['skin'] = array(
	
		'#type' => 'fieldset',
	
		'#title' => t('Switcher Style'),
	
		'#collapsible' => TRUE,
	
		'#collapsed' => FALSE,
	
	);
	$form['settings']['skin']['built_in_skins'] = array(
		'#type' => 'radios',
		'#title' => t('Built-in Skins'),
		'#options' => array(
		'update.css' => t('Style Default'),
		'update-2.css' => t('Style 2'),
		'update-3.css' => t('Style 3'),
		'update-4.css' => t('Style 4'),
		),
		'#default_value' => theme_get_setting('built_in_skins','exblog')
	);
	//========= End ================
}