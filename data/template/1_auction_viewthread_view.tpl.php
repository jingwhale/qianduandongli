<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('viewthread_view');?><?php include template('common/header'); ?><table class="list_tb" style="margin-top:0;">
<?php if($list) { if(is_array($list)) foreach($list as $list_1) { ?><tr<?php if($list_1['uid'] == $_G['uid']) { ?> class="myauclog"<?php } ?>>
<td class="list_lt" width="20%"><a href="home.php?mod=space&amp;uid=<?php echo $list_1['uid'];?>"><?php echo $list_1['username'];?></a></td>
<td class="list_lt" width="40%"><?php echo $list_1['dateline'];?></td>
<td class="list_lt" width="<?php if($showmobile) { ?>10%<?php } else { ?>20%<?php } ?>"><?php echo $list_1['cur_price'];?></td>
<td class="list_lt" width="<?php if($showmobile) { ?>10%<?php } else { ?>20%<?php } ?>">
<?php if($auc['typeid'] == 1) { if($list_1['status']) { ?>
<em style="color:#F26C4F;">成功</em><?php if($_G['uid'] == $list_1['uid'] && $auc['virtual'] == 1) { ?>&nbsp;<a href="plugin.php?id=auction:involve&amp;operation=message&amp;tid=<?php echo $auction['tid'];?>" onclick="showWindow('auction_message', this.href, 'get', 0);return false;">(查看卡密)</a><?php } } else { if($auc['status'] == 1) { ?>
失败
<?php } else { ?>
等待结算
<?php } } } elseif($auc['typeid'] == 2) { if($list_1['status']) { if($auc['status'] == 1) { ?>
<em style="color:#F26C4F;">成功</em><?php if($_G['uid'] == $list_1['uid'] && $auc['virtual'] == 1) { ?>&nbsp;<a href="plugin.php?id=auction:involve&amp;operation=message&amp;tid=<?php echo $auction['tid'];?>" onclick="showWindow('auction_message', this.href, 'get', 0);return false;">查看卡密</a><?php } } else { ?>
<em style="color:#F26C4F;"><font color="#F26C4F">领先</font></em>
<?php } } else { ?>
出局
<?php } } ?>
</td>
<?php if($showmobile) { ?>
<td class="list_lt" withd="20%"><?php echo $list_1['mobile'];?></td>
<?php } ?>
</tr>
<?php } } else { ?>
<tr><td class="list_lt">
暂无出价记录，快去参与交易吧</td></tr>
<?php } ?>
</table>
<?php if($multi) { ?><div id="auc_pg"><?php echo $multi;?></div><?php } include template('common/footer'); ?>