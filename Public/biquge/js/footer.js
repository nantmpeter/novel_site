function updatecache(){
	$.ajax({
		type: 'get',
		url: '/home/index/updatecache',
		timeout: 5000,
		data: {id: bookid, hash: hash},
		dataType: 'json',
		success: function(data){
			if(data.status == 'error'){
				layer.msg('已是最新章节，暂无更新！');
			}
			$('#loadingtip').html('（提示：最新章节抓取成功！）');
			if(data.status == 'success'){
				layer.msg('最新章节抓取成功！');
				var newlisthtml=listhtml='';
				var chapterhtml = $('#chapterhtml').html();
				$.each(data.content, function(i, item){
					if(item.title){
						listhtml = chapterhtml.replace('{}', '');
						listhtml = listhtml.replace('{subid}', Math.floor(item.id/1000));
						listhtml = listhtml.replace('{id}', parseInt(item.id) + parseInt(index_rule));
						listhtml = listhtml.replace('{cid}', parseInt(item.cid) + parseInt(cindex_rule));
						listhtml = listhtml.replace('{dir}', item.cate);
						listhtml = listhtml.replace('{title}', item.title);
						newlisthtml += listhtml;
					}
				});
				$('#newchapter').html(newlisthtml);
			}
		},
		complete : function(xhr,status){
			if(status == 'timeout'){
				$('#loadingtip').html('（提示：抓取超时，网络繁忙，请刷新后重试！）');
				layer.msg('抓取超时，网络繁忙，请稍后重试！');
			}
		}
	});
}

function browserRedirect() {
    var sUserAgent = navigator.userAgent.toLowerCase();
    var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
    var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
    var bIsMidp = sUserAgent.match(/midp/i) == "midp";
    var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
    var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
    var bIsAndroid = sUserAgent.match(/android/i) == "android";
    var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
    var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";

    if (!(bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM)) {
        window.location.href = "http://m.bbbook.top";
        //window.location.href = "http://gz.gzwhir.com/jpcg201409177619/index.aspx";
    }
}

$(function() {
	if(typeof(bookid) != "undefined"){
		setTimeout(updatecache, 2000);
	}
    browserRedirect();
});
