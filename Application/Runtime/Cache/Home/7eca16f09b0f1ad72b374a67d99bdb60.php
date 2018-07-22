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
	<meta property="og:type" content="novel"/>
	<meta property="og:title" content="<?php echo ($articledb["title"]); ?>"/>
	<meta property="og:description" content="<?php echo ($articledb["description"]); ?>"/>
	<meta property="og:image" content="<?php echo ($articledb["thumb"]); ?>"/>
	<meta property="og:novel:category" content="<?php echo ($articledb["catename"]); ?>"/>
	<meta property="og:novel:author" content="<?php echo ($articledb["author"]); ?>"/>
	<meta property="og:novel:book_name" content="<?php echo ($articledb["title"]); ?>"/>
	<meta property="og:novel:read_url" content="<?php echo ($TDK["canonicalurl"]); ?>"/>
	<meta property="og:url" content="<?php echo C('PCHOST'); echo ($articledb["firstchapterurl"]); ?>"/>
	<meta property="og:novel:status" content="<?php if($articledb['full'] == 0): ?>连载中<?php else: ?>已完成<?php endif; ?>"/>
	<meta property="og:novel:update_time" content="<?php echo ($articledb["time"]); ?>"/>
	<meta property="og:novel:latest_chapter_name" content="<?php echo ($articledb["lastchapter"]); ?>"/>
	<meta property="og:novel:latest_chapter_url" content="<?php echo C('PCHOST'); echo ($articledb["lastchapterurl"]); ?>"/>
	<link rel="stylesheet" href="/Public/<?php echo ($theme); ?>/css/style.css?v<?php echo ($version); ?>" />
	<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/<?php echo ($theme); ?>/js/header.js?v<?php echo ($version); ?>"></script>
	<script type="text/javascript" src="/Public/layer/layer.js"></script>
	<script>var bookid = '<?php echo ($TDK["oid"]); ?>', hash = '<?php echo ($TDK["hash"]); ?>', index_rule = '<?php echo C('ID_RULE');?>', cindex_rule = '<?php echo C('CID_RULE');?>', znsid = '<?php echo ($comset["znsid"]); ?>';</script>
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
	<div class="dvcode"><?php echo ($advcode["view_1"]["code"]); ?></div>
	<div class="box_con">
		<div class="con_top cf">
			<span class="bdlikebutton"></span>
			<div id="bdshare" class="bdsharebuttonbox">
				<a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
			</div>
			<a href="<?php echo ($TDK["weburl"]); ?>" title="<?php echo ($TDK["webname"]); ?>"><?php echo ($TDK["webname"]); ?></a> &gt; <a href="<?php echo ($TDK["cateurl"]); ?>" title="<?php echo ($TDK["webname"]); echo ($articledb["catename"]); ?>"><?php echo ($articledb["catename"]); ?></a> &gt; <a href="<?php echo ($TDK["canonicalurl"]); ?>" title="<?php echo ($articledb["title"]); ?>"><?php echo ($articledb["title"]); ?>最新章节</a>
		</div>
		<div id="maininfo">
			<div id="info">
				<div class="booktitle cf">
					<h1><?php echo ($articledb["title"]); ?></h1>
					<em>标签：<?php if(is_array($articledb["taglist"])): foreach($articledb["taglist"] as $key=>$v2): ?><a href="<?php echo ($v2["tagurl"]); ?>" title="<?php echo ($articledb["title"]); ?>标签：<?php echo ($v2["tagname"]); ?>"><?php echo ($v2["tagname"]); ?> </a><?php endforeach; endif; ?></em>
				</div>
				<p>作　　者：<a href="<?php echo reurl('author', $articledb);?>" target="_blank" title="<?php echo ($articledb["author"]); ?>作品集"><?php echo ($articledb["author"]); ?></a></p>
				<p>动　　作：加入书架,  <a href="#footer">直达底部</a></p>
				<p>最后更新：<?php echo ($articledb["time"]); ?></p>
				<p>最新章节：<a href="<?php echo ($articledb["lastchapterurl"]); ?>" target="_blank" title="<?php echo ($articledb["title"]); ?>最新章节"><?php echo ($articledb["lastchapter"]); ?></a></p>
			</div>
			<div id="intro">
				<?php echo ($articledb["content"]); ?>
			</div>
		</div>
		<div id="sidebar">
			<div id="fmimg">
				<img alt="<?php echo ($articledb["title"]); ?>" src="<?php echo ($articledb["thumb"]); ?>" width="120" height="150" onerror="this.src='/Public/images/nocover.jpg'" />
				<?php if($articledb['full'] == 0): ?><span class="b"></span><?php else: ?><span class="a"></span><?php endif; ?>
			</div>
		</div>
		<div id="listtj">推荐阅读：<?php if(is_array($dataarea_list["pc_view_text"])): foreach($dataarea_list["pc_view_text"] as $key=>$v): ?><a href="<?php echo ($v["rewriteurl"]); ?>" title="<?php echo ($TDK["webname"]); ?>-<?php echo ($v["title"]); ?>最新章节"><?php echo ($v["title"]); ?></a>、<?php endforeach; endif; ?><a href="<?php echo ($TDK["canonicalurl"]); ?>" title="<?php echo ($articledb["title"]); ?>最新章节"><?php echo ($articledb["title"]); ?></a></div>
	</div>
	<div class="box_con">
		<div id="list">
			<dl>	
				<dt>《<a href="<?php echo ($TDK["canonicalurl"]); ?>" title="<?php echo ($articledb["title"]); ?>"><?php echo ($articledb["title"]); ?></a>》最新章节</b><span id="loadingtip">（<img src="/Public/<?php echo ($theme); ?>/images/loading.gif" />提示：正在自动抓取<?php echo ($articledb["title"]); ?>最新章节）</span></dt>
				<div id="newchapter"><?php if(is_array($newchaperlist)): foreach($newchaperlist as $key=>$v2): ?><dd><a href="<?php echo reurl('chapter', $v2, $maindomain);?>" target="_blank" title="<?php echo ($articledb["title"]); ?> <?php echo ($v2["title"]); ?>"><?php echo ($v2["title"]); ?></a></dd><?php endforeach; endif; ?></div>
				<?php echo ($advcode["view_2"]["code"]); ?>
				<dt>《<a href="<?php echo ($TDK["canonicalurl"]); ?>" title="<?php echo ($articledb["title"]); ?>"><?php echo ($articledb["title"]); ?></a>》章节列表</dt>
				<?php if(is_array($chapterdb)): foreach($chapterdb as $key=>$v3): ?><dd><a href="<?php echo reurl('chapter', $v3, $maindomain);?>" target="_blank" title="<?php echo ($articledb["title"]); ?> <?php echo ($v3["title"]); ?>"><?php echo ($v3["title"]); ?></a></dd><?php endforeach; endif; ?>
			</dl>
		</div>
	</div>
	<script id="bdlike_shell"></script><script>bdlike();</script>
	<div class="dvcode"><?php echo ($advcode["view_3"]["code"]); ?></div>
	<div id="footer" name="footer">
		<div class="footer_link"></div>
		<div class="footer_cont">
			<p>《<a href="<?php echo ($TDK["canonicalurl"]); ?>" title="<?php echo ($TDK["webname"]); ?>-<?php echo ($articledb["title"]); ?>"><?php echo ($articledb["title"]); ?></a>》情节跌宕起伏、扣人心弦，是一本情节与文笔俱佳的<?php echo ($articledb["catename"]); ?>，<?php echo ($TDK["webname"]); ?>转载收集<a href="<?php echo ($TDK["canonicalurl"]); ?>" title="<?php echo ($articledb["title"]); ?>最新章节"><?php echo ($articledb["title"]); ?>最新章节</a>、无弹窗阅读。</p>
			<script type="text/javascript">footer();</script><?php echo ($statcode); ?>
		</div>
	</div>
</div>
<script id="chapterhtml" type="text/html">
	<dd><a href="<?php echo C('HOME_URL'); echo C('CHAPTER_RULE');?>" target="_blank">{title}</a></dd>
</script>
<script type="text/javascript" src="/Public/<?php echo ($theme); ?>/js/footer.js?v<?php echo ($version); ?>"></script>
<?php if($comset["src"] != 'src'): ?><script src="//cdn.bootcss.com/jquery_lazyload/1.9.7/jquery.lazyload.min.js"></script>
<script>
$(function() {
	$('[rel-class=lazyload]').lazyload({effect: "fadeIn"});
});
</script><?php endif; ?>
<?php echo ($advcode["global_footer"]["code"]); ?>
</body>
</html>