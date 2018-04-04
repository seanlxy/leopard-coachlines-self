<?php

$category_list = fetch_all("SELECT pmd.`menu_label`, pmd.`full_url`, pmd.`title`
	FROM `blog_category` bc
	LEFT JOIN `page_meta_data` pmd
	ON(pmd.`id` = bc.`page_meta_data_id`)
	WHERE pmd.`status` = 'A'
	AND pmd.`menu_label` != ''
	ORDER BY pmd.`rank`");

if( !empty($category_list) )
{
	$panels_view .= '<div class="well well-small"><h4 class="text-green">Categories</h4> <ul class="list__blogs">';

	foreach ($category_list as $category_item)
	{
		$panels_view .= ' <li class="list__blogs__item"><a href="'.$pg_full_url.$category_item['full_url'].'" title="'.$category_item['title'].'">'.$category_item['menu_label'].'</a></li>';
	}

	
	$panels_view .= '</ul></div>';
}


?>