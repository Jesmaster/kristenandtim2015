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

}

/**
 * Implements hook_process_page().
 *
 * @see page.tpl.php
 */
function kristenandtim2015_process_page(&$variables) {
  $variables['navbar_classes_array'][] = 'visible-xs';
  $variables['navbar_classes_array'][] = 'visible-sm';
  
  $variables['navbar_classes'] = implode(' ', $variables['navbar_classes_array']);
}
