<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>YGBOOK后台管理</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="stylesheet" href="/Public/css/amazeui.min.css"/>
	<link rel="stylesheet" href="/Public/css/admin.css">
	<!--[if lt IE 9]>
	<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
	<script src="/js/amazeui.ie8polyfill.min.js"></script>
	<![endif]-->

	<!--[if (gte IE 9)|!(IE)]><!-->
	<script src="/Public/js/jquery.min.js"></script>
	<!--<![endif]-->
	<script type="text/javascript">
		function checkdel(){
			if(confirm("是否确定删除?")){
				return true;
			}else{
				return false;
			}
		}
		function gotype(obj){
			var type = obj.value;
			if(type!='all'){
				window.location.href= "<?php echo U('index/article', array('cate' => '__string__'));?>" . replace('__string__', type);
			} else {
				window.location.href= "<?php echo U('index/article');?>";
			}
		}
		function gopick(obj){
			var type = obj.value;
			locationurl = window.location.href.split('.html')[0];
			locationurl = locationurl.split('/picker')[0];
			if(type!='all'){
				window.location.href= locationurl + '/picker/' + type;
			} else {
				window.location.href= locationurl;
			}
		}
		function goorder(obj){
			var type = obj.value;
			locationurl = window.location.href.split('.html')[0];
			locationurl = locationurl.split('/order')[0];
			window.location.href= locationurl + '/order/' + type;
		}
		function editcategory(dir){
			window.location.href= "<?php echo U('extend/category', array('action' => 'edit', 'dir' => '__string__'));?>" . replace('__string__', dir);
		}
		function editpick(name){
			window.location.href= "<?php echo U('index/pick', array('action' => 'edit', 'name' => '__string__'));?>" . replace('__string__', name);
		}
		function testpick(name){
			window.location.href= "<?php echo U('index/pick', array('action' => 'test', 'name' => '__string__'));?>" . replace('__string__', name);
		}
		function editdataarea(did, domain){
			window.location.href= "<?php echo U('extend/dataarea', array('action' => 'edit', 'did' => '__string1__', 'domain' => '__string2__'));?>" . replace('__string1__', did) . replace('__string2__', domain);
		}
		function delline(id){
			if(confirm("删除后需要保存才会生效")){
				$('#area_' + id).hide();
				$('#popen_' + id).val('deleted');
			} else {
				return false;
			}
		}
		function runpick(name){
			var staturl = "<?php echo U('index/pick', array('action' => 'runpick'));?>";
			$.ajax({
				type: 'GET',
				url: staturl,
				data: 'id=' + name,
				dataType: 'json',
				success: function(json){
					alert('采集成功');
				}
			});
		}
		function exportpick(name){
			window.location.href= "<?php echo U('index/pick', array('action' => 'export', 'name' => '__string__'));?>" . replace('__string__', name);
		}
		function addzhanqun(){
			$('#addarea').html($('#addarea').html() + $('#codearea').html());
		}
		function addline(id,codeid){
			$('#'+id).html($('#'+id).html() + $('#'+codeid).html());
		}
		function clearcache(id){
			if(id == 'article'){
				var aid = prompt('请输入文章ID');
				if(!aid){
					alert('输入有误');
					return false;
				}
			}
			if(confirm("确认清除吗？")){
				if(!aid){
					window.location.href= "<?php echo U('extend/cache', array('action' => 'clear', 'id' => '__string__'));?>" . replace('__string__', id);
				} else {
					window.location.href= "<?php echo U('extend/cache', array('action' => 'clear', 'id' => '__string1__', 'aid' => '__string2__'));?>" . replace('__string1__', id) . replace('__string2__', aid);
				}
			} else {
				return false;
			}
		}
	</script>
	<style>
		.am-form select{
			font-size: 1.3rem;
		}
	</style>
</head>
<body>
<header class="am-topbar admin-header">
	<div class="am-topbar-brand">
		<strong>YGBOOK</strong> / <small>后台管理</small>
	</div>

	<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

	<div class="am-collapse am-topbar-collapse" id="topbar-collapse">
		<ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
			<li><a href="<?php echo C('HOME_URL');?>" target="_blank"><span class="am-icon-home"></span> 网站首页</a></li>
			<li><a href="/index.php?s=/Admin/extend/spider.html"><span class="am-icon-user"></span> 后台首页</a></li>
			<li><a href="<?php echo U('logout');?>"><span class="am-icon-sign-out"></span> 退出</a></li>
			<li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
		</ul>
	</div>
