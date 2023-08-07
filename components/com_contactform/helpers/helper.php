<?php
# no direct access
defined('_JEXEC') or die;

abstract class ContactformHelper
{

	public static function getImages() {

		$path        = '/images/logos/';
		$imagesDir   = JPATH_BASE . $path;
		/*$images      = glob($imagesDir . '*.{jpg,jpeg,png,gif,svg}', GLOB_BRACE);*/
		$images      = glob($imagesDir.'*.svg', GLOB_BRACE);
		$num         = 20;
		shuffle($images);

		$i=0;
		foreach($images as $image) :
			if($i < $num) {
				#$images[$i] = $path . str_replace($imagesDir, '', $image);
				$images[$i] = file_get_contents($image);
			} else {
				unset($images[$i]);	
			}
			$i++;
		endforeach;
		
		return $images;

	}
}