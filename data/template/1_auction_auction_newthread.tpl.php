<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$return = <<<EOF


<style type="text/css">

EOF;
 if($_G['gp_action'] == 'edit') { 
$return .= <<<EOF

#auc_op input,#auc_type_ctrl,#auc_virtual_ctrl{background-color:#efefef;}

EOF;
 } 
$return .= <<<EOF

.specialpost b{color:#F26C4F;}
</style>

<div class="exfm cl" id="auc_op">
<!--left-->
<input type="hidden" name="attachnew" value="1" />
<div class="sinf sppoll z">
<dl>
<!--name-->
<dt><span class="rq">*</span><label for="auc_name">物品名称:</label></dt>
<dd>
<span class="ftid"><input name="auc_name" id="auc_name" tabindex="2" type="text" class="px oinf" 
EOF;
 if($auction['name']) { 
$return .= <<<EOF
value="{$auction['name']}"
EOF;
 } 
$return .= <<<EOF
 onkeyup="showtypeoption();" 
EOF;
 if($_G['gp_action'] == 'edit') { 
$return .= <<<EOF
disabled="disabled"
EOF;
 } 
$return .= <<<EOF
/></span>
</dd>
<!--time-->
<dt><span class="rq">*</span><label for="auc_starttimefrom">交易时间:</label></dt>
<dd><span class="ftid">
<input type="text" name="auc_starttimefrom" id="auc_starttimefrom" tabindex="2" class="px" onclick="showcalendar(event, this, true)" autocomplete="off" value="{$auction['starttimefrom']}" 
EOF;
 if($_G['gp_action'] == 'edit') { 
$return .= <<<EOF
disabled="disabled"
EOF;
 } 
$return .= <<<EOF
/><span> ~ </span><input onclick="showcalendar(event, this, true)" type="text" autocomplete="off" id="auc_starttimeto" name="auc_starttimeto" tabindex="2" class="px" value="
EOF;
 if($auction['starttimeto']) { 
$return .= <<<EOF
{$auction['starttimeto']}
EOF;
 } 
$return .= <<<EOF
" 
EOF;
 if($_G['gp_action'] == 'edit') { 
$return .= <<<EOF
style="background-color:#FFF;" 
EOF;
 } 
$return .= <<<EOF
/>
</span>
</dd>
<!--market price-->
<dt><span class="rq">*</span><label for="auc_real_price">市场价:</label></dt>
<dd><span class="ftid">
<input name="auc_real_price" id="auc_real_price" tabindex="2" type="text" class="px" 
EOF;
 if($auction['real_price']) { 
$return .= <<<EOF
value="{$auction['real_price']}"
EOF;
 } 
$return .= <<<EOF
  onkeyup="checkvalue(this.value, 'auc_real_price_message')" 
EOF;
 if($_G['gp_action'] == 'edit') { 
$return .= <<<EOF
disabled="disabled"
EOF;
 } 
$return .= <<<EOF
/> 元 <span id="auc_real_price_message"></span>
</span>
</dd>
<!--is virtual or not-->
<dt><span class="rq">*</span><label for="auc_virtual">物品类型:</label></dt>
<dd>
<span class="ftid">
<select name="auc_virtual" id="auc_virtual" width="50" class="ps" selecti="0" style="display: none;">

EOF;
 if($_G['gp_action'] == 'newthread') { 
$return .= <<<EOF

<option value="0" 
EOF;
 if($auction['virtual'] == 2) { 
$return .= <<<EOF
selected="selected"
EOF;
 } 
$return .= <<<EOF
>实物</option>
<option value="1" 
EOF;
 if($auction['virtual'] == 2) { 
$return .= <<<EOF
selected="selected"
EOF;
 } 
$return .= <<<EOF
>虚拟物品</option>

EOF;
 } elseif($_G['gp_action'] == 'edit') { 
$return .= <<<EOF

<option value="{$auction['virtual']}" selected="selected">
EOF;
 if($auction['virtual'] == 0) { 
$return .= <<<EOF
实物
EOF;
 } elseif($auction['virtual'] == 1) { 
$return .= <<<EOF
虚拟物品
EOF;
 } 
$return .= <<<EOF
</option>

EOF;
 } 
$return .= <<<EOF

</select>
</span>
</dd>
<!--auction type-->
<dt><span class="rq">*</span><label for="auc_type">交易类型:</label></dt>
<dd>
<span class="ftid">
<select name="auc_type" id="auc_type" width="50" class="ps" selecti="0" style="display: none;">

EOF;
 if($_G['gp_action'] == 'newthread') { 
$return .= <<<EOF

<option value="1" 
EOF;
 if(1) { 
$return .= <<<EOF
selected="selected"
EOF;
 } 
$return .= <<<EOF
>兑&nbsp;&nbsp;&nbsp;换</option>
<option value="2" 
EOF;
 if(0) { 
$return .= <<<EOF
selected="selected"
EOF;
 } 
$return .= <<<EOF
>抽&nbsp;&nbsp;&nbsp;奖</option>
<option value="3" 
EOF;
 if(0) { 
$return .= <<<EOF
selected="selected"
EOF;
 } 
$return .= <<<EOF
>竞&nbsp;&nbsp;&nbsp;拍</option>

EOF;
 } elseif($_G['gp_action'] == 'edit') { 
$return .= <<<EOF

<option value="{$auction['typeid']}" 
EOF;
 if($auction['typeid'] == 1) { 
$return .= <<<EOF
selected="selected"
EOF;
 } 
$return .= <<<EOF
>
EOF;
 if($auction['typeid'] ==1) { 
$return .= <<<EOF
兑&nbsp;&nbsp;&nbsp;换
EOF;
 } elseif($auction['typeid'] == 2) { 
$return .= <<<EOF
抽&nbsp;&nbsp;&nbsp;奖
EOF;
 } 
$return .= <<<EOF
</option>

EOF;
 } 
$return .= <<<EOF

</select>
</span>
</dd>

<!--username and password-->
<dt id="auc_message_t" style="display:none;"><span class="rq">*</span><label for="auc_message">卡密:</label></dt>
<dd id="auc_message_c" style="display:none;"><span class="ftid">
<textarea id="auc_message" name="auc_message" class="pt" style="width:290px;" ondblclick="textareasize(this, 1)"></textarea>
<p class="x cl">请填写卡密，一个一行<span id="auc_message_message"></span></p>
</span>
</dd>
<!--credit price when !auction-->
<dt id="auc_ext_price_t" style="display:none;"><span class="rq">*</span><label for="auc_ext_price">交易出价:</label></dt>
<dd id="auc_ext_price_c" style="display:none;"><span class="ftid">
<input name="auc_ext_price" id="auc_ext_price" tabindex="2" type="text" class="px" value="{$auction['ext_price']}" onkeyup="checkvalue(this.value, 'auc_ext_price_message')" 
EOF;
 if($_G['gp_action'] == 'edit') { 
$return .= <<<EOF
disabled="disabled"
EOF;
 } 
$return .= <<<EOF
/> <em class="xi1">{$_G['setting']['extcredits'][$_G['cache']['plugin']['auction']['auc_extcredit']]['title']}</em> <span id="auc_ext_price_message"></span>
</span>
</dd>
<!--base price-->
<dt id="auc_base_price_t" style="display:none;"><span class="rq">*</span><label for="auc_base_price">竞拍底价:</label></dt>
<dd id="auc_base_price_c" style="display:none;"><span class="ftid">
<input name="auc_base_price" id="auc_base_price" tabindex="2" type="text" class="px" 
EOF;
 if($auction['base_price']) { 
$return .= <<<EOF
value="{$auction['base_price']}"
EOF;
 } 
$return .= <<<EOF
 onkeyup="checkvalue(this.value, 'auc_base_price_message')" 
EOF;
 if($_G['gp_action'] == 'edit') { 
$return .= <<<EOF
disabled="disabled"
EOF;
 } 
$return .= <<<EOF
/>  <em class="xi1">{$_G['setting']['extcredits'][$_G['cache']['plugin']['auction']['auc_extcredit']]['title']}</em> <span id="auc_base_price_message"></span>
</span>
</dd>
<!--delta price-->
<dt id="auc_delta_price_t" style="display:none;"><span class="rq">*</span><label for="auc_delta_price">加价幅度:</label></dt>
<dd id="auc_delta_price_c" style="display:none;"><span class="ftid">
<input name="auc_delta_price" id="auc_delta_price" tabindex="2" type="text" class="px" 
EOF;
 if($auction['delta_price']) { 
$return .= <<<EOF
value="{$auction['delta_price']}"
EOF;
 } 
$return .= <<<EOF
 onkeyup="checkvalue(this.value, 'auc_delta_price_message')" 
EOF;
 if($_G['gp_action'] == 'edit') { 
$return .= <<<EOF
disabled="disabled"
EOF;
 } 
$return .= <<<EOF
/>  <em class="xi1">{$_G['setting']['extcredits'][$_G['cache']['plugin']['auction']['auc_extcredit']]['title']}</em> <span id="auc_delta_price_message"></span>
</span>
</dd>
<!--amount-->
<dt id="auc_number_t" style="display:none;"><span class="rq">*</span><label for="auc_number">物品数量:</label></dt>
<dd id="auc_number_c" style="display:none;"><span class="ftid">
<input name="auc_number" id="auc_number" tabindex="2" type="text" class="px" value="{$auction['number']}" onkeyup="checkvalue(this.value, 'auc_number_message')" 
EOF;
 if($_G['gp_action'] == 'edit') { 
$return .= <<<EOF
disabled="disabled"
EOF;
 } 
$return .= <<<EOF
 /><span id="auc_number_message"></span>
</span>
</dd>
</dl>
</div>
<!--right-->
<div class="sadd z">
<dl>
<dt>
<span class="rq"></span><label for="">物品图片:</label></dt>
</dt>
<dd><p><button type="button" class="pn" onclick="uploadWindow(function (aid, url){auctionaid_upload(aid, url);ATTACHORIMAGE = 1;})"><span>
EOF;
 if($auctionatt['attachment']) { 
$return .= <<<EOF
更新
EOF;
 } else { 
$return .= <<<EOF
上传
EOF;
 } 
$return .= <<<EOF
</span></button></p>
<input type="hidden" name="auctionaid" id="auctionaid" 
EOF;
 if($auction['aid']) { 
$return .= <<<EOF
value="{$auction['aid']}" 
EOF;
 } 
$return .= <<<EOF
/>
<input type="hidden" name="auctionaid_url" id="auctionaid_url" />
<div id="auctionattach_image">
<span class="xg1">

EOF;
 if($auctionatt['attachment']) { 
$return .= <<<EOF
点击更新来更换交易的封面
EOF;
 } else { 
$return .= <<<EOF
上传一张图片作为交易的封面吧 
EOF;
 } 
$return .= <<<EOF

</span>

EOF;
 if($auctionatt['attachment']) { 
$return .= <<<EOF

<a href="{$auctionatt['attachment']}" target="_blank"><img class="spimg" src="{$auctionatt['attachment']}" alt="" /></a>

EOF;
 } 
$return .= <<<EOF

</div>
</dd>
</dl>
</div>
</div>
<script type="text/javascript" reload="1">
simulateSelect('auc_type');
simulateSelect('auc_virtual');
</script>
<script type="text/javascript" reload="1">
function getid_auc(id) {
return document.getElementById(id);
}
function checkvalue(value, message){
if(!value.search(/^\d+$/)) {
getid_auc(message).innerHTML = '';
} else {
getid_auc(message).innerHTML = '<b>填写无效</b>';
}
}

function showtypeoption() {
var v = 0;t = 1;
v = getid_auc('auc_virtual').value;
t = getid_auc('auc_type').value;
if(v == 0 && t == 1) {
showoptionExc(['auc_ext_price','auc_number']);
}else if(v == 0 && t == 2) {
showoptionExc(['auc_ext_price','auc_number']);
}else if(v == 0 && t == 3) {
showoptionExc(['auc_base_price','auc_delta_price','auc_number']);
}else if(v == 1 && t == 1) {
showoptionExc(['auc_message','auc_ext_price']);
}else if(v == 1 && t == 2) {
showoptionExc(['auc_message','auc_ext_price']);
}else if(v == 1 && t == 3) {
showoptionExc(['auc_message','auc_base_price','auc_delta_price']);
}
setTimeout("showtypeoption()", 1000);
}
function showoptionExc(show) {
var options = ['auc_message','auc_ext_price','auc_base_price','auc_delta_price','auc_number'];

for(var i=0;i<options.length;i++) {
if(in_array(options[i], show)) {
getid_auc(options[i]+'_t').style.display = 'block';
getid_auc(options[i]+'_c').style.display = 'block';
} else {
getid_auc(options[i]+'_t').style.display = 'none';
getid_auc(options[i]+'_c').style.display = 'none';
}
}
}
EXTRAFUNC['validator']['special'] = 'validateextra1';
function validateextra1() {
var auc_name = getid_auc('auc_name');
var auc_starttimefrom = getid_auc('auc_starttimefrom');
var auc_starttimeto = getid_auc('auc_starttimeto');
var auc_virtual = getid_auc('auc_virtual');
var auc_type = getid_auc('auc_type');
var auc_message = getid_auc('auc_message');
var auc_number = getid_auc('auc_number');
var auc_base_price = getid_auc('auc_base_price');
var auc_delta_price = getid_auc('auc_delta_price');
var auc_base_price = getid_auc('auc_base_price');
var auc_real_price = getid_auc('auc_real_price');
if(auc_name.value == '') {
showDialog('请填写物品名称', 'alert', '', function () { auc_name.focus(); });
return false;
}
if(auc_starttimefrom.value == '') {
showDialog('开始时间填写无效', 'alert', '', function () { auc_starttimefrom.focus() });
return false;
}
if(auc_starttimeto.value == '') {
showDialog('结束时间填写无效', 'alert', '', function () { auc_starttimeto.focus() });
return false;
}
if(auc_real_price.value == '') {
showDialog('市场价格填写无效', 'alert', '', function () { auc_real_price.focus() });
return false;
}
if(auc_virtual.value == 1 && (auc_type == 1 || auc_type == 2)) {
if(auc_ext_price.value == '' || auc_ext_price.value.search(/^\d+$/)) {
showDialog('积分价格填写无效', 'alert', '', function () { auc_ext_price.focus() });
return false;
}
if(auc_number.value == '' || auc_number.value.search(/^\d+$/)) {
showDialog('物品数量填写无效', 'alert', '', function () { auc_number.focus() });
return false;
}
}
if(auc_type.value == 3) {
if(auc_virtual.value == 2) {
if(auc_number.value == '' || auc_number.value.search(/^\d+$/)) {
showDialog('物品数量填写无效', 'alert', '', function () { auc_number.focus() });
return false;
}
}
if(auc_virtual.value == 1) {
if(auc_message.value == '') {
showDialog('!auc_post_error_message!', 'alert', '', function () { auc_message.focus() });
return false;
}
}
if(auc_base_price.value == '' || auc_base_price.value.search(/^\d+$/)) {
showDialog('竞拍底价填写无效', 'alert', '', function () { auc_base_price.focus() });
return false;		
}
if(auc_delta_price.value == '' || auc_delta_price.value.search(/^\d+$/)) {
showDialog('竞拍差价填写无效', 'alert', '', function () { auc_delta_price.focus() });
return false;		
}

}
if(auc_virtual.value == 2 && (auc_type == 1 || auc_type == 2)) {
if(auc_message.value == '') {
showDialog('!auc_post_error_message!', 'alert', '', function () { auc_message.focus() });
return false;
}
if(auc_ext_price.value == '' || auc_ext_price.value.search(/^\d+$/)) {
showDialog('积分价格填写无效', 'alert', '', function () { auc_ext_price.focus() });
return false;
}
}
return true;
}
function auctionaid_upload(aid, url) {
getid_auc('auctionaid_url').value = url;
updateauctionattach(aid, url, '{$_G['setting']['attachurl']}forum');
}
function updateauctionattach(aid, url, attachurl) {
getid_auc('auctionaid').value = aid;
getid_auc('auctionattach_image').innerHTML = '<img src="' + attachurl + '/' + url + '" class="spimg" />';
}
function textareasize(obj, op) {
if(!op) {
if(obj.scrollHeight > 70) {
obj.style.height = (obj.scrollHeight < 300 ? obj.scrollHeight - heightag: 300) + 'px';
if(obj.style.position == 'absolute') {
obj.parentNode.style.height = (parseInt(obj.style.height) + 20) + 'px';
}
}
} else {
if(obj.style.position == 'absolute') {
obj.style.position = '';
obj.style.width = '290px';
obj.parentNode.style.height = '';
} else {
obj.parentNode.style.height = obj.parentNode.offsetHeight + 'px';
obj.style.width = BROWSER.ie > 6 || !BROWSER.ie ? '50%' : '600px';
obj.style.position = 'absolute';
}
}
}
showtypeoption();
</script>

EOF;
?>
