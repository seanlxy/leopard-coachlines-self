<?php
$footer_nav = '';


//  Fetch all active general pages where footer menu is not empty and status is active
$footer_general_pages = fetch_all("SELECT pmd.`footer_menu`, pmd.`title`, pmd.`url`, pmd.`full_url`
    FROM general_pages gp
    LEFT JOIN `page_meta_data` pmd
    ON(pmd.`id` = gp.`page_meta_data_id`)
    WHERE pmd.`status` = 'A'
    AND pmd.`footer_menu` != ''
    ORDER BY gp.`parent_id`, pmd.`rank` ASC");

if(!empty($footer_general_pages))
{
	foreach ($footer_general_pages as $footer_general_page)
	{
        $is_active = ($page_url == $footer_general_page['url']) ? ' class="footer_nav--active"' : '';
		$page_links .= '<li><a'.$is_active.' href="'.$footer_general_page['full_url'].'" title="'.$footer_general_page['title'].'">'.$footer_general_page['footer_menu'].'</a></li>';
	}

$footer_nav = <<< H
<ul>
        {$page_links}
</ul>

H;
}


$tags_arr['footer_nav'] = $footer_nav;


?>