/* jce - 2.9.38 | 2023-06-27 | https://www.joomlacontenteditor.net | Copyright (C) 2006 - 2023 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
!function(){var VK=tinymce.VK,Node=tinymce.html.Node,each=tinymce.each,blocks=[];tinymce.create("tinymce.plugins.Figure",{init:function(ed,url){this.editor=ed,ed.onPreInit.add(function(ed){ed.parser.addNodeFilter("figure",function(nodes,name){for(var node,i=nodes.length;i--;){if(node=nodes[i],0===node.getAll("figcaption").length){var figcaption=new Node("figcaption",1);figcaption.attr("data-mce-empty",ed.getLang("figcaption.default","Write a caption...")),figcaption.attr("contenteditable",!0),node.append(figcaption)}node.attr("data-mce-image","1"),node.attr("contenteditable","false"),each(node.getAll("img"),function(img){img.attr("data-mce-contenteditable","true")}),ed.settings.figure_data_attribute!==!1&&node.attr("data-wf-figure","1")}}),ed.parser.addNodeFilter("figcaption",function(nodes,name){for(var node,i=nodes.length;i--;)node=nodes[i],node.firstChild||node.attr("data-mce-empty",ed.getLang("figcaption.default","Write a caption...")),node.attr("contenteditable","true")}),ed.serializer.addNodeFilter("figure",function(nodes,name){for(var node,i=nodes.length;i--;)node=nodes[i],node.attr("contenteditable",null),each(node.getAll("img"),function(img){img.attr("data-mce-contenteditable",null)})}),ed.serializer.addNodeFilter("figcaption",function(nodes,name){for(var node,i=nodes.length;i--;)node=nodes[i],node.firstChild?node.attr("contenteditable",null):node.remove()}),ed.serializer.addAttributeFilter("data-mce-image",function(nodes,name){for(var node,i=nodes.length;i--;)node=nodes[i],node.attr(name,null)}),each(ed.schema.getBlockElements(),function(v,k){return!!/\W/.test(k)||void blocks.push(k.toLowerCase())}),ed.formatter.register("figure",{block:"figure",remove:"all",ceFalseOverride:!0,deep:!1,onformat:function(elm,fmt,vars,node){vars=vars||{},ed.dom.select("img,video,iframe",elm)&&(ed.dom.setAttribs(elm,{"data-mce-image":1,contenteditable:!1}),ed.dom.setAttrib(ed.dom.select("img",elm),"data-mce-contenteditable","true"),ed.dom.add(elm,"figcaption",{"data-mce-empty":ed.getLang("figcaption.default","Write a caption..."),contenteditable:!0},vars.caption||""),ed.settings.figure_data_attribute!==!1&&ed.dom.setAttribs(elm,{"data-wf-figure":"1"}))},onremove:function(node){ed.dom.remove(ed.dom.select("figcaption",node)),ed.dom.remove(ed.dom.getParent("figure",node),1)}}),ed.onBeforeExecCommand.add(function(ed,cmd,ui,v,o){var se=ed.selection,n=se.getNode();switch(cmd){case"JustifyRight":case"JustifyLeft":case"JustifyCenter":if(n&&ed.dom.is(n,"img,span[data-mce-object]")){var parent=ed.dom.getParent(n,"FIGURE");parent&&(se.select(parent),ed.execCommand(cmd,!1),o.terminate=!0)}}}),ed.onKeyDown.add(function(ed,e){var isDelete,rng,container,offset,collapsed;if(isDelete=e.keyCode==VK.DELETE,!e.isDefaultPrevented()&&(isDelete||e.keyCode==VK.BACKSPACE)&&!VK.modifierPressed(e)&&(rng=ed.selection.getRng(),container=rng.startContainer,offset=rng.startOffset,collapsed=rng.collapsed,container=ed.dom.getParent(container,"FIGURE"))){var node=ed.selection.getNode();if("IMG"===node.nodeName)return ed.dom.remove(container),ed.nodeChanged(),void e.preventDefault();if("FIGCAPTION"!=node.nodeName||node.nodeValue&&0!==node.nodeValue.length||0!==node.childNodes.length||e.preventDefault(),3===node.nodeType&&!collapsed&&!offset){var figcaption=ed.dom.getParent(node,"FIGCAPTION");if(figcaption){for(;figcaption.firstChild;)figcaption.removeChild(figcaption.firstChild);e.preventDefault()}}}})})}}),tinymce.PluginManager.add("figure",tinymce.plugins.Figure)}();