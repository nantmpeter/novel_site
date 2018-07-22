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
			<li><a href="/index.php?s=/Admin/extend/category/action/edit/dir/default.html"><span class="am-icon-user"></span> 后台首页</a></li>
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
		<div class="am-cf am-padding am-padding-bottom-0">
	<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">栏目设置</strong> / <small><?php echo ($category["$dir"]["name"]); ?></small></div>
</div>
<hr>
<div class="am-tabs am-margin">
	<?php if($action == 'edit'): ?><div class="am-alert am-alert-warning" data-am-alert>
		<button type="button" class="am-close">&times;</button>
		<p>留空则使用基本设置中的列表/文章页标题、关键词、描述等。</p>
	</div>
	<div class="am-tab-panel am-fade am-in am-active">
		<form class="am-form" action="/index.php?s=/Admin/Extend/category" method="post" target="_self">
		<input type="hidden" name="action" value="<?php echo ($action); ?>"/>
		<input type="hidden" name="dir" value="<?php echo ($dir); ?>"/>
		<input type="hidden" name="do" value="save"/>
		<div class="am-g am-margin-top">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				是否启用
			</div>
			<div class="am-u-sm-8 am-u-md-6">
				<select name="open">
					<option value="yes"<?php if($category[$dir]['open'] == 'yes'): ?>selected<?php endif; ?>>启用</option>
					<option value="no"<?php if($category[$dir]['open'] == 'no'): ?>selected<?php endif; ?>>停用</option>
				</select>
			</div>
			<div class="am-hide-sm-only am-u-md-4">是否启用</div>
		</div>
		<div class="am-g am-margin-top">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				栏目DIR
			</div>
			<div class="am-u-sm-8 am-u-md-6">
				<input type="text" class="am-input-sm" name="newdir" value="<?php echo ($category["$dir"]["dir"]); ?>">
			</div>
			<div class="am-hide-sm-only am-u-md-4"></div>
		</div>
		<div class="am-g am-margin-top">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				栏目列表页标题
			</div>
			<div class="am-u-sm-8 am-u-md-6">
				<input type="text" class="am-input-sm" name="listtitle" value="<?php echo ($category["$dir"]["listtitle"]); ?>">
			</div>
			<div class="am-hide-sm-only am-u-md-4">可用{cate}、{webname}</div>
		</div>
		<div class="am-g am-margin-top">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				栏目列表页关键词
			</div>
			<div class="am-u-sm-8 am-u-md-6">
				<input type="text" class="am-input-sm" name="listkw" value="<?php echo ($category["$dir"]["listkw"]); ?>">
			</div>
			<div class="am-hide-sm-only am-u-md-4">可用{cate}、{webname}</div>
		</div>
		<div class="am-g am-margin-top">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				栏目列表页描述
			</div>
			<div class="am-u-sm-8 am-u-md-6">
				<textarea name="listdes" class="am-input-sm" cols="30" rows="10"><?php echo ($category["$dir"]["listdes"]); ?></textarea>
			</div>
			<div class="am-hide-sm-only am-u-md-4">可用{cate}、{webname}</div>
		</div>
		<div class="am-g am-margin-top">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				栏目文章页标题
			</div>
			<div class="am-u-sm-8 am-u-md-6">
				<input type="text" class="am-input-sm" name="viewtitle" value="<?php echo ($category["$dir"]["viewtitle"]); ?>">
			</div>
			<div class="am-hide-sm-only am-u-md-4">可用{cate}、{webname}、{title}、{keyword}</div>
		</div>
		<div class="am-g am-margin-top">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				栏目文章页关键词
			</div>
			<div class="am-u-sm-8 am-u-md-6">
				<input type="text" class="am-input-sm" name="viewkw" value="<?php echo ($category["$dir"]["viewkw"]); ?>">
			</div>
			<div class="am-hide-sm-only am-u-md-4">可用{cate}、{webname}、{title}、{keyword}</div>
		</div>
		<div class="am-g am-margin-top">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				栏目文章页描述
			</div>
			<div class="am-u-sm-8 am-u-md-6">
				<input type="text" class="am-input-sm" name="viewdes" value="<?php echo ($category["$dir"]["viewdes"]); ?>">
			</div>
			<div class="am-hide-sm-only am-u-md-4">可用{cate}、{webname}、{title}、{keyword}、{intro}</div>
		</div>
		<div class="am-g am-margin-top">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				栏目章节页标题
			</div>
			<div class="am-u-sm-8 am-u-md-6">
				<input type="text" class="am-input-sm" name="chaptertitle" value="<?php echo ($category["$dir"]["chaptertitle"]); ?>">
			</div>
			<div class="am-hide-sm-only am-u-md-4">可用{cate}、{webname}、{title}、{ctitle}</div>
		</div>
		<div class="am-g am-margin-top">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				栏目章节页关键词
			</div>
			<div class="am-u-sm-8 am-u-md-6">
				<input type="text" class="am-input-sm" name="chapterkw" placeholder="{title},{author},{ctitle},{webname}" value="<?php echo ($category["$dir"]["chapterkw"]); ?>">
			</div>
			<div class="am-hide-sm-only am-u-md-4">可用{ctitle}、{title}、{author}、{cate}、{webname}</div>
		</div>
		<div class="am-g am-margin-top">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				栏目章节页描述
			</div>
			<div class="am-u-sm-8 am-u-md-6">
				<input type="text" class="am-input-sm" name="chapterdes" placeholder="" value="<?php echo ($category["$dir"]["chapterdes"]); ?>">
			</div>
			<div class="am-hide-sm-only am-u-md-4">可用{ctitle}、{title}、{author}、{cate}、{webname}</div>
		</div>
		<div class="am-margin">
			<button type="submit" class="am-btn am-btn-primary am-btn-sm">提交保存</button>
		</div>
		</form>
	</div>
	<?php else: ?>
	<div class="am-tab-panel am-fade am-in am-active">
		<div class="am-g am-margin-top">
			<div class="am-u-sm-3 am-u-md-1 am-text-right">
				是否启用
			</div>
			<div class="am-u-sm-3 am-u-md-2 am-text-right">
				排序（大到小）
			</div>
			<div class="am-u-sm-3 am-u-md-2 am-text-right">
				栏目DIR（用于路径伪静态）
			</div>
			<div class="am-u-sm-3 am-u-md-3">
				栏目名称
			</div>
			<div class="am-hide-sm-only am-u-md-4">
				<a class="am-btn am-btn-secondary am-btn-sm" onclick="addline('addarea','codearea')"><span class="am-icon-plus"></span> 新增一行</a>
			</div>
		</div>
		<form class="am-form" action="/index.php?s=/Admin/Extend/category" method="post" target="_self">
		<input type="hidden" name="action" value="save"/>
		<div class="am-g am-margin-top">
			<div class="am-u-sm-3 am-u-md-1 am-text-right">
				<select disabled="true">
					<option>默认栏目</option>
				</select>
			</div>
			<div class="am-u-sm-3 am-u-md-2 am-text-right">
				<input type="text" class="am-input-sm" name="dorder" placeholder="0" value="<?php echo ($category["default"]["order"]); ?>" required="true">
			</div>
			<div class="am-u-sm-3 am-u-md-2 am-text-right">
				<input type="text" class="am-input-sm" name="ddir" placeholder="news" value="<?php echo ($category["default"]["dir"]); ?>" required="true">
			</div>
			<div class="am-u-sm-3 am-u-md-3">
				<input type="text" class="am-input-sm" name="dname" placeholder="资讯" value="<?php echo ($category["default"]["name"]); ?>" required="true">
			</div>
			<div class="am-hide-sm-only am-u-md-4"><a class="am-btn am-btn-success am-btn-xs" onclick="editcategory('default')"><span class="am-icon-pencil-square-o"></span> 编辑</a></div>
		</div>
		<?php $i=0;;?>
		<?php if(is_array($category)): foreach($category as $key=>$vo): if($key != 'default'): ?><div id="area_<?php echo ($i); ?>">
				<div class="am-g am-margin-top">
					<div class="am-u-sm-3 am-u-md-1 am-text-right">
						<select name="copen[]" id="popen_<?php echo ($i); ?>">
							<option value="yes"<?php if($vo['open'] == 'yes'): ?>selected<?php endif; ?>>启用</option>
							<option value="no"<?php if($vo['open'] == 'no'): ?>selected<?php endif; ?>>停用</option>
							<option value="deleted" style="display:none">删除</option>
						</select>
					</div>
					<div class="am-u-sm-3 am-u-md-2 am-text-right">
						<input type="text" class="am-input-sm" name="corder[]" placeholder="0" value="<?php echo ($vo["order"]); ?>" required="true">
					</div>
					<div class="am-u-sm-3 am-u-md-2 am-text-right">
						<input type="text" class="am-input-sm" name="cdir[]" value="<?php echo ($vo["dir"]); ?>">
					</div>
					<div class="am-u-sm-3 am-u-md-3">
						<input type="text" class="am-input-sm" name="cname[]" value="<?php echo ($vo["name"]); ?>">
					</div>
					<div class="am-hide-sm-only am-u-md-4">
						<a class="am-btn am-btn-success am-btn-xs" onclick="editcategory('<?php echo ($key); ?>')"><span class="am-icon-pencil-square-o"></span> 编辑</a>
						<a class="am-btn am-btn-warning am-btn-xs" onclick="delline('<?php echo ($i); ?>')"><span class="am-icon-trash-o"></span> 删除</a>
					</div>
				</div>
			</div><?php endif; ?>
			<?php $i++;; endforeach; endif; ?>
		<div id="codearea">
			<div class="am-g am-margin-top">
				<div class="am-u-sm-3 am-u-md-1 am-text-right">
					<select name="nopen[]">
						<option value="yes">启用</option>
						<option value="no">停用</option>
					</select>
				</div>
				<div class="am-u-sm-3 am-u-md-2 am-text-right">
					<input type="text" class="am-input-sm" name="norder[]" placeholder="0" value="">
				</div>
				<div class="am-u-sm-3 am-u-md-2 am-text-right">
					<input type="text" class="am-input-sm" name="ndir[]" placeholder="栏目DIR" value="">
				</div>
				<div class="am-u-sm-3 am-u-md-3">
					<input type="text" class="am-input-sm" name="nname[]" placeholder="栏目名称" value="">
				</div>
				<div class="am-hide-sm-only am-u-md-4">dir用于url路径，限字母、数字</div>
			</div>
		</div>
		<div id="addarea"></div>
		<div class="am-margin">
			<button type="submit" class="am-btn am-btn-primary am-btn-sm">提交保存</button>
		</div>
		</form>
	</div><?php endif; ?>
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