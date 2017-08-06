<?php
 !defined('EMLOG_ROOT') && exit('access deined!');
 function plugin_setting_view(){
	require (EMLOG_ROOT . '/content/plugins/wxtx-master/wxtx-master_config.php');
	?>
 <div class="heading-bg  card-views">
  <ul class="breadcrumbs">
  <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
  <li class="active">评论微信提醒</li>
 </ul>
</div>	
<?php if(isset($_GET['setting'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('settings_saved_ok')?>
</div>
<?php endif;?>	
<div class="row">
<div class="col-md-12">
<div class="panel panel-default card-view">
<div class="panel-body"> 
1.KEY获取
请访问<a href="http://sc.ftqq.com/" title="">Server酱</a> <br/>2.绑定你的微信号才能收到推送.<br>
<a href="http://www.youngxj.cn" >3.关注杨小杰</a><BR/><a href="http://www.youngxj.cn" >4.更多实用教程</a>
</div>
</div>
</div>
</div>    
<form action="plugin.php?plugin=wxtx-master&action=setting" method="post">
<div class="row">
<div class="col-md-12">
<div class="panel panel-default card-view">
<div class="panel-body"> 
<div class="form-group">
<label class="control-label mb-10">您获取到的SCKEY:</label>
<input size="90" name="SCKEY"  class="form-control"  type="text" value="<?php echo $config["SCKEY"]; ?>" /></input>
</div>
<div class="clearfix"></div>
<div class="form-group text-center">
<input type="submit" name="submit" class="btn  btn-success" value="保存" >
</div>
</div></div></div>
</div>
	</form>
	<?php
}

function plugin_setting(){
	$newConfig = '<?php
$config = array(
	"SCKEY" => "'.$_POST["SCKEY"].'"
);';
	@file_put_contents(EMLOG_ROOT.'/content/plugins/wxtx-master/wxtx-master_config.php', $newConfig);
}
?>
<script>
setTimeout(hideActived,2600);
$("#wxd_wxtx").addClass('active-page');
$("#menu_mg").addClass('active');
</script>
