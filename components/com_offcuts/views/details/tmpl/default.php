<?php defined('_JEXEC') or die; 
#echo OffcutsHelper::getTemplate();

if( is_file( JPATH_COMPONENT . '/views/details/tmpl/default_' . OffcutsHelper::getTemplate() . '.php' ) ) :
	echo $this->loadTemplate( OffcutsHelper::getTemplate() );
else :
	echo $this->loadTemplate( 'item' );
endif;

?>