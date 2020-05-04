<?php
    // 引入配置文件
    require_once('config.php');
    require_once('inc/functions.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!--标题-->
	    <title><?php echo get_title() . ' - ' . get_description(); ?></title>
		<!--介绍、关键词的放置处（SEO优化）-->
	    <meta name="description" content="ShortLink 短链接服务">
	    <meta name="keyword" content="短链接,ShortLink,Link,链接缩短,短网址">
		<!--引入 CSS 文件-->
	    <link type="text/css" rel="stylesheet" href="asset/css/main.css">
	</head>
	<body>
	    <div class="wrap">
  			<!--网页显示标题-->
			<div class="meta">
				<h2 class="title"><?php echo get_big_title(); ?><?php echo get_title(); ?></h2>
				<h3 class="description"><?php echo get_description(); ?></h3>
			</div>
			<br><br>
  			<!--链接显示区-->
			<div class="link-area">
				<input id="url" type="text" placeholder="源网址" />
				<input id="submit" type="button" value="生成" onclick="APP.fn.setUrl(this)" />
				<br><br>
				<input id="shorturl" type="text" placeholder="短网址" readonly/>
				<input id="shorturlcopy" type="button" value="复制" onclick="copyText()" />
			</div>
			<div class="footer">
				链接超<?php echo get_expiry();?>天无人访问，可能会被回收<br>
				<?php echo get_hoster();?> | <a href="https://github.com/chenxuuu/shit-url/issues" target="_blank">反馈建议</a>
			</div>
	    </div>
		<!--嵌入 JS 代码-->
		<script>
			document.body.oncopy = function() {
				Swal.fire({
					allowOutsideClick:false,
					type:'success',
					title: '复制成功！',
					showConfirmButton: false,
					timer: 3000
				});
			};
		</script>
		<!--引入 JS 文件-->
		<script type="text/javascript" src="asset/js/app.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	</body>
</html>
