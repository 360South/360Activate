jQuery.noConflict();
jQuery(document).ready(function(e){
  
  jQuery('.datesadd').click(function(e){
    e.preventDefault();
	var lastrow 	= 	jQuery('.dates_row').length;	
	var html		=	'';
	var html = html + 	'<div class="dates dates_row" style="width:550px;margin:0 0 10px 0">';
	var html = html + 	'  <input name="jform[dates][from]['+lastrow+']" id="jform[dates][from]['+lastrow+']" class="inputbox" style="float:left;display:inline-block;width:248px;margin:0 10px 0 0" />';
	var html = html + 	'  <input name="jform[dates][to]['+lastrow+']" id="jform[dates][to]['+lastrow+']" class="inputbox" style="float:left;display:inline-block;width:248px;margin:0" />';
	var html = html + 	'  <div style="clear:both"></div>';
	var html = html + 	'</div>';
	jQuery(html).appendTo('.dates-additional');
  });
  jQuery('.datesdelete').click(function(e){
    e.preventDefault();
	var thisrow = jQuery(this).parent().remove();
  });
  
});