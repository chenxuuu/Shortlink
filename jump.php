<?php
  	// 引入类
	require_once('inc/require.php');

	// 重定向
  	if(isset($_GET['id'])) {
    	$url_c = new url();
    	// 获取目标网址
    	$url = $url_c->get_url($_GET['id'],true);
		// 重定向至目标网址
		if(!(
			stripos($url,"HTTP://") === 0 ||
			stripos($url,"HTTPS://") === 0 ||
			stripos($url,"//") === 0) && $url)
			$url = "http://".$url;
    	if($url) {
      		header('Location: ' . $url);
      		exit;
    	}
    	echo "未找到该链接，可能已过期，<a href='".get_uri()."'>点击返回主页</a>";
  	}
?>

