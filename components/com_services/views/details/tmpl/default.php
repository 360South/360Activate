<?php defined('_JEXEC') or die; 
#echo ServicesHelper::getTemplate();

if( is_file( JPATH_COMPONENT . '/views/details/tmpl/default_' . ServicesHelper::getTemplate() . '.php' ) ) :
	echo $this->loadTemplate( ServicesHelper::getTemplate() );
else :
	echo $this->loadTemplate( 'item' );
endif;

?>