<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('viewthread_message');?><?php include template('common/header'); ?><div id="main_messaqge" style="width:600px;">
<h3 class="flb">
<em id="returnmessage">查看卡密</em>
<span>
<?php if($_G['inajax']) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('auction_message')" title="关闭">关闭</a><?php } ?>
</span>
</h3>
<p style="margin:10px;">
<?php if($operation == 'message') { ?><?php echo $apply['message'];?>
<?php } elseif($operation == 'admin_message') { ?>
<table cellspacing="0" cellpadding="0" class="list_tb" width="90%" style="margin:5%">
<tr>
<th class="list_lt" style="width:30px">编号</th>
<th class="list_lt" style="width:383px">卡密</th>
<th class="list_lt" style="width:63px">用户</th>
<th class="list_lt" style="width:63px">状态</th>
</tr>
<?php if($messages) { if(is_array($messages)) foreach($messages as $message) { ?><tr>
<td class="list_lt" style="width:30px"><?php echo $message['mid'];?></td>
<td class="list_lt" style="width:383px"><?php echo $message['message'];?></td>
<td class="list_lt" style="width:63px"><?php echo $messageusers[$message['uid']];?></td>
<td class="list_lt" style="width:63px"><?php if($message['uid']) { ?>已发送<?php } else { ?>未发送<?php } ?></td>
</tr>
<?php } } ?>
</table>
<?php } ?>
</p>
<p class="o pns"><button id="confirmsubmit" name="confirmsubmit" value="true" class="pn pnc" type="submit" onclick="hideWindow('auction_message')"><strong>确定</strong></button></p>
</div><?php include template('common/footer'); ?>