<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * From www.1314study.com
 */

if(!defined('IN_DISCUZ')) {
   exit('2015030317oFgQjJPi64');
}

$splugin_setting = $_G['cache']['plugin']['freeaddon_fm'];
$navtitle = $splugin_setting['title'];
$metakeywords = $splugin_setting['keywords'];
$metadescription = $splugin_setting['description'];
$_G['disabledwidthauto'] = '1314';
include template('freeaddon_fm:fm');
?>