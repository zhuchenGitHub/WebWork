<html>
<head>
<title>changepassword</title>
<meta content="text/html;charset=gb2312">
<style type="text/css">
.word{
	margin: 0;
    padding: 0;
    line-height: 1.5em;
    font-family: "幼圆","Times New Roman", Times, serif;
    font-size: 26px;
    color: #000000;
    vertical-align:middle;
    }
.label{
	display:inline-block;
	width:190px;
	text-align:right;
}
input[type=text]{
 	border-radius:7px 7px 7px 7px;
 	width:180px;
 	height:27px;
 	
 }
 input[type=password]{
	border-radius:7px 7px 7px 7px;
 	width:180px;
 	height:27px;
}
input[type=submit]{
	display: inline-block;
    position: relative;
    margin: 10px;
    padding: 0 30px;
    padding-top:5px;
    height:45px;
    text-align: center;
    text-decoration: none;
    font: bold 20px/30px "幼圆", Arial, sans-serif;
    text-shadow: 1px 1px 1px rgba(255,255,255, .22);
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;
    -webkit-box-shadow: 1px 1px 1px rgba(0,0,0, .29), inset 1px 1px 1px rgba(255,255,255, .44);
    -moz-box-shadow: 1px 1px 1px rgba(0,0,0, .29), inset 1px 1px 1px rgba(255,255,255, .44);
    box-shadow: 1px 1px 1px rgba(0,0,0, .29), inset 1px 1px 1px rgba(255,255,255, .44);
    -webkit-transition: all 0.15s ease;
    -moz-transition: all 0.15s ease;
    -o-transition: all 0.15s ease;
    -ms-transition: all 0.15s ease;
    transition: all 0.15s ease;
      
}
</style>
</head>
<body>
<div style="background:url('/ci/application/views/image/background.jpg');width:1200px; height:500px;">
<img src="/ci/application/views/image/background.jpg">	
</div>



<div style="position:fixed;width:500px;height:650px;left:600px;top:310px">
<span style="font-weight:bold;position:fixed;left:610px;top:220px;font-size:100px;font-family:'幼圆'">修改密码</span>
</div>

<div style="position:fixed;width:390px;height:400px;left:70px;top:210px;">
<form achtion="<?php echo site_url('changepassword/index'); ?>" method="post">
<label class="word label" >账号：</label>
<input type="text" name="username" value="<?php echo set_value('username') ?>" size="20" />
<dr />
<p>

<label class="word label">密码：</label>
<input type="password" name="password" value="<?php echo set_value('password') ?>" size="20" />
<dr />
<p>

<label class="word label">新密码：</label>
<input type="password" name="newpassword" value="<?php echo set_value('newpassword') ?>" size="20" />
<dr />
<p>
<div style="float:right;">
<input type="submit" value="提 交" />
</div>
</form>
</div>
</body>

</html>