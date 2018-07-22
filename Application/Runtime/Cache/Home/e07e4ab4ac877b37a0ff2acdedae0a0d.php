<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
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
</head>
<body>
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
<section class="ptm-content">
	<div class="ptm-tab">
	<ul class="ptm-tab-nav">
		<li <?php if($cate == ''and CONTROLLER_NAME== 'Index' and ACTION_NAME== 'index'): ?>class="active"<?php endif; ?>><a href="<?php echo ($TDK["weburl"]); ?>">首页</a></li>
		<li class="nav-sort <?php if($cate != '' and $cate != 'top'): ?>active<?php endif; ?>"><a href="<?php echo ($catelist["all"]); ?>">分类</a></li>
		<li <?php if($cate == 'top'): ?>class="active"<?php endif; ?>><a href="<?php echo ($catelist["top"]); ?>">排行</a></li>
		<li <?php if(CONTROLLER_NAME== 'Search'): ?>class="active"<?php endif; ?>><a href="<?php echo U('/home/search');?>">搜索</a></li>
		<li <?php if(ACTION_NAME== 'bookcase'): ?>class="active"<?php endif; ?>><a href="<?php echo U('/home/index/bookcase');?>">书架</a></li>
	</ul>
</div>
	<div class="categories ptm-clearfix">
		<ul>
			<li><a href="<?php echo ($catelist["all"]); ?>" class="current">全部小说</a></li>
			<?php if(is_array($category)): foreach($category as $key=>$vo): ?><li><a href="<?php echo ($vo['url']); ?>" <?php if($category[$key]['dir'] == $cate): ?>class="current"<?php endif; ?>><?php echo ($vo['name']); ?></a></li><?php endforeach; endif; ?>
		</ul>
		<div class="c10"></div>
	</div>
	<div class="ptm-card">
		<div class="ptm-card-header ptm-clearfix">
			<div class="ptm-pull-left">
				本月热门小说
			</div>
			<div class="ptm-pull-right">
				<a href="<?php echo ($catelist["top"]); ?>">更多>></a>
			</div>
		</div>
		<div class="ptm-card-content" style="padding:0">
			<ul class="ptm-list-view ptm-grid-view pt-card-1">
				<?php if(is_array($hotlist)): foreach($hotlist as $key=>$v): ?><li class="ptm-list-view-cell ptm-img ptm-col-xs-4">
					<div class="imgarea">
						<a href="<?php echo ($v['rewriteurl']); ?>" title="<?php echo ($v['title']); ?>"><img class="ptm-img-object" <?php echo ($comset["src"]); ?>="<?php echo ($v['thumb']); ?>" alt="<?php echo ($v['title']); ?>"></a>
					</div>
					<div class="ptm-img-body">
						<span class="ptm-block pt-name ptm-text-cut"><a href="<?php echo ($v['rewriteurl']); ?>" title="<?php echo ($v['title']); ?>"><?php echo ($v['title']); ?></a></span>
					</div>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
	</div>
	<?php echo ($advcode["list_1"]["code_wap"]); ?>
	<div class="ptm-card">
		<div class="ptm-card-header ptm-clearfix">
			<div class="ptm-pull-left">
				全部小说
			</div>
			<div class="ptm-pull-right">
				第<?php echo ($page); ?>页
			</div>
		</div>
		<div class="ptm-card-content">
			<ul class="pt-card pt-card-7">
				<?php if(is_array($articlelist)): foreach($articlelist as $key=>$v): ?><li>
					<div class="pt-cover">
						<a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><img <?php echo ($comset["src"]); ?>="<?php echo ($v["thumb"]); ?>" alt="<?php echo ($v["title"]); ?>"></a>
					</div>
					<div class="pt-novel">
						<div class="pt-num ptm-pull-right"><span style="color:orange"><?php echo ($v["views"]); ?></span>人阅读</div>
						<div class="pt-name"><a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></div>
						<div class="pt-author">作者：<a href="<?php echo reurl('author', $v);?>" target="_blank" title="<?php echo ($v["author"]); ?>"><?php echo ($v["author"]); ?></a> | 分类：<a href="<?php echo ($v["cateurl"]); ?>"><?php echo ($v["catename"]); ?></a></div>
						<div class="pt-desc ptm-text-cut">简介：<?php echo ($v["description"]); ?></div>
					</div>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
		<?php if($pagehtml != ''): ?><div class="ptm-card-footer" id="pages">
			<?php echo ($pagehtml); ?>
		</div><?php endif; ?>
	</div>
	<?php echo ($advcode["list_2"]["code_wap"]); ?>
</section>
<div class="ptm-line-x"></div>
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