</header>

<div class="am-cf admin-main">
	<!-- sidebar start -->
	<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
		<div class="am-offcanvas-bar admin-offcanvas-bar">
			<ul class="am-list admin-sidebar-list">
				<li><a href="<?php echo U('index/index');?>"<?php echo ($active["index"]); ?>><span class="am-icon-home"></span> 首页</a></li>
				<li><a href="<?php echo U('index/setting');?>"<?php echo ($active["setting"]); ?>><span class="am-icon-cog"></span> 基础设置</a></li>
				<li><a href="<?php echo U('index/article');?>"<?php echo ($active["article"]); ?>><span class="am-icon-table"></span> 文章列表</a></li>
				<li><a href="<?php echo U('index/pick');?>"<?php echo ($active["pick"]); ?>><span class="am-icon-cogs"></span> 采集设置</a></li>
				<li class="admin-parent">
					<a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-sitemap"></span> 更多功能 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
					<ul class="am-list am-collapse admin-sidebar-sub <?php echo ($amin); ?>" id="collapse-nav">
						<li><a href="<?php echo U('extend/category');?>"<?php echo ($active["category"]); ?>><span class="am-icon-list-ol"></span> 栏目设置</a></li>
						<li><a href="<?php echo U('extend/dataarea');?>"<?php echo ($active["dataarea"]); ?>><span class="am-icon-database"></span> 数据区块</a></li>
						<li><a href="<?php echo U('extend/searchlog');?>"<?php echo ($active["searchlog"]); ?>><span class="am-icon-search"></span> 搜索记录</a></li>
						<li><a href="<?php echo U('extend/tags');?>"<?php echo ($active["tags"]); ?>><span class="am-icon-tag"></span> 标签列表</a></li>
						<li><a href="<?php echo U('extend/seowords');?>"<?php echo ($active["seowords"]); ?>><span class="am-icon-cogs"></span> 关键词管理</a></li>
						<li><a href="<?php echo U('extend/advertise');?>"<?php echo ($active["advertise"]); ?>><span class="am-icon-yelp"></span> 广告位管理</a></li>
						<li><a href="<?php echo U('extend/pickers');?>"<?php echo ($active["pickers"]); ?>><span class="am-icon-cube"></span> 节点库</a></li>
					</ul>
				</li>
				<li><a href="<?php echo U('extend/spider');?>"<?php echo ($active["spider"]); ?>><span class="am-icon-bug"></span> 蜘蛛记录</a></li>
				<li><a href="<?php echo U('extend/cache');?>"<?php echo ($active["cache"]); ?>><span class="am-icon-retweet"></span> 缓存管理</a></li>
			</ul>
			<div class="am-panel am-panel-default admin-sidebar-panel">
				<div class="am-panel-bd">
					<p><span class="am-icon-bookmark"></span> 公告</p>
					<p>感谢您使用YGBOOK！</p>
				</div>
			</div>
		</div>
	</div>
	<!-- sidebar end -->

	<!-- content start -->
	<div class="admin-content">
		<script>
	function changedomain(obj){
		var type = obj.value;
		if(type){
			window.location.href= "<?php echo U('spider', array('domain' => '__string__'));?>" . replace('__string__', type);
		} else {
			window.location.href= "<?php echo U('spider');?>";
		}
	}
