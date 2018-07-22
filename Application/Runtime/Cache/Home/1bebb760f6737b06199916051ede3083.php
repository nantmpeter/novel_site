<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />
	<title><?php echo ($TDK["title"]); ?></title>
	<meta name="keywords" content="<?php echo ($TDK["keyword"]); ?>">
	<meta name="description" content="<?php echo ($TDK["description"]); ?>">
	<link rel="stylesheet" type="text/css" href="/Public/<?php echo ($theme); ?>/css/ptm.min.css?v<?php echo ($version); ?>" />
	<link rel="stylesheet" type="text/css" href="/Public/<?php echo ($theme); ?>/css/skin.min.css" />
	<link rel="stylesheet" type="text/css" href="/Public/<?php echo ($theme); ?>/css/font-awesome.min.css" />
	<script src="/Public/<?php echo ($theme); ?>/js/static.js?v<?php echo ($version); ?>"></script>
	<script src="/Public/layer/mobile/layer.js"></script>
	<script>
		var bookid = '<?php echo ($TDK["oid"]); ?>', hash = '<?php echo ($TDK["hash"]); ?>', index_rule = '<?php echo C('ID_RULE');?>', cindex_rule = '<?php echo C('CID_RULE');?>';
	</script>
</head>
<body class="pt-dir-page">
<header class="ptm-bar ptm-bar-nav">
	<a class="ptm-pull-left" href="/">
		<span class="ptm-iconfont fa fa-home"></span>
	</a>
	<div class="ptm-title"><?php echo ($TDK["webname"]); ?></div>
	<a class="ptm-pull-right" href="javascript:;">
		<span class="ptm-iconfont fa fa-search"></span>
	</a>
	<div class="back_r"><a id="translatelink" style="color:red;" href="javascript:translatePage();" title="点击[繁/简]切换">繁体版</a></div>
</header>
<section class="ptm-content ptm-card pt-infopage">
	<div class="baseinfo">
		<img src="<?php echo ($articledb["thumb"]); ?>" alt="<?php echo ($articledb["title"]); ?>" onerror="this.src='/Public/images/nocover.jpg'">
		<div class="pt-novel">
			<h1 class="pt-name"><a href="<?php echo ($TDK["canonicalurl_m"]); ?>"><?php echo ($articledb["title"]); ?></a></h1>
			<div class="pt-info">作者：<a href="<?php echo reurl('author', $articledb);?>"><?php echo ($articledb["author"]); ?></a></div>
			<div class="pt-info">分类：<a href="<?php echo ($TDK["cateurl"]); ?>"><?php echo ($articledb["catename"]); ?></a></div>
			<div class="pt-info">更新：<?php echo ($articledb["time"]); ?></div>
			<div class="pt-info">人气：<?php echo ($articledb["views"]); ?></div>
		</div>
	</div>
	<div class="twobutton ptm-clearfix">
		<div class="ptm-col-xs-6">
			<a class="ptm-btn ptm-btn-primary ptm-btn-block" href="<?php echo ($articledb["firstchapterurl"]); ?>">开始阅读</a>
		</div>
		<div class="ptm-col-xs-6">
			<a class="ptm-btn ptm-btn-warning ptm-btn-block" href="<?php echo U('/home/index/bookcase');?>" rel="nofollow">查看书架</a>
		</div>
	</div>
	<div class="ptm-line-x"></div>
	<div class="intro" ><?php echo ($articledb["description"]); ?></div>
