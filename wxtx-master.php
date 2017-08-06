<?php
/*
Plugin Name: 评论微信提醒
Version: 1.1
Plugin URL: http://www.youngxj.cn
Description: 有新的评论通过微信提醒
Author: 杨小杰
Author Email: blog@youngxj.cn
Author URL: http://www.youngxj.cn
*/
!defined('EMLOG_ROOT') && exit('access deined!');
function wxd_wxtx_side(){
	echo '<li><a href="./plugin.php?plugin=wxtx-master"  id="wxd_wxtx">评论微信提醒</a></li>';
}

function wxd_wxtx_msg(){
	require (EMLOG_ROOT . '/content/plugins/wxtx-master/wxtx-master_config.php');
	
	if($config["SCKEY"]!=''){
		$comname = isset($_POST['comname']) ? addslashes(trim($_POST['comname'])) : '';
		$comment = isset($_POST['comment']) ? addslashes(trim($_POST['comment'])) : '';
		if (ISLOGIN === true) {
			$CACHE = Cache::getInstance();
			$user_cache = $CACHE->readCache('user');
			$comname = addslashes($user_cache[UID]['name_orig']);
		}
		if( ROLE != "admin"){
			$text = "有人在您的博客发表了评论";
			$desp = "**【".$comname."】** 在你的博客中评论:\n\n > ".$comment;	
			 $postdata = http_build_query(
				array(
					'text' => $text,
					'desp' => $desp
					)
				);
			$opts = array('http' =>
				array(
					'method'  => 'POST',
					'header'  => 'Content-type: application/x-www-form-urlencoded',
					'content' => $postdata
					)
				);
			$context  = stream_context_create($opts);
			$result = file_get_contents('http://sc.ftqq.com/'.$config["SCKEY"].'.send', false, $context);
		   return;
		}
	}	
}	

addAction('adm_sidebar_ext', 'wxd_wxtx_side');
addAction('comment_saved', 'wxd_wxtx_msg');
?>