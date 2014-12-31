<?php

/**
 * Implements hook_preprocess_block().
 */
function kristenandtim2015_preprocess_block(&$variables) {
	if($variables['block_html_id'] == 'block-system-main-menu'){

		$render = array(
			'#prefix' => '<div class="row">',
			'#suffix' => '</div>',
			'image' => array(
				'#prefix' => '<div class="col-md-6">',
				'#suffix' => '</div>',
			),
			'menu' => array(
				'#prefix' => '<div class="col-md-6 hidden-xs hidden-sm text-center">',
				'#suffix' => '</div>',
				'#theme_wrappers' => array('menu_tree__main_menu'),
			),
		);

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
