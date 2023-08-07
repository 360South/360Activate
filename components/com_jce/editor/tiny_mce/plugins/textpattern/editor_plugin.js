/* jce - 2.9.38 | 2023-06-27 | https://www.joomlacontenteditor.net | Copyright (C) 2006 - 2023 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
!function(){function toHtml(ed,source){if(!ed.getParam("textpattern_use_markdown",1))return source;var i,text=tinymce.trim(source),rules=[{p:/```([^\n]*?)\n([^]*?)\n\s*```\s*\n/g,r:function(m,lang,grp){return grp=tinymce.DOM.encode(grp),lang&&(grp='<code class="language-'+lang+'">'+grp+"</code>"),grp=grp.replace(/\n+/g,"\r"),"<pre>"+grp+"</pre>"}},{p:/[`]+(.*?)[`]+/g,r:function(m,grp){return"<code>"+tinymce.DOM.encode(grp)+"</code>"}},{p:/\n\s*(#+)(.*)/g,r:function(m,hset,hval){return m=hset.length,"<h"+m+">"+hval.replace(/#+/g,"").trim()+"</h"+m+">"}},{p:/\n\s*(.*?)\n={3,}\n/g,r:"\n<h1>$1</h1>\n"},{p:/\n\s*(.*?)\n-{3,}\n/g,r:"\n<h2>$1</h2>\n"},{p:/___(.*?)___/g,r:"<u>$1</u>"},{p:/(\*\*|__)(.*?)\1/g,r:"<strong>$2</strong>"},{p:/(\*|\b_)(.*?)\1/g,r:"<em>$2</em>"},{p:/~~(.*?)~~/g,r:"<del>$1</del>"},{p:/:"(.*?)":/g,r:"<q>$1</q>"},{p:/\!\[([^\[]+?)\]\s*\(([^\)]+?)\)/g,r:'<img src="$2" alt="$1" />'},{p:/\[([^\[]+?)\]\s*\(([^\)]+?)\)/g,r:'<a href="$2">$1</a>'},{p:/\n\s*(\*|\-)\s*([^\n]*)/g,r:"\n<ul><li>$2</li></ul>"},{p:/\n\s*\d+\.\s*([^\n]*)/g,r:"\n<ol><li>$1</li></ol>"},{p:/\n\s*(\>)\s*([^\n]*)/g,r:"\n<blockquote>$2</blockquote>"},{p:/<\/(ul|ol|blockquote)>\s*<\1>/g,r:" "},{p:/\n\s*\*{5,}\s*\n/g,r:"\n<hr>"},{p:/\n{3,}/g,r:"\n\n"},{p:/>\s+</g,r:"><"}],l=rules.length;text="\n"+text+"\n";for(var i=0;i<l;i++)text=text.replace(rules[i].p,rules[i].r);if(text=tinymce.trim(text),source===text)return source;var content=[],block=ed.settings.forced_root_block||"p";return each(text.split(/\r?\n{2,}/),function(val){if(""!=val)return val=val.replace(/\n/g,"<br />"),"<"==val[0]?void content.push(val):block?void content.push("<"+block+">"+val+"</"+block+">"):void content.push(val+"<br /><br />")}),content.join("")}function cleanURL(src,mode){function toUnicode(s){for(var c=s.toString(16).toUpperCase();c.length<4;)c="0"+c;return"\\u"+c}function clean(s,spaces){function cleanChars(s){s=s.replace(/[\+\\\/\?\#%&<>"\'=\[\]\{\},;@\^\(\)\xa3\u20ac$]/g,"");for(var r="",i=0,ln=s.length;i<ln;i++){var ch=s[i];/[^\w\.\-~\s ]/.test(ch)&&toUnicode(ch.charCodeAt(0))<"\\u007F"||(r+=ch)}return s=r}return spaces||(s=s.replace(/[\s ]/g,"_")),s=s.replace(/[\/\\\\]+/g,"/"),s=s.split("/").map(function(string){return cleanChars(string,mode)}).join("/"),s=s.replace(/(\.){2,}/g,""),s=s.replace(/^\./,""),s=s.replace(/\.$/,""),s=s.replace(/^\//,"").replace(/\/$/,"")}return src=clean(src,!0)}var each=tinymce.each,defaultPatterns=[{start:"*",end:"*",format:"italic"},{start:"**",end:"**",format:"bold"},{start:"~~",end:"~~",format:"strikethrough"},{start:"```",end:"```",format:"pre"},{start:"`",end:"`",format:"code"},{start:"![",end:")",cmd:"InsertMarkdownImage",remove:!0},{start:"[",end:")",cmd:"InsertMarkdownLink",remove:!0},{start:"# ",format:"h1"},{start:"## ",format:"h2"},{start:"### ",format:"h3"},{start:"#### ",format:"h4"},{start:"##### ",format:"h5"},{start:"###### ",format:"h6"},{start:">",format:"blockquote"},{start:"1. ",cmd:"InsertOrderedList"},{start:"* ",cmd:"InsertUnorderedList"},{start:"- ",cmd:"InsertUnorderedList"},{start:"$$",end:"$$",cmd:"InsertCustomTextPattern",remove:!0}];tinymce.create("tinymce.plugins.TextPatternPlugin",{init:function(editor,url){var self=this;self.editor=editor;var patterns=editor.settings.textpattern_patterns||defaultPatterns;editor.addCommand("InsertMarkdownLink",function(ui,node){var data=node.split("]("),dom=editor.dom;if(data.length<2)return!1;var text=data[0],href=data[1];if(href=href.substring(0,href.length),text=text.substring(1),href=cleanURL(href),!href)return!1;text||(text=href),href=editor.convertURL(href);var args={href:href},html=dom.createHTML("a",args,text);return editor.execCommand("mceInsertContent",!1,html),!1}),editor.addCommand("InsertMarkdownImage",function(ui,node){var data=node.split("]("),dom=editor.dom;if(data.length<2)return!1;var alt=data[0],src=data[1];src=src.substring(0,src.length),alt=alt.substring(1,1),src=cleanURL(src),src=editor.convertURL(src);var args={alt:alt,src:src};src||(args["data-mce-upload-marker"]=1,args.width=320,args.height=240,args.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7",args.class="mce-item-uploadmarker");var html=dom.createHTML("img",args);return editor.execCommand("mceInsertContent",!1,html),!1});var custom_patterns=editor.getParam("textpattern_custom_patterns","","hash");editor.addCommand("InsertCustomTextPattern",function(ui,node){var html;tinymce.is(custom_patterns,"function")&&(html=""+custom_patterns(node)),tinymce.is(custom_patterns,"object")&&(html=custom_patterns[node]||""),tinymce.is(html)&&editor.execCommand("mceReplaceContent",!1,html)}),this.addPattern=function(pattern){patterns.push(pattern)},this.setPatterns=function(values){patterns=values},this.getPatterns=function(){return patterns},editor.onPreInit.add(function(){each(patterns,function(ptn){editor.textpattern.addPattern(ptn)})}),editor.getParam("textpattern_use_markdown",1)&&(editor.onBeforeSetContent.add(function(ed,o){o.content.indexOf("<")===-1&&(o.content=toHtml(ed,o.content))}),editor.onPreInit.add(function(){editor.serializer.addAttributeFilter("data-mce-wrapper",function(nodes,name){for(var node,i=nodes.length;i--;)node=nodes[i],node.unwrap()}),editor.parser.addAttributeFilter("data-mce-wrapper",function(nodes,name){for(var node,i=nodes.length;i--;)node=nodes[i],node.unwrap()}),editor.onGetClipboardContent.add(function(ed,clipboard){var text=clipboard["text/plain"]||"",html=clipboard["text/html"]||"";if(text&&!html){text=ed.dom.encode(text);var markdown=toHtml(editor,text);markdown!==text&&(clipboard["text/html"]=markdown)}}),editor.onBeforeExecCommand.add(function(editor,cmd,ui,v,o){if("mceInsertClipboardContent"===cmd){var text=v.text||"";if(text){text=editor.dom.encode(text);var markdown=toHtml(editor,text);markdown!==text&&(v.content=markdown,v.text="")}}})}))},toHtml:function(content){return toHtml(this.editor,content)}}),tinymce.PluginManager.add("textpattern",tinymce.plugins.TextPatternPlugin)}();