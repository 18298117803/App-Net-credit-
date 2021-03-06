<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
	<head>
	    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no"/>
<meta name="format-detection" content="telephone=no">
<meta name="keywords" content="<NL:sitecfg name='keywords' />">
<meta name="description" content="<NL:sitecfg name='description' />">
<link rel="stylesheet" href="/Public/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/Public/css/bootstrap-theme.min.css"/>
<link rel="stylesheet" href="/Public/css/font-awesome.min.css">
<link rel="stylesheet" href="/Public/css/style.css"/>
<link rel="stylesheet" href="/Public/css/iconfont.css"/>
<style>
    .curr {
        display: block;
        overflow: hidden;
        color: #40A0D4;
    }

    .no_curr {
        display: block;
        overflow: hidden;
        color: #333333;
    }
</style>
<script src="/Public/js/jquery.min.js"></script>
<script src="/Public/js/bootstrap.min.js"></script>
<script src="/Public/js/common.js"></script>
<script src="/Public/js/layer_mobile/layer.js"></script>
<!--[if lt IE 9]>
<script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	    <title><?php echo C('site_title');?></title>
	    <script src="/Public/js/jquery.form.js"></script>
		<style>
			.login-regular {
				background-color: #fff;
				border-radius: 5px;
				box-shadow: 0 0 10px rgba(40, 40, 40, 0.5);
			}
			.reg_new{
				background-color: #40A0D4;;
				border-radius: 5px;
				color: #fff;
				display: block;
				font-size: 24px;
				height: 50px;
				line-height: 50px;
				margin: 25px auto;
				text-align: center;
				width: 90%;
			}
		</style>
	</head>
	<body>
		
		<div class="big_head">
			<div class="head-nav">
				<a href="javascript:history.back(-1)">
					<span class="fa fa-angle-left"></span>
				</a>
			</div>
			<div class="head_logo">
				<img src="<?php echo C('site_logo');?>" alt="" />
			</div>
		</div>


		<form action="<?php echo U('User/login');?>" id="login_form" method="post">
		<div class="content" style="padding: 15px 5%;">
			<div class="user_login login-regular" style="height: 175px;">
					<div class="input_item" style="padding: 20px 0">
						<i class="fa fa-mobile fa-2x"></i>
						<input style="padding-left:25px;border: 1px solid #40A0D4;;border-radius: 5px;width: 90%;height: 50px;" type="tel" placeholder="请输入手机号码" id="mobile" maxlength="11" name="mobile" />
					</div>

					<div class="input_item" style="padding: 10px 0;border-bottom: 0">
						<i class="fa fa-lock fa-2x"></i>
						<input id="passwd" type="password" name="passwd" placeholder="6-20位密码" style="height: 50px;padding-left:25px;border: 1px solid #40A0D4;border-radius: 5px;width: 70%;" />
						<a href="<?php echo u('User/findpass');?>" class="forget_password" style="width: 20%"> 忘记密码？</a>
					</div>
			</div>
		</div>
			<div style="padding: 15px 5%">
			<a class="login_Btn" style="font-size:small;font-family:inherit;width: 48%;height:50px;line-height:50px;float: left;border-radius: 5px;">登录</a>
			<a style="font-size:small;width: 48%;height:50px;float: right;" href="<?php echo U('User/reg');?>" class="reg_new">注册新用户</a>
			</div>
		</form>

		<div style="clear: both;width: 100%;text-align: center"><a href="<?php echo U('Index/index');?>" style="color: #40A0D4;">© Powered by <?php echo C('site_title');?></a></div>
			<!--<div class="cont_link">-->
				<!--<a href="<?php echo U('User/reg');?>" class="user_reg_link">-->
					<!--<span>去注册</span>-->
					<!--<i class="fa fa-arrow-circle-o-right"></i>-->
				<!--</a>-->
				<!--<a href="<?php echo U('Page/feedback');?>" class="feedback">-->
					<!--<span>遇到问题</span>-->
					<!--<i class="fa fa-question-circle-o"></i>-->
				<!--</a>-->
			<!--</div>-->
			


		<script>
			$(function(){
				$("#mobile").on('keyup afterpaste',function(){
					$(this).val($(this).val().replace(/\D/g,''));
				});
				$("#login_form .input_item input").on('input',function(){
					var v = $(this).val();
					var obj = $($(this).parent()).find(".fa-close");
					if(v != '' && v != null){
						$(obj).show();
					}else{
						$(obj).hide();
					}
				});
				$("#login_form .input_item .fa-close").on('click',function(){
					var obj = $($(this).parent()).find("input");
					$(obj).val('');
					$(this).hide();
				});
				$(".login_Btn").on('click',function(){
					var mobile = $("#mobile").val();
					var passwd = $("#passwd").val();
					if(!isMobile(mobile)){
						layer.open({
							content:'手机号码不符合规范!',
							skin:'msg',
							time:2
						});
						return ;
					}
					if(passwd.length < 6 || passwd.length > 20){
						layer.open({
							content:'密码长度不符合规范!',
							skin:'msg',
							time:2
						});
						return ;
					}
					layer.open({
						type: 2,
						shadeClose: false
					});
					$("#login_form").ajaxSubmit({
						success:function(data){
							if(!data.status){
								layer.closeAll();
								layer.open({
									content:data.info,
									skin:'msg',
									time:3
								});
							}else{
								layer.closeAll();
								layer.open({
									content:'登录成功!',
									skin:'msg',
									time:2
								});
								setTimeout(function(){
									window.location.href = data.url;
								},2000);
							}
						}
					});
					return ;
				});
			});
		</script>

		<div class="container-fluid" id="foooter" style="margin-top: 120px;">
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="navbar-inner navbar-content-center">
            <div class="row" id="nav-font" style="background: #fff;">

                <div class="col-xs-3 text-center">
                    <a style=" display: block; overflow: hidden;color:#40A0D4;" href="<?php echo U('Index/index');?>">
                        <span class="iconfont icon-shouye1" style="line-height: 33px;"></span>
                        <p style="margin-bottom: 0px;font-family: 'Microsoft YaHei';font-size: 12px;">我要借款</p>
                    </a>
                </div>

                <div class="col-xs-3 text-center">
                    <a style="display: block; overflow: hidden;color:#333333" href="<?php echo U('User/index');?>">
                        <span class="iconfont icon-gerenxinxi" style="line-height: 33px;"></span>
                        <p style="margin-bottom: 0px;font-family: 'Microsoft YaHei';font-size: 12px;">会员中心</p>
                    </a>
                </div>


                <div class="col-xs-3 text-center">
                    <a style=" display: block; overflow: hidden; color:#333333" href="<?php echo U('Loan/lists');?>">
                        <span class="iconfont icon-renwu" style="line-height: 33px;"></span>
                        <p style="margin-bottom: 0px;font-family: 'Microsoft YaHei';font-size: 12px;"> 借款管理</p>
                    </a>
                </div>

            </div>
        </div>

    </nav>

</div>
	</body>
</html>