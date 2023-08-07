<?php
# no direct access
defined( '_JEXEC' ) or die;
$menualias = JFactory::getApplication()->getMenu()->getActive()->alias;
#echo '<pre>';print_r($menualias);echo '</pre>';
?>

<?php if(is_file(JPATH_SITE.'/templates/follower/html/com_content/article/default_'.$menualias.'.php')) :
	
	echo $this->loadTemplate( $menualias );

else : ?>

<div id="content">
  <div class="container">
    <div class="row bg:gray-2">
      <div class="col-md-12">
        <div class="postbox p+ u-offset bg:gray-3">
          <div class="row">
            <div class="col-sm-10 col-sm-offset-1"> <?php echo $this->item->text; ?> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endif; ?>