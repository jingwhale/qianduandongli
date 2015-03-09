<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * From www.1314study.com
 */

if(!defined('IN_DISCUZ')) {
    exit('http://bbs.dbank.com/');
}

class plugin_dbank {
	function global_footer() {
        global $_G;
        $return = '';
        if(CURMODULE == 'post' && CURSCRIPT == 'forum'){
	        	$splugin_setting = $_G['cache']['plugin']['dbank'];
		        $DBANK_PLUGINID = $splugin_setting['PLUGINID'];
				$DBANK_PLUGINSECRET = $splugin_setting['PLUGINSECRET'];
				$DBANK_ShowDefaultUpload = $splugin_setting['ShowDefaultUpload'];
				$DBANK_ShowDbankUpload = $splugin_setting['ShowDbankUpload'];
				$DBANK_ShowDbankFile = $splugin_setting['ShowDbankFile'];
		        if(!empty($DBANK_PLUGINID)&&!empty($DBANK_PLUGINSECRET)) {
					$dbankplugin_lang = lang('plugin/dbank');
					$return = '';
					include('./source/plugin/dbank/dbank_attachment.php');
			    }
	      }
		//$return .='<script type="text/javascript" src="./source/plugin/dbank/dbank_plugin.js" ></script>';
		//$return .='<script type="text/javascript" >document.getElementById("e_btn_attachlist").childNodes[0].firstChild.nodeValue="'+$dbankplugin_lang['lang_006']+'";document.getElementsByTagName("head")[0].appendChild(\'<meta http-equiv="P3P" content=\'CP="IDC DSP COR CURa ADMa  OUR IND PHY ONL COM STA"\' \/>\');</script>';
		return $return;
  }
  
  function global_header() {
	global $_G;
	$s1plugin_setting = $_G['cache']['plugin']['dbank'];
	$DBANK_ShowMiniPage = $s1plugin_setting['ShowMiniPage'];
	$dbank_tools_str = '<script type="text/javascript" > var Dbank_CurClientVersion="5.0.0";</script><script type="text/javascript" src="http://www.dbank.com/app/web/pc_proxy.php?action=getDbankPluginVersion"></script>';
	if($DBANK_ShowMiniPage=='1') {
		$dbank_tools_str = $dbank_tools_str.'<script type="text/javascript" src="http://st1.dbank.com/netdisk/minidisk_v2/js/dbank_plugin.js" ></script>';
	}
	return $dbank_tools_str;
	
  }
}
?>