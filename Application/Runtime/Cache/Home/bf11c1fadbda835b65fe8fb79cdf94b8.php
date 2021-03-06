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
    <link rel="stylesheet" href="/Public/css/slider.css"/>
    <script>
        var minMoney = 500;
        var maxMoney = 10000;
        var stepMoney = 100;
        var minDay = 7;
        var maxDay = 14;
        $(function () {
            $(".head_div .card_div").on('click', function () {
                window.location.href = "<?php echo U('User/login');?>";
            });
            $(".btn_borrow").on('click', function () {
                window.location.href = "<?php echo U('User/login');?>";
            });
        });
    </script>
    <script src="/Public/js/index.js"></script>
</head>
<body>

<div class="logo clearfix" style="margin:30px auto; padding:0; display:block; text-align:center">
    <img src="<?php echo C('site_logo');?>" width="80%">
</div>
<div class="content">

    <div class="cont_display">
        <div class="cont_table_l">
            <span class="cont_text">当前额度（元）</span>

            <span class="cont_mtext"><?php echo nl_get_customConfig('min_money');?></span>
        </div>
        <div class="cont_table_r">
					<span class="cont_text">
借款期限 （天）</span>

            <span class="cont_mtext"><?php echo nl_get_customConfig('min_day');?></span>
        </div>
    </div>
    <div class="cont_strip" style="margin-top: 50px;">
        <div class="cont_strip_money">

            <div class="strip_main">
                <input id="opt_money" type="range" value="<?php echo ($user_info["quota"]); ?>" min="<?php echo nl_get_customConfig('min_money');?>"
                       max="<?php echo nl_get_customConfig('userquota');?>"/>
            </div>
            <div class="strip_range">
                <span><?php echo nl_get_customConfig('min_money');?>元</span>
                <span style="float: right;"><?php echo nl_get_customConfig('userquota');?>元</span>
            </div>
        </div>
        <div class="cont_strip_day">

            <div class="strip_main">
                <input id="opt_day" type="range" value="<?php echo nl_get_customConfig('min_day');?>"
                       min="<?php echo nl_get_customConfig('min_day');?>" max="<?php echo nl_get_customConfig('max_day');?>" step='5'/>
            </div>
            <div class="strip_range">
                <span><?php echo nl_get_customConfig('min_day');?>天</span>
                <span style="float: right;"><?php echo nl_get_customConfig('max_day');?>天</span>
            </div>
        </div>
    </div>
    <button class="btn_borrow">立即激活</button>
</div>
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