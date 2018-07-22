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
	<script type="text/javascript" src="/Public/layer/layer.js"></script>
	<script type="text/javascript" src="/Public/<?php echo ($theme); ?>/js/bookcase.js?v<?php echo ($version); ?>"></script>
	<script>var znsid = '<?php echo ($comset["znsid"]); ?>';</script>
<style>
	#source{display: none;}
	html, #source{width: 100%; height: 100%;}
	#ifexplorer{width: 976px; margin: 0 auto;}
	.to_nextpage{text-align: center; }
	.to_nextpage a{margin-left: -2em;font-weight: bold;color: #a94442;}
</style>
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
	<div class="content_read">
		<div class="box_con">
			<div class="con_top"><script>textselect();</script>
				<a href="<?php echo ($TDK["weburl"]); ?>"><?php echo ($TDK["webname"]); ?></a> &gt; <a href="<?php echo ($TDK["cateurl"]); ?>"><?php echo ($TDK["catename"]); ?></a> &gt; <a href="<?php echo ($TDK["articleurl"]); ?>"><?php echo ($TDK["articletitle"]); ?></a> &gt; <a href="<?php echo ($TDK["canonicalurl"]); ?>"><?php echo ($mychapterdb["title"]); ?></a>
			</div>
			<div class="bookname">
				<h1><?php echo ($TDK["articletitle"]); ?> <?php echo ($mychapterdb["title"]); if(isset($mychapterdb["allsub"])): ?>(<?php echo ($mychapterdb["nowsub"]); ?>/<?php echo ($mychapterdb["allsub"]); ?>)<?php endif; ?></h1>
				<div class="bottem1">
					<?php if($mychapterdb["prev"] != null): ?><a href="<?php echo reurl('chapter', $mychapterdb['prev'], $maindomain);?>" rel="next"><?php if(isset($mychapterdb["prev"]["sub"])): ?>上一页<?php else: ?>上一章<?php endif; ?></a><?php else: ?><a href="javascript:alert('已经是第一章了');">上一章</a><?php endif; ?> &larr; <a href="<?php echo ($TDK["articleurl"]); ?>" rel="index">章节列表</a> &rarr; <?php if($mychapterdb["next"] != null): ?><a href="<?php echo reurl('chapter', $mychapterdb['next'], $maindomain);?>" rel="next"><?php if(isset($mychapterdb["next"]["sub"])): ?>下一页<?php else: ?>下一章<?php endif; ?></a><?php else: ?><a href="javascript:alert('已经是最后一章了');">下一章</a><?php endif; ?> 转码阅读中，不进行内容存储和复制
				</div>
				<div class="lm">好书推荐：<?php if(is_array($dataarea_list["pc_chapter_text"])): foreach($dataarea_list["pc_chapter_text"] as $key=>$v): ?><a href="<?php echo ($v["rewriteurl"]); ?>"><?php echo ($v["title"]); ?></a>　<?php endforeach; endif; ?></div>
			</div>
			<?php echo ($advcode["chapter_1"]["code"]); ?>
			<div id="ifexplorer">
				<iframe src="about:blank" id="source" width="100%" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="yes" allowtransparency="yes"></iframe>
			</div>
			<div id="content">
				<?php if($mychapterdb["cache"] != null): echo ($mychapterdb["cache"]["content"]); if(isset($mychapterdb["next"]["sub"])): ?>-->><p class="to_nextpage"><a href="<?php echo reurl('chapter', $mychapterdb['next'], $maindomain);?>" rel="next">本章未完，点击下一页继续阅读</a></p><?php endif; ?>
				<?php else: ?>
				<p class="preload">正在加载中……</p><?php endif; ?>
				<?php if($mychapterdb["nextpage"] != null): ?><p style="text-align:center" class="loadnextpage"><button data-nextpage="<?php echo ($mychapterdb["nextpage"]); ?>" data-pagehash="<?php echo ($mychapterdb["hash"]); ?>">本章未完，加载下一页>></button></p><?php endif; ?>
			</div>
			<?php echo ($advcode["chapter_2"]["code"]); ?>
			<script>bdshare();</script>
			<div class="bottem2">
				<?php if($mychapterdb["prev"] != null): ?><a href="<?php echo reurl('chapter', $mychapterdb['prev'], $maindomain);?>" rel="next"><?php if(isset($mychapterdb["prev"]["sub"])): ?>上一页<?php else: ?>上一章<?php endif; ?></a><?php else: ?><a href="javascript:alert('已经是第一章了');">上一章</a><?php endif; ?> &larr; <a href="<?php echo ($TDK["articleurl"]); ?>" rel="index">章节列表</a> &rarr; <?php if($mychapterdb["next"] != null): ?><a href="<?php echo reurl('chapter', $mychapterdb['next'], $maindomain);?>" rel="next"><?php if(isset($mychapterdb["next"]["sub"])): ?>下一页<?php else: ?>下一章<?php endif; ?></a><?php else: ?><a href="javascript:alert('已经是最后一章了');">下一章</a><?php endif; ?> 转码阅读中，不进行内容存储和复制
			</div>
			<?php echo ($advcode["chapter_3"]["code"]); ?>
		</div>
	</div>
	<div class="footer">
		<div class="footer_link">新书推荐：<?php if(is_array($dataarea_list["pc_chapter_recommend"])): foreach($dataarea_list["pc_chapter_recommend"] as $key=>$v): ?><a href="<?php echo ($v["rewriteurl"]); ?>"><?php echo ($v["title"]); ?></a>　<?php endforeach; endif; ?></div>
		<div class="footer_cont">
			<script>footer();</script><?php echo ($statcode); ?>
		</div>
	</div>
</div>
<script>
	var preview_page = <?php if($mychapterdb["prev"] != null): ?>"<?php echo reurl('chapter', $mychapterdb['prev'], $maindomain);?>"<?php else: ?>"<?php echo ($TDK["articleurl"]); ?>"<?php endif; ?>;
	var next_page = <?php if($mychapterdb["next"] != null): ?>"<?php echo reurl('chapter', $mychapterdb['next'], $maindomain);?>"<?php else: ?>"<?php echo ($TDK["articleurl"]); ?>"<?php endif; ?>;
	var index_page = "<?php echo ($TDK["articleurl"]); ?>";
	var article_id = "<?php echo ($TDK["oid"]); ?>";
	var chapter_id = "<?php echo ($TDK["ocid"]); ?>";
	var nextcid = "<?php echo ($mychapterdb["nextcid"]); ?>";
	var prevcid = "<?php echo ($mychapterdb["prevcid"]); ?>";
	var articlename = "<?php echo ($TDK["articletitle"]); ?>";
	var chaptername = "<?php echo ($mychapterdb["title"]); ?>";
	var hash = "<?php echo ($TDK["eKey"]); ?>";
	var localpre = "<?php echo C('PCDOMAIN');?>";
	var preloadhtml = $('#content').html();
	var sourceurl = "<?php echo ($mychapterdb["sourceurl"]); ?>";
	lastread.set(article_id,chapter_id,articlename,chaptername,'<?php echo ($TDK["author"]); ?>','<?php echo ($TDK["catename"]); ?>','<?php echo ($TDK["subid"]); ?>');
</script>
<script src="/Public/<?php echo ($theme); ?>/js/chapter.js?v<?php echo ($version); ?>"></script>
<?php echo ($advcode["global_footer"]["code"]); ?>
</body>
</html>