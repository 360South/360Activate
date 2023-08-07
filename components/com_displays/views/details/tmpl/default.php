<?php defined('_JEXEC') or die; 

#echo JPATH_COMPONENT . '/views/details/tmpl/default_' . DisplaysHelper::getTemplate() . '.php';
if( is_file( JPATH_COMPONENT . '/views/details/tmpl/default_' . DisplaysHelper::getTemplate() . '.php' ) ) :
	echo $this->loadTemplate( DisplaysHelper::getTemplate() );
else :
	echo $this->loadTemplate( 'item' );
endif;

?>