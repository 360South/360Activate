<?php
# no direct access
defined('_JEXEC') or die;

abstract class BroswerHelper
{
	public static function getImages() {
		
		$path        = '/images/logos/';
		$imagesDir   = JPATH_BASE . $path;
		
		$images      = glob($imagesDir . '*.{jpg,jpeg,png,gif,svg}', GLOB_BRACE);
		$num         = 20;
		
		shuffle($images);
		
		$i=0;foreach($images as $image) :
			if($i < $num) {
				$images[$i] = $path . str_replace($imagesDir, '', $image);
			} else {
				unset($images[$i]);	
			}
			
		$i++;endforeach;
		
		return $images;
	}

}

