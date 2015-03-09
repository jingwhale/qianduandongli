<?php
/**
 * Powered By DBANK
 * From Liujunfeng <harven.liu@huawei.com>
 * @version 3.0.0
 */

if(!defined('IN_DISCUZ')) {
    exit('http://bbs.dbank.com/');
}

$return .= '
<style type="text/css">
<!--
.dbank_small_tips {float:left;color:#666;font-size:10pt;}
-->
</style>
<script type="text/javascript">var PLUGINID = "'.$DBANK_PLUGINID.'",PLUGINSECRET = "'.$DBANK_PLUGINSECRET.'";</script>
<script type="text/javascript" src="http://st1.dbank.com/netdisk/minidisk_v2/js/Dbank.DbankFrame.js"></script>
<script type="text/javascript">
;(function(){
var editorid ="e", initTag = "dbankfile",initTag_a = "dbankplugin",initTag_c = "dbankplugin_c";';
if($DBANK_ShowDbankUpload) {
$return .= 'insertDbankplugin_C();';
}
//insertpluginDirect();
if($DBANK_ShowDbankFile) {
$return .= 'insertHTML();';
}

$return .= '
function $(id){
	return document.getElementById(id);
}
//附件伴侣本地上传
function insertDbankplugin_C(){
	/* button */
	var plugin_c = document.createElement("li");
	plugin_c.id = editorid + "_btn_dbankplugin_c";
	plugin_c.innerHTML = \'<a href="javascript:;" hidefocus="true">'.$dbankplugin_lang['lang_001'].'</a>\';
	
	/* frame */
	var pluginFrame_c = document.createElement("div");
	pluginFrame_c.id = editorid + "_dbankplugin_c";
	pluginFrame_c.className = "popupmenu_option";
	pluginFrame_c.style.display = "none";
	pluginFrame_c.style.textAlign = "center";
	pluginFrame_c.style.unselectable ="on";
	
	try{
		var attachCtrl = $(editorid+"_attach_ctrl"), attachMenu = $(editorid+"_attach_menu").getElementsByTagName("div")[0];
		if(PLUGINID){
			appent(attachCtrl,plugin_c);
			appent(attachMenu,pluginFrame_c);
		}
		
		AID = {0:4,	1:2}
		tabAddEventListener();
	}catch(e){
		
	}	
}
//附件伴侣附件通上传
function insertpluginDirect(){
	/* button */
	var plugin = document.createElement("li");
	plugin.id = editorid + "_btn_dbankplugin";
	plugin.innerHTML = \'<a href="javascript:;" hidefocus="true">'.$dbankplugin_lang['lang_002'].'</a>\';
	
	/* frame */
	var pluginFrame = document.createElement("div");
	pluginFrame.id = editorid + "_dbankplugin";
	pluginFrame.className = "popupmenu_option";
	pluginFrame.style.display = "none";
	pluginFrame.style.textAlign = "center";
	pluginFrame.style.unselectable ="on";
	
	try{
		var attachCtrl = $(editorid+"_attach_ctrl"), attachMenu = $(editorid+"_attach_menu").getElementsByTagName("div")[0];
		if(PLUGINID){
			appent(attachCtrl,plugin);
			appent(attachMenu,pluginFrame);
		}
		
		AID = {0:4,	1:2}
		tabAddEventListener();
	}catch(e){
		
	}	
}
//附件伴侣网盘上传
function insertHTML(){
	/* button */
	
	var file = document.createElement("li");
	file.id = editorid + "_btn_dbankfile";
	file.innerHTML = \'<a href="javascript:;" hidefocus="true">'.$dbankplugin_lang['lang_003'].'</a>\';
	
	
	/* frame */
	
	var fileFrame = document.createElement("div");
	fileFrame.id = editorid + "_dbankfile";
	fileFrame.className = "popupmenu_option";
	fileFrame.style.display = "none";
	fileFrame.style.textAlign = "center";
	fileFrame.style.unselectable ="on";
	
	
	try{
		var attachCtrl = $(editorid+"_attach_ctrl"), attachMenu = $(editorid+"_attach_menu").getElementsByTagName("div")[0];
		appent(attachCtrl,file);
		
		appent(attachMenu,fileFrame);
		
		
		AID = {0:4,	1:2}
		tabAddEventListener();
	}catch(e){
		
	}	
}

function appent(parent, element){
	parent.appendChild(element);
}

$(editorid+"_attach").onmousedown = function(){	
	if(initTag){';
if($DBANK_ShowDbankUpload) {
$return .= 'setAttachCtrl( editorid+"_btn_"+initTag_c );';
} else if($DBANK_ShowDbankFile) {
$return .= 'setAttachCtrl( editorid+"_btn_"+initTag );';
}
$return .= '		
		//setAttachCtrl( editorid+"_btn_"+initTag_c );
		//隐藏默认的插件上传
		';
if(!$DBANK_ShowDefaultUpload){
	$return .= 'document.getElementById("e_btn_attachlist").style.display = "none";';
	$return .= 'document.getElementById("e_attachlist").style.display = "none";';
}
		
$return .= '
//alert($("attach_confirms").parentNode.innerHTML);

document.getElementById("e_btn_attachlist").childNodes[0].firstChild.nodeValue="'.$dbankplugin_lang['lang_006'].'";
//navigator.appVersion.indexOf("MSIE 6") != -1 ? small_tips = document.createElement(\'<div id="small_tips" >aaaaaaaaa</div>\') : (small_tips = document.createElement("span"),small_tips.id = "small_tips",small_tips.style="float:left;color:#666;font-size:10pt;",small_tips.innerText="'.$dbankplugin_lang['lang_007'].'");
var small_tips = document.createElement("span");
	small_tips.id = "small_tips";
//	small_tips.style="float:left;color:#666;font-size:10pt;";
	small_tips.innerText="'.$dbankplugin_lang['lang_007'].'";
if(!$("small_tips")) {
$("attach_confirms").parentNode.appendChild(small_tips);
$("small_tips").className="dbank_small_tips";
navigator.appVersion.indexOf("MSIE") != -1 ? $("attach_confirms").style.styleFloat="right" : $("attach_confirms").style.cssFloat="right";
} 
}	
}
function tabAddEventListener(){
	var anchor = $(editorid+"_attach_ctrl").getElementsByTagName("a");	
	for(var i=0; i <anchor.length; i++){		
		anchor[i].onclick = function(){		
			var cid = this.parentNode.id;
			setAttachCtrl( cid );			
		}
	}
}
function setAttachCtrl( id ){
	var tempID = id.replace(/_btn/,"");
	if($(tempID).innerHTML.length == 0){
		if(tempID == editorid+"_dbankupload"){
			uploadPage($(editorid+"_dbankupload"));
		}
		else if(tempID == editorid+"_dbankfile"){
			upfilePage($(editorid+"_dbankfile"));
		}
		else if(tempID == editorid+"_dbankplugin"){
			pluginPage($(editorid+"_dbankplugin"));
		} else if(tempID == editorid+"_dbankplugin_c"){
			showDbankplugin_C($(editorid+"_dbankplugin_c"));
		}
	}
	var anchor = $(editorid + "_attach_ctrl").getElementsByTagName("li");
	for(var i = 1; i<anchor.length; i++){		
		var divID = anchor[i].id.replace(/_btn/,"");
		if(anchor[i].id != id){
			anchor[i].className ="";
			$(divID).style.display = "none";
		}else{
			anchor[i].className = "current";
			$(divID).style.display = "block";
		}
	}
}

//本地上传
function showDbankplugin_C(obj){
	var dbWinFrame = obj;	
	var fileUrl = "http://www.dbank.com/netdisk/minidisk_v2/upload_pluginc.html",	
	rootUrl = webRootUrl()+"source/plugin/dbank/proxy.html",	
	dbankUpload = (PLUGINID && PLUGINSECRET) ? new Dbank.DbankFrame(dbWinFrame,fileUrl,rootUrl,false,"appid="+ PLUGINID , "token="+PLUGINSECRET) :new Dbank.DbankFrame(dbWinFrame,fileUrl,rootUrl,false);
	dbankUpload.addEvent("data",data_handler);
}

//我的网盘
function upfilePage(obj){
	var dbWinFrame = obj,
	fileUrl = "http://www.dbank.com/netdisk/minidisk_v2/file_pluginc.html",
	rootUrl = webRootUrl()+"source/plugin/dbank/proxy.html",	
	dbankUpFile = (PLUGINID && PLUGINSECRET) ? new Dbank.DbankFrame(dbWinFrame,fileUrl,rootUrl,false,"appid="+ PLUGINID, "token="+PLUGINSECRET) :new Dbank.DbankFrame(dbWinFrame,fileUrl,rootUrl,false);	
	
	dbankUpFile.addEvent("data",data_handler);
	
}

//附件通
function pluginPage(obj){
	var dbWinFrame = obj;	
	var fileUrl = "http://www.dbank.com/netdisk/minidisk_v2/setfile_pluginc.html",	
	rootUrl = webRootUrl()+"source/plugin/dbank/proxy.html",	
	dbankUpload = (PLUGINID && PLUGINSECRET) ? new Dbank.DbankFrame(dbWinFrame,fileUrl,rootUrl,false,"appid="+ PLUGINID , "token="+PLUGINSECRET) :new Dbank.DbankFrame(dbWinFrame,fileUrl,rootUrl,false);
	dbankUpload.addEvent("data",data_handler);
}

function webRootUrl(){
	return location.href.substr(0, location.href.indexOf("forum.php"));
}
function data_handler(msg){
	//msg = unescape(msg);
	if(document.all||navigator.userAgent.toLowerCase().indexOf("chrome")!=-1){
	msg = decodeURIComponent(msg);
	}
	var wlURL;
	if(msg){
		if(document.getElementById("e_switchercheck").checked){
			msg = decodeURIComponent(msg);
		}
		else{
			//msg = msg.replace(/\[url=([^\]]*)\]([^\[]*)\[\/url\]\s*/g, function($1,$2,$3){
			//	wlURL = \'<a href="\'+$2+\'">\'+decodeURIComponent($2)+\'</a><br />\';
				
			//	return \''.$dbankplugin_lang['lang_004'].' <a href="\'+$2+\'" target="_blank">\'+decodeURIComponent($3)+\'</a><br />\';
			//});
			msg = decodeURIComponent(msg);
		}
		
		writeEditorContents(getEditorContents() + msg);
	}	
	$("e_attach_menu").style.display ="none";
	hideMenu();
}

	
})(window)
</script>';

?>
