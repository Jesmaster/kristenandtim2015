<?php

/**
 * Implements hook_preprocess_block().
 */
function kristenandtim2015_preprocess_block(&$variables) {
	if($variables['block_html_id'] == 'block-system-main-menu'){

		$menu_prefix = '<div class="col-md-5 hidden-xs hidden-sm text-center main-nav-wrapper">';
		$menu_prefix .= theme('image',array('path' => drupal_get_path('theme', 'kristenandtim2015').'/images/nav-dec-top.png'));
		$menu_prefix .= theme('image',array('path' => drupal_get_path('theme', 'kristenandtim2015').'/images/nav-main.png'));

		$menu_suffix = theme('image',array('path' => drupal_get_path('theme', 'kristenandtim2015').'/images/nav-dec-bottom.png'));
		$menu_suffix .= '</div>';

		$render = array(
			'#prefix' => '<div class="row">',
			'#suffix' => '</div>',
			'image' => array(
				'#prefix' => '<div class="col-md-7">',
				'#suffix' => '</div>',
			),
			'menu' => array(
				'#prefix' => $menu_prefix,
				'#suffix' => $menu_suffix,
				'#theme_wrappers' => array('menu_tree__main_menu'),
			),
		);

		if($variables['elements']['#block']->subject){
			$render['menu']['#prefix'] .= '<h2 class="block-title">'.$variables['elements']['#block']->subject.'</h2>';
			$variables['elements']['#block']->subject = '';
		}
		

		foreach(element_children($variables['elements']) as $element){
			$element = $variables['elements'][$element];
			$element['#printed'] = FALSE;

			if($element['#theme'] == 'menu_link__main_menu'){
				$render['menu']['menu'][] = $element;
			}
			else{
				$render['image']['image'] = $element;
			}
		}

		$variables['content'] = render($render);
	}
}
