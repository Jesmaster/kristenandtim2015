<?php
/**
 * @file
 * page.vars.php
 */

/**
 * Implements hook_preprocess_page().
 *
 * @see page.tpl.php
 */
function kristenandtim2015_preprocess_page(&$variables) {
  if(drupal_is_front_page()){
    $variables['title'] = '';
  }
}

/**
 * Implements hook_process_page().
 *
 * @see page.tpl.php
 */
function kristenandtim2015_process_page(&$variables) {
  if(drupal_is_front_page()){
    $variables['content_column_class'] = ' class="col-md-offset-1 col-md-10"';
  }

  $variables['navbar_classes_array'][] = 'visible-xs';
  $variables['navbar_classes_array'][] = 'visible-sm';

  $variables['navbar_classes'] = implode(' ', $variables['navbar_classes_array']);
}

/**
 * Implements template_preprocess_maintenance_page().
 */
function kristenandtim2015_preprocess_maintenance_page(&$variables){
	$variables['title'] = 'Site Coming Soon!';

	$variables['content'] = '<p>'.$variables['content'].'</p>';
	$variables['content'] .= theme('image',array('path' => drupal_get_path('theme', 'kristenandtim2015').'/images/img-collage.jpg'));
}