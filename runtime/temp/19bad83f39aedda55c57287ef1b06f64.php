<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:87:"D:\phpStudy2014\phpStudy\think-blog\public/../application/admin\view\index\welcome.html";i:1478673444;s:87:"D:\phpStudy2014\phpStudy\think-blog\public/../application/admin\view\template\base.html";i:1478500981;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>欢迎页面</title>
    <meta name="keywords" content="<?php echo \think\Config::get('site.keywords'); ?>">
    <meta name="description" content="<?php echo \think\Config::get('site.description'); ?>">

    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />

    <!--[if lt IE 9]>
    <script type="text/javascript" src="__ADMIN_LIB__/html5.js"></script>
    <script type="text/javascript" src="__ADMIN_LIB__/respond.min.js"></script>
    <script type="text/javascript" src="__ADMIN_LIB__/PIE_IE678.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="__ADMIN_UI_CORE__/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="__ADMIN_UI_CORE__/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="__ADMIN_LIB__/Hui-iconfont/1.0.7/iconfont.css" />

    <link rel="stylesheet" type="text/css" href="__ADMIN_LIB__/icheck/skins/flat/_all.css" />

    <link rel="stylesheet" type="text/css" href="__ADMIN_UI_CORE__/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="__ADMIN_UI_CORE__/h-ui.admin/css/style.css" />

    <!--others style-->

    <!--[if IE 6]>
    <script type="text/javascript" src="__ADMIN_LIB__/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->

</head>
<body>
<!--内页-面包屑导航-->



<div class="page-container">
    <div><?php echo captcha_img(); ?></div>
    <p class="f-20 text-success">欢迎页面 <span class="f-14">----</span> 信息统计展示页面！</p>
    <p>登录次数：18 </p>
    <p>上次登录IP：127.0.0.1  上次登录时间：2016-11-04 13:31:30</p>
    <p style="color:red"> 最后可以使用Highcharts 做一些统计图表，目前现在是静态页面 </p>
    <table class="table table-border table-bordered table-bg">
        <thead>
        <tr>
            <th colspan="7" scope="col">信息统计</th>
        </tr>
        <tr class="text-c">
            <th>统计</th>
            <th>资讯库</th>
            <th>图片库</th>
            <th>产品库</th>
            <th>用户</th>
            <th>管理员</th>
        </tr>
        </thead>
        <tbody>
        <tr class="text-c">
            <td>总数</td>
            <td>92</td>
            <td>9</td>
            <td>0</td>
            <td>8</td>
            <td>20</td>
        </tr>
        <tr class="text-c">
            <td>今日</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr class="text-c">
            <td>昨日</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr class="text-c">
            <td>本周</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr class="text-c">
            <td>本月</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        </tbody>
    </table>
    <table class="table table-border table-bordered table-bg mt-20">
        <thead>
        <tr>
            <th colspan="2" scope="col">服务器信息</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th width="30%">服务器计算机名</th>
            <td><span id="lbServerName">http://127.0.0.1/</span></td>
        </tr>
        <tr>
            <td>服务器IP地址</td>
            <td>192.168.1.1</td>
        </tr>
        <tr>
            <td>服务器域名</td>
            <td>www.h-ui.net</td>
        </tr>
        <tr>
            <td>服务器端口 </td>
            <td>80</td>
        </tr>
        <tr>
            <td>服务器IIS版本 </td>
            <td>Microsoft-IIS/6.0</td>
        </tr>
        <tr>
            <td>本文件所在文件夹 </td>
            <td>D:\WebSite\HanXiPuTai.com\XinYiCMS.Web\</td>
        </tr>
        <tr>
            <td>服务器操作系统 </td>
            <td>Microsoft Windows NT 5.2.3790 Service Pack 2</td>
        </tr>
        <tr>
            <td>系统所在文件夹 </td>
            <td>C:\WINDOWS\system32</td>
        </tr>
        <tr>
            <td>服务器脚本超时时间 </td>
            <td>30000秒</td>
        </tr>
        <tr>
            <td>服务器的语言种类 </td>
            <td>Chinese (People's Republic of China)</td>
        </tr>
        <tr>
            <td>.NET Framework 版本 </td>
            <td>2.050727.3655</td>
        </tr>
        <tr>
            <td>服务器当前时间 </td>
            <td>2014-6-14 12:06:23</td>
        </tr>
        <tr>
            <td>服务器IE版本 </td>
            <td>6.0000</td>
        </tr>
        <tr>
            <td>服务器上次启动到现在已运行 </td>
            <td>7210分钟</td>
        </tr>
        <tr>
            <td>逻辑驱动器 </td>
            <td>C:\D:\</td>
        </tr>
        <tr>
            <td>CPU 总数 </td>
            <td>4</td>
        </tr>
        <tr>
            <td>CPU 类型 </td>
            <td>x86 Family 6 Model 42 Stepping 1, GenuineIntel</td>
        </tr>
        <tr>
            <td>虚拟内存 </td>
            <td>52480M</td>
        </tr>
        <tr>
            <td>当前程序占用内存 </td>
            <td>3.29M</td>
        </tr>
        <tr>
            <td>Asp.net所占内存 </td>
            <td>51.46M</td>
        </tr>
        <tr>
            <td>当前Session数量 </td>
            <td>8</td>
        </tr>
        <tr>
            <td>当前SessionID </td>
            <td>gznhpwmp34004345jz2q3l45</td>
        </tr>
        <tr>
            <td>当前系统用户名 </td>
            <td>NETWORK SERVICE</td>
        </tr>
        </tbody>
    </table>
</div>



<script type="text/javascript" src="__ADMIN_LIB__/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__ADMIN_LIB__/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__ADMIN_UI_CORE__/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__ADMIN_UI_CORE__/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="__ADMIN_LIB__/icheck/icheck.min.js"></script>


<!--others script-->

</body>
</html>