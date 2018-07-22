<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta http-equiv="Cache-Control" content="no-transform" />
	<title>临时书架_<?php echo ($TDK["webname"]); ?></title>
	<meta name="keywords" content="<?php echo ($TDK["keyword"]); ?>" />
	<meta name="description" content="<?php echo ($TDK["description"]); ?>" />
	<link rel="canonical" href="<?php echo ($TDK["canonicalurl"]); ?>"/>
	<meta name="applicable-device" content="pc">
	<meta http-equiv="mobile-agent" content="format=html5; url=<?php echo ($TDK["canonicalurl_m"]); ?>">
	<link rel="stylesheet" href="/Public/<?php echo ($theme); ?>/css/style.css?v<?php echo ($version); ?>" />
	<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/<?php echo ($theme); ?>/js/header.js?v<?php echo ($version); ?>"></script>
	<script type="text/javascript" src="/Public/<?php echo ($theme); ?>/js/bookcase.js?v<?php echo ($version); ?>"></script>
	<script>var view_rule = '<?php echo C('HOME_URL'); echo C('VIEW_RULE');?>', chapter_rule = '<?php echo C('HOME_URL'); echo C('CHAPTER_RULE');?>', znsid = '<?php echo ($comset["znsid"]); ?>';</script>
</head>
<body>
<div id="wrapper">
	<script>login();</script>
<div class="header">
	<div class="header_logo">
		<a href="<?php echo ($TDK["weburl"]); ?>" title="<?php echo ($TDK["webname"]); ?>"><?php echo ($TDK["webname"]); ?></a>
	</div>
	<script>panel();</script>
</div>
<div class="nav">
	<ul>
		<li><a href="<?php echo ($TDK["weburl"]); ?>" title="<?php echo ($TDK["webname"]); ?>"><?php echo ($TDK["webname"]); ?></a></li>
		<li><a href="<?php echo U('/home/index/bookcase');?>">临时书架</a></li>
		<?php if(is_array($category)): foreach($category as $key=>$vo): ?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo['name']); ?></a></li><?php endforeach; endif; ?>
		<li><a href="<?php echo ($catelist["all"]); ?>">小说书库</a></li>
		<li><a href="<?php echo ($catelist["top"]); ?>">排行榜单</a></li>
	</ul>
</div>
	<div id="main">
		<div class="novelslist2">
			<h2>临时书架 - 用户浏览过的小说会自动保存到书架中（只限同一电脑）</h2>
			<ul>
				<li><span class="s1"><b>作品分类</b></span><span class="s2"><b>作品名称</b></span><span class="s3"><b>上次阅读章节</b></span><span class="s4"><b>作者</b></span><span class="s5"><b>操作</b></span><span class="s6"><b>&nbsp;</b></span><span class="s7"><b>&nbsp;</b></span></li>
				<div class="read_book"></div>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	<script>loadbooker();</script>
	<div class="footer">
	<div class="footer_link"></div>
	<div class="footer_cont">
		<script>footer();</script><?php echo ($statcode); ?>
	</div>
</div>
<?php if($comset["src"] != 'src'): ?><script src="//cdn.bootcss.com/jquery_lazyload/1.9.7/jquery.lazyload.min.js"></script>
<script>
$(function() {
	$('[rel-class=lazyload]').lazyload({effect: "fadeIn"});
});
</script><?php endif; ?>
<?php echo ($advcode["global_footer"]["code"]); ?>
</div>
</body>
</html>