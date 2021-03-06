<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="http://localhost/HuaMei/Application/Admin/View/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="http://localhost/HuaMei/Application/Admin/View/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="http://localhost/HuaMei/Application/Admin/View/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="http://localhost/HuaMei/Application/Admin/View/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="http://localhost/HuaMei/Application/Admin/View/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>新闻动态</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 新闻动态 <span class="c-gray en">&gt;</span><a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="http://localhost/HuaMei/index.php/Home/Index/index?action=see&type=News" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a class="btn btn-primary radius"   href="add.html"><i class="Hui-iconfont">&#xe600;</i> 添加资讯</a></div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="80">LOGO</th>
					<th width="140">姓名</th>
					<th>职务</th>
					<th>简介</th>
					<th>创建时间</th>
					<th width=80>操作</th>
				</tr>
			</thead>
			<tbody>
			  <?php if(is_array($userLists)): $i = 0; $__LIST__ = $userLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
					<td><input type="checkbox" value="" name=""></td>
					<td><?php echo ($id++); ?></td>
					<td><img style="width:70px;height:50px;" src="/HuaMei/Uploads/<?php echo ($vo["pic"]); ?>"/></td>
					<td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["position"]); ?></td>
					<td><?php echo ($vo["introduce"]); ?></td>
					<td><?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></td>
					<td class="f-14 td-manage"><a style="text-decoration:none" class="ml-5"  href="http://localhost/HuaMei/admin.php/Tame/save/id/<?php echo ($vo["id"]); ?>"  title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a  onclick="del('<?php echo ($vo["id"]); ?>')" style="text-decoration:none" class="ml-5" onClick="location.href='http://localhost/HuaMei/index.php/Home/Drop/drop?type=News&id=<?php echo ($vo["id"]); ?>'" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="http://localhost/HuaMei/Application/Admin/View/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="http://localhost/HuaMei/Application/Admin/View/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="http://localhost/HuaMei/Application/Admin/View/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="http://localhost/HuaMei/Application/Admin/View/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="http://localhost/HuaMei/Application/Admin/View/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="http://localhost/HuaMei/Application/Admin/View/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="http://localhost/HuaMei/Application/Admin/View/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
<!-- $('.table-sort').dataTable({ -->
	<!-- "aaSorting": [[ 1, "desc" ]],//默认第几个排序 -->
	<!-- "bStateSave": true,//状态保存 -->
	<!-- "pading":false, -->
	<!-- "aoColumnDefs": [ -->
	  <!-- //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示 -->
	  <!-- {"orderable":false,"aTargets":[0,8]}// 不参与排序的列 -->
	<!-- ] -->
<!-- }); -->

/*资讯-添加*/
function article_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-删除*/
function article_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
      loc	
	});
}

/*资讯-审核*/
function article_shenhe(obj,id){
	layer.confirm('审核文章？', {
		btn: ['通过','不通过','取消'], 
		shade: false,
		closeBtn: 0
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布', {icon:6,time:1000});
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
		$(obj).remove();
    	layer.msg('未通过', {icon:5,time:1000});
	});	
}
/*资讯-下架*/
function article_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
		$(obj).remove();
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*资讯-发布*/
function article_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}
/*资讯-申请上线*/
function article_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}


	function del(_id) {
		$.ajax({
			url:'./del',
			type:'POST',
			data:{
				id:_id
			},
			success(data){
				if(data == 1){
					alert('删除成功')
					location.href = "http://localhost/HuaMei/admin.php/Tame/index"
				}else if(data == 2)
				{
					alert('删除失败')
				}
			}
		})

}

</script> 
</body>
</html>