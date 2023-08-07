/* jce - 2.9.38 | 2023-06-27 | https://www.joomlacontenteditor.net | Copyright (C) 2006 - 2023 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
!function(){function partition(array,maxrows){for(var size=array.length,columns=Math.ceil(size/maxrows),fullrows=size-(columns-1)*maxrows,result=[],i=0;i<maxrows;++i){var n=array.splice(0,i<fullrows?columns:columns-1);result.push(n)}return result}function flattenObjectToArray(obj){var values=[];return each(obj,function(value,key){return!value||(!!tinymce.is(value,"function")||(tinymce.is(value,"object")&&(value=flattenObjectToArray(value)),"string"==typeof value&&(value=value.split(" ")),void(values=values.concat(value))))}),values}function fixDragSelection(editor){function cleanup(force){editor.getBody().style.webkitUserSelect="",(force||hasSelection)&&(dom.removeClass(dom.select("div.wf-column.mceSelected"),"mceSelected"),hasSelection=!1),selected=[]}function isColumnInContainer(container,column){return!(!container||!column)&&container===dom.getParent(column,".wf-columns")}var resizing,dragging,startColumn,startContainer,lastMouseOverTarget,hasSelection,dom=editor.dom,selected=[];editor.onSetContent.add(function(){cleanup(!0)}),editor.onKeyUp.add(function(){cleanup()}),editor.onMouseDown.add(function(ed,e){2!=e.button&&(cleanup(),startColumn=dom.getParent(e.target,".wf-column"),startContainer=dom.getParent(startColumn,".wf-columns"),selected.push(startColumn))}),dom.bind(editor.getDoc(),"mouseover",function(e){var sel,currentColumn,target=e.target;if(!resizing&&!dragging&&target!==lastMouseOverTarget&&(lastMouseOverTarget=target,startContainer&&startColumn)){if(currentColumn=dom.getParent(target,".wf-column"),isColumnInContainer(startContainer,currentColumn)||(currentColumn=dom.getParent(startContainer,".wf-column")),startColumn===currentColumn&&!hasSelection)return;if(isColumnInContainer(startContainer,currentColumn)){e.preventDefault(),editor.getBody().style.webkitUserSelect="none",selected.push(currentColumn),dom.removeClass(dom.select(".wf-column"),"mceSelected"),dom.addClass(selected,"mceSelected"),hasSelection=!0,sel=editor.selection.getSel();try{sel.removeAllRanges?sel.removeAllRanges():sel.empty()}catch(ex){}}}}),editor.onMouseUp.add(function(){function setPoint(node,start){var walker=new TreeWalker(node,node);do{if(3==node.nodeType)return void(start?rng.setStart(node,0):rng.setEnd(node,node.nodeValue.length));if("BR"==node.nodeName)return void(start?rng.setStartBefore(node):rng.setEndBefore(node))}while(node=start?walker.next():walker.prev())}var rng,selectedColumns,walker,node,lastNode,sel=editor.selection;if(startColumn){if(selectedColumns=dom.select("div.wf-column.mceSelected"),selectedColumns.length>0){var parent=dom.getParent(selectedColumns[0],".wf-columns");rng=dom.createRng(),node=selectedColumns[0],rng.setStartBefore(node),rng.setEndAfter(node),setPoint(node,1),walker=new TreeWalker(node,parent);do if("DIV"==node.nodeName){if(!dom.hasClass(node,"mceSelected"))break;lastNode=node}while(node=walker.next());setPoint(lastNode),sel.setRng(rng)}selected=[],editor.nodeChanged(),startColumn=startContainer=lastMouseOverTarget=null}})}function uikit(){function apply(elm){var classes=elm.getAttribute("class"),suffix=[],layout="";DOM.addClass(elm,"uk-flex");var suffixMap=function(val){var map={small:"@s",medium:"@m",large:"@l",xlarge:"@xl"};return map[val]||""};if(classes.indexOf("wf-columns-stack-")!==-1){var stack=/wf-columns-stack-(small|medium|large|xlarge)/.exec(classes)[1];suffix=["-"+stack,suffixMap(stack)],DOM.addClass(elm,"uk-flex-wrap")}if(classes.indexOf("wf-columns-layout-")!==-1)if(layout=/wf-columns-layout-([0-9-]+|auto)/.exec(classes)[1],"auto"===layout)DOM.addClass(DOM.select(".wf-column",elm),"uk-flex-auto uk-flex-item-auto");else{var weight=layout.charAt(0),cls="";each(suffix,function(sfx){cls+=" "+mapLayout(layout)+sfx}),cls=tinymce.trim(cls),parseInt(weight,10)>1?DOM.addClass(DOM.select(".wf-column:first-child",elm),cls):"1-2-1"===layout?DOM.addClass(DOM.select(".wf-column:nth(2)",elm),cls):DOM.addClass(DOM.select(".wf-column:last-child",elm),cls)}var gap="medium";classes.indexOf("wf-columns-gap-")!==-1&&(gap=/wf-columns-gap-(small|medium|large|none)/.exec(classes)[1]),DOM.addClass(elm,"uk-flex-gap-"+gap),each(suffix,function(sfx){DOM.addClass(elm,"uk-child-width-expand"+sfx)})}function remove(elm){if(DOM.hasClass(elm,"uk-flex")){var suffixMap=function(val){var map={"@s":"small","@m":"medium","@l":"large","@xl":"xlarge"};return map[val]||""},classes=elm.getAttribute("class");if(classes.indexOf("uk-child-width-expand@")!==-1){var stack=/uk-child-width-expand(@s|@m|@l|@xl)/.exec(classes);if(stack){var suffix=suffixMap(stack[1]);suffix&&DOM.addClass(elm,"wf-columns-stack-"+suffix),DOM.removeClass(elm,stack[0])}DOM.removeClass(elm,"uk-flex-wrap")}if(classes.indexOf("uk-flex-gap-")!==-1){var gap=/uk-flex-gap-(none|small|medium|large)/.exec(classes)[1];gap&&(DOM.addClass(elm,"wf-columns-gap-"+gap),DOM.removeClass(elm,"uk-flex-gap-"+gap))}var nodes=tinymce.grep(elm.childNodes,function(node){if("DIV"===node.nodeName)return node}),layout="wf-columns-layout-auto";each(nodes,function(node,i){var cls=node.getAttribute("class");if(cls&&cls.indexOf("uk-width-")!==-1){var rx=/uk-width-([0-9-]+)(?:@s|@m|@l|@xl|-small|-medium|-large|-xlarge)/g,match=rx.exec(cls),values=[];if(match&&(values=mapLayout("uk-width-"+match[1])),each(cls.match(rx),function(str){DOM.removeClass(node,str)}),!values.length)return!0;layout=0===i?"wf-columns-layout-"+values[0]:i===nodes.length-1?"wf-columns-layout-"+values[values.length-1]:"wf-columns-layout-"+values[1]}DOM.removeClass(node,"uk-flex-auto"),DOM.removeClass(node,"uk-flex-item-auto")}),DOM.removeClass(elm,"uk-flex"),DOM.addClass(elm,layout)}}var mapLayout=function(str){var cls;switch(str){case"1-2":case"2-1":cls="uk-width-2-3";break;case"1-3":case"3-1":cls="uk-width-3-4";break;case"2-1-1":case"1-1-2":case"1-2-1":cls="uk-width-1-2";break;case"4-1":case"1-4":cls="uk-width-1-5";break;case"2-1-1-1":case"1-1-1-2":cls="uk-width-2-5";break;case"2-3":case"1-1-3":case"3-1-1":cls="uk-width-3-5";break;case"uk-width-2-3":cls=["2-1","1-2"];break;case"uk-width-3-4":cls=["3-1","1-3"];break;case"uk-width-1-2":cls=["2-1-1","1-2-1","1-1-2"];break;case"uk-width-1-5":cls=["4-1","1-4"];break;case"uk-width-2-5":cls=["2-1-1-1","1-1-1-2"];break;case"uk-width-3-5":cls=["2-3","1-1-3","3-1-1"]}return cls};return{apply:apply,remove:remove}}function bootstrap(){function apply(elm){var classes=elm.getAttribute("class"),suffix="",layout="";DOM.addClass(elm,"row");var suffixMap=function(val){var map={small:"-sm",medium:"-md",large:"-lg",xlarge:"-xl"};return map[val]||""};if(classes.indexOf("wf-columns-stack-")!==-1){var stack=/wf-columns-stack-(small|medium|large|xlarge)/.exec(classes)[1];suffix=suffixMap(stack),DOM.addClass(DOM.select(".wf-column",elm),"col"+suffix)}if(classes.indexOf("wf-columns-layout-")!==-1)if(layout=/wf-columns-layout-([0-9-]+|auto)/.exec(classes)[1],"auto"===layout)DOM.addClass(DOM.select(".wf-column",elm),"col"+suffix);else{var pos=layout.charAt(0),cls="col"+suffix+"-"+mapLayout(layout);parseInt(pos,10)>1?DOM.addClass(DOM.select(".wf-column:first-child",elm),cls):"1-2-1"===layout?DOM.addClass(DOM.select(".wf-column:nth(2)",elm),cls):1===parseInt(pos,10)&&DOM.addClass(DOM.select(".wf-column:last-child",elm),cls)}if(classes.indexOf("wf-columns-gap-")!==-1){var gap=/wf-columns-gap-(small|medium|large|none)/.exec(classes)[1];suffix=suffixMap(gap)||"-none",DOM.addClass(elm,"flex-gap"+suffix)}}function remove(elm){if(DOM.hasClass(elm,"row")){var layoutClasses=["col-sm","col-md","col-lg","col-xl","col-sm-8","col-md-8","col-lg-8","col-xl-8","col-sm-9","col-md-9","col-lg-9","col-xl-9","col-sm-6","col-md-6","col-lg-6","col-xl-6"],classes=elm.getAttribute("class"),stack="",layout="wf-columns-layout-auto",nodes=DOM.select('div[class*="col"]',elm),suffixMap=function(val){var map={sm:"small",md:"medium",lg:"large",xl:"xlarge"};return map[val]||""};if(each(nodes,function(node,i){var cls=node.getAttribute("class");if(cls&&cls.indexOf("col-")!==-1){var match,values=[];if(each(cls.split(" "),function(val){val&&0==val.indexOf("col-")&&(match=/col-(sm|md|lg|xl)(-[0-9])?/.exec(val),match&&tinymce.inArray(layoutClasses,match[0])!=-1&&DOM.removeClass(node,match[0]))}),match){values=mapLayout(match[0]);var suffix=suffixMap(match[1]);suffix&&(stack="wf-columns-stack-"+suffix),values&&(layout=0===i?"wf-columns-layout-"+values[0]:i===nodes.length-1?"wf-columns-layout-"+values[values.length-1]:"wf-columns-layout-"+values[1])}}DOM.removeClass(node,"col")}),classes.indexOf("flex-gap-")!==-1){var gap=/flex-gap-(none|sm|md|lg)?/.exec(classes)[1];if(gap&&"md"!==gap){var suffix=suffixMap(gap)||"none";DOM.addClass(elm,"wf-columns-gap-"+suffix),DOM.removeClass(elm,"uk-flex-gap-"+gap)}}DOM.removeClass(elm,"row"),DOM.addClass(elm,layout),DOM.addClass(elm,stack)}}var mapLayout=function(str){var cls;switch(str){case"1-2":case"2-1":cls="8";break;case"1-3":case"3-1":cls="9";break;case"2-1-1":case"1-1-2":case"1-2-1":cls="6";break;case"col-sm-8":case"col-md-8":case"col-lg-8":case"col-xl-8":cls=["2-1","1-2"];break;case"col-sm-9":case"col-md-9":case"col-lg-9":case"col-xl-9":cls=["3-1","1-3"];break;case"col-sm-6":case"col-md-6":case"col-lg-6":case"col-xl-6":cls=["2-1-1","1-2-1","1-1-2"]}return cls};return{apply:apply,remove:remove}}function isColumn(elm){return elm&&"DIV"==elm.nodeName&&"column"==elm.getAttribute("data-mce-type")}function moveCaret(editor,node){var rng=editor.dom.createRng();rng.setStart(node,0),rng.setEnd(node,0),rng.collapse(),editor.selection.setRng(rng)}function removeColumn(editor){var node=getColumnNode(editor);if(node){for(var child,parent=editor.dom.getParent(node,".wf-columns");child=node.firstChild;)if(editor.dom.isEmpty(child)&&1===child.nodeType)editor.dom.remove(child);else{var num=parent.childNodes.length,idx=editor.dom.nodeIndex(node)+1;idx<=Math.ceil(num/2)?editor.dom.insertBefore(child,parent):editor.dom.insertAfter(child,parent)}editor.dom.remove(node);var cols=editor.dom.select(".wf-column",parent);if(cols.length){var col=cols[cols.length-1];col&&moveCaret(editor,col.firstChild)}else editor.dom.remove(parent,1);editor.nodeChanged()}editor.undoManager.add()}function padColumn(editor,column){var childBlock=(editor.settings.force_p_newlines?"p":"")||editor.settings.forced_root_block,columnContent=editor.dom.doc.createTextNode("\xa0");childBlock&&(columnContent=editor.dom.create(childBlock),tinymce.isIE||(columnContent.innerHTML='<br data-mce-bogus="1" />')),editor.dom.add(column,columnContent)}function createColumn(editor){var col=editor.dom.create("div",{class:"wf-column","data-mce-type":"column"});return padColumn(editor,col),col}function addColumn(editor,node,parentCol){var node=getColumnNode(editor,node),col=createColumn(editor);node?editor.dom.insertAfter(col,node):(editor.formatter.apply("column"),col=editor.dom.get("__tmp"),col&&(col.parentNode.insertBefore(parentCol,col),parentCol.appendChild(col),editor.dom.setAttrib(col,"id",""))),col.childNodes&&(editor.selection.select(col.firstChild),editor.selection.collapse(1),editor.nodeChanged())}function getColumnNode(editor,node){return node=node||editor.selection.getNode(),node===editor.getBody()?null:isColumn(node)?node:editor.dom.getParent(node,".wf-column")}function getSelectedBlocks(editor){var blocks=editor.selection.getSelectedBlocks(),nodes=tinymce.map(blocks,function(node){return"LI"===node.nodeName?node.parentNode:node});return nodes}function insertColumn(editor,data){var parentCol,node=getColumnNode(editor),cls=["wf-columns"],stack=data.stack,align=data.align,num=data.columns,layout=data.layout||"auto",gap=data.gap;if(stack&&cls.push("wf-columns-stack-"+stack),align&&cls.push("wf-columns-align-"+align),gap&&"medium"!==gap&&cls.push("wf-columns-gap-"+gap),cls.push("wf-columns-layout-"+layout),data.classes&&(cls=cls.concat(data.classes.split(" "))),node){parentCol=editor.dom.getParent(node,".wf-columns"),editor.dom.setAttrib(parentCol,"class",tinymce.trim(cls.join(" ")));var cols=editor.dom.select(".wf-column",parentCol),lastNode=cols[cols.length-1];num=Math.max(num-cols.length,0)}else{var lastNode,nodes=getSelectedBlocks(editor);nodes.length&&(lastNode=nodes[nodes.length-1]);var parentCol,columns=[],newCol=editor.dom.create("div",{class:"wf-column","data-mce-type":"column"});if(1==num)editor.formatter.apply("column"),newCol=editor.dom.get("__tmp")||nodes[0].parentNode,editor.dom.setAttrib(newCol,"id",null),columns.push(newCol),num=0;else if(num<nodes.length){for(var groups=partition(nodes,num),i=0;i<groups.length;i++){var group=groups[i];editor.dom.wrap(group,newCol,!0),columns.push(group[0].parentNode)}num=0}else each(nodes,function(node){if(num--,isColumn(node)||isColumn(node.parentNode))return parentCol||(parentCol=editor.dom.getParent(node,".wf-columns")),node=editor.dom.getParent(node,".wf-column"),node&&columns.push(node),editor.dom.empty(parentCol),!0;if(editor.dom.isEmpty(node)){var elementRule=editor.schema.getElementRule(node.nodeName.toLowerCase());elementRule&&elementRule.paddEmpty&&(node.innerHTML='<br data-mce-bogus="1" />')}editor.dom.wrap(node,newCol),columns.push(node.parentNode)});parentCol?each(columns,function(column){parentCol.appendChild(column)}):(parentCol=editor.dom.create("div",{class:cls.join(" "),"data-mce-type":"column"}),editor.dom.wrap(columns,parentCol,!0))}if(num)for(;num--;)addColumn(editor,lastNode,parentCol);editor.undoManager.add(),editor.nodeChanged()}var DOM=tinymce.DOM,each=tinymce.each,VK=tinymce.VK,Event=tinymce.dom.Event,TreeWalker=tinymce.dom.TreeWalker,styleMap={uikit:{classes:["uk-flex","uk-child-width-expand","uk-flex-wrap","uk-child-width-expand@s","uk-child-width-expand@m","uk-child-width-expand@l","uk-child-width-expand@xl","uk-child-width-expand-small","uk-child-width-expand-medium","uk-child-width-expand-large","uk-child-width-expand-xlarge","uk-flex-auto","uk-flex-item-auto","uk-width-2-3","uk-width-3-4","uk-width-1-2"]},bootstrap:{classes:["row","col","col-sm","col-md","col-lg","col-xl","flex-gap-sm","flex-gap-md","flex-gap-lg","flex-gap-none"]}},mappedClasses=flattenObjectToArray(styleMap);tinymce.create("tinymce.plugins.Columns",{init:function(editor,url){function onSetContent(editor,o){var columns=editor.dom.select("[data-wf-columns], .wf-columns",o.content);each(columns,function(column){editor.dom.addClass(column,"wf-columns"),framework&&editor.dom.addClass(column,"wf-columns-"+framework),each(column.childNodes,function(node){return"DIV"!==node.nodeName||(editor.dom.addClass(node,"wf-column"),void node.setAttribute("data-mce-type","column"))}),(new uikit).remove(column),(new bootstrap).remove(column),each(mappedClasses,function(name){editor.dom.removeClass(column,name)}),each(editor.dom.select("div,p",column),function(block){"&nbsp;"!=block.innerHTML&&block.hasChildNodes()||(block.innerHTML='<br data-mce-bogus="1" />')})})}function handleDeleteInColumn(e){function isWithinColumn(node){return editor.dom.getParent(node,"div.wf-column")}function getLastChild(parent){for(var node,lastChild=parent.lastChild,walker=new TreeWalker(lastChild,parent);node=walker.next();)3==node.nodeType&&node.nodeValue&&(lastChild=node),1==node.nodeType&&(lastChild=isColumn(node.parentNode)?node:node.parentNode);return lastChild}function getSelectionStart(){var start=editor.dom.getParent(rng.startContainer,editor.dom.isBlock);return isColumn(start)&&(start=start.firstChild),start}function getSelectionEnd(){var end=editor.dom.getParent(rng.endContainer,editor.dom.isBlock);return isColumn(end)&&(end=end.lastChild),end}if(e.ctrlKey&&e.keyCode===VK.DELETE)return void(getColumnNode(editor)&&(removeColumn(editor),e.preventDefault(),e.stopPropagation(),editor.undoManager.add()));var selectedColumns=editor.dom.select("div.wf-column.mceSelected",editor.getBody());selectedColumns.length&&(e.preventDefault(),e.stopPropagation(),each(selectedColumns,function(node){editor.dom.empty(node),node.innerHTML="",padColumn(editor,node),editor.selection.select(node.firstChild,!0),editor.selection.collapse(!0)}),editor.undoManager.add());var rng=editor.selection.getRng(),container=rng.commonAncestorContainer;if(!isColumn(rng.commonAncestorContainer)){if(!isWithinColumn(rng.startContainer)&&!isWithinColumn(rng.endContainer))return;if(!isWithinColumn(rng.startContainer)&&0==rng.startOffset){var col=editor.dom.getParent(rng.endContainer,".wf-column");rng.setStart(col.firstChild,0)}if(!isWithinColumn(rng.endContainer)&&0==rng.endOffset){var col=editor.dom.getParent(rng.startContainer,".wf-column"),lastChild=getLastChild(col);3==lastChild.nodeType?rng.setEnd(lastChild,lastChild.nodeValue.length):rng.setEndAfter(lastChild,lastChild)}}if(rng.collapsed&&0==rng.startOffset){var col=editor.dom.getParent(container,".wf-column");return void(col&&col.firstChild&&col.firstChild==col.lastChild&&rng.startContainer==col.firstChild&&e.preventDefault())}var col=editor.dom.getParent(editor.selection.getStart(),".wf-column");if(col){var node=editor.dom.getParent(col.firstChild,function(n){return!isColumn(n)&&editor.dom.isBlock(n)});if(node&&isColumn(node.parentNode)&&(!node.previousSibling||!node.nextSibling)){var col=node.parentNode,start=getSelectionStart(),end=getSelectionEnd();if(col.firstChild==start&&getLastChild(col)==end){if(!rng.endContainer)return;var endContainer=isColumn(rng.endContainer)?rng.endContainer.lastChild:rng.endContainer;if(endContainer!=getLastChild(col))return;if(rng.endOffset<rng.endContainer.length)return;for(;col.firstChild;)col.removeChild(col.firstChild);padColumn(editor,col),editor.undoManager.add(),e.preventDefault()}}}}this.editor=editor,this.url=url;var framework=editor.getParam("columns_framework","");editor.onPreProcess.add(function(editor,o){var nodes=editor.dom.select(".wf-columns",o.node);each(nodes,function(elm){if(elm.setAttribute("data-wf-columns",1),each(editor.dom.select(".wf-column",elm),function(node){}),!framework)return!0;"uikit"===framework&&(new uikit).apply(elm),"bootstrap"===framework&&(new bootstrap).apply(elm);var classes=elm.getAttribute("class");each(classes.split(" "),function(val){val.indexOf("wf-columns")!==-1&&editor.dom.removeClass(elm,val)}),editor.dom.removeClass(editor.dom.select(".wf-column",elm),"wf-column")})}),editor.onSetContent.add(onSetContent),editor.addButton("columns_add",{title:"columns.add",onclick:function(){var node=editor.selection.getNode();addColumn(editor,node)}}),editor.addButton("columns_delete",{title:"columns.delete",onclick:function(){var node=editor.selection.getNode();removeColumn(editor,node)}}),editor.onPreInit.add(function(ed){editor.selection.onGetContent.add(function(sel,o){if(!o.contextual)return!0;var container=editor.dom.create("body",{},o.content),columns=editor.dom.select(".wf-column",container);if(columns.length){var node=editor.selection.getNode(),parent=editor.dom.getParent(node,"div[data-wf-columns]");parent&&(editor.dom.wrap(columns,editor.dom.clone(parent),!0),o.content=sel.serializer.serialize(container,o))}})}),editor.onInit.add(function(){editor.settings.compress.css||editor.dom.loadCSS(url+"/css/content.css"),editor.onBeforeExecCommand.add(function(ed,cmd,ui,values,o){if(cmd&&"FormatBlock"==cmd){var node=ed.selection.getNode();if(isColumn(node))return void(o.terminate=!0)}}),editor.selection.onSetContent.add(onSetContent),editor.onKeyDown.addToTop(function(editor,e){e.keyCode!==VK.BACKSPACE&&e.keyCode!==VK.DELETE||handleDeleteInColumn(e)}),editor.formatter.register("column",{block:"div",classes:"wf-column",attributes:{id:"__tmp","data-mce-type":"column"},wrapper:!0}),editor.theme&&editor.theme.onResolveName&&editor.theme.onResolveName.add(function(theme,o){var n=o.node;n&&(editor.dom.hasClass(n,"wf-columns")&&(o.name="columns"),editor.dom.hasClass(n,"wf-column")&&(o.name="column"))}),fixDragSelection(editor)}),editor.onNodeChange.add(function(ed,cm,n,co){"DIV"!==n.nodeName&&(n=ed.dom.getParent(n,"DIV"));var state=isColumn(n);if(state&&0===n.childNodes.length&&n.previousSibling){var col=n.previousSibling.lastChild;col&&ed.dom.remove(n)&&(editor.selection.select(col),editor.selection.collapse(0))}cm.setActive("columns",state),cm.setDisabled("columns_add",!state),cm.setDisabled("columns_delete",!state)})},createControl:function(n,cm){function createMenuGrid(cols,rows){var html="";html+='<div class="mceToolbarRow">',html+='   <div class="mceToolbarItem">',html+='       <table role="presentation" class="mceTableSplitMenu"><tbody>';for(var i=0;i<rows;i++){html+="<tr>";for(var x=0;x<cols;x++)html+='<td><a href="#"></a></td>';html+="</tr>"}return html+="       </tbody></table>",html+="   </div>",html+="</div>"}function menuGridMouseOver(e){var el=e.target;"TD"!==el.nodeName&&(el=el.parentNode);var tbody=DOM.getParent(el,"tbody");if(tbody){var i,z,rows=tbody.childNodes,row=el.parentNode,x=tinymce.inArray(row.childNodes,el),y=tinymce.inArray(rows,row);if(!(x<0||y<0))for(i=0;i<rows.length;i++){var cells=rows[i].childNodes;for(z=0;z<cells.length;z++)z>x||i>y?DOM.removeClass(cells[z],"selected"):DOM.addClass(cells[z],"selected")}}}function menuGridClick(e){var el=e.target;"TD"!==el.nodeName&&(el=el.parentNode);var table=DOM.getParent(el,"table"),cls=["wf-columns"],stack=ed.getParam("columns_stack","medium");stack&&cls.push("wf-columns-stack-"+stack);var align=ed.getParam("columns_align","");align&&cls.push("wf-columns-align-"+align);var gap=ed.getParam("columns_gap","small");gap&&"small"!==gap&&cls.push("wf-columns-gap-"+gap);for(var html='<div class="'+cls.join(" ")+'">',rows=tinymce.grep(DOM.select("tr",table),function(row){return DOM.select("td.selected",row).length}),block=ed.settings.forced_root_block||"",y=0;y<rows.length;y++)for(var cols=DOM.select("td.selected",rows[y]).length,x=0;x<cols;x++)html+='<div class="wf-column">',html+=block?ed.dom.createHTML(block,{},"&nbsp;"):'<br data-mce-bogus="1" />',html+="</div>";return html+="</div>",ed.undoManager.add(),ed.execCommand("mceInsertRawHTML",!1,html),Event.cancel(e),!1}function updateColumnValue(val,num){columnsNum.setDisabled(!1),val&&val.indexOf("-")!==-1?(num=val.split("-").length,columnsNum.value(num)):columnsNum.value(num)}var self=this,ed=self.editor;if("columns"==n){var num=1,form=cm.createForm("columns_form"),columnsNum=cm.createTextBox("columns_num",{label:ed.getLang("columns.columns","Columns"),name:"columns",subtype:"number",attributes:{step:1,min:1},value:num,onchange:function(){num=columnsNum.value()}});form.add(columnsNum);var layoutList=cm.createListBox("columns_layout",{label:ed.getLang("columns.layout","Layout"),onselect:function(val){updateColumnValue(val,columnsNum.value())},name:"layout",max_height:"auto"}),layoutValues=["","2-1","1-2","3-1","1-3","2-1-1","1-2-1","1-1-2"];each(layoutValues,function(val){var key;key=val?ed.getLang("columns.layout_"+val,val):ed.getLang("columns.layout_auto","Auto"),layoutList.add(key,val,{icon:"columns_layout_"+val.replace(/-/g,"_")})});var stackList=cm.createListBox("columns_stack",{label:ed.getLang("columns.stack","Stack Width"),onselect:function(v){},name:"stack",max_height:"auto"});each(["","small","medium","large","xlarge"],function(val){var key;key=val?ed.getLang("columns.stack_"+val,val):ed.getLang("columns.stack_none","None"),stackList.add(key,val)});var gapList=cm.createListBox("columns_gap",{label:ed.getLang("columns.gap","Gap Size"),onselect:function(v){},name:"gap",max_height:"auto"});each(["none","small","medium","large"],function(val){var key=ed.getLang("columns.stack_"+val,val);gapList.add(key,val)});var stylesList=cm.createStylesBox("columns_class",{label:ed.getLang("columns.class","Classes"),onselect:function(v){},name:"classes"});form.add(stackList),form.add(gapList),form.add(layoutList),form.add(stylesList);var ctrl=cm.createSplitButton("columns",{title:"columns.desc",onclick:function(){ed.windowManager.open({title:ed.getLang("columns.desc","Create Columns"),items:[form],size:"mce-modal-landscape-small",open:function(){var nodes=getSelectedBlocks(ed),stack=ed.getParam("columns_stack","medium"),gap=ed.getParam("columns_gap","medium"),num=ed.getParam("columns_num",1),layout=ed.getParam("columns_layout","");if(nodes.length){num=nodes.length;var col=ed.dom.getParent(nodes[0],".wf-columns");if(col){var cols=ed.dom.select(".wf-column",col),cls=col.getAttribute("class");cols.length&&(num=cols.length),cls&&cls.indexOf("wf-columns-stack-")!==-1&&(stack=/wf-columns-stack-(small|medium|large|xlarge)/.exec(col.className)[1]),cls&&cls.indexOf("wf-columns-gap-")!==-1&&(gap=/wf-columns-gap-(none|small|medium|large)/.exec(col.className)[1]),cls&&cls.indexOf("wf-columns-layout-")!==-1&&(layout=/wf-columns-layout-([0-9-]+|auto)/.exec(cls)[1],"auto"===layout&&(layout="")),cls=cls.replace(/wf-([a-z0-9-]+)/g,"").trim(),DOM.setHTML(this.id+"_insert",ed.getLang("update","Update"))}}stackList.value(stack),gapList.value(gap),layoutList.value(layout),stylesList.value(cls),updateColumnValue(layout,num)},buttons:[{title:ed.getLang("common.cancel","Cancel"),id:"cancel"},{title:ed.getLang("common.insert","Insert"),id:"insert",onsubmit:function(e){var data=form.submit();Event.cancel(e),insertColumn(ed,data)},classes:"primary",autofocus:!0}]})},class:"mce_columns"});return ctrl.onRenderMenu.add(function(c,m){var sb=m.add({onmouseover:menuGridMouseOver,onclick:function(e){sb.setSelected(!1),menuGridClick(e)},html:createMenuGrid(5,1),class:"mceColumns"});m.onShowMenu.add(function(){(n=DOM.get(sb.id))&&DOM.removeClass(DOM.select(".mceTableSplitMenu td",n),"selected")})}),ctrl}}}),tinymce.PluginManager.add("columns",tinymce.plugins.Columns)}();