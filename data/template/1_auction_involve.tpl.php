<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('involve');?><?php include template('common/header'); ?><style type="text/css">.auction_price{margin:10px;}.modprice{margin:0 5px;cursor:pointer;color:#666;}</style>
<form id="auctionform" action="plugin.php?id=auction:involve&amp;tid=<?php echo $auction['tid'];?>&amp;operation=join" method="post" name="auctionform" onsubmit="return mobilecheck();">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
<div id="main_messaqge" style="width:400px;">
<h3 class="flb">
<em id="returnmessage"><?php if($auction['typeid'] == 1) { ?>出价<?php } elseif($auction['typeid'] == 2) { ?>出价<?php } ?></em>
<span>
<?php if($_G['inajax']) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('confirm')" title="关闭">关闭</a><?php } ?>
</span>
</h3>
<?php if(empty($m_insufficient)) { if($auction['typeid'] == 1) { if($_G['uid']) { ?><p class="auction_price"><?php echo $m_type1_tips_p;?></p><?php } } if($auction['typeid'] == 2) { ?>
<p class="auction_price"><?php echo $m_type2_tips_p_pre;?> <input type="text" name="price" id="price" class="px" value="<?php if($the_last_one) { echo $the_last_one['cur_price'] + $auction['delta_price'];; } else { echo $auction['base_price']; } ?>" style="width:50px;" /> <a href="javascript:;" class="modprice" title="增加" onclick="modprice(1);">[+]</a><a href="javascript:;" class="modprice" title="减少" onclick="modprice(0);">[-]</a><?php echo $m_type2_tips_p_beh;?></p>
<?php } if($_G['cache']['plugin']['auction']['auc_mobile'] && !$mobile) { ?><p class="auction_price" style="padding-top:5px;">请留下您的手机号，物品领取过程中会用到</p><p class="auction_price">手机： <input type="text" name="mobile" id="mobile" class="px" style="width:100px" value="<?php echo $mobile;?>" /><span id="mb_check"></span></p><?php } if($_G['cache']['plugin']['auction']['auc_reply']) { ?>
<p class="auction_price" style="padding-top:5px;">说两句：
<textarea name="auc_reply_message" id="" class="pt" rows="3" cols="70" tabindex=""><?php echo $reply_message;?></textarea></p>
<?php } ?>

<p class="o pns"><span class="z xg1">出价成功后将冻结您相应的积分</span><button id="confirmsubmit" name="confirmsubmit" value="true" class="pn pnc" type="submit"><strong>确定</strong></button></p>
</div>
</form>
<script>
function modprice(para) {
var each = <?php echo $auction['delta_price'];?>;
var now_price = $('price').value - 0;
var base = <?php if($the_last_one) { echo $the_last_one['cur_price'] + $auction['delta_price'];; } else { echo $auction['top_price']; } ?>;
if(para == 1) {
if(now_price < base){
$('price').value = base;
} else {
$('price').value = now_price + each;
}
}
if(para == 0) {
if((now_price - each) < base) {
$('price').value = base;
} else {
$('price').value = now_price - each;
}
}
}
function mobilecheck() {
var mobile = $('mobile').value;
var reg = /^(\+)?(86)?0?1\d{10}$/;
if(mobile) {
var checked = mobile.search(reg);
if(checked >= 0) {
return true;
} else {
$('mb_check').innerHTML = ' <img src="<?php echo IMGDIR;?>/check_error.gif" width="16" height="16" class="vm" />';
return false;
}
} else {
return true;
}
}
</script>
<?php } else { ?>
<p class="auction_price">
<?php echo $m_insufficient;?></p>
<p class="o pns"><span class="z xg1">&nbsp;</span><button id="confirmsubmit" name="confirmsubmit" value="true" class="pn pnc" type="submit" onclick="hideWindow('confirm')"><strong>确定</strong></button></p>
</form>
<?php } include template('common/footer'); ?>