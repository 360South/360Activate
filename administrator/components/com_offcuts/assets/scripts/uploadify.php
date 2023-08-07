<?php
if (!empty($_FILES)) {
	
#	$directory		= $_POST['catid'];
	$tmpName		= $_FILES['Filedata']['tmp_name'];
	$newName		= $_FILES['Filedata']['name'];
	
	/*if ($directory == 'base') :
		$newPath		= $_SERVER['DOCUMENT_ROOT'] .'/images/downloads/'.$newName;
	else :
		$newPath		= $_SERVER['DOCUMENT_ROOT'] .'/images/downloads/'.$directory.'/'.$newName;
	endif;*/
	
	$newPath		= $_SERVER['DOCUMENT_ROOT'] .'/images/downloads/'.$newName;
	
	move_uploaded_file($tmpName,$newPath);
}
?>