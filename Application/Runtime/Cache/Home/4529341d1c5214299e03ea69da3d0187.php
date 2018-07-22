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
	<div class="ptm-card">
		<div class="ptm-card-header ptm-clearfix">
			<div class="ptm-pull-left">
				本周热门
			</div>
		</div>
		<div class="ptm-card-content" style="padding:0">
			<ul class="ptm-list-view ptm-grid-view pt-card-1">
				<?php if(is_array($dataarea_list["wap_index_top"])): foreach($dataarea_list["wap_index_top"] as $key=>$v): ?><li class="ptm-list-view-cell ptm-img ptm-col-xs-4">
					<div class="imgarea">
						<a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><img class="ptm-img-object" <?php echo ($comset["src"]); ?>="<?php echo ($v["thumb"]); ?>" alt="<?php echo ($v["title"]); ?>"></a>
					</div>
					<div class="ptm-img-body">
						<span class="ptm-block pt-name ptm-text-cut"><a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></span>
					</div>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
	</div>
	<?php echo ($advcode["index_1"]["code_wap"]); ?>
	<div class="ptm-card">
		<div class="ptm-card-header ptm-clearfix">
			<?php echo getcate('xuanhuan');?>
		</div>
		<div class="ptm-card-content">
			<ul class="pt-card pt-card-7">
				<?php if(is_array($dataarea_list["wap_index_xuanhuan"])): foreach($dataarea_list["wap_index_xuanhuan"] as $key=>$v): ?><li>
					<div class="pt-cover">
						<a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><img <?php echo ($comset["src"]); ?>="<?php echo ($v["thumb"]); ?>" alt="<?php echo ($v["title"]); ?>"></a>
					</div>
					<div class="pt-novel">
						<div class="pt-num ptm-pull-right"><span style="color:orange"><?php echo ($v["views"]); ?></span>人阅读</div>
						<div class="pt-name"><a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></div>
						<div class="pt-author"><a href="<?php echo reurl('author', $v);?>" title="<?php echo ($v["author"]); ?>"><?php echo ($v["author"]); ?></a></div>
						<div class="pt-desc ptm-text-cut"><?php echo ($v["description"]); ?></div>
					</div>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
		<div class="ptm-card-footer">
			<a href="<?php echo getcate('xuanhuan', 'href');?>">更多<?php echo getcate('xuanhuan', 'text');?>>></a>
		</div>
	</div>
	<div class="ptm-card">
		<div class="ptm-card-header ptm-clearfix">
			<?php echo getcate('xiuzhen');?>
		</div>
		<div class="ptm-card-content">
			<ul class="pt-card pt-card-7">
				<?php if(is_array($dataarea_list["wap_index_xiuzhen"])): foreach($dataarea_list["wap_index_xiuzhen"] as $key=>$v): ?><li>
					<div class="pt-cover">
						<a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><img <?php echo ($comset["src"]); ?>="<?php echo ($v["thumb"]); ?>" alt="<?php echo ($v["title"]); ?>"></a>
					</div>
					<div class="pt-novel">
						<div class="pt-num ptm-pull-right"><span style="color:orange"><?php echo ($v["views"]); ?></span>人阅读</div>
						<div class="pt-name"><a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></div>
						<div class="pt-author"><a href="<?php echo reurl('author', $v);?>" title="<?php echo ($v["author"]); ?>"><?php echo ($v["author"]); ?></a></div>
						<div class="pt-desc ptm-text-cut"><?php echo ($v["description"]); ?></div>
					</div>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
		<div class="ptm-card-footer">
			<a href="<?php echo getcate('xiuzhen', 'href');?>">更多<?php echo getcate('xiuzhen', 'text');?>>></a>
		</div>
	</div>
	<div class="ptm-card">
		<div class="ptm-card-header ptm-clearfix">
			<?php echo getcate('dushi');?>
		</div>
		<div class="ptm-card-content">
			<ul class="pt-card pt-card-7">
				<?php if(is_array($dataarea_list["wap_index_dushi"])): foreach($dataarea_list["wap_index_dushi"] as $key=>$v): ?><li>
					<div class="pt-cover">
						<a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><img <?php echo ($comset["src"]); ?>="<?php echo ($v["thumb"]); ?>" alt="<?php echo ($v["title"]); ?>"></a>
					</div>
					<div class="pt-novel">
						<div class="pt-num ptm-pull-right"><span style="color:orange"><?php echo ($v["views"]); ?></span>人阅读</div>
						<div class="pt-name"><a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></div>
						<div class="pt-author"><a href="<?php echo reurl('author', $v);?>" title="<?php echo ($v["author"]); ?>"><?php echo ($v["author"]); ?></a></div>
						<div class="pt-desc ptm-text-cut"><?php echo ($v["description"]); ?></div>
					</div>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
		<div class="ptm-card-footer">
			<a href="<?php echo getcate('dushi', 'href');?>">更多<?php echo getcate('dushi', 'text');?>>></a>
		</div>
	</div>
	<div class="ptm-card">
		<div class="ptm-card-header ptm-clearfix">
			<?php echo getcate('wangyou');?>
		</div>
		<div class="ptm-card-content">
			<ul class="pt-card pt-card-7">
				<?php if(is_array($dataarea_list["wap_index_wangyou"])): foreach($dataarea_list["wap_index_wangyou"] as $key=>$v): ?><li>
					<div class="pt-cover">
						<a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><img <?php echo ($comset["src"]); ?>="<?php echo ($v["thumb"]); ?>" alt="<?php echo ($v["title"]); ?>"></a>
					</div>
					<div class="pt-novel">
						<div class="pt-num ptm-pull-right"><span style="color:orange"><?php echo ($v["views"]); ?></span>人阅读</div>
						<div class="pt-name"><a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></div>
						<div class="pt-author"><a href="<?php echo reurl('author', $v);?>" title="<?php echo ($v["author"]); ?>"><?php echo ($v["author"]); ?></a></div>
						<div class="pt-desc ptm-text-cut"><?php echo ($v["description"]); ?></div>
					</div>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
		<div class="ptm-card-footer">
			<a href="<?php echo getcate('wangyou', 'href');?>">更多<?php echo getcate('wangyou', 'text');?>>></a>
		</div>
	</div>
	<div class="ptm-card">
		<div class="ptm-card-header ptm-clearfix">
			<?php echo getcate('nvpin');?>
		</div>
		<div class="ptm-card-content">
			<ul class="pt-card pt-card-7">
				<?php if(is_array($dataarea_list["wap_index_nvpin"])): foreach($dataarea_list["wap_index_nvpin"] as $key=>$v): ?><li>
					<div class="pt-cover">
						<a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><img <?php echo ($comset["src"]); ?>="<?php echo ($v["thumb"]); ?>" alt="<?php echo ($v["title"]); ?>"></a>
					</div>
					<div class="pt-novel">
						<div class="pt-num ptm-pull-right"><span style="color:orange"><?php echo ($v["views"]); ?></span>人阅读</div>
						<div class="pt-name"><a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></div>
						<div class="pt-author"><a href="<?php echo reurl('author', $v);?>" title="<?php echo ($v["author"]); ?>"><?php echo ($v["author"]); ?></a></div>
						<div class="pt-desc ptm-text-cut"><?php echo ($v["description"]); ?></div>
					</div>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
		<div class="ptm-card-footer">
			<a href="<?php echo getcate('nvpin', 'href');?>">更多<?php echo getcate('nvpin', 'text');?>>></a>
		</div>
	</div>
	<?php echo ($advcode["index_2"]["code_wap"]); ?>
	<div class="ptm-card">
		<div class="ptm-card-header ptm-clearfix">
			最近更新
		</div>
		<div class="ptm-card-content">
			<ul class="pt-card pt-card-6">
				<?php if(is_array($updatelist)): foreach($updatelist as $key=>$v): ?><li>
					<div class="pt-novel">
						<div class="pt-one">
							<span class="pt-author"><?php echo ($v['updatetime']); ?> </span>
							<span class="pt-name"><a href="<?php echo ($v['rewriteurl']); ?>" title="<?php echo ($v['title']); ?>"><?php echo ($v['title']); ?></a></span>
							<span class="pt-author"> / <a href="<?php echo reurl('author', $v);?>" title="<?php echo ($v["author"]); ?>"><?php echo ($v["author"]); ?></a></span>
						</div>
						<div class="pt-desc ptm-text-cut "><a href="<?php echo ($v['rewriteurl']); ?>" title="<?php echo ($v['title']); ?> <?php echo ($v['lastchapter']); ?>" target="_blank"><?php echo ($v['lastchapter']); ?></a></div>
					</div>
					<div class="pt-cover">
						<a href="<?php echo ($v['rewriteurl']); ?>" title="<?php echo ($v['title']); ?>"><img <?php echo ($comset["src"]); ?>="<?php echo ($v['thumb']); ?>" alt="<?php echo ($v['title']); ?>"></a>
					</div>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
	</div>
	<?php echo ($advcode["index_3"]["code_wap"]); ?>
	<div class="ptm-card">
		<div class="ptm-card-header ptm-clearfix">
			友情链接
		</div>
		<div class="ptm-card-content">
			<p class="friendlink">
				<?php if(is_array($TDK["flink"])): foreach($TDK["flink"] as $key=>$v3): ?><a href="<?php echo ($v3['url']); ?>" target="_blank"><?php echo ($v3['name']); ?></a><?php endforeach; endif; ?>
			</p>
		</div>
	</div>
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