</script>
<div class="am-cf am-padding am-padding-bottom-0">
	<div class="am-fl">
		<strong class="am-text-primary am-text-lg">蜘蛛到访记录</strong> / <small><a href="<?php echo U('spider', array('action' => 'clearall'));?>" onclick="return checkdel();">清除历史记录</a></small>
	</div>
	<div class="am-fr am-form">
			<select onchange="changedomain(this)">
				<option value="">全部记录</option>
				<option value="<?php echo ($setting["seo"]["pcdomain"]); ?>"<?php if($nowdomain == $setting['seo']['pcdomain']): ?>selected<?php endif; ?>>默认站点</option>
				<option value="<?php echo ($setting["seo"]["mobiledomain"]); ?>"<?php if($nowdomain == $setting['seo']['mobiledomain']): ?>selected<?php endif; ?>>默认手机站</option>
				<?php if(is_array($sites)): foreach($sites as $k1=>$v1): ?><option value="<?php echo ($v1["pcdomain"]); ?>"<?php if($nowdomain == $v1['pcdomain']): ?>selected<?php endif; ?>><?php echo ($v1["pcdomain"]); ?></option>
				<option value="<?php echo ($v1["mobiledomain"]); ?>"<?php if($nowdomain == $v1['mobiledomain']): ?>selected<?php endif; ?>><?php echo ($v1["mobiledomain"]); ?></option><?php endforeach; endif; ?>
			</select>
		</div>
</div>
<hr>
<ul class="am-avg-sm-2 am-avg-md-7 am-margin am-padding am-text-center admin-content-list ">
	<li><a class="am-text-success"><span class="am-icon-btn am-icon-bug"></span><br/>今日到访<br/><?php echo ($spider_day); ?></a></li>
	<li><a class="am-text-success"><span class="am-icon-btn am-icon-bug"></span><br/>今日百度<br/><?php echo ($spider_stat["baidu"]); ?></a></li>
	<li><a class="am-text-success"><span class="am-icon-btn am-icon-bug"></span><br/>今日Google<br/><?php echo ($spider_stat["google"]); ?></a></li>
	<li><a class="am-text-success"><span class="am-icon-btn am-icon-bug"></span><br/>今日360<br/><?php echo ($spider_stat["360"]); ?></a></li>
	<li><a class="am-text-success"><span class="am-icon-btn am-icon-bug"></span><br/>今日搜狗<br/><?php echo ($spider_stat["sogou"]); ?></a></li>
	<li><a class="am-text-success"><span class="am-icon-btn am-icon-bug"></span><br/>今日神马<br/><?php echo ($spider_stat["shenma"]); ?></a></li>
	<li><a class="am-text-danger"><span class="am-icon-btn am-icon-bug"></span><br/>昨日到访<br/><?php echo ($spider_lastday); ?></a></li>
</ul>

<div class="am-g">
	<div class="am-u-sm-12">
		<table class="am-table am-table-striped am-table-hover table-main">
			<thead>
			 <tr>
					<th class="table-id am-hide-sm-only">ID</th>
					<th class="table-title am-hide-sm-only">受访页面</th>
					<th class="table-type">蜘蛛</th>
					<th class="table-author am-hide-sm-only">蜘蛛IP</th>
					<th class="table-date">来访时间</th>
				</tr>
			</thead>
			<?php if(is_array($spiderloglist)): foreach($spiderloglist as $key=>$vo): ?><tr>
				<td class="am-hide-sm-only"><?php echo ($vo["id"]); ?></td>
				<td class="am-hide-sm-only"><a href="<?php echo ($vo["httpurl"]); ?>" target="_blank"><?php echo ($vo["httpurl"]); ?></a></td>
				<td><?php echo ($vo["spider"]); ?></td>
				<td class="am-hide-sm-only"><?php echo ($vo["ip"]); ?> <a href="http://www.ip138.com/ips138.asp?ip=<?php echo ($vo["ip"]); ?>&action=2" target="_blank" class="am-text-success"><span class="am-icon-search"></span> 查询</a></td>
				<td><?php echo (date('Y-m-d H:i',$vo["dateline"])); ?></td>
			</tr><?php endforeach; endif; ?>
		</table>
		<div class="am-cf">
			<div class="am-fr">
				<ul class="am-pagination"><?php echo ($pagehtml); ?></ul>
			</div>
		</div>
	</div>
</div>
	</div>
	<!-- content end -->

</div>

<a href="#" class="am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}">
	<span class="am-icon-btn am-icon-th-list"></span>
</a>

<footer>
	<hr>
	<p class="am-padding-left">© <?php echo (date('Y',NOW_TIME)); ?> YGBOOK, Inc. 感谢使用！感谢选择！</p>
</footer>
<script src="/Public/js/amazeui.min.js"></script>
</body>
</html>