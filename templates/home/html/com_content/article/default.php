<?php
# no direct access
defined( '_JEXEC' ) or die;
$aboutLinky = JRoute::_( 'index.php?&Itemid=107' );
?>

<a class="postbox p+ bg:gray-3 hover/bg:gray-2" href="<?php echo $aboutLinky; ?>">
    <span class="topheading">About</span>
    <h2><?php echo $this->item->title; ?></h2>
    <?php echo $this->item->text; ?>
    <p><i class="fa fa-arrow-right"></i></p>
</a> 