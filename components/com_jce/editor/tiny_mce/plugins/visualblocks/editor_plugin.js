/* jce - 2.9.38 | 2023-06-27 | https://www.joomlacontenteditor.net | Copyright (C) 2006 - 2023 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
!function(){var Storage=tinymce.util.Storage;tinymce.PluginManager.add("visualblocks",function(ed,url){function toggleVisualBlocks(){ed.controlManager.setActive("visualblocks",state),ed.getParam("use_state_cookies",!0)&&Storage.set("wf_visualblocks_state",state),state?ed.dom.addClass(ed.getBody(),"mceVisualBlocks"):ed.dom.removeClass(ed.getBody(),"mceVisualBlocks")}var state=!1;ed.getParam("use_state_cookies",!0)&&(state=Storage.get("wf_visualblocks_state")),tinymce.is(state,"string")&&("null"!==state&&"false"!==state||(state=!1),state=!!state),state=ed.getParam("visualblocks_default_state",state),ed.addCommand("mceVisualBlocks",function(){state=!state,toggleVisualBlocks()}),ed.onSetContent.add(function(){ed.controlManager.setActive("visualblocks",state)}),ed.addButton("visualblocks",{title:"visualblocks.desc",cmd:"mceVisualBlocks"}),ed.onInit.add(function(){ed.settings.compress.css||ed.dom.loadCSS(url+"/css/content.css"),state&&toggleVisualBlocks()})})}();