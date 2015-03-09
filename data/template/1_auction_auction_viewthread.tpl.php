<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$return = <<<EOF

<style type="text/css">
.aucimg {border:1px solid #E3E3E3;background-color:#E3E3E3;padding:2px;width:250px;float:left;color:#1C1C1C;cursor:pointer;}
.aucdetail {margin:0 0 0 265px;padding:0 0 0 5px;color:#1C1C1C;padding:0 5px;font-size:12px;}
.aucdetail a{color:#5A5A96;}
.aucdetail li{list-style:none; border-bottom:1px dashed #CDCDCD;height:26px;line-height:26px;padding-left:10px;}
.aucdetail li span{float:left;width:70px;}
.aucdetail em{margin-left:10px;}
.aucdetail img{vertical-align:middle;cursor:pointer;}
.aucdetail .auc_title{color:#F26C4F;font-weight:700;}

#auctips_menu {border:1px double #E3E3E3;background-color:#E5EDF2;padding:5px 10px;width:200px;line-height:22px;}
#auc_involve{margin:10px 0 0 90px;margin:10px 0 0 70px\9;}


#auc_pg .pg {line-height:15px;float;left;margin-top:5px;}
#auc_pg .pg a, #auc_pg .pg strong, #auc_pg .pgb a {
  background-repeat: no-repeat;
  color: #333333;
  display: inline;
  float:left;
  font-size: 10px;
  height: 16px;
  margin-left: 4px;
  overflow: hidden;
  padding: 0 4px;
  text-decoration: none;
}
#auc_pg .pg a.nxt{background:none;}

.list_tb {
    -moz-border-bottom-colors: none;
    -moz-border-image: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: #BACFDD #E3E5E7 #E3E5E7;
    border-right: 1px solid #E3E5E7;
    border-style: solid;
    border-width: 1px;
    margin-top: 10px;
    text-align: left;
}
.list_tb span {
    background: url("source/plugin/auction/images/icon03.gif") no-repeat scroll left center transparent;
    color: #333333;
    font-weight: bold;
    margin: 5px;
    padding: 0 0 0 20px;
    text-align: left;
    width:auto;
    float:left;
    font-weight:700;
}
.list_lt {
    background: none repeat scroll 0 0 #FCFCFC;
    border-top: 1px solid #E3ECF2;
    color: #666666;
    font-size: 12px;
    height: 25px;
    padding-left: 10px;
    vertical-align: middle;
    width:auto;
    word-break:break-all;
}


.list_bt {background: url("source/plugin/auction/images/list_bg.gif") repeat scroll center top transparent; height: 25px; vertical-align: bottom;}
.list_lt{}
.list_tb .gray{background:none;padding:0;}
.list_tb .gray a{color:#999;}
.auction_price .auc_title{color:#F26C4F;}
.auction_price {margin:10px;}
.auction_price a{color:#1B7FC6;}
.myauclog td,.myauclog th{background-color:#eee;}
</style>


<div class="auc pbm cl">
<div class="aucimg">

EOF;
 if($auctionatt['attachment']) { 
$return .= <<<EOF

<img src="{$auctionatt['attachment']}" width="250" 
EOF;
 if($_G['uid']) { 
$return .= <<<EOF
zoomfile="forum.php?mod=attachment&amp;aid={$auctionatt['encodeaid']}&amp;nothumb=yes" onclick="zoom(this, this.getAttribute('zoomfile'))"
EOF;
 } 
$return .= <<<EOF
/>

EOF;
 } else { 
$return .= <<<EOF

<img src="static/image/common/nophoto.gif" width="250">

EOF;
 } 
$return .= <<<EOF

</div>
<div class="aucdetail">
<dl>
<li><span>交易类型:</span>
<em class="auc_title">

EOF;
 if($auction['ctypeid']==1) { 
$return .= <<<EOF
兑&nbsp;&nbsp;&nbsp;换

EOF;
 } elseif($auction['ctypeid']==2) { 
$return .= <<<EOF
抽&nbsp;&nbsp;&nbsp;奖

EOF;
 } elseif($auction['ctypeid']==3) { 
$return .= <<<EOF
竞&nbsp;&nbsp;&nbsp;拍
EOF;
 } 
$return .= <<<EOF

</em>
<em style="margin-left:80px;">
<img src="source/plugin/auction/images/rules.gif" id="auctips" onmouseover="showMenu(this.id);"/>
</em>
</li>
<li><span>物品类型:</span><em class="">
EOF;
 if($auction['virtual']) { 
$return .= <<<EOF
虚拟物品
EOF;
 } else { 
$return .= <<<EOF
实物
EOF;
 } 
$return .= <<<EOF
</em></li>
<li><span>物品名称:</span><em class="">{$auction['name']}</em></li>
<li><span>物品数量:</span><em class="">共 <font color="#F26C4F">{$auction['number']}</font> 件</em></li>
<li><span>开始时间:</span><em>{$auction['starttimefrom']}</em></li>
<li><span>结束时间:</span><em>{$auction['starttimeto']}</em></li>
<li
EOF;
 if($notstart) { 
$return .= <<<EOF
 style="display:none;"
EOF;
 } 
$return .= <<<EOF
><span>剩余时间:</span><em id="timeleft" class="auc_title"></em></li>


EOF;
 if($auction['typeid'] == 1) { 
$return .= <<<EOF

<li><span>价格:</span><em class="auc_title">{$auction['ext_price']}</em><em>{$_G['setting']['extcredits'][$auction['extid']]['title']}</em></li>

EOF;
 } elseif($auction['typeid'] == 2) { 
$return .= <<<EOF

<li><span>竞拍底价:</span><em class="auc_title">{$auction['base_price']}</em><em>{$_G['setting']['extcredits'][$auction['extid']]['title']}</em></li>
<li><span>加价幅度:</span><em class="auc_title">{$auction['delta_price']}</em><em>{$_G['setting']['extcredits'][$auction['extid']]['title']}</em></li>

EOF;
 } 
$return .= <<<EOF

<li><span>市场价:</span><em class="auc_title">{$auction['real_price']}</em><em>元</em></li>
<li><span>人气:</span><em class="auc_title">{$thread['views']}</em></li>



</dl>
<dd><p class="pns" id="auc_involve">

EOF;
 if($_G['uid']) { if($_G['uid'] == $auction['uid'] && $auction['starttimeto_0'] <= $_G['timestamp']) { 
$return .= <<<EOF

<button class="pn" value="true" name="ijoin" id="ijoin" onclick="showWindow('confirm', 'plugin.php?id=auction:involve&operation=finish&tid={$tid}', 'get', 0);doane(event);"><span style="width:80px;float:none;">结算</span></button>

EOF;
 } else { 
$return .= <<<EOF

<button class="pn" value="true" name="ijoin" id="ijoin" onclick="showWindow('confirm', 'plugin.php?id=auction:involve&operation=join&tid={$tid}', 'get', 0);doane(event);"><span style="width:80px;float:none;">
EOF;
 if($auction['typeid'] == 1) { 
$return .= <<<EOF
出价
EOF;
 } elseif($auction['typeid'] == 2) { 
$return .= <<<EOF
出价
EOF;
 } 
$return .= <<<EOF
</span></button>

EOF;
 } } else { 
$return .= <<<EOF

<button class="pn" value="true" name="ijoin" id="ijoin" onclick="showWindow('confirm', 'member.php?mod=logging&action=login', 'get', 0);doane(event);" onmouseover="$('joinword').innerHTML='请先登录';" onmouseout="$('joinword').innerHTML='
EOF;
 if($auction['typeid'] == 1) { 
$return .= <<<EOF
出价
EOF;
 } elseif($auction['typeid'] == 2) { 
$return .= <<<EOF
出价
EOF;
 } 
$return .= <<<EOF
';"><span id="joinword" style="width:80px;float:none;">
EOF;
 if($auction['typeid'] == 1) { 
$return .= <<<EOF
出价
EOF;
 } elseif($auction['typeid'] == 2) { 
$return .= <<<EOF
出价
EOF;
 } 
$return .= <<<EOF
</span></button>

EOF;
 } if($auction['virtual'] && ($_G['adminid'] == 1 || $_G['uid'] == $auction['uid'])) { 
$return .= <<<EOF

<button class="pn" value="true" name="ijoin" id="ijoin" onclick="showWindow('auction_message', 'plugin.php?id=auction:involve&operation=admin_message&tid={$auction['tid']}', 'get', 0);doane(event);"><span id="joinword" style="width:80px;float:none;">查看卡密</span></button>

EOF;
 } if($_G['cache']['plugin']['auction']['auc_intro']) { 
$return .= <<<EOF
<span class="gray" style="width:80px;float:none;"><a href="{$_G['cache']['plugin']['auction']['auc_intro']}" target="_blank" style="color:#1B7FC6;padding-left:20px;vertical-align: middle;">查看交易需知</a></span>
EOF;
 } 
$return .= <<<EOF

</p></dd>
</div>
</div>
<div  id="auc_list_tmp" style="display:none;">
<div class="auc pbm cl">
<table class="list_tb" style="border-bottom:none;">
<tr>
<td class="list_bt" colspan="
EOF;
 if($showmobile) { 
$return .= <<<EOF
5
EOF;
 } else { 
$return .= <<<EOF
4
EOF;
 } 
$return .= <<<EOF
"><span class=""><a href="javascript:;" onclick="ajaxget('plugin.php?id=auction:involve&operation=view&tid={$thread['tid']}&page=1', 'list_ajax');$('list_002').style.color='#cdcdcd';$('list_001').style.color='#333';" id="list_001">出价记录</a></span>
EOF;
 if($auction['status']) { 
$return .= <<<EOF
<span class="gray"><a href="javascript:;" onclick="ajaxget('plugin.php?id=auction:involve&operation=view&tid={$thread['tid']}&top=1', 'list_ajax');$('list_002').style.color='#333';$('list_001').style.color='#cdcdcd';" id="list_002">获奖记录</a></span>
EOF;
 } 
$return .= <<<EOF
</td>
</tr>
<tr>

<th class="list_lt" width="20%">用户名</th>
<th class="list_lt" width="40%">出价时间</th>
<th class="list_lt" width="
EOF;
 if($showmobile) { 
$return .= <<<EOF
10%
EOF;
 } else { 
$return .= <<<EOF
20%
EOF;
 } 
$return .= <<<EOF
">出价 ({$_G['setting']['extcredits'][$auction['extid']]['title']})</th>
<th class="list_lt" width="
EOF;
 if($showmobile) { 
$return .= <<<EOF
10%
EOF;
 } else { 
$return .= <<<EOF
20%
EOF;
 } 
$return .= <<<EOF
">状态</th>

EOF;
 if($showmobile) { 
$return .= <<<EOF

<th class="list_lt" width="20%">手机</td>

EOF;
 } 
$return .= <<<EOF

</tr>
</table>
<div id="list_ajax">
<img src="static/image/common/loading.gif" />
</div>
</div></div>
<div id="auctips_menu" style="display:none">
EOF;
 if($auction['typeid'] == 1) { if($auction['extra']) { 
$return .= <<<EOF
{$_G['cache']['plugin']['auction']['auc_type1_tips_2']}
EOF;
 } else { 
$return .= <<<EOF
{$_G['cache']['plugin']['auction']['auc_type1_tips_1']}
EOF;
 } } else { 
$return .= <<<EOF
{$_G['cache']['plugin']['auction']['auc_type2_tips']}
EOF;
 } 
$return .= <<<EOF
</div>
<div id="confirm" style="display:none;"></div>

<script language="javascript" type="text/javascript">
var auctionNow= Date.parse('{$auction['js_timeto']}');
var auctionStartTime = Date.parse('{$auction['js_timefrom']}');
var auctionFuture=  {$auction['js_timenow']}*1000;

function showTimeLimit(){

auctionFuture+=1000;

days = (auctionNow-auctionFuture) / 1000 / 60 / 60 / 24;
if(auctionStartTime-auctionFuture >0) {
document.getElementById('ijoin').innerHTML = '<span>即将开始</span>';
return;
}
        dayNum = Math.floor(days);
        hours = (auctionNow-auctionFuture) / 1000 / 60 / 60 - (24 * dayNum);
        houNum = Math.floor(hours);
if(houNum < 10 && houNum > 0){
            houNum = "0" + houNum;
        }
        minutes = (auctionNow-auctionFuture) / 1000 / 60 - (24 * 60 * dayNum) - (60 * houNum);
        minNum = Math.floor(minutes);
        if(minNum < 10){
            minNum = "0" + minNum;
        }
        seconds = (auctionNow-auctionFuture) / 1000 - (24 * 60 * 60 * dayNum) - (60 * 60 * houNum) - (60 * minNum);
        secNum = Math.floor(seconds);
        if(secNum < 10){
            secNum = "0" + secNum;
        }
        millisec=(auctionNow-auctionFuture)-(24*60*60*1000*dayNum)-(60*60*1000*houNum)-(60*1000*minNum)-(secNum*1000);
        milli=Math.floor(millisec/10);
        if(milli<10){
            milli="0"+milli;
}
if(dayNum < 0 || houNum < 0 || minNum < 0 || secNum < 0) {
if({$auction['uid']} == {$_G['uid']} && !{$auction['status']} && {$auction['starttimeto_0']} <= {$_G['timestamp']}) {
document.getElementById('timeleft').innerHTML = '已经结束';
document.getElementById('ijoin').innerHTML = '<span>结算</span>';
} else {
document.getElementById('timeleft').innerHTML = '已经结束';
document.getElementById('ijoin').onclick = 'javascript:void(0);';
document.getElementById('ijoin').innerHTML = '<span>已经结束</span>';
}
clearInterval("showTimeLimit()");
return;
}
document.getElementById('timeleft').innerHTML = (dayNum?dayNum+" 天 ":'')+ (houNum > 0 ?houNum + " 小时 ":'') + (minNum?minNum + " 分钟 ":'')+ secNum + " 秒";
    }
setInterval("showTimeLimit()", 1000);
</script>


EOF;
?>
