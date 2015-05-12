<html>
<head>
<title>search</title>
<meta http-equiv="content-type" content="text/html;charset=gb2312">
<style type="text/css">
.word{
	margin: 0;
    padding: 0;
    line-height: 1.5em;
    font-family: "幼圆","Times New Roman", Times, serif;
    font-size: 13px;
    color: #000000;
    vertical-align:middle;
    }
.word1{
	margin: 0;
    padding: 0;
    line-height: 1.5em;
    font-family: "幼圆","Times New Roman", Times, serif;
    font-size: 47px;
    color: #000000;
    vertical-align:middle;
    }
input[type=text]{
	vertical-align:middle;
 	border-radius:7px 7px 7px 7px;
 	width:450px;
 	height:45px;
 	font-size:24px;
 	font-family:"黑体",Times New Roman,Georgia,Serif;
 }
.searchimg{
	vertical-align:middle;
} 
.yuanxingbutton{
	width:80px;
	height:80px;
	border-radius:40px;
	font-size:19px;
	font-family:"幼圆","Times New Roman", Times, serif;
}

.btn{
	color:#515151;
    background:#d3d3d3;
    background: #d3d3d3; /* Old browsers */
    background: -moz-linear-gradient(top,  #d3d3d3 0%, #8a8a8a 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#d3d3d3), color-stop(100%,#8a8a8a)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* IE10+ */
    background: linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* W3C */
    
}
input[type=submit]{
	vertical-align:middle;
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

<div style="position:fixed;width:700px;height:400px;left:340px;top:200px;">
<form achtion="http://localhost:81/ci/index.php/searchcontroll" method="post">

<div style="width:300px;height:60px;margin:auto auto;"><span class="word1">问 答</span></div>

<p>
<input type='text' name='searchkeywords' value='<?php echo set_value('searchkeywords'); ?>' />
<input type='image' class="searchimg" src='/ci/application/views/image/search.png' name='submit' />
<p>
<span class="word" style="float:left">若您给定的关键词搜索不到相关问题，我们将提供题库所有问题供您参考</span>
</form>
</div>

<div style="position:fixed;width:100px;height:150px;left:1050px;top:100px;">
<a href="http://localhost:81/ci/index.php/putask"><input type="button" class="yuanxingbutton btn" value="我要提问" /></a>
</div>
<div style="position:fixed;width:100px;height:150px;left:1050px;top:250px;">
<a href="http://localhost:81/ci/index.php/myinfo"><input type="button" class="yuanxingbutton btn" value="个人中心" /></a>
</div>
<div style="position:fixed;width:100px;height:150px;left:1050px;top:400px;">
<a href="http://localhost:81/ci/index.php/searchuser"><input type="button" class="yuanxingbutton btn" value="查找用户" /></a>
</div>
</body>

</html>