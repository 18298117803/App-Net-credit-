<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/Public/plugins/layui/css/layui.css" media="all"/>
    <link rel="stylesheet" href="/Public/css/admin/global.css" media="all">
    <script type="text/javascript" src="/Public/plugins/layui/layui.js"></script>
    <script src="/Public/js/jquery-1.7.2.min.js"></script>
</head>
<body>


<div class="layui-tab">
    <ul class="layui-tab-title">
        <li class="layui-this">邀请注册号码</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <!--网站设置-->
            <form onsubmit="return AjaxSubmit(this);" action="<?php echo U('User/recommend');?>"
                  class="layui-form" method="post">
           
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">邀请号码</label>
                    <div class="layui-input-block">
                        <textarea name="recommends" placeholder="多个用英文,分隔" class="layui-textarea"><?php echo ($recommends); ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                         <button class="layui-btn" lay-submit="">保存</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
            <!--网站设置-->
        </div>
     
    </div>
</div>



<script src="/Public/js/jquery.form.js"></script>
<script>

    layui.use('form', function () {
        var form = layui.form();
        form.verify();
    });
    layui.use('element', function () {
        var $ = layui.jquery, element = layui.element();
    });

 
    function AjaxSubmit(obj) {
        //拦截表单提交,以AJAX方式提交
        $(obj).ajaxSubmit({
            success: function (data) {
                if (data.status == 1) {
                    layer.alert('保存成功!');
                } else {
                    layer.alert(data.info);
                }
            }
        });
        return false;
    }
</script>



</body>
</html>