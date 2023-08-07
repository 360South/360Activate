<?php

if (!empty($_FILES)) {

	

	$tmpName		= $_FILES['Filedata']['tmp_name'];

	$newName		= $_FILES['Filedata']['name'];

	

	$newPath		= $_SERVER['DOCUMENT_ROOT'] .'/images/addons/original/'.$newName;

	$disPath		= $_SERVER['DOCUMENT_ROOT'] .'/images/addons/display/'.$newName;

	$thbPath		= $_SERVER['DOCUMENT_ROOT'] .'/images/addons/tn/'.$newName;

	$wmImg			= $_SERVER['DOCUMENT_ROOT'] .'/administrator/components/com_addons/assets/blank.png';

		

	$setSize 		= 300;

	$thbSize 		= 190;

	$jpeg_quality	= 100;

	

	move_uploaded_file($tmpName,$newPath);

	list($width, $height, $type, $attr) = getimagesize($newPath);

	

	# create display image with watermark

	/*if ($width > $height) {

		$newW = $setSize;

		$newH = round( $height * ( $setSize / $width ) );

	} else {

		$newW = round( $width * ( $setSize / $height ) );

		$newH = $setSize;

	};*/

	

	$newW = $setSize;

	$newH = round( $height * ( $setSize / $width ) );

	

	$img_r = imagecreatefromjpeg($newPath) or notfound();

	$dst_r = ImageCreateTrueColor( $newW, $newH );

	imagecopyresampled($dst_r,$img_r,0,0,0,0,$newW,$newH,$width,$height);

	if (function_exists("imageconvolution")) {

		$matrix = array(array( -1, -1, -1 ),array( -1, 32, -1 ),array( -1, -1, -1 ));

		$divisor = 24;

		$offset = 0;

		imageconvolution($dst_r, $matrix, $divisor, $offset);

	};

	$mark = imagecreatefrompng($wmImg);

	imagealphablending($mark, true);

	imagesavealpha($mark, true);

	list($mwidth, $mheight) = getimagesize($wmImg);

	imagecopy( $dst_r, $mark, ($newW-$mwidth)-5, ($newH-$mheight)-5, 0, 0, $mwidth, $mheight );					

	header("Content-type: image/jpeg");

	imagejpeg($dst_r,$disPath,$jpeg_quality);

	imagedestroy($dst_r);

	imagedestroy($mark);

	

	# create thumbnail

	if ($width > $height) {

		$newW = round( $width * ( $thbSize / $height ) );

		$newH = $thbSize;

		$newX = 0-($newW-$thbSize)/2;

		$newY = 0;

	} else {

		$newW = $thbSize;

		$newH = round( $height * ( $thbSize / $width ) );

		$newX = 0;

		$newY = 0-($newH-$thbSize)/2;

	};

	$img_r = imagecreatefromjpeg($newPath) or notfound();

	$dst_r = ImageCreateTrueColor( $thbSize, $thbSize );

	imagecopyresampled($dst_r, $img_r, $newX, $newY, 0, 0, $newW, $newH, $width, $height);

	if (isset($sharpen)) {

		if (function_exists("imageconvolution")) {

			$matrix = array(array( -1, -1, -1 ),array( -1, 32, -1 ),array( -1, -1, -1 ));

			$divisor = 24;

			$offset = 0;

			imageconvolution($dst_r, $matrix, $divisor, $offset);

		};

	};

	header("Content-type: image/jpeg");

	imagejpeg($dst_r,$thbPath,$jpeg_quality);

	imagedestroy($dst_r);

	

	echo "1";

	

}

?>