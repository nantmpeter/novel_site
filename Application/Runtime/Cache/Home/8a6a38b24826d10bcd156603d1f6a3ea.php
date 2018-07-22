<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta http-equiv="Cache-Control" content="no-transform" />
	<title><?php echo ($TDK["title"]); ?></title>
	<meta name="keywords" content="<?php echo ($TDK["keyword"]); ?>" />
	<meta name="description" content="<?php echo ($TDK["description"]); ?>" />
	<link rel="canonical" href="<?php echo ($TDK["canonicalurl"]); ?>"/>
	<meta name="applicable-device" content="pc">
	<meta http-equiv="mobile-agent" content="format=html5; url=<?php echo ($TDK["canonicalurl_m"]); ?>">
	<link rel="stylesheet" href="/Public/<?php echo ($theme); ?>/css/style.css?v<?php echo ($version); ?>" />
	<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/<?php echo ($theme); ?>/js/header.js?v<?php echo ($version); ?>"></script>
	<script>var znsid = '<?php echo ($comset["znsid"]); ?>';</script>
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
		<div id="hotcontent">
			<div class="lll">
				<h2><?php echo ($TDK["webname"]); ?>小说周榜</h2>
				<ul>
				<?php if(is_array($dataarea_list["pc_top_week"])): foreach($dataarea_list["pc_top_week"] as $key=>$v): ?><li class="item-cover">
					<a href="<?php echo ($v['rewriteurl']); ?>" title="<?php echo ($v['title']); ?>">
						<img <?php echo ($comset["src"]); ?>="<?php echo ($v['thumb']); ?>" alt="<?php echo ($v['title']); ?>" onerror="this.src='/Public/images/nocover.jpg'" />
						<h3><?php echo ($v['title']); ?></h3>
					</a>
				</li><?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
		<?php echo ($advcode["list_1"]["code"]); ?>
		<div id="hotcontent">
			<div class="lll">
				<h2><?php echo ($TDK["webname"]); ?>小说月榜</h2>
				<ul>
				<?php if(is_array($dataarea_list["pc_top_month"])): foreach($dataarea_list["pc_top_month"] as $key=>$v): ?><li class="item-cover">
					<a href="<?php echo ($v['rewriteurl']); ?>" title="<?php echo ($v['title']); ?>">
						<img <?php echo ($comset["src"]); ?>="<?php echo ($v['thumb']); ?>" alt="<?php echo ($v['title']); ?>" onerror="this.src='/Public/images/nocover.jpg'" />
						<h3><?php echo ($v['title']); ?></h3>
					</a>
				</li><?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
		<?php echo ($advcode["list_2"]["code"]); ?>
		<div id="hotcontent">
			<div class="lll">
				<h2><?php echo ($TDK["webname"]); ?>小说总榜</h2>
				<ul>
				<?php if(is_array($dataarea_list["pc_top_all"])): foreach($dataarea_list["pc_top_all"] as $key=>$v): ?><li class="item-cover">
					<a href="<?php echo ($v['rewriteurl']); ?>" title="<?php echo ($v['title']); ?>">
						<img <?php echo ($comset["src"]); ?>="<?php echo ($v['thumb']); ?>" alt="<?php echo ($v['title']); ?>" onerror="this.src='/Public/images/nocover.jpg'" />
						<h3><?php echo ($v['title']); ?></h3>
					</a>
				</li><?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
		<?php echo ($advcode["list_3"]["code"]); ?>
	</div>
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