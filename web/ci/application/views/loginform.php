<html>
<head>
<title>login</title>
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
    color:#515151;
    background:#d3d3d3;
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
    background: #d3d3d3; /* Old browsers */
    background: -moz-linear-gradient(top,  #d3d3d3 0%, #8a8a8a 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#d3d3d3), color-stop(100%,#8a8a8a)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* IE10+ */
    background: linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* W3C */
    
}
#btn{
	display: inline-block;
    position: relative;
    margin: 10px;
    padding: 0 30px;
    padding-top:5px;
    height:45px;
    text-align: center;
    text-decoration: none;
    font: bold 20px/30px "幼圆", Arial, sans-serif;
    color:#3e5706;
    background:#a5cd4e;
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
    background: #a5cd4e; /* Old browsers */
    background: -moz-linear-gradient(top,  #a5cd4e 0%, #6b8f1a 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#a5cd4e), color-stop(100%,#6b8f1a)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%); /* IE10+ */
    background: linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%); /* W3C */

}
.csssp{
	display:inline-block; 
	vertical-align:middle;
	width:27px; 
	height:27px;
	background-image:url('/ci/application/views/image/csssprite.png');
	background-repeat:no-repeat;
}


</style>

</head>

<body>
<div style="background:url('/ci/application/views/image/background.jpg');width:1200px; height:500px;">
<img src="/ci/application/views/image/background.jpg">	
</div>

<div style="position:fixed;width:500px;height:680px;left:200px;top:50px;">
<span style="font-weight:bold;position:fixed;left:200px;top:130px;font-size:100px;font-family:'幼圆'">问</span>
<span style="font-weight:bold;position:fixed;left:350px;top:240px;font-size:80px;font-family:'幼圆'">&</span>
<span style="font-weight:bold;position:fixed;left:420px;top:350px;font-size:100px;font-family:'幼圆'">答</span>
</div>

<div style="position:fixed;width:500px;height:300px;left:900px;top:240px;">
<form achtion="<?php echo site_url('login/index'); ?>" method="post">

<label class="word">账号:</label>

<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="20" />
<span class="csssp" style="background-position:0 0;"></span>
<p>

<label class="word">密码:</label>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="20"/>
<span class="csssp" style="background-position:0 -27px;"></span>
<dr />
<p>
<div>
<div style="float:left"><input type="submit" value="登 陆" /></div>
<div style="float:left"><a href="http://localhost:81/ci/index.php/register"><input type="button" id="btn" value="注 册" /></a></div>
</div>
</form>
</div>


</body>
</html>