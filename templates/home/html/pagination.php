<?php

function pagination_item_active(&$item)
{
	return '<a href="' . $item->link . '" rel="nofollow">' . $item->text . '</a>';
}

function pagination_item_inactive(&$item)
{
	// Check if the item is the active page
	if (isset($item->active) && ($item->active))
	{
		return '<span>' . $item->text . '</span>';
	}

	// Doesn't match any other condition, render a normal item
	return '<span class="disabled">' . $item->text . '</span>';
}

function pagination_list_render($list)
{
	
#	echo '<pre>';print_r($list);echo '</pre>';
	
	$html = '<ul>';
#	$html .= '<li class="pagination-start">' . $list['start']['data'] . '</li>';
	$html .= '<li class="pagination-prev">' . $list['previous']['data'] . '</li>';
	foreach ($list['pages'] as $page)
	{
		$html .= '<li>' . $page['data'] . '</li>';
	}
	$html .= '<li class="pagination-next">' . $list['next']['data'] . '</li>';
#	$html .= '<li class="pagination-end">' . $list['end']['data'] . '</li>';
	$html .= '</ul>';

	return $html;
}

?>