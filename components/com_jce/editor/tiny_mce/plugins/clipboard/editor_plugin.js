/* jce - 2.9.38 | 2023-06-27 | https://www.joomlacontenteditor.net | Copyright (C) 2006 - 2023 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
!function(){"use strict";function parseCSS(content){function isValue(val){return""!==val&&"normal"!==val&&"inherit"!==val&&"none"!==val&&"initial"!==val}function isValidStyle(value){return Object.values(value).length}var rules,classes={};return rules=parseCssToRules(content),each$1(rules,function(r){if(r.selectorText){var styles={};each$1(r.style,function(name){var value=r.style.getPropertyValue(name);isValue(value)&&(styles[name]=value)}),each$1(r.selectorText.split(","),function(selector){selector=selector.trim(),0!=selector.indexOf(".mce")&&selector.indexOf(".mce-")===-1&&selector.indexOf(".mso-")===-1&&isValidStyle(styles)&&(classes[selector]={styles:styles,text:r.cssText})})}}),classes}function processStylesheets(content,embed_stylesheet){var div=DOM$1.create("div",{},content),styles={},css="";return styles=tinymce.extend(styles,parseCSS(content)),each$1(styles,function(value,selector){return selector.indexOf("Mso")!==-1||void(embed_stylesheet?css+=value.text:DOM$1.setStyles(DOM$1.select(selector,div),value.styles))}),css&&div.prepend(DOM$1.create("style",{type:"text/css"},css)),content=div.innerHTML}function hasContentType(clipboardContent,mimeType){return mimeType in clipboardContent&&clipboardContent[mimeType].length>0}function getDataTransferItems(dataTransfer){var items={};if(dataTransfer){if(dataTransfer.getData){var legacyText=dataTransfer.getData("Text");legacyText&&legacyText.length>0&&legacyText.indexOf(mceInternalUrlPrefix)===-1&&(items["text/plain"]=legacyText)}if(dataTransfer.types)for(var i=0;i<dataTransfer.types.length;i++){var contentType=dataTransfer.types[i];try{items[contentType]=dataTransfer.getData(contentType)}catch(ex){items[contentType]=""}}}return items}function filter(content,items){return tinymce.each(items,function(v){content=v.constructor==RegExp?content.replace(v,""):content.replace(v[0],v[1])}),content}function trimHtml(html){function trimSpaces(all,s1,s2){return s1||s2?"\xa0":" "}function getInnerFragment(html){var startFragment="<!--StartFragment-->",endFragment="<!--EndFragment-->",startPos=html.indexOf(startFragment);if(startPos!==-1){var fragmentHtml=html.substr(startPos+startFragment.length),endPos=fragmentHtml.indexOf(endFragment);if(endPos!==-1&&/^<\/(p|h[1-6]|li)>/i.test(fragmentHtml.substr(endPos+endFragment.length,5)))return fragmentHtml.substr(0,endPos)}return html}return html=filter(getInnerFragment(html),[/^[\s\S]*<body[^>]*>\s*|\s*<\/body[^>]*>[\s\S]*$/gi,/<!--StartFragment-->|<!--EndFragment-->/g,[/( ?)<span class="Apple-converted-space">(\u00a0|&nbsp;)<\/span>( ?)/g,trimSpaces],/<br class="Apple-interchange-newline">/g,/^<meta[^>]+>/g,/<br>$/i,/&nbsp;$/])}function openWin(ed,cmd){function createEditor(elm){var pasteEd=new tinymce.Editor(elm.id,{plugins:"",language_load:!1,forced_root_block:!1,verify_html:!1,invalid_elements:ed.settings.invalid_elements,base_url:ed.settings.base_url,document_base_url:ed.settings.document_base_url,directionality:ed.settings.directionality,content_css:ed.settings.content_css,allow_event_attributes:ed.settings.allow_event_attributes,object_resizing:!1,schema:"mixed",theme:function(){var parent=DOM.create("div",{role:"application",id:elm.id+"_parent",style:"width:100%"}),container=DOM.add(parent,"div",{style:"width:100%"});return DOM.insertAfter(parent,elm),{iframeContainer:container,editorContainer:parent}}});pasteEd.contentCSS=ed.contentCSS,pasteEd.onPreInit.add(function(){var doc=this.getDoc();this.onPaste.add(function(el,e){var clipboardContent=getDataTransferItems(e.clipboardData||e.dataTransfer||doc.dataTransfer);if(clipboardContent){isInternalContent=hasContentType(clipboardContent,"x-tinymce/html");var content=clipboardContent["x-tinymce/html"]||clipboardContent["text/html"]||clipboardContent["text/plain"]||"";ed.settings.clipboard_process_stylesheets!==!1&&(content=processStylesheets(content)),content=trimHtml(content);var sel=doc.getSelection();if(null!=sel){var rng=sel.getRangeAt(0);if(null!=rng){content+='<span id="__mce_caret">_</span>',rng.startContainer==doc&&rng.endContainer==doc?doc.body.innerHTML=content:(rng.deleteContents(),0===doc.body.childNodes.length?doc.body.innerHTML=content:rng.insertNode(rng.createContextualFragment(content)));var caretNode=doc.getElementById("__mce_caret");rng=doc.createRange(),rng.setStartBefore(caretNode),rng.setEndBefore(caretNode),sel.removeAllRanges(),sel.addRange(rng),caretNode.parentNode&&caretNode.parentNode.removeChild(caretNode)}}e.preventDefault()}}),this.serializer.addAttributeFilter("data-mce-fragment",function(nodes,name){for(var i=nodes.length;i--;)nodes[i].attr("data-mce-fragment",null)})}),pasteEd.render()}var ctrl,title="",msg=ed.getLang("clipboard.paste_dlg_title","Use %s+V on your keyboard to paste text into the window.");msg=msg.replace(/%s/g,tinymce.isMac?"CMD":"CTRL"),"mcePaste"===cmd?(title=ed.getLang("clipboard.paste_desc"),ctrl='<textarea id="'+ed.id+'_paste_content" dir="ltr" wrap="soft" rows="7" autofocus></textarea>'):(title=ed.getLang("clipboard.paste_text_desc"),ctrl='<textarea id="'+ed.id+'_paste_content" dir="ltr" wrap="soft" rows="7" autofocus></textarea>');var html='<div class="mceModalRow mceModalStack">   <label for="'+ed.id+'_paste_content">'+msg+'</label></div><div class="mceModalRow">   <div class="mceModalControl">'+ctrl+"</div></div>",isInternalContent=!1;ed.windowManager.open({title:title,content:html,size:"mce-modal-landscape-medium",open:function(){var inp=DOM.get(ed.id+"_paste_content");"mcePaste"==cmd&&createEditor(inp)},close:function(){},buttons:[{title:ed.getLang("cancel","Cancel"),id:"cancel"},{title:ed.getLang("insert","Insert"),id:"insert",onsubmit:function(e){var inp=DOM.get(ed.id+"_paste_content"),data={};if("mcePaste"==cmd){var content=tinymce.get(inp.id).getContent();ed.settings.code_allow_style!==!0&&(content=content.replace(/<style[^>]*>[\s\S]+?<\/style>/gi,"")),content=content.replace(/<meta([^>]+)>/,""),data.content=tinymce.trim(content),data.internal=isInternalContent}else data.text=inp.value;ed.execCommand("mceInsertClipboardContent",!1,data)},classes:"primary",autofocus:!0}]})}var each$1=tinymce.each,DOM$1=tinymce.DOM,mceInternalUrlPrefix="data:text/mce-internal,",parseCssToRules=function(content){var doc=document.implementation.createHTMLDocument(""),styleElement=document.createElement("style");return styleElement.textContent=content,doc.body.appendChild(styleElement),styleElement.sheet.cssRules},DOM=tinymce.DOM,each=tinymce.each;tinymce.create("tinymce.plugins.ClipboardPlugin",{init:function(ed,url){var pasteText=ed.getParam("clipboard_paste_text",1),pasteHtml=ed.getParam("clipboard_paste_html",1);ed.onInit.add(function(){ed.plugins.contextmenu&&ed.plugins.contextmenu.onContextMenu.add(function(th,m,e){var c=ed.selection.isCollapsed();ed.getParam("clipboard_cut",1)&&m.add({title:"advanced.cut_desc",icon:"cut",cmd:"Cut"}).setDisabled(c),ed.getParam("clipboard_copy",1)&&m.add({title:"advanced.copy_desc",icon:"copy",cmd:"Copy"}).setDisabled(c),pasteHtml&&m.add({title:"clipboard.paste_desc",icon:"paste",cmd:"mcePaste"}),pasteText&&m.add({title:"clipboard.paste_text_desc",icon:"pastetext",cmd:"mcePasteText"})})}),each(["mcePasteText","mcePaste"],function(cmd){ed.addCommand(cmd,function(){var doc=ed.getDoc(),failed=!1;if(ed.getParam("clipboard_paste_use_dialog"))return openWin(ed,cmd);try{doc.execCommand("Paste",!1,null)}catch(e){failed=!0}return doc.queryCommandEnabled("Paste")||(failed=!0),failed?openWin(ed,cmd):void 0})}),pasteHtml&&ed.addButton("paste",{title:"clipboard.paste_desc",cmd:"mcePaste",ui:!0}),pasteText&&ed.addButton("pastetext",{title:"clipboard.paste_text_desc",cmd:"mcePasteText",ui:!0}),ed.getParam("clipboard_cut",1)&&ed.addButton("cut",{title:"advanced.cut_desc",cmd:"Cut",icon:"cut"}),ed.getParam("clipboard_copy",1)&&ed.addButton("copy",{title:"advanced.copy_desc",cmd:"Copy",icon:"copy"})}}),tinymce.PluginManager.add("clipboard",tinymce.plugins.ClipboardPlugin)}();