</section>
<?php echo ($advcode["view_1"]["code_wap"]); ?>
<section class="pt-infopage-more">
	<div class="ptm-card">
		<div class="ptm-card-header">
			<div class="ptm-pull-left">
				《<?php echo ($articledb["title"]); ?>》最新12章
			</div>
			<div class="ptm-pull-right">
				<span id="loading-tip1"><i class="ptm-iconfont fa fa-spinner fa-spin"></i> 更新中</span>
			</div>
		</div>
		<div class="ptm-card-content pt-dir">
			<ul class="ptm-list-view" id="newchaperlist">
				<?php if(is_array($newchaperlist)): foreach($newchaperlist as $key=>$v2): ?><li>
						<a href="<?php echo reurl('chapter', $v2, $maindomain);?>" title="<?php echo ($articledb["title"]); ?> <?php echo ($v2["title"]); ?>"><?php echo ($v2["title"]); ?></a>
					</li><?php endforeach; endif; ?>
			</ul>
		</div>
		<div class="ptm-card-footer" id="loading-tip">
			<i class="ptm-iconfont fa fa-spinner fa-spin"></i> 机器人正在抓取最新章节...
		</div>
	</div>
	<a id="i2"></a>
	<?php echo ($advcode["view_2"]["code_wap"]); ?>
	<div class="ptm-card">
		<div class="ptm-card-header">
			<div class="ptm-pull-left">
				《<?php echo ($articledb["title"]); ?>》章节列表
			</div>
			<div class="ptm-pull-right">
				50章/页
			</div>
		</div>
		<div class="ptm-card-content pt-dir">
			<ul class="ptm-list-view" id="chapterlist">
				<?php if(is_array($chapterdb)): foreach($chapterdb as $key=>$v3): ?><li>
						<a href="<?php echo reurl('chapter', $v3, $maindomain);?>" title="<?php echo ($articledb["title"]); ?> <?php echo ($v3["title"]); ?>"><?php echo ($v3["title"]); ?></a>
					</li><?php endforeach; endif; ?>
			</ul>
			<div class="ptm-card-footer ptm-clearfix">
				<div class="ptm-col-xs-3">
					<a class="ptm-btn ptm-btn-primary ptm-btn-block ptm-btn-outlined" rel="prevpage">上一页</a>
				</div>
				<div class="ptm-col-xs-6" style="padding:0 10px;">
					<button class="ptm-btn ptm-btn-primary ptm-btn-block ptm-btn-outlined showdir" rel="chapterstat"><span>1/1页</span><i class="fa fa-angle-down pt-dir-icon"></i></button>
				</div>
				<div class="ptm-col-xs-3">
					<a class="ptm-btn ptm-btn-primary ptm-btn-block ptm-btn-outlined" rel="nextpage">下一页</a>
				</div>
			</div>
		</div>
	</div>
	<?php echo ($advcode["view_3"]["code_wap"]); ?>
	<div class="ptm-card">
		<div class="ptm-card-header ptm-clearfix">
			<div class="ptm-pull-left">
				热门推荐
			</div>
		</div>
		<div class="ptm-card-content" style="padding:0">
			<ul class="ptm-list-view ptm-grid-view pt-card-1">
				<?php if(is_array($dataarea_list["pcwap_week_6"])): foreach($dataarea_list["pcwap_week_6"] as $key=>$v): ?><li class="ptm-list-view-cell ptm-img ptm-col-xs-4">
					<div class="imgarea">
						<a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><img class="ptm-img-object" <?php echo ($comset["src"]); ?>="<?php echo ($v["thumb"]); ?>" alt="<?php echo ($title); ?>"></a>
					</div>
					<div class="ptm-img-body">
						<span class="ptm-block pt-name ptm-text-cut ptm-text-left"><a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></span>
						<span class="ptm-block pt-author ptm-text-cut ptm-text-left"><a href="<?php echo reurl('author', $v);?>"><?php echo ($v["author"]); ?></a></span>
					</div>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
	</div>
</section>
<div class="sel ptm-hide">
	<div class="ptm-alert-shade"></div>
	<div class="pt-dir-sel">
		<p class="title">请选择章节</p>
		<ul></ul>
	</div>
</div>
<div class="ptm-line-x"></div>
<script id="chapterhtml" type="text/html">
	<li>
		<a href="<?php echo C('HOME_URL'); echo C('CHAPTER_RULE');?>">{title}</a>
	</li>
</script>
<div class="footer">
	<p>本站系基于互联网搜索引擎技术为您提供信息检索服务。</p>
	<p>Copyright ©2017 <?php echo ($statcode); ?></p>
</div>
<section class="ptm-bar ptm-fix ptm-search">
	<div class="searchbox ptm-clearfix">
<?php if($comset["znsid"] != ''): ?><form action="http://zhannei.baidu.com/cse/search" name="searchbtm" method="get">
			<input type="hidden" name="s" value="<?php echo ($comset["znsid"]); ?>">
			<input name="q" placeholder="请输入小说名或作者名，勿错字" type="text" class="searchinput" required><button class="searchbtn ptm-btn-primary" type="submit">搜索</button>
		</form>
<?php else: ?>
		<form action="<?php echo U('/home/search');?>" name="searchbtm" method="post">
			<input type="hidden" name="action" value="search">
			<input name="q" placeholder="请输入小说名或作者名，勿错字" type="text" class="searchinput" required><button class="searchbtn ptm-btn-primary" type="submit">搜索</button>
		</form><?php endif; ?>
	</div>
</section>
<script type="text/javascript" src="/Public/<?php echo ($theme); ?>/js/zepto.min.js"></script>
<script type="text/javascript" src="/Public/<?php echo ($theme); ?>/js/base.js?v<?php echo ($version); ?>"></script>
<script type="text/javascript" src="/Public/trans.js?v<?php echo ($version); ?>"></script>
<?php if($comset["src"] != 'src'): ?><script src="//cdn.bootcss.com/jquery/2.2.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery_lazyload/1.9.7/jquery.lazyload.min.js"></script>
<script>
$(function() {
	jQuery('[rel-class=lazyload]').lazyload({effect: "fadeIn"});
});
</script><?php endif; ?>
<?php echo ($advcode["global_footer"]["code_wap"]); ?>
</body>
</html>