<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=no,width=device-width,initial-scale=1.0, shrink-to-fit=no, minimal-ui"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<title><?php echo ($TDK["title"]); ?></title>
<meta name="keywords" content="<?php echo ($TDK["keyword"]); ?>" />
<meta name="description" content="<?php echo ($TDK["description"]); ?>" />
<link rel="stylesheet" type="text/css" href="/Public/<?php echo ($theme); ?>/css/ptm.min.css?v<?php echo ($version); ?>"/>
<link rel="stylesheet" type="text/css" href="/Public/<?php echo ($theme); ?>/css/skin.min.css"/>
<link rel="stylesheet" type="text/css" href="/Public/<?php echo ($theme); ?>/css/chapter.min.css?v<?php echo ($version); ?>"/>
<link rel="stylesheet" type="text/css" href="/Public/<?php echo ($theme); ?>/css/font-awesome.min.css"/>
<script src="/Public/<?php echo ($theme); ?>/js/zepto.min.js"></script>
<script src="/Public/<?php echo ($theme); ?>/js/bookcase.js?v<?php echo ($version); ?>"></script>
<script src="/Public/<?php echo ($theme); ?>/js/static.js?v<?php echo ($version); ?>"></script>
<script src="/Public/layer/mobile/layer.js"></script>
<script src="/Public/trans.js?v<?php echo ($version); ?>"></script>
<script>
var article_id = "<?php echo ($TDK["oid"]); ?>";
var chapter_id = "<?php echo ($TDK["ocid"]); ?>";
var nextcid = "<?php echo ($mychapterdb["nextcid"]); ?>";
var prevcid = "<?php echo ($mychapterdb["prevcid"]); ?>";
var articlename = "<?php echo ($TDK["articletitle"]); ?>";
var chaptername = "<?php echo ($mychapterdb["title"]); ?>";
var hash = "<?php echo ($TDK["eKey"]); ?>";
var preloadhtml = '<p class="preload"><i class="ptm-iconfont fa fa-spinner fa-spin"></i> 正在为您转码……</p>';
var localpre = "<?php echo C('PCDOMAIN');?>";
var sourceurl = "<?php echo ($mychapterdb["sourceurl"]); ?>";
</script>
<style>
	#source{display: none;}
	html, #source{width: 100%; height: 100%;}
	.to_nextpage{text-align: center; }
	.to_nextpage a{margin-left: -2em;font-weight: bold;color: #a94442;}
</style>
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
<div id="ifexplorer">
	<iframe src="about:blank" id="source" width="100%" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="yes" allowtransparency="yes"></iframe>
</div>
<div class="pt-reader">
	<div class="body">
		<div class="content anim">
			<p class="title"><?php echo ($mychapterdb["title"]); if(isset($mychapterdb["allsub"])): ?>(<?php echo ($mychapterdb["nowsub"]); ?>/<?php echo ($mychapterdb["allsub"]); ?>)<?php endif; ?></p>
			<div class="content_btn ptm-clearfix">
				<div class="ptm-col-xs-3">
					<a class="ptm-btn ptm-btn-primary ptm-btn-block ptm-btn-outlined" id="addmark">加入书架</a>
				</div>
				<div class="ptm-col-xs-6">
					<a class="ptm-btn ptm-btn-primary ptm-btn-block ptm-btn-outlined" href="<?php echo ($TDK["articleurl"]); ?>">查看目录</a>
				</div>
				<div class="ptm-col-xs-3">
					<a class="ptm-btn ptm-btn-primary ptm-btn-block ptm-btn-outlined" href="<?php echo U('/home/index/bookcase');?>">查看书架</a>
				</div>
			</div>
			<div class="content_toolbar ptm-clearfix">
				<div class="ptm-pull-left">
					<button class="ptm-btn ptm-btn-primary ptm-btn-outlined" data-tol="size-s">小</button>
					<button class="ptm-btn ptm-btn-primary ptm-btn-outlined" data-tol="size-m">中</button>
					<button class="ptm-btn ptm-btn-primary ptm-btn-outlined" data-tol="size-l">大</button>
				</div>
				<div class="ptm-pull-right">
					<button class="ptm-btn ptm-btn-primary ptm-btn-outlined" data-tol="mode-d">默认</button>
					<button class="ptm-btn ptm-btn-primary ptm-btn-outlined" data-tol="mode-p">护眼</button>
					<button class="ptm-btn ptm-btn-primary ptm-btn-outlined" data-tol="mode-n">夜间</button>
				</div>
			</div>
			<?php echo ($advcode["chapter_1"]["code_wap"]); ?>
			<div class="chaptercontent" id="BookText">
				<?php if($mychapterdb["cache"] != null): echo ($mychapterdb["cache"]["content"]); if(isset($mychapterdb["next"]["sub"])): ?>-->><p class="to_nextpage"><a href="<?php echo reurl('chapter', $mychapterdb['next'], $maindomain);?>">本章未完，点击下一页继续阅读</a></p><?php endif; ?>
				<?php else: ?>
				<p class="preload"><i class="ptm-iconfont fa fa-spinner fa-spin"></i> 正在为您转码……</p><?php endif; ?>
				<?php if($mychapterdb["nextpage"] != null): ?><p style="text-align:center" class="loadnextpage"><button data-nextpage="<?php echo ($mychapterdb["nextpage"]); ?>" data-pagehash="<?php echo ($mychapterdb["hash"]); ?>">本章未完，加载下一页>></button></p><?php endif; ?>
			</div>
			<?php echo ($advcode["chapter_2"]["code_wap"]); ?>
			<div class="content_btn ptm-clearfix">
				<div class="ptm-col-xs-3">
					<?php if($mychapterdb["prev"] != null): ?><a class="ptm-btn ptm-btn-primary ptm-btn-block ptm-btn-outlined" href="<?php echo reurl('chapter', $mychapterdb['prev'], $maindomain);?>"><?php if(isset($mychapterdb["prev"]["sub"])): ?>上一页<?php else: ?>上一章<?php endif; ?></a><?php else: ?><a class="ptm-btn ptm-btn-primary ptm-btn-block ptm-btn-outlined" href="javascript:alert('已经是第一章了');">上一章</a><?php endif; ?>
				</div>
				<div class="ptm-col-xs-6">
					<a class="ptm-btn ptm-btn-primary ptm-btn-block ptm-btn-outlined" href="<?php echo ($TDK["articleurl"]); ?>">查看目录</a>
				</div>
				<div class="ptm-col-xs-3">
					<?php if($mychapterdb["next"] != null): ?><a class="ptm-btn ptm-btn-primary ptm-btn-block ptm-btn-outlined" href="<?php echo reurl('chapter', $mychapterdb['next'], $maindomain);?>"><?php if(isset($mychapterdb["next"]["sub"])): ?>下一页<?php else: ?>下一章<?php endif; ?></a><?php else: ?><a class="ptm-btn ptm-btn-primary ptm-btn-block ptm-btn-outlined" href="javascript:alert('已经是最后一章了');">下一章</a><?php endif; ?>
				</div>
			</div>
			<?php echo ($advcode["chapter_3"]["code_wap"]); ?>
		</div>
	</div>
</div>
<script>
function addmark(){
	lastread.set(article_id,chapter_id,articlename,chaptername,'<?php echo ($TDK["author"]); ?>','<?php echo ($TDK["catename"]); ?>','<?php echo ($TDK["subid"]); ?>');
}
$(function(){
	$('body').on('tap', function(){
		addmark();
	});
	$('#addmark').on('tap', function(){
		addmark();
		alert('《' + articlename + '》已加入书架');
	});
});
</script>
<script src="/Public/<?php echo ($theme); ?>/js/chapter.js?v<?php echo ($version); ?>"></script>
<script>chapter_bottom();</script>
<div class="footer">
	<p>本站系基于互联网搜索引擎技术为您提供信息检索服务。</p>
	<p>Copyright ©2017 <?php echo ($statcode); ?></p>
</div>
</body>
